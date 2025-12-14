<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang Aplikasi | Al-Quran Digital</title>
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
            text-align: right;
            direction: rtl;
        }

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

        .feature-icon {
            width: 64px;
            height: 64px;
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
        }

        .team-member {
            text-align: center;
            padding: 30px 20px;
            height: 100%;
        }

        .team-avatar {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            margin: 0 auto 20px;
            overflow: hidden;
            border: 4px solid transparent;
            background: linear-gradient(135deg, var(--primary), var(--secondary)) border-box;
            position: relative;
        }

        .team-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 50%;
            border: 4px solid var(--surface-color);
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
    <div class="container mx-auto px-4 py-12">
        <!-- Hero Section -->
        <div class="text-center mb-16">
            <div class="w-24 h-24 rounded-2xl bg-gradient-to-br from-purple-600 to-indigo-600 flex items-center justify-center mx-auto mb-8">
                <i class="fas fa-quran text-3xl text-white"></i>
            </div>
            <h1 class="text-4xl md:text-5xl font-bold mb-6 bg-gradient-to-r from-purple-600 to-indigo-600 bg-clip-text text-transparent">
                Tentang Al-Quran Digital
            </h1>
            <p class="text-xl text-gray-600 dark:text-gray-400 max-w-3xl mx-auto">
                Sebuah platform digital yang menghadirkan Al-Quran dengan pengalaman membaca yang modern, intuitif, dan penuh makna
            </p>
        </div>

        <!-- Mission & Vision -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-16">
            <div class="card p-8">
                <div class="feature-icon bg-gradient-to-br from-purple-500/20 to-indigo-600/20">
                    <i class="fas fa-bullseye text-3xl text-purple-600"></i>
                </div>
                <h3 class="text-2xl font-bold mb-4">Misi Kami</h3>
                <p class="text-gray-600 dark:text-gray-400 mb-4">
                    Menyediakan akses Al-Quran digital yang mudah, akurat, dan berkualitas untuk seluruh umat Muslim di dunia.
                </p>
                <ul class="space-y-3">
                    <li class="flex items-start gap-3">
                        <i class="fas fa-check-circle text-green-500 mt-1"></i>
                        <span>Mempermudah akses Al-Quran kapan saja dan di mana saja</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <i class="fas fa-check-circle text-green-500 mt-1"></i>
                        <span>Menyediakan terjemahan yang akurat dan mudah dipahami</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <i class="fas fa-check-circle text-green-500 mt-1"></i>
                        <span>Mendukung pembelajaran dan tadabbur Al-Quran</span>
                    </li>
                </ul>
            </div>

            <div class="card p-8">
                <div class="feature-icon bg-gradient-to-br from-blue-500/20 to-cyan-600/20">
                    <i class="fas fa-eye text-3xl text-blue-600"></i>
                </div>
                <h3 class="text-2xl font-bold mb-4">Visi Kami</h3>
                <p class="text-gray-600 dark:text-gray-400 mb-4">
                    Menjadi platform Al-Quran digital terdepan yang menginspirasi jutaan umat Muslim untuk lebih dekat dengan kitab suci.
                </p>
                <ul class="space-y-3">
                    <li class="flex items-start gap-3">
                        <i class="fas fa-star text-yellow-500 mt-1"></i>
                        <span>Mengintegrasikan teknologi modern dengan nilai-nilai Islam</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <i class="fas fa-star text-yellow-500 mt-1"></i>
                        <span>Menciptakan pengalaman pengguna yang menyentuh hati</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <i class="fas fa-star text-yellow-500 mt-1"></i>
                        <span>Menjadi sarana dakwah digital yang efektif</span>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Features -->
        <div class="mb-16">
            <h2 class="text-3xl font-bold text-center mb-12">Fitur Unggulan</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="card p-6">
                    <div class="feature-icon bg-gradient-to-br from-green-500/20 to-emerald-600/20 mx-auto">
                        <i class="fas fa-headphones text-2xl text-green-600"></i>
                    </div>
                    <h3 class="text-xl font-bold text-center mb-3">Audio Murattal</h3>
                    <p class="text-gray-600 dark:text-gray-400 text-center">
                        Dengarkan bacaan Al-Quran dengan suara para qari terkenal. Dilengkapi dengan kontrol pemutaran yang lengkap.
                    </p>
                </div>

                <div class="card p-6">
                    <div class="feature-icon bg-gradient-to-br from-yellow-500/20 to-orange-600/20 mx-auto">
                        <i class="fas fa-bookmark text-2xl text-yellow-600"></i>
                    </div>
                    <h3 class="text-xl font-bold text-center mb-3">Bookmark Cerdas</h3>
                    <p class="text-gray-600 dark:text-gray-400 text-center">
                        Tandai ayat atau surah favorit Anda untuk dibaca kembali. Data disimpan secara lokal di perangkat Anda.
                    </p>
                </div>

                <div class="card p-6">
                    <div class="feature-icon bg-gradient-to-br from-red-500/20 to-pink-600/20 mx-auto">
                        <i class="fas fa-search text-2xl text-red-600"></i>
                    </div>
                    <h3 class="text-xl font-bold text-center mb-3">Pencarian Cepat</h3>
                    <p class="text-gray-600 dark:text-gray-400 text-center">
                        Cari surah, ayat, atau terjemahan dengan mudah menggunakan fitur pencarian yang responsif.
                    </p>
                </div>

                <div class="card p-6">
                    <div class="feature-icon bg-gradient-to-br from-purple-500/20 to-pink-600/20 mx-auto">
                        <i class="fas fa-moon text-2xl text-purple-600"></i>
                    </div>
                    <h3 class="text-xl font-bold text-center mb-3">Mode Gelap/Terang</h3>
                    <p class="text-gray-600 dark:text-gray-400 text-center">
                        Sesuaikan tema tampilan sesuai preferensi Anda untuk kenyamanan membaca dalam berbagai kondisi pencahayaan.
                    </p>
                </div>

                <div class="card p-6">
                    <div class="feature-icon bg-gradient-to-br from-blue-500/20 to-cyan-600/20 mx-auto">
                        <i class="fas fa-mobile-alt text-2xl text-blue-600"></i>
                    </div>
                    <h3 class="text-xl font-bold text-center mb-3">Responsif</h3>
                    <p class="text-gray-600 dark:text-gray-400 text-center">
                        Akses Al-Quran Digital dari berbagai perangkat - desktop, tablet, atau smartphone.
                    </p>
                </div>

                <div class="card p-6">
                    <div class="feature-icon bg-gradient-to-br from-indigo-500/20 to-blue-600/20 mx-auto">
                        <i class="fas fa-language text-2xl text-indigo-600"></i>
                    </div>
                    <h3 class="text-xl font-bold text-center mb-3">Multi-bahasa</h3>
                    <p class="text-gray-600 dark:text-gray-400 text-center">
                        Tampilkan teks Arab, transliterasi Latin, dan terjemahan Bahasa Indonesia dalam satu tampilan.
                    </p>
                </div>
            </div>
        </div>

        <!-- Stats -->
        <div class="card p-8 mb-16">
            <h2 class="text-3xl font-bold text-center mb-12">Dalam Angka</h2>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                <div class="text-center">
                    <div class="stat-value">114</div>
                    <p class="text-gray-600 dark:text-gray-400">Surah Lengkap</p>
                </div>
                <div class="text-center">
                    <div class="stat-value">6,236</div>
                    <p class="text-gray-600 dark:text-gray-400">Ayat Suci</p>
                </div>
                <div class="text-center">
                    <div class="stat-value">30</div>
                    <p class="text-gray-600 dark:text-gray-400">Juz Al-Quran</p>
                </div>
                <div class="text-center">
                    <div class="stat-value">24/7</div>
                    <p class="text-gray-600 dark:text-gray-400">Akses Sepanjang Waktu</p>
                </div>
            </div>
        </div>

        <!-- Technology -->
        <div class="mb-16">
            <h2 class="text-3xl font-bold text-center mb-12">Teknologi yang Digunakan</h2>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                <div class="card p-6 text-center">
                    <i class="fab fa-html5 text-5xl text-orange-500 mb-4"></i>
                    <h3 class="font-bold mb-2">HTML5</h3>
                    <p class="text-sm text-gray-600 dark:text-gray-400">Struktur Halaman</p>
                </div>
                <div class="card p-6 text-center">
                    <i class="fab fa-css3-alt text-5xl text-blue-500 mb-4"></i>
                    <h3 class="font-bold mb-2">CSS3</h3>
                    <p class="text-sm text-gray-600 dark:text-gray-400">Styling Modern</p>
                </div>
                <div class="card p-6 text-center">
                    <i class="fab fa-js text-5xl text-yellow-500 mb-4"></i>
                    <h3 class="font-bold mb-2">JavaScript</h3>
                    <p class="text-sm text-gray-600 dark:text-gray-400">Interaktivitas</p>
                </div>
                <div class="card p-6 text-center">
                    <i class="fas fa-database text-5xl text-green-500 mb-4"></i>
                    <h3 class="font-bold mb-2">API Quran</h3>
                    <p class="text-sm text-gray-600 dark:text-gray-400">Data Al-Quran</p>
                </div>
            </div>
        </div>

        <!-- Team -->
        <div class="mb-16">
            <h2 class="text-3xl font-bold text-center mb-12">Tim Pengembang</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="team-member card">
                    <div class="team-avatar">
                        <i class="fas fa-user text-5xl text-gray-400 flex items-center justify-center h-full"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Muhammad Al-Fatih</h3>
                    <p class="text-purple-600 dark:text-purple-400 mb-3">Lead Developer</p>
                    <p class="text-gray-600 dark:text-gray-400 text-sm">
                        Bertanggung jawab atas arsitektur aplikasi dan pengembangan fitur utama.
                    </p>
                </div>

                <div class="team-member card">
                    <div class="team-avatar">
                        <i class="fas fa-user text-5xl text-gray-400 flex items-center justify-center h-full"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Aisyah Rahman</h3>
                    <p class="text-purple-600 dark:text-purple-400 mb-3">UI/UX Designer</p>
                    <p class="text-gray-600 dark:text-gray-400 text-sm">
                        Merancang pengalaman pengguna yang intuitif dan antarmuka yang menarik.
                    </p>
                </div>

                <div class="team-member card">
                    <div class="team-avatar">
                        <i class="fas fa-user text-5xl text-gray-400 flex items-center justify-center h-full"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Abdullah Hakim</h3>
                    <p class="text-purple-600 dark:text-purple-400 mb-3">Quran Consultant</p>
                    <p class="text-gray-600 dark:text-gray-400 text-sm">
                        Memastikan keakuratan teks Arab, terjemahan, dan tata cara pembacaan.
                    </p>
                </div>
            </div>
        </div>

        <!-- Contact & Support -->
        <div class="card p-8 mb-16">
            <h2 class="text-3xl font-bold text-center mb-8">Kontak & Dukungan</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div>
                    <h3 class="text-xl font-bold mb-4">Hubungi Kami</h3>
                    <p class="text-gray-600 dark:text-gray-400 mb-6">
                        Untuk pertanyaan, saran, atau laporan masalah, silakan hubungi kami melalui:
                    </p>
                    <ul class="space-y-4">
                        <li class="flex items-center gap-3">
                            <i class="fas fa-envelope text-purple-600"></i>
                            <span>support@qurandigital.id</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <i class="fab fa-github text-gray-800 dark:text-gray-300"></i>
                            <span>github.com/qurandigital</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <i class="fab fa-twitter text-blue-400"></i>
                            <span>@qurandigital_id</span>
                        </li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-xl font-bold mb-4">Sumber Data</h3>
                    <p class="text-gray-600 dark:text-gray-400 mb-4">
                        Aplikasi ini menggunakan data dari API publik yang terpercaya:
                    </p>
                    <ul class="space-y-3">
                        <li class="flex items-start gap-3">
                            <i class="fas fa-check text-green-500 mt-1"></i>
                            <span>API Quran by equran.id</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <i class="fas fa-check text-green-500 mt-1"></i>
                            <span>Terjemahan Kemenag RI</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <i class="fas fa-check text-green-500 mt-1"></i>
                            <span>Audio dari server resmi</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <div class="text-center py-8 border-t border-gray-200 dark:border-gray-800">
            <div class="flex items-center justify-center gap-2 mb-4">
                <div class="w-8 h-8 rounded-lg bg-gradient-to-br from-purple-600 to-indigo-700 flex items-center justify-center">
                    <i class="fas fa-quran text-white text-sm"></i>
                </div>
                <h3 class="text-xl font-bold">Al-Quran Digital</h3>
            </div>
            <p class="text-gray-600 dark:text-gray-400 mb-6 max-w-2xl mx-auto">
                "Sesungguhnya Al-Quran ini memberikan petunjuk kepada (jalan) yang lebih lurus dan memberi khabar gembira kepada orang-orang Mu'min yang mengerjakan amal saleh bahwa bagi mereka ada pahala yang besar." (QS. Al-Isra: 9)
            </p>
            <p class="text-gray-500 dark:text-gray-500 text-sm">
                © 2024 Al-Quran Digital. Semua hak dilindungi. Dibuat dengan ❤️ untuk umat Islam.
            </p>
        </div>
    </div>

    <script>
        // Theme Management
        let currentTheme = 'dark';

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
        }

        // Initialize
        setupTheme();

        // Update bookmark count from localStorage
        function updateBookmarkCount() {
            const bookmarks = JSON.parse(localStorage.getItem('quranBookmarks') || '[]');
            const bookmarkCountElements = document.querySelectorAll('#bookmarkCount');
            bookmarkCountElements.forEach(element => {
                element.textContent = bookmarks.length;
            });
        }

        // Initial update
        updateBookmarkCount();

        // Listen for storage changes (in case bookmarks are updated in another tab)
        window.addEventListener('storage', function(e) {
            if (e.key === 'quranBookmarks') {
                updateBookmarkCount();
            }
        });
    </script>
</body>
</html>