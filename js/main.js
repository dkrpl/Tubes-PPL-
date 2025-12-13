
        const API_BASE = 'https://equran.id/api/v2';
        let allSurahs = [];
        let filteredSurahs = [];
        let currentSurah = null;
        let currentPage = 1;
        let itemsPerPage = 12;
        let bookmarks = JSON.parse(localStorage.getItem('quranBookmarks') || '[]');
        let audio = null;
        let isPlaying = false;
        let currentTheme = 'dark';
        let currentVersesPage = 0;
        let versesPerPage = 5;

        // Initialize
        async function init() {
            await loadSurahs();
            createPagination();
            updateStats();
            setupTheme();
        }

        // Theme Management
        function setupTheme() {
            const savedTheme = localStorage.getItem('quranTheme') || 'dark';
            setTheme(savedTheme);
        }

        function setTheme(theme) {
            currentTheme = theme;
            document.body.setAttribute('data-theme', theme);
            localStorage.setItem('quranTheme', theme);
            
            // Update theme icon
            const themeIcon = document.querySelector('[onclick="toggleTheme()"] i');
            if (theme === 'light') {
                themeIcon.className = 'fas fa-sun';
            } else {
                themeIcon.className = 'fas fa-moon';
            }
        }

        function toggleTheme() {
            const newTheme = currentTheme === 'light' ? 'dark' : 'light';
            setTheme(newTheme);
            showNotification(`Mode ${newTheme === 'light' ? 'terang' : 'gelap'} diaktifkan`);
        }

        // Load Surahs
        async function loadSurahs() {
            try {
                const response = await fetch(`${API_BASE}/surat`);
                const data = await response.json();
                allSurahs = data.data;
                filteredSurahs = [...allSurahs];
                displaySurahPage();
            } catch (error) {
                showError('Gagal memuat data surah');
            }
        }

        // Display Surahs with Pagination
        function displaySurahPage() {
            const startIndex = (currentPage - 1) * itemsPerPage;
            const endIndex = startIndex + itemsPerPage;
            const pageSurahs = filteredSurahs.slice(startIndex, endIndex);
            
            const list = document.getElementById('surahList');
            
            if (pageSurahs.length === 0) {
                list.innerHTML = `
                    <div class="col-span-full text-center py-12 card">
                        <div class="w-16 h-16 mx-auto mb-4 bg-gradient-to-br from-purple-500/20 to-indigo-600/20 rounded-full flex items-center justify-center">
                            <i class="fas fa-search text-2xl text-gray-400"></i>
                        </div>
                        <h3 class="text-xl font-bold mb-2">Tidak ada surah yang ditemukan</h3>
                        <p class="text-gray-600 dark:text-gray-400">Coba kata kunci pencarian yang berbeda</p>
                    </div>`;
                return;
            }
            
            list.innerHTML = pageSurahs.map(surah => `
                <div class="surah-card card" onclick="loadSurah(${surah.nomor})">
                    <div class="flex items-center justify-between mb-4">
                        <div class="surah-number">${surah.nomor}</div>
                        <div class="bookmark-btn ${bookmarks.find(b => b.nomor === surah.nomor) ? 'active' : ''}" 
                             onclick="event.stopPropagation(); toggleSurahBookmark(${surah.nomor}, '${surah.nama}', '${surah.namaLatin}')">
                            <i class="fas fa-bookmark"></i>
                        </div>
                    </div>
                    
                    <div class="surah-name-arabic arabic-text">${surah.nama}</div>
                    <h3 class="text-lg font-semibold mb-2">${surah.namaLatin}</h3>
                    <p class="text-gray-600 dark:text-gray-400 text-sm mb-4">${surah.arti}</p>
                    
                    <div class="surah-meta">
                        <span class="surah-type">${surah.tempatTurun}</span>
                        <span class="text-sm text-gray-600 dark:text-gray-400">${surah.jumlahAyat} ayat</span>
                    </div>
                </div>
            `).join('');
            
            createPagination();
        }

        // Pagination
        function createPagination() {
            const totalPages = Math.ceil(filteredSurahs.length / itemsPerPage);
            const pageNumbers = document.getElementById('pageNumbers');
            pageNumbers.innerHTML = '';
            
            // Show limited page numbers
            let startPage = Math.max(1, currentPage - 2);
            let endPage = Math.min(totalPages, currentPage + 2);
            
            if (currentPage > 3) {
                const firstPageBtn = document.createElement('button');
                firstPageBtn.className = 'page-btn';
                firstPageBtn.textContent = '1';
                firstPageBtn.onclick = () => goToPage(1);
                pageNumbers.appendChild(firstPageBtn);
                
                if (currentPage > 4) {
                    const ellipsis = document.createElement('span');
                    ellipsis.className = 'text-gray-600 dark:text-gray-400 px-2';
                    ellipsis.textContent = '...';
                    pageNumbers.appendChild(ellipsis);
                }
            }
            
            for (let i = startPage; i <= endPage; i++) {
                const pageBtn = document.createElement('button');
                pageBtn.className = `page-btn ${i === currentPage ? 'active' : ''}`;
                pageBtn.textContent = i;
                pageBtn.onclick = () => goToPage(i);
                pageNumbers.appendChild(pageBtn);
            }
            
            if (currentPage < totalPages - 2) {
                if (currentPage < totalPages - 3) {
                    const ellipsis = document.createElement('span');
                    ellipsis.className = 'text-gray-600 dark:text-gray-400 px-2';
                    ellipsis.textContent = '...';
                    pageNumbers.appendChild(ellipsis);
                }
                
                const lastPageBtn = document.createElement('button');
                lastPageBtn.className = 'page-btn';
                lastPageBtn.textContent = totalPages;
                lastPageBtn.onclick = () => goToPage(totalPages);
                pageNumbers.appendChild(lastPageBtn);
            }
        }

        function prevPage() {
            if (currentPage > 1) {
                currentPage--;
                displaySurahPage();
                window.scrollTo({ top: 0, behavior: 'smooth' });
            }
        }

        function nextPage() {
            const totalPages = Math.ceil(filteredSurahs.length / itemsPerPage);
            if (currentPage < totalPages) {
                currentPage++;
                displaySurahPage();
                window.scrollTo({ top: 0, behavior: 'smooth' });
            }
        }

        function goToPage(page) {
            currentPage = page;
            displaySurahPage();
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }

        // Load Surah
        async function loadSurah(nomor) {
            try {
                showNotification(`Memuat Surah ${nomor}...`);
                const response = await fetch(`${API_BASE}/surat/${nomor}`);
                const data = await response.json();
                currentSurah = data.data;
                currentVersesPage = 0;
                
                document.getElementById('surahTitle').textContent = `${currentSurah.namaLatin} (${currentSurah.nama})`;
                document.getElementById('surahInfo').textContent = 
                    `${currentSurah.arti} • ${currentSurah.tempatTurun} • ${currentSurah.jumlahAyat} Ayat`;
                
                // Setup Audio Player
                setupAudioPlayer();
                displayVerses();
                showPage('readerPage');
                updateProgress();
                
                showNotification(`Surah ${currentSurah.namaLatin} berhasil dimuat`);
            } catch (error) {
                showError('Gagal memuat surah. Silakan coba lagi.');
            }
        }

        // Audio Player Functions
        function setupAudioPlayer() {
            const audioContainer = document.getElementById('audioPlayerContainer');
            if (currentSurah.audioFull && currentSurah.audioFull['05']) {
                if (audio) {
                    audio.pause();
                    audio = null;
                }
                
                audio = new Audio(currentSurah.audioFull['05']);
                audioContainer.classList.remove('hidden');
                
                // Setup audio events
                audio.addEventListener('loadedmetadata', updateAudioDuration);
                audio.addEventListener('timeupdate', updateAudioProgress);
                audio.addEventListener('ended', onAudioEnded);
                
                // Initialize duration
                setTimeout(updateAudioDuration, 500);
            } else {
                audioContainer.classList.add('hidden');
            }
        }

        function toggleAudio() {
            if (!audio) return;
            
            if (isPlaying) {
                audio.pause();
                document.getElementById('audioBtn').innerHTML = '<i class="fas fa-play"></i>';
            } else {
                audio.play();
                document.getElementById('audioBtn').innerHTML = '<i class="fas fa-pause"></i>';
            }
            isPlaying = !isPlaying;
        }

        function skipBackward() {
            if (!audio) return;
            audio.currentTime = Math.max(0, audio.currentTime - 10);
        }

        function skipForward() {
            if (!audio) return;
            audio.currentTime = Math.min(audio.duration, audio.currentTime + 10);
        }

        function toggleMute() {
            if (!audio) return;
            audio.muted = !audio.muted;
            const muteBtn = document.getElementById('muteBtn');
            muteBtn.innerHTML = audio.muted ? '<i class="fas fa-volume-mute"></i>' : '<i class="fas fa-volume-up"></i>';
        }

        function updateAudioDuration() {
            if (!audio) return;
            const duration = formatTime(audio.duration);
            document.getElementById('durationTime').textContent = duration;
        }

        function updateAudioProgress() {
            if (!audio) return;
            const current = formatTime(audio.currentTime);
            const progress = (audio.currentTime / audio.duration) * 100;
            
            document.getElementById('currentTime').textContent = current;
            document.getElementById('audioProgress').style.width = `${progress}%`;
        }

        function onAudioEnded() {
            isPlaying = false;
            document.getElementById('audioBtn').innerHTML = '<i class="fas fa-play"></i>';
        }

        function formatTime(seconds) {
            const mins = Math.floor(seconds / 60);
            const secs = Math.floor(seconds % 60);
            return `${mins}:${secs.toString().padStart(2, '0')}`;
        }

        // Display Verses
        function displayVerses() {
            const verses = currentSurah.ayat;
            const start = currentVersesPage * versesPerPage;
            const end = Math.min(start + versesPerPage, verses.length);
            const pageVerses = verses.slice(start, end);
            
            const container = document.getElementById('versesContainer');
            container.innerHTML = pageVerses.map(verse => `
                <div class="verse-container card">
                    <div class="verse-header">
                        <div class="verse-number">Ayat ${verse.nomorAyat}</div>
                        <div class="flex items-center gap-2">
                            <button onclick="playVerse('${verse.audio['05']}')" class="bookmark-btn">
                                <i class="fas fa-play"></i>
                            </button>
                            <button onclick="toggleVerseBookmark(${currentSurah.nomor}, ${verse.nomorAyat})" 
                                    class="bookmark-btn ${bookmarks.find(b => b.key === `s${currentSurah.nomor}v${verse.nomorAyat}`) ? 'active' : ''}">
                                <i class="fas fa-bookmark"></i>
                            </button>
                        </div>
                    </div>
                    
                    <div class="verse-arabic arabic-text">
                        ${verse.teksArab}
                    </div>
                    
                    <div class="verse-translation">
                        <div class="text-sm text-gray-600 dark:text-gray-400 mb-2">Latin:</div>
                        <div>${verse.teksLatin}</div>
                    </div>
                    
                    <div class="verse-translation">
                        <div class="text-sm text-gray-600 dark:text-gray-400 mb-2">Terjemahan:</div>
                        <div>${verse.teksIndonesia}</div>
                    </div>
                </div>
            `).join('');
            
            document.getElementById('verseRange').textContent = 
                `Ayat ${start + 1} - ${end} dari ${verses.length}`;
            
            updateProgress();
        }

        function prevVerses() {
            if (currentVersesPage > 0) {
                currentVersesPage--;
                displayVerses();
                window.scrollTo({ top: 0, behavior: 'smooth' });
            }
        }

        function nextVerses() {
            const totalPages = Math.ceil(currentSurah.ayat.length / versesPerPage);
            if (currentVersesPage < totalPages - 1) {
                currentVersesPage++;
                displayVerses();
                window.scrollTo({ top: 0, behavior: 'smooth' });
            }
        }

        function updateProgress() {
            if (!currentSurah) return;
            
            const totalVerses = currentSurah.jumlahAyat;
            const currentVerse = (currentVersesPage * versesPerPage) + 1;
            const progress = (currentVerse / totalVerses) * 100;
            
            document.getElementById('progressText').textContent = 
                `Progress: ${Math.round(progress)}%`;
            document.getElementById('progressBar').style.width = `${progress}%`;
        }

        function playVerse(audioUrl) {
            const verseAudio = new Audio(audioUrl);
            verseAudio.play();
            showNotification('Memutar ayat...');
        }

        // Bookmark Functions
        function toggleSurahBookmark(nomor, nama, namaLatin) {
            const index = bookmarks.findIndex(b => b.nomor === nomor);
            if (index > -1) {
                bookmarks.splice(index, 1);
                showNotification(`Bookmark ${namaLatin} dihapus`);
            } else {
                bookmarks.push({ 
                    nomor, 
                    nama, 
                    namaLatin, 
                    type: 'surah',
                    date: new Date().toISOString()
                });
                showNotification(`Bookmark ${namaLatin} disimpan`);
            }
            localStorage.setItem('quranBookmarks', JSON.stringify(bookmarks));
            displaySurahPage();
            updateBookmarkCount();
            updateStats();
        }

        function toggleVerseBookmark(surahNomor, verseNomor) {
            const bookmarkKey = `s${surahNomor}v${verseNomor}`;
            const index = bookmarks.findIndex(b => b.key === bookmarkKey);
            
            if (index > -1) {
                bookmarks.splice(index, 1);
                showNotification(`Bookmark ayat ${verseNomor} dihapus`);
            } else {
                bookmarks.push({ 
                    key: bookmarkKey, 
                    surahNomor, 
                    verseNomor, 
                    type: 'verse',
                    date: new Date().toISOString()
                });
                showNotification(`Bookmark ayat ${verseNomor} disimpan`);
            }
            localStorage.setItem('quranBookmarks', JSON.stringify(bookmarks));
            updateBookmarkCount();
            updateStats();
            
            // Refresh display
            setTimeout(() => displayVerses(), 100);
        }

        // Search and Filter
        function searchSurah(query) {
            if (!query) {
                filteredSurahs = [...allSurahs];
                currentPage = 1;
                displaySurahPage();
                return;
            }
            
            filteredSurahs = allSurahs.filter(s => 
                s.namaLatin.toLowerCase().includes(query.toLowerCase()) ||
                s.nama.includes(query) ||
                s.arti.toLowerCase().includes(query.toLowerCase()) ||
                s.nomor.toString().includes(query)
            );
            
            currentPage = 1;
            displaySurahPage();
        }

        function filterSurahs(type) {
            // Update active tab
            document.querySelectorAll('.tab').forEach(tab => {
                tab.classList.remove('active');
            });
            event.target.classList.add('active');
            
            if (type === 'all') {
                filteredSurahs = [...allSurahs];
            } else if (type === 'makkiyah') {
                filteredSurahs = allSurahs.filter(s => s.tempatTurun === 'Makkiyah');
            } else if (type === 'madaniyah') {
                filteredSurahs = allSurahs.filter(s => s.tempatTurun === 'Madaniyah');
            } else if (type === 'juz30') {
                filteredSurahs = allSurahs.slice(78); // Surah 78-114 (Juz 30)
            } else if (type === 'popular') {
                filteredSurahs = allSurahs.filter(s => 
                    [1, 2, 18, 36, 55, 67, 112].includes(s.nomor)
                );
            }
            
            currentPage = 1;
            displaySurahPage();
            showNotification(`Menampilkan ${type === 'all' ? 'semua' : type} surah`);
        }

        // View Management
        function showHome() {
            showPage('homePage');
        }

        function showBookmarks() {
            const list = document.getElementById('bookmarkList');
            if (bookmarks.length === 0) {
                list.innerHTML = `
                    <div class="col-span-full text-center py-12 card">
                        <div class="w-16 h-16 mx-auto mb-4 bg-gradient-to-br from-yellow-500/20 to-orange-500/20 rounded-full flex items-center justify-center">
                            <i class="fas fa-bookmark text-2xl text-gray-400"></i>
                        </div>
                        <h3 class="text-xl font-bold mb-2">Belum ada bookmark</h3>
                        <p class="text-gray-600 dark:text-gray-400 mb-6">
                            Tambahkan bookmark pada surah atau ayat favorit Anda
                        </p>
                        <button onclick="showHome()" class="btn btn-primary">
                            <i class="fas fa-search mr-2"></i>
                            Jelajahi Surah
                        </button>
                    </div>`;
            } else {
                list.innerHTML = bookmarks.map(bookmark => {
                    if (bookmark.type === 'surah') {
                        const surah = allSurahs.find(s => s.nomor === bookmark.nomor);
                        if (!surah) return '';
                        return `
                            <div class="card p-6" onclick="loadSurah(${surah.nomor})">
                                <div class="flex items-center justify-between mb-4">
                                    <div class="surah-number">${surah.nomor}</div>
                                    <span class="text-yellow-500"><i class="fas fa-bookmark"></i></span>
                                </div>
                                <h3 class="text-lg font-semibold mb-2">${surah.namaLatin}</h3>
                                <div class="surah-name-arabic arabic-text text-lg mb-3">${surah.nama}</div>
                                <p class="text-gray-600 dark:text-gray-400 text-sm mb-2">${surah.arti}</p>
                                <div class="text-xs text-gray-500 mt-4">
                                    Disimpan: ${new Date(bookmark.date).toLocaleDateString('id-ID')}
                                </div>
                            </div>
                        `;
                    } else {
                        return `
                            <div class="card p-6" onclick="loadSurah(${bookmark.surahNomor})">
                                <div class="flex items-center justify-between mb-4">
                                    <div class="verse-number">${bookmark.surahNomor}:${bookmark.verseNomor}</div>
                                    <span class="text-yellow-500"><i class="fas fa-bookmark"></i></span>
                                </div>
                                <h3 class="text-lg font-semibold mb-2">Ayat ${bookmark.verseNomor}</h3>
                                <p class="text-gray-600 dark:text-gray-400 text-sm mb-2">
                                    Surah ${bookmark.surahName}
                                </p>
                                <div class="text-xs text-gray-500 mt-4">
                                    Disimpan: ${new Date(bookmark.date).toLocaleDateString('id-ID')}
                                </div>
                            </div>
                        `;
                    }
                }).join('');
            }
            showPage('bookmarkPage');
        }

        function showSearch() {
            showHome();
            document.getElementById('searchInput').focus();
        }

        function showPage(pageId) {
            ['homePage', 'readerPage', 'bookmarkPage'].forEach(id => {
                document.getElementById(id).classList.add('hidden');
            });
            document.getElementById(pageId).classList.remove('hidden');
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }

        // Utility Functions
        function updateBookmarkCount() {
            document.getElementById('bookmarkCount').textContent = bookmarks.length;
        }

        function updateStats() {
            document.getElementById('bookmarkStat').textContent = bookmarks.length;
        }

        function showNotification(message) {
            const notification = document.getElementById('notification');
            const notificationText = document.getElementById('notificationText');
            
            notificationText.textContent = message;
            notification.classList.add('show');
            
            setTimeout(() => {
                notification.classList.remove('show');
            }, 3000);
        }

        function showError(message) {
            showNotification(message);
        }

        // Event Listeners
        document.getElementById('searchInput').addEventListener('input', function(e) {
            searchSurah(e.target.value);
        });

        // Keyboard shortcuts
        document.addEventListener('keydown', function(e) {
            if (e.key === '/' && e.target.tagName !== 'INPUT') {
                e.preventDefault();
                showSearch();
            }
        });

        // Initialize
        init();