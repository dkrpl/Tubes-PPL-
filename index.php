<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Al-Quran Digital | Elegant Experience</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
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
                    <a href="about.php" class="btn btn-outline relative">
                        <span class="hidden md:inline">About</span>
                    </a>
                    <a href="kontak.php" class="btn btn-outline relative">
                        <span class="hidden md:inline">Contact</span>
                    </a>
                    <a href="fitur.php" class="btn btn-outline relative">
                        <span class="hidden md:inline">Fitur</span>
                    </a>
                    <button onclick="showBookmarks()" class="btn btn-outline relative">
                        <i class="fas fa-bookmark"></i>
                        <span class="hidden md:inline">Bookmark</span>
                        <span id="bookmarkCount" class="absolute -top-2 -right-2 bg-red-500 text-white text-xs rounded-full w-5 h-5 flex items-center justify-center">0</span>
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
                    <? echo "Quran Digital" ?>
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
                        <div class="texta-gray-600 dark:text-gray-400">Ayat</div>
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

<script src="js/main.js"></script>
</body>
</html>