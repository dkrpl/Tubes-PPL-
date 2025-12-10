// Main Application Logic
import QuranAPI from './quran-api.js';
import BookEffects from './book-effect.js';

const App = {
    // State
    allSurahs: [],
    currentSurah: null,
    currentPage: 0,
    versesPerPage: 6,
    bookmarks: JSON.parse(localStorage.getItem('quranBookmarks') || '[]'),
    audioPlaying: false,
    audioPlayer: null,
    currentTheme: localStorage.getItem('quranTheme') || 'dark',
    
    // DOM Elements
    elements: {},
    
    // Initialize
    async init() {
        this.cacheDOM();
        this.initTheme();
        this.bindEvents();
        await this.loadSurahList();
        BookEffects.init();
        
        // Preload first surah for faster navigation
        this.preloadSurah(1);
    },
    
    cacheDOM() {
        this.elements = {
            // Pages
            homePage: document.getElementById('homePage'),
            readerPage: document.getElementById('readerPage'),
            bookmarkPage: document.getElementById('bookmarkPage'),
            
            // Lists
            surahList: document.getElementById('surahList'),
            bookmarkList: document.getElementById('bookmarkList'),
            searchResults: document.getElementById('searchResults'),
            
            // Search
            searchInput: document.getElementById('searchInput'),
            
            // Reader
            surahTitle: document.getElementById('surahTitle'),
            surahInfo: document.getElementById('surahInfo'),
            leftPageContent: document.getElementById('leftPageContent'),
            rightPageContent: document.getElementById('rightPageContent'),
            leftSurahName: document.getElementById('leftSurahName'),
            rightSurahName: document.getElementById('rightSurahName'),
            leftPageNum: document.getElementById('leftPageNum'),
            rightPageNum: document.getElementById('rightPageNum'),
            currentPageInfo: document.getElementById('currentPageInfo'),
            pageIndicator: document.getElementById('pageIndicator'),
            pageButtons: document.getElementById('pageButtons'),
            pageSlider: document.getElementById('pageSlider'),
            
            // Audio
            audioPlayer: document.getElementById('audioPlayer'),
            audioBtn: document.getElementById('audioBtn'),
            
            // Settings
            settingsPanel: document.getElementById('settingsPanel'),
            arabicFontSize: document.getElementById('arabicFontSize'),
            versesPerPageSelect: document.getElementById('versesPerPage'),
            themeSelect: document.getElementById('themeSelect')
        };
    },
    
    initTheme() {
        document.documentElement.setAttribute('data-theme', this.currentTheme);
        if (this.elements.themeSelect) {
            this.elements.themeSelect.value = this.currentTheme;
        }
    },
    
    bindEvents() {
        // Settings
        if (this.elements.arabicFontSize) {
            this.elements.arabicFontSize.addEventListener('input', (e) => {
                document.documentElement.style.setProperty('--arabic-size', `${e.target.value}rem`);
            });
        }
        
        if (this.elements.versesPerPageSelect) {
            this.elements.versesPerPageSelect.addEventListener('change', (e) => {
                this.versesPerPage = parseInt(e.target.value);
                if (this.currentSurah) {
                    this.displayVerses();
                }
            });
        }
        
        if (this.elements.themeSelect) {
            this.elements.themeSelect.addEventListener('change', (e) => {
                this.currentTheme = e.target.value;
                localStorage.setItem('quranTheme', this.currentTheme);
                this.initTheme();
            });
        }
        
        // Audio
        if (this.elements.audioPlayer) {
            this.elements.audioPlayer.addEventListener('ended', () => {
                this.audioPlaying = false;
                if (this.elements.audioBtn) {
                    this.elements.audioBtn.innerHTML = '<i class="fas fa-play"></i>';
                }
            });
        }
        
        // Close search results on outside click
        document.addEventListener('click', (e) => {
            if (!e.target.closest('.search-container')) {
                this.elements.searchResults.classList.remove('active');
            }
        });
    },
    
    // Surah List
    async loadSurahList() {
        try {
            this.showLoading(this.elements.surahList);
            this.allSurahs = await QuranAPI.getCachedSurahList();
            this.displaySurahList();
        } catch (error) {
            this.showError(this.elements.surahList, 'Gagal memuat daftar surah');
        }
    },
    
    displaySurahList() {
        if (!this.allSurahs.length) return;
        
        this.elements.surahList.innerHTML = this.allSurahs.map(surah => `
            <div class="surah-card" onclick="App.loadSurah(${surah.nomor})">
                <div class="surah-number">${surah.nomor}</div>
                <button class="bookmark-btn" onclick="event.stopPropagation(); App.toggleBookmark(${surah.nomor})">
                    ${this.bookmarks.find(b => b.nomor === surah.nomor) ? '★' : '☆'}
                </button>
                <h3 class="surah-name">${surah.namaLatin}</h3>
                <div class="surah-arabic">${surah.nama}</div>
                <p class="surah-translation">${surah.arti}</p>
                <div class="surah-details">
                    <span>${surah.tempatTurun}</span>
                    <span>${surah.jumlahAyat} ayat</span>
                </div>
            </div>
        `).join('');
    },
    
    // Surah Loading
    async loadSurah(nomor) {
        try {
            this.showLoading(this.elements.leftPageContent);
            this.showLoading(this.elements.rightPageContent);
            
            this.currentSurah = await QuranAPI.getCachedSurah(nomor);
            this.currentPage = 0;
            
            this.updateSurahInfo();
            this.setupAudio();
            this.displayVerses();
            this.createPageNavigation();
            this.showPage('readerPage');
            
            // Scroll to top
            window.scrollTo({ top: 0, behavior: 'smooth' });
            
            // Add to reading history
            this.addToHistory(nomor);
        } catch (error) {
            this.showError(this.elements.leftPageContent, 'Gagal memuat surah');
        }
    },
    
    updateSurahInfo() {
        if (!this.currentSurah) return;
        
        this.elements.surahTitle.textContent = `${this.currentSurah.namaLatin} (${this.currentSurah.nama})`;
        this.elements.surahInfo.textContent = 
            `${this.currentSurah.arti} • ${this.currentSurah.tempatTurun} • ${this.currentSurah.jumlahAyat} ayat`;
        
        this.elements.leftSurahName.textContent = this.currentSurah.namaLatin;
        this.elements.rightSurahName.textContent = this.currentSurah.namaLatin;
    },
    
    // Pagination
    displayVerses() {
        if (!this.currentSurah) return;
        
        const verses = this.currentSurah.ayat;
        const totalPages = Math.ceil(verses.length / this.versesPerPage);
        const start = this.currentPage * this.versesPerPage;
        const end = Math.min(start + this.versesPerPage, verses.length);
        const mid = Math.ceil((end - start) / 2);
        
        // Left page verses
        const leftVerses = verses.slice(start, start + mid);
        this.elements.leftPageContent.innerHTML = this.renderVerses(leftVerses);
        this.elements.leftPageNum.textContent = this.currentPage * 2 + 1;
        
        // Right page verses
        const rightVerses = verses.slice(start + mid, end);
        this.elements.rightPageContent.innerHTML = this.renderVerses(rightVerses);
        this.elements.rightPageNum.textContent = this.currentPage * 2 + 2;
        
        // Update page info
        this.elements.currentPageInfo.textContent = `Halaman ${this.currentPage + 1} dari ${totalPages}`;
        this.elements.pageIndicator.textContent = `Halaman ${this.currentPage + 1}/${totalPages}`;
        
        // Update slider
        if (this.elements.pageSlider) {
            this.elements.pageSlider.max = totalPages;
            this.elements.pageSlider.value = this.currentPage + 1;
        }
    },
    
    renderVerses(verses) {
        return verses.map(verse => `
            <div class="verse" id="verse-${verse.nomorAyat}">
                <span class="verse-number">${verse.nomorAyat}</span>
                <div class="arabic-text">${verse.teksArab}</div>
                <div class="transliteration">${verse.teksLatin}</div>
                <div class="translation">${verse.teksIndonesia}</div>
                <div class="verse-controls">
                    <button class="verse-btn" onclick="App.playVerse('${verse.audio['05']}')" title="Dengarkan">
                        <i class="fas fa-play"></i>
                    </button>
                    <button class="verse-btn" onclick="App.bookmarkVerse(${verse.nomorAyat})" title="Bookmark">
                        <i class="fas fa-bookmark"></i>
                    </button>
                    <button class="verse-btn" onclick="App.copyVerse(${verse.nomorAyat})" title="Salin">
                        <i class="fas fa-copy"></i>
                    </button>
                </div>
            </div>
        `).join('');
    },
    
    // Navigation
    nextPage() {
        if (!this.currentSurah) return;
        
        const totalPages = Math.ceil(this.currentSurah.ayat.length / this.versesPerPage);
        if (this.currentPage < totalPages - 1) {
            this.currentPage++;
            BookEffects.turnPage('next');
            setTimeout(() => {
                this.displayVerses();
                this.updatePageNavigation();
            }, 400);
        }
    },
    
    prevPage() {
        if (this.currentPage > 0) {
            this.currentPage--;
            BookEffects.turnPage('prev');
            setTimeout(() => {
                this.displayVerses();
                this.updatePageNavigation();
            }, 400);
        }
    },
    
    firstPage() {
        this.currentPage = 0;
        this.displayVerses();
        this.updatePageNavigation();
    },
    
    lastPage() {
        if (!this.currentSurah) return;
        
        const totalPages = Math.ceil(this.currentSurah.ayat.length / this.versesPerPage);
        this.currentPage = totalPages - 1;
        this.displayVerses();
        this.updatePageNavigation();
    },
    
    goToPage(pageNumber) {
        const totalPages = Math.ceil(this.currentSurah.ayat.length / this.versesPerPage);
        if (pageNumber >= 0 && pageNumber < totalPages) {
            this.currentPage = pageNumber;
            this.displayVerses();
            this.updatePageNavigation();
        }
    },
    
    createPageNavigation() {
        if (!this.currentSurah) return;
        
        const totalPages = Math.ceil(this.currentSurah.ayat.length / this.versesPerPage);
        this.elements.pageButtons.innerHTML = '';
        
        // Show limited page buttons
        const maxButtons = 7;
        let start = Math.max(0, this.currentPage - Math.floor(maxButtons / 2));
        let end = Math.min(totalPages, start + maxButtons);
        
        if (end - start < maxButtons) {
            start = Math.max(0, end - maxButtons);
        }
        
        for (let i = start; i < end; i++) {
            const button = document.createElement('button');
            button.className = `page-btn ${i === this.currentPage ? 'active' : ''}`;
            button.textContent = i + 1;
            button.onclick = () => this.goToPage(i);
            this.elements.pageButtons.appendChild(button);
        }
    },
    
    updatePageNavigation() {
        this.createPageNavigation();
    },
    
    // Audio
    setupAudio() {
        if (!this.currentSurah || !this.currentSurah.audioFull) return;
        
        const audioUrl = this.currentSurah.audioFull['05'];
        if (audioUrl) {
            this.elements.audioPlayer.src = audioUrl;
            if (this.elements.audioBtn) {
                this.elements.audioBtn.style.display = 'flex';
            }
        } else {
            if (this.elements.audioBtn) {
                this.elements.audioBtn.style.display = 'none';
            }
        }
    },
    
    toggleAudio() {
        if (!this.elements.audioPlayer.src) return;
        
        if (this.audioPlaying) {
            this.elements.audioPlayer.pause();
            this.elements.audioBtn.innerHTML = '<i class="fas fa-play"></i>';
        } else {
            this.elements.audioPlayer.play().catch(() => {
                // Handle autoplay restrictions
                this.elements.audioBtn.innerHTML = '<i class="fas fa-play"></i>';
            });
            this.elements.audioBtn.innerHTML = '<i class="fas fa-pause"></i>';
        }
        this.audioPlaying = !this.audioPlaying;
    },
    
    playVerse(audioUrl) {
        const audio = new Audio(audioUrl);
        audio.play().catch(() => {
            // Ignore autoplay restrictions
        });
        
        // Visual feedback
        const button = event?.target?.closest('button');
        if (button) {
            const originalHTML = button.innerHTML;
            button.innerHTML = '<i class="fas fa-volume-up"></i>';
            setTimeout(() => {
                button.innerHTML = originalHTML;
            }, 2000);
        }
    },
    
    // Bookmarks
    toggleBookmark(nomor) {
        const index = this.bookmarks.findIndex(b => b.nomor === nomor);
        const surah = this.allSurahs.find(s => s.nomor === nomor);
        
        if (index > -1) {
            this.bookmarks.splice(index, 1);
        } else if (surah) {
            this.bookmarks.push({
                nomor: surah.nomor,
                nama: surah.nama,
                namaLatin: surah.namaLatin,
                arti: surah.arti,
                date: new Date().toISOString()
            });
        }
        
        localStorage.setItem('quranBookmarks', JSON.stringify(this.bookmarks));
        this.displaySurahList();
        
        if (this.currentPageId === 'bookmarkPage') {
            this.showBookmarks();
        }
    },
    
    bookmarkVerse(verseNumber) {
        if (!this.currentSurah) return;
        
        const verse = this.currentSurah.ayat[verseNumber - 1];
        const bookmark = {
            type: 'verse',
            surah: this.currentSurah.nomor,
            surahName: this.currentSurah.namaLatin,
            verse: verseNumber,
            arabic: verse.teksArab,
            translation: verse.teksIndonesia,
            date: new Date().toISOString()
        };
        
        this.bookmarks.push(bookmark);
        localStorage.setItem('quranBookmarks', JSON.stringify(this.bookmarks));
        
        // Visual feedback
        const button = event?.target?.closest('button');
        if (button) {
            button.innerHTML = '<i class="fas fa-check"></i>';
            setTimeout(() => {
                button.innerHTML = '<i class="fas fa-bookmark"></i>';
            }, 1000);
        }
    },
    
    showBookmarks() {
        if (this.bookmarks.length === 0) {
            this.elements.bookmarkList.innerHTML = `
                <div class="empty-state">
                    <i class="fas fa-bookmark fa-3x"></i>
                    <h3>Belum ada bookmark</h3>
                    <p>Mulailah membaca dan tandai ayat-ayat favorit Anda</p>
                </div>`;
        } else {
            this.elements.bookmarkList.innerHTML = this.bookmarks.map(bookmark => `
                <div class="bookmark-item">
                    ${bookmark.type === 'verse' ? `
                        <button class="remove-bookmark" onclick="App.removeBookmark('${bookmark.date}')">
                            <i class="fas fa-times"></i>
                        </button>
                        <div class="bookmark-content">
                            <div class="arabic-text">${bookmark.arabic}</div>
                            <p class="translation">${bookmark.translation}</p>
                            <div class="bookmark-meta">
                                <span>${bookmark.surahName} : ${bookmark.verse}</span>
                                <span>${new Date(bookmark.date).toLocaleDateString('id-ID')}</span>
                            </div>
                        </div>
                    ` : `
                        <button class="remove-bookmark" onclick="App.removeBookmark('${bookmark.date}')">
                            <i class="fas fa-times"></i>
                        </button>
                        <div class="bookmark-content" onclick="App.loadSurah(${bookmark.nomor})">
                            <h3>${bookmark.namaLatin}</h3>
                            <div class="arabic-text">${bookmark.nama}</div>
                            <p>${bookmark.arti}</p>
                            <div class="bookmark-meta">
                                <span>Surah ke-${bookmark.nomor}</span>
                                <span>${new Date(bookmark.date).toLocaleDateString('id-ID')}</span>
                            </div>
                        </div>
                    `}
                </div>
            `).join('');
        }
        this.showPage('bookmarkPage');
    },
    
    removeBookmark(date) {
        event?.stopPropagation();
        this.bookmarks = this.bookmarks.filter(b => b.date !== date);
        localStorage.setItem('quranBookmarks', JSON.stringify(this.bookmarks));
        this.showBookmarks();
    },
    
    clearBookmarks() {
        if (confirm('Hapus semua bookmark?')) {
            this.bookmarks = [];
            localStorage.removeItem('quranBookmarks');
            this.showBookmarks();
        }
    },
    
    // Search
    async searchSurah(query) {
        if (!query.trim()) {
            this.elements.searchResults.classList.remove('active');
            return;
        }
        
        const results = await QuranAPI.searchSurah(query);
        
        if (results.length > 0) {
            this.elements.searchResults.innerHTML = results.slice(0, 8).map(surah => `
                <div class="search-result-item" onclick="App.loadSurah(${surah.nomor})">
                    <div class="search-result-number">${surah.nomor}</div>
                    <div class="search-result-content">
                        <div class="search-result-title">${surah.namaLatin}</div>
                        <div class="search-result-arabic">${surah.nama}</div>
                        <div class="search-result-translation">${surah.arti}</div>
                    </div>
                </div>
            `).join('');
            this.elements.searchResults.classList.add('active');
        } else {
            this.elements.searchResults.innerHTML = `
                <div class="search-result-item">
                    <div class="search-result-content">
                        <div class="search-result-title">Tidak ditemukan</div>
                    </div>
                </div>`;
            this.elements.searchResults.classList.add('active');
        }
    },
    
    // Page Navigation
    showPage(pageId) {
        this.currentPageId = pageId;
        
        // Hide all pages
        [this.elements.homePage, this.elements.readerPage, this.elements.bookmarkPage]
            .forEach(page => page?.classList.add('hidden'));
        
        // Show requested page
        const page = this.elements[`${pageId}Page`];
        if (page) {
            page.classList.remove('hidden');
        }
        
        // Close search results
        this.elements.searchResults.classList.remove('active');
    },
    
    showHome() {
        this.showPage('home');
    },
    
    showSearch() {
        this.showPage('home');
        setTimeout(() => {
            this.elements.searchInput.focus();
        }, 100);
    },
    
    // Utilities
    showLoading(element, message = 'Memuat...') {
        if (element) {
            element.innerHTML = `
                <div class="loading-state">
                    <div class="loader"></div>
                    <p>${message}</p>
                </div>`;
        }
    },
    
    showError(element, message = 'Terjadi kesalahan') {
        if (element) {
            element.innerHTML = `
                <div class="error-state">
                    <i class="fas fa-exclamation-triangle"></i>
                    <p>${message}</p>
                </div>`;
        }
    },
    
    copyVerse(verseNumber) {
        if (!this.currentSurah) return;
        
        const verse = this.currentSurah.ayat[verseNumber - 1];
        const text = `${verse.teksArab}\n\n${verse.teksIndonesia}`;
        
        navigator.clipboard.writeText(text).then(() => {
            const button = event?.target?.closest('button');
            if (button) {
                const originalHTML = button.innerHTML;
                button.innerHTML = '<i class="fas fa-check"></i>';
                setTimeout(() => {
                    button.innerHTML = originalHTML;
                }, 1000);
            }
        });
    },
    
    addToHistory(nomor) {
        let history = JSON.parse(localStorage.getItem('quranHistory') || '[]');
        history = history.filter(h => h.nomor !== nomor);
        history.unshift({
            nomor,
            date: new Date().toISOString()
        });
        
        // Keep only last 20 items
        history = history.slice(0, 20);
        localStorage.setItem('quranHistory', JSON.stringify(history));
    },
    
    preloadSurah(nomor) {
        // Preload surah in background
        QuranAPI.getCachedSurah(nomor).catch(() => {});
    },
    
    toggleSettings() {
        this.elements.settingsPanel.classList.toggle('active');
    },
    
    toggleTheme() {
        const themes = ['dark', 'light', 'sepia'];
        const currentIndex = themes.indexOf(this.currentTheme);
        const nextIndex = (currentIndex + 1) % themes.length;
        this.currentTheme = themes[nextIndex];
        localStorage.setItem('quranTheme', this.currentTheme);
        this.initTheme();
    }
};

// Make App available globally
window.App = App;

// Initialize when DOM is loaded
document.addEventListener('DOMContentLoaded', () => {
    App.init();
});

// Global functions for HTML onclick handlers
window.toggleBookView = () => BookEffects.toggleBookView();
window.toggleTheme = () => App.toggleTheme();
window.toggleSettings = () => App.toggleSettings();
window.showHome = () => App.showHome();
window.showBookmarks = () => App.showBookmarks();
window.showSearch = () => App.showSearch();
window.searchSurah = (query) => App.searchSurah(query);
window.clearBookmarks = () => App.clearBookmarks();
window.nextPage = () => App.nextPage();
window.prevPage = () => App.prevPage();
window.firstPage = () => App.firstPage();
window.lastPage = () => App.lastPage();
window.goToPage = (page) => App.goToPage(page);
window.toggleAudio = () => App.toggleAudio();