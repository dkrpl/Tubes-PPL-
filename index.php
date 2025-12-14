<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Al-Quran Digital | Elegant Experience</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Amiri:wght@400;700&family=Inter:wght@300;400;500;600;700&family=Poppins:wght@400;500;600;700&display=swap');
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary: #667eea;
            --primary-light: #a5b4fc;
            --primary-dark: #4c6ef5;
            --secondary: #8b5cf6;
            --accent: #10b981;
            --gold: #f59e0b;
            --light-bg: #f8fafc;
            --light-surface: #ffffff;
            --light-border: #e2e8f0;
            --light-text: #334155;
            --light-text-secondary: #64748b;
            --dark-bg: #0f172a;
            --dark-surface: #1e293b;
            --dark-border: #334155;
            --dark-text: #f1f5f9;
            --dark-text-secondary: #94a3b8;
        }

        [data-theme="light"] {
            --bg-color: var(--light-bg);
            --surface-color: var(--light-surface);
            --border-color: var(--light-border);
            --text-color: var(--light-text);
            --text-secondary: var(--light-text-secondary);
            --shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            --hover-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }

        [data-theme="dark"] {
            --bg-color: var(--dark-bg);
            --surface-color: var(--dark-surface);
            --border-color: var(--dark-border);
            --text-color: var(--dark-text);
            --text-secondary: var(--dark-text-secondary);
            --shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.3), 0 2px 4px -1px rgba(0, 0, 0, 0.2);
            --hover-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.3), 0 4px 6px -2px rgba(0, 0, 0, 0.2);
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--bg-color);
            color: var(--text-color);
            min-height: 100vh;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .arabic-text {
            font-family: 'Amiri', serif;
            font-size: 2.2rem;
            line-height: 3;
            text-align: right;
            direction: rtl;
            font-weight: 500;
            letter-spacing: 1px;
        }

        /* Modern Components */
        .card {
            background: var(--surface-color);
            border-radius: 16px;
            border: 1px solid var(--border-color);
            box-shadow: var(--shadow);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            overflow: hidden;
        }

        .card:hover {
            transform: translateY(-4px);
            box-shadow: var(--hover-shadow);
            border-color: var(--primary-light);
        }

        .card-primary {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            border: none;
        }

        .btn {
            padding: 12px 24px;
            border-radius: 12px;
            font-weight: 500;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px -5px rgba(102, 126, 234, 0.4);
        }

        .btn-outline {
            background: transparent;
            border: 2px solid var(--border-color);
            color: var(--text-color);
        }

        .btn-outline:hover {
            border-color: var(--primary);
            color: var(--primary);
        }

        /* Navigation */
        .nav {
            background: var(--surface-color);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid var(--border-color);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .nav-logo {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            font-weight: 700;
            font-size: 1.5rem;
        }

        /* Audio Player - Redesigned */
        .audio-player-container {
            background: linear-gradient(135deg, rgba(102, 126, 234, 0.1), rgba(139, 92, 246, 0.1));
            border-radius: 16px;
            border: 1px solid rgba(102, 126, 234, 0.2);
            padding: 20px;
            backdrop-filter: blur(10px);
        }

        .audio-player-controls {
            display: flex;
            align-items: center;
            gap: 16px;
            margin-top: 16px;
        }

        .audio-btn {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            border: none;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 12px rgba(102, 126, 234, 0.3);
        }

        .audio-btn:hover {
            transform: scale(1.1);
            box-shadow: 0 6px 20px rgba(102, 126, 234, 0.4);
        }

        .audio-btn:active {
            transform: scale(0.95);
        }

        .audio-btn-secondary {
            background: var(--surface-color);
            color: var(--text-color);
            border: 1px solid var(--border-color);
            box-shadow: none;
        }

        .audio-btn-secondary:hover {
            background: var(--bg-color);
            transform: none;
            box-shadow: none;
        }

        .audio-progress {
            flex: 1;
            height: 4px;
            background: var(--border-color);
            border-radius: 2px;
            overflow: hidden;
        }

        .audio-progress-bar {
            height: 100%;
            background: linear-gradient(90deg, var(--primary), var(--secondary));
            border-radius: 2px;
            width: 0%;
            transition: width 0.1s linear;
        }

        .audio-time {
            font-size: 0.875rem;
            color: var(--text-secondary);
            font-variant-numeric: tabular-nums;
        }

        /* Surah Card */
        .surah-card {
            padding: 20px;
            height: 100%;
            cursor: pointer;
        }

        .surah-number {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            font-size: 0.875rem;
        }

        .surah-name-arabic {
            font-size: 1.5rem;
            margin: 12px 0;
            font-weight: 600;
        }

        .surah-meta {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 16px;
            padding-top: 12px;
            border-top: 1px solid var(--border-color);
        }

        .surah-type {
            font-size: 0.75rem;
            padding: 4px 12px;
            border-radius: 20px;
            background: var(--bg-color);
            color: var(--text-secondary);
        }

        /* Verse Display */
        .verse-container {
            padding: 24px;
            margin: 16px 0;
        }

        .verse-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .verse-number {
            font-size: 0.875rem;
            font-weight: 600;
            padding: 6px 16px;
            border-radius: 20px;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
        }

        .verse-arabic {
            margin: 20px 0;
            padding: 20px;
            background: var(--bg-color);
            border-radius: 12px;
            border-right: 4px solid var(--primary);
        }

        .verse-translation {
            margin: 16px 0;
            padding: 16px;
            background: var(--surface-color);
            border-radius: 12px;
            border-left: 4px solid var(--accent);
            font-style: italic;
            line-height: 1.6;
        }

        .verse-actions {
            display: flex;
            gap: 12px;
            margin-top: 20px;
        }

        /* Pagination */
        .pagination {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            margin-top: 32px;
        }

        .page-btn {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            border: 1px solid var(--border-color);
            background: var(--surface-color);
            color: var(--text-color);
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .page-btn:hover {
            border-color: var(--primary);
            color: var(--primary);
        }

        .page-btn.active {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            border-color: transparent;
        }

        /* Search */
        .search-container {
            position: relative;
            max-width: 600px;
            margin: 0 auto;
        }

        .search-input {
            width: 100%;
            padding: 16px 48px 16px 24px;
            border-radius: 12px;
            border: 1px solid var(--border-color);
            background: var(--surface-color);
            color: var(--text-color);
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .search-input:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        .search-icon {
            position: absolute;
            right: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-secondary);
        }

        /* Tabs */
        .tabs {
            display: flex;
            gap: 8px;
            margin: 24px 0;
            flex-wrap: wrap;
        }

        .tab {
            padding: 10px 20px;
            border-radius: 10px;
            background: var(--surface-color);
            color: var(--text-color);
            border: 1px solid var(--border-color);
            cursor: pointer;
            transition: all 0.3s ease;
            font-weight: 500;
        }

        .tab:hover {
            border-color: var(--primary);
            color: var(--primary);
        }

        .tab.active {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            border-color: transparent;
        }

        /* Bookmark */
        .bookmark-btn {
            width: 36px;
            height: 36px;
            border-radius: 8px;
            border: 1px solid var(--border-color);
            background: var(--surface-color);
            color: var(--text-color);
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .bookmark-btn:hover {
            border-color: var(--gold);
            color: var(--gold);
        }

        .bookmark-btn.active {
            background: var(--gold);
            color: white;
            border-color: transparent;
        }

        /* Notification */
        .notification {
            position: fixed;
            top: 100px;
            right: 20px;
            padding: 16px 24px;
            border-radius: 12px;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            box-shadow: var(--hover-shadow);
            transform: translateX(120%);
            transition: transform 0.5s cubic-bezier(0.68, -0.55, 0.27, 1.55);
            z-index: 1000;
        }

        .notification.show {
            transform: translateX(0);
        }

        /* Loading */
        .loading {
            display: inline-block;
            width: 50px;
            height: 50px;
            border: 3px solid var(--border-color);
            border-radius: 50%;
            border-top-color: var(--primary);
            animation: spin 1s ease-in-out infinite;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        /* Stats */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 16px;
            margin: 32px 0;
        }

        .stat-card {
            padding: 20px;
            text-align: center;
        }

        .stat-value {
            font-size: 2rem;
            font-weight: 700;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 8px;
        }

        /* Scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: var(--bg-color);
        }

        ::-webkit-scrollbar-thumb {
            background: var(--border-color);
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: var(--primary);
        }
    </style>
</head>
<body data-theme="dark">
    <!-- Navigation -->
    <nav class="nav py-4">
        <div class="container mx-auto px-4">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-purple-600 to-indigo-700 flex items-center justify-center">
                        <i class="fas fa-quran text-white text-xl"></i>
                    </div>
                    <div>
                        <h1 class="nav-logo">Quran Digital</h1>
                        <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Bacaan dan Tadabur</p>
                    </div>
                </div>

                <div class="flex items-center gap-4">
                    <button onclick="showHome()" class="btn btn-outline">
                        <i class="fas fa-home"></i>
                        <span class="hidden md:inline">Beranda</span>
                    </button>
                    <button onclick="showBookmarks()" class="btn btn-outline relative">
                        <i class="fas fa-bookmark"></i>
                        <span class="hidden md:inline">Bookmark</span>
                        <span id="bookmarkCount" class="absolute -top-2 -right-2 bg-red-500 text-white text-xs rounded-full w-5 h-5 flex items-center justify-center">0</span>
                    </button>
                    <button onclick="showBookmarks()" class="btn btn-outline relative">
                        <i class="fas fa-bookmark"></i>
                        <span class="hidden md:inline">About</span>
                        <span id="bookmarkCount" class="absolute -top-2 -right-2 bg-red-500 text-white text-xs rounded-full w-5 h-5 flex items-center justify-center">0</span>
                        <a href="about.php"></a>
                    </button>
                    <button onclick="toggleTheme()" class="btn btn-outline">
                        <i class="fas fa-moon"></i>
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container mx-auto px-4 py-8">
        <!-- Home Page -->
        <div id="homePage">
            <!-- Header -->
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold mb-4 bg-gradient-to-r from-purple-600 to-indigo-600 bg-clip-text text-transparent">
                    Al-Quran Digital
                </h2>
                <p class="text-lg text-gray-600 dark:text-gray-400 max-w-2xl mx-auto mb-8">
                    Baca dan tadabburi Al-Quran dengan pengalaman yang modern dan nyaman
                </p>

                <!-- Search -->
                <div class="search-container mb-8">
                    <input 
                        type="text" 
                        id="searchInput"
                        placeholder="Cari surah atau ayat..."
                        class="search-input"
                        autocomplete="off"
                    >
                    <i class="fas fa-search search-icon"></i>
                    <div id="searchResults" class="absolute w-full mt-2 hidden"></div>
                </div>

                <!-- Filter Tabs -->
                <div class="tabs justify-center">
                    <button onclick="filterSurahs('all')" class="tab active">Semua</button>
                    <button onclick="filterSurahs('makkiyah')" class="tab">Makkiyah</button>
                    <button onclick="filterSurahs('madaniyah')" class="tab">Madaniyah</button>
                    <button onclick="filterSurahs('juz30')" class="tab">Juz 30</button>
                    <button onclick="filterSurahs('popular')" class="tab">Populer</button>
                </div>

                <!-- Stats -->
                <div class="stats-grid">
                    <div class="stat-card card">
                        <div class="stat-value">114</div>
                        <div class="text-gray-600 dark:text-gray-400">Surah</div>
                    </div>
                    <div class="stat-card card">
                        <div class="stat-value">6,236</div>
                        <div class="text-gray-600 dark:text-gray-400">Ayat</div>
                    </div>
                    <div class="stat-card card">
                        <div class="stat-value" id="bookmarkStat">0</div>
                        <div class="text-gray-600 dark:text-gray-400">Bookmark</div>
                    </div>
                    <div class="stat-card card">
                        <div class="stat-value">30</div>
                        <div class="text-gray-600 dark:text-gray-400">Juz</div>
                    </div>
                </div>
            </div>

            <!-- Surah Grid -->
            <div id="surahList" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 mb-8">
                <!-- Loading -->
                <div class="col-span-full text-center py-12">
                    <div class="loading mx-auto"></div>
                    <p class="mt-4 text-gray-600 dark:text-gray-400">Memuat daftar surah...</p>
                </div>
            </div>

            <!-- Pagination -->
            <div class="pagination">
                <button onclick="prevPage()" class="page-btn">
                    <i class="fas fa-chevron-left"></i>
                </button>
                <div id="pageNumbers" class="flex items-center gap-2"></div>
                <button onclick="nextPage()" class="page-btn">
                    <i class="fas fa-chevron-right"></i>
                </button>
            </div>
        </div>

        <!-- Reader Page -->
        <div id="readerPage" class="hidden">
            <!-- Header -->
            <div class="card p-6 mb-8">
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-6">
                    <div class="flex-1">
                        <div class="flex items-center gap-4 mb-4">
                            <button onclick="showHome()" class="btn btn-outline">
                                <i class="fas fa-arrow-left"></i>
                                Kembali
                            </button>
                            <div>
                                <h2 id="surahTitle" class="text-2xl font-bold mb-1"></h2>
                                <p id="surahInfo" class="text-gray-600 dark:text-gray-400"></p>
                            </div>
                        </div>
                        <div class="flex items-center gap-4">
                            <span id="progressText" class="text-sm text-gray-600 dark:text-gray-400"></span>
                            <div class="audio-progress flex-1">
                                <div id="progressBar" class="audio-progress-bar"></div>
                            </div>
                        </div>
                    </div>

                    <!-- Audio Player - Modern -->
                    <div id="audioPlayerContainer" class="audio-player-container hidden">
                        <div class="flex items-center justify-between mb-2">
                            <div class="flex items-center gap-2">
                                <i class="fas fa-music text-purple-600"></i>
                                <span class="font-medium">Audio Surah</span>
                            </div>
                            <div class="audio-time" id="currentTime">0:00</div>
                        </div>
                        
                        <div class="audio-player-controls">
                            <button onclick="skipBackward()" class="audio-btn-secondary">
                                <i class="fas fa-backward"></i>
                            </button>
                            <button onclick="toggleAudio()" id="audioBtn" class="audio-btn">
                                <i class="fas fa-play"></i>
                            </button>
                            <button onclick="skipForward()" class="audio-btn-secondary">
                                <i class="fas fa-forward"></i>
                            </button>
                            
                            <div class="audio-progress flex-1">
                                <div id="audioProgress" class="audio-progress-bar"></div>
                            </div>
                            
                            <div class="audio-time" id="durationTime">0:00</div>
                            <button onclick="toggleMute()" id="muteBtn" class="audio-btn-secondary">
                                <i class="fas fa-volume-up"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Verses -->
            <div id="versesContainer" class="space-y-6 mb-12">
                <!-- Verses will be loaded here -->
            </div>

            <!-- Navigation -->
            <div class="flex justify-center items-center gap-6 mb-8">
                <button onclick="prevVerses()" class="btn btn-outline">
                    <i class="fas fa-chevron-left"></i>
                    Sebelumnya
                </button>
                <span id="verseRange" class="text-gray-600 dark:text-gray-400 font-medium"></span>
                <button onclick="nextVerses()" class="btn btn-outline">
                    Selanjutnya
                    <i class="fas fa-chevron-right"></i>
                </button>
            </div>
        </div>

        <!-- Bookmark Page -->
        <div id="bookmarkPage" class="hidden">
            <div class="text-center mb-12">
                <div class="w-20 h-20 rounded-2xl bg-gradient-to-br from-yellow-500 to-orange-500 flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-bookmark text-2xl text-white"></i>
                </div>
                <h2 class="text-3xl font-bold mb-4">Bookmark Saya</h2>
                <p class="text-gray-600 dark:text-gray-400 max-w-2xl mx-auto">
                    Ayat-ayat yang telah Anda tandai untuk dibaca kembali
                </p>
            </div>

            <div id="bookmarkList" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-12">
                <!-- Bookmarks will be loaded here -->
            </div>

            <div class="text-center">
                <button onclick="showHome()" class="btn btn-primary">
                    <i class="fas fa-arrow-left mr-2"></i>
                    Kembali ke Beranda
                </button>
            </div>
        </div>
    </div>

    <!-- Notification -->
    <div id="notification" class="notification">
        <div class="flex items-center gap-3">
            <i class="fas fa-check-circle"></i>
            <span id="notificationText">Bookmark berhasil disimpan!</span>
        </div>
    </div>

    <script>
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
    </script>
</body>
</html>