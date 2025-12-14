<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fitur | Al-Quran Digital</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="css/fitur.css">
    <script src="js/fitur.js" defer></script>
</head>
<body data-theme="dark" class="bg-gray-50 dark:bg-gray-900">
    <!-- Navigation -->
    <nav class="nav py-4 bg-white dark:bg-gray-800 shadow-lg">
        <div class="container mx-auto px-4">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-purple-600 to-indigo-700 flex items-center justify-center">
                        <i class="fas fa-quran text-white text-xl"></i>
                    </div>
                    <div>
                        <h1 class="nav-logo">Quran Digital</h1>
                        <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Bacaan dan Tadabbur</p>
                    </div>
                </div>

                <div class="flex items-center gap-4">
                    <a href="index.php" class="btn btn-outline">
                        <i class="fas fa-home"></i>
                        <span class="hidden md:inline">Beranda</span>
                    </a>
                    <a href="about.php" class="btn btn-outline relative">
                        <span class="hidden md:inline">About</span>
                    </a>
                    <a href="kontak.php" class="btn btn-outline relative">
                        <span class="hidden md:inline">Contact</span>
                    </a>
                    <a href="fitur.php" class="btn btn-primary relative">
                        <i class="fas fa-star mr-2"></i>
                        <span class="hidden md:inline">Fitur</span>
                    </a>
                    <a href="bookmark.php" class="btn btn-outline relative">
                        <i class="fas fa-bookmark"></i>
                        <span class="hidden md:inline">Bookmark</span>
                        <span id="bookmarkCount" class="absolute -top-2 -right-2 bg-red-500 text-white text-xs rounded-full w-5 h-5 flex items-center justify-center">0</span>
                    </a>
                    <button onclick="toggleTheme()" class="btn btn-outline">
                        <i class="fas fa-moon"></i>
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container mx-auto px-4 py-8">
        <!-- Hero Section -->
        <div class="text-center mb-16">
            <h1 class="text-5xl font-bold mb-6 gradient-text">
                Fitur Unggulan Quran Digital
            </h1>
            <p class="text-xl text-gray-600 dark:text-gray-400 max-w-3xl mx-auto mb-8">
                Nikmati pengalaman membaca Al-Quran yang lebih baik dengan berbagai fitur modern
                yang dirancang khusus untuk kenyamanan ibadah Anda
            </p>
            
            <!-- Stats -->
            <div class="stats-grid">
                <div class="stat-card card">
                    <div class="stat-value">10+</div>
                    <div class="text-gray-600 dark:text-gray-400">Fitur Unggulan</div>
                </div>
                <div class="stat-card card">
                    <div class="stat-value">5</div>
                    <div class="text-gray-600 dark:text-gray-400">Terintegrasi</div>
                </div>
                <div class="stat-card card">
                    <div class="stat-value">100%</div>
                    <div class="text-gray-600 dark:text-gray-400">Gratis</div>
                </div>
                <div class="stat-card card">
                    <div class="stat-value">24/7</div>
                    <div class="text-gray-600 dark:text-gray-400">Akses</div>
                </div>
            </div>
        </div>

        <!-- Featured Features -->
        <div class="mb-16">
            <h2 class="text-3xl font-bold mb-8 text-center gradient-text">Fitur Utama</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Feature 1 -->
                <div class="feature-card card card-hover">
                    <div class="p-6">
                        <div class="feature-icon w-16 h-16 rounded-2xl flex items-center justify-center mb-6">
                            <i class="fas fa-book-open text-2xl text-white"></i>
                        </div>
                        <h3 class="text-xl font-bold mb-3">Baca Quran Lengkap</h3>
                        <p class="text-gray-600 dark:text-gray-400 mb-4">
                            Akses seluruh 114 surah dan 6,236 ayat dengan terjemahan bahasa Indonesia
                        </p>
                        <div class="flex items-center gap-2 mb-4">
                            <span class="badge badge-pro">PRO</span>
                            <span class="badge badge-new">TERBARU</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-gray-500 dark:text-gray-400">
                                <i class="fas fa-check-circle text-green-500 mr-1"></i> Aktif
                            </span>
                            <button class="btn btn-outline btn-sm" onclick="showFeatureDemo('reading')">
                                <i class="fas fa-play mr-1"></i> Demo
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Feature 2 -->
                <div class="feature-card card card-hover">
                    <div class="p-6">
                        <div class="feature-icon w-16 h-16 rounded-2xl flex items-center justify-center mb-6">
                            <i class="fas fa-volume-up text-2xl text-white"></i>
                        </div>
                        <h3 class="text-xl font-bold mb-3">Audio Murattal</h3>
                        <p class="text-gray-600 dark:text-gray-400 mb-4">
                            Dengarkan bacaan dari berbagai qari terkenal dengan kualitas audio jernih
                        </p>
                        <div class="mb-4">
                            <div class="flex justify-between text-sm mb-1">
                                <span>Ketersediaan Qari</span>
                                <span>8/10</span>
                            </div>
                            <div class="progress-bar">
                                <div class="progress-fill w-4/5"></div>
                            </div>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-gray-500 dark:text-gray-400">
                                <i class="fas fa-check-circle text-green-500 mr-1"></i> Aktif
                            </span>
                            <button class="btn btn-outline btn-sm" onclick="showFeatureDemo('audio')">
                                <i class="fas fa-play mr-1"></i> Demo
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Feature 3 -->
                <div class="feature-card card card-hover">
                    <div class="p-6">
                        <div class="feature-icon w-16 h-16 rounded-2xl flex items-center justify-center mb-6">
                            <i class="fas fa-bookmark text-2xl text-white"></i>
                        </div>
                        <h3 class="text-xl font-bold mb-3">Bookmark & Catatan</h3>
                        <p class="text-gray-600 dark:text-gray-400 mb-4">
                            Simpan ayat favorit dan tambahkan catatan pribadi untuk refleksi spiritual
                        </p>
                        <div class="flex items-center gap-2 mb-4">
                            <span class="badge badge-pro">POPULER</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-gray-500 dark:text-gray-400">
                                <i class="fas fa-check-circle text-green-500 mr-1"></i> Aktif
                            </span>
                            <button class="btn btn-outline btn-sm" onclick="showFeatureDemo('bookmark')">
                                <i class="fas fa-play mr-1"></i> Demo
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Feature 4 -->
                <div class="feature-card card card-hover">
                    <div class="p-6">
                        <div class="feature-icon w-16 h-16 rounded-2xl flex items-center justify-center mb-6">
                            <i class="fas fa-search text-2xl text-white"></i>
                        </div>
                        <h3 class="text-xl font-bold mb-3">Pencarian Cerdas</h3>
                        <p class="text-gray-600 dark:text-gray-400 mb-4">
                            Cari ayat berdasarkan kata kunci, topik, atau konteks dengan algoritma cerdas
                        </p>
                        <div class="mb-4">
                            <div class="flex justify-between text-sm mb-1">
                                <span>Kecepatan Pencarian</span>
                                <span>98%</span>
                            </div>
                            <div class="progress-bar">
                                <div class="progress-fill w-11/12"></div>
                            </div>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-gray-500 dark:text-gray-400">
                                <i class="fas fa-check-circle text-green-500 mr-1"></i> Aktif
                            </span>
                            <button class="btn btn-outline btn-sm" onclick="showFeatureDemo('search')">
                                <i class="fas fa-play mr-1"></i> Demo
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Feature 5 -->
                <div class="feature-card card card-hover">
                    <div class="p-6">
                        <div class="feature-icon w-16 h-16 rounded-2xl flex items-center justify-center mb-6">
                            <i class="fas fa-moon text-2xl text-white"></i>
                        </div>
                        <h3 class="text-xl font-bold mb-3">Mode Malam</h3>
                        <p class="text-gray-600 dark:text-gray-400 mb-4">
                            Pengalaman membaca nyaman di malam hari dengan tema gelap yang ramah mata
                        </p>
                        <div class="flex items-center gap-2 mb-4">
                            <span class="badge badge-new">FAVORIT</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-gray-500 dark:text-gray-400">
                                <i class="fas fa-check-circle text-green-500 mr-1"></i> Aktif
                            </span>
                            <button class="btn btn-outline btn-sm" onclick="toggleTheme()">
                                <i class="fas fa-toggle-on mr-1"></i> Coba
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Feature 6 -->
                <div class="feature-card card card-hover coming-soon">
                    <div class="p-6">
                        <div class="feature-icon w-16 h-16 rounded-2xl flex items-center justify-center mb-6 bg-gray-400">
                            <i class="fas fa-robot text-2xl text-white"></i>
                        </div>
                        <h3 class="text-xl font-bold mb-3">Tafsir AI</h3>
                        <p class="text-gray-600 dark:text-gray-400 mb-4">
                            Dapatkan penjelasan mendalam tentang ayat dengan bantuan kecerdasan buatan
                        </p>
                        <div class="mb-4">
                            <div class="flex justify-between text-sm mb-1">
                                <span>Pengembangan</span>
                                <span>60%</span>
                            </div>
                            <div class="progress-bar">
                                <div class="progress-fill w-3/5"></div>
                            </div>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-yellow-600 dark:text-yellow-400">
                                <i class="fas fa-clock mr-1"></i> Segera Hadir
                            </span>
                            <button class="btn btn-outline btn-sm" disabled>
                                <i class="fas fa-lock mr-1"></i> Kunci
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Comparison Table -->
        <div class="card p-8 mb-16">
            <h2 class="text-3xl font-bold mb-8 text-center gradient-text">Perbandingan Fitur</h2>
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="border-b dark:border-gray-700">
                            <th class="text-left py-4 px-4">Fitur</th>
                            <th class="text-center py-4 px-4">Gratis</th>
                            <th class="text-center py-4 px-4">Premium</th>
                            <th class="text-center py-4 px-4">Enterprise</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-b dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-800">
                            <td class="py-4 px-4 font-medium">Baca Quran Lengkap</td>
                            <td class="text-center py-4 px-4"><i class="fas fa-check text-green-500"></i></td>
                            <td class="text-center py-4 px-4"><i class="fas fa-check text-green-500"></i></td>
                            <td class="text-center py-4 px-4"><i class="fas fa-check text-green-500"></i></td>
                        </tr>
                        <tr class="border-b dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-800">
                            <td class="py-4 px-4 font-medium">Audio Murattal</td>
                            <td class="text-center py-4 px-4">3 Qari</td>
                            <td class="text-center py-4 px-4">10 Qari</td>
                            <td class="text-center py-4 px-4">Semua Qari</td>
                        </tr>
                        <tr class="border-b dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-800">
                            <td class="py-4 px-4 font-medium">Pencarian Cerdas</td>
                            <td class="text-center py-4 px-4"><i class="fas fa-check text-green-500"></i></td>
                            <td class="text-center py-4 px-4"><i class="fas fa-check text-green-500"></i></td>
                            <td class="text-center py-4 px-4"><i class="fas fa-check text-green-500"></i></td>
                        </tr>
                        <tr class="border-b dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-800">
                            <td class="py-4 px-4 font-medium">Tafsir Lengkap</td>
                            <td class="text-center py-4 px-4">Terbatas</td>
                            <td class="text-center py-4 px-4"><i class="fas fa-check text-green-500"></i></td>
                            <td class="text-center py-4 px-4"><i class="fas fa-check text-green-500"></i></td>
                        </tr>
                        <tr class="border-b dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-800">
                            <td class="py-4 px-4 font-medium">Mode Offline</td>
                            <td class="text-center py-4 px-4"><i class="fas fa-times text-red-500"></i></td>
                            <td class="text-center py-4 px-4"><i class="fas fa-check text-green-500"></i></td>
                            <td class="text-center py-4 px-4"><i class="fas fa-check text-green-500"></i></td>
                        </tr>
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-800">
                            <td class="py-4 px-4 font-medium">Tafsir AI</td>
                            <td class="text-center py-4 px-4"><i class="fas fa-times text-red-500"></i></td>
                            <td class="text-center py-4 px-4"><i class="fas fa-check text-green-500"></i></td>
                            <td class="text-center py-4 px-4"><i class="fas fa-check text-green-500"></i></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Feature Roadmap -->
        <div class="mb-16">
            <h2 class="text-3xl font-bold mb-8 text-center gradient-text">Roadmap Pengembangan</h2>
            <div class="timeline">
                <div class="timeline-item">
                    <div class="timeline-date">Q1 2024</div>
                    <div class="timeline-content card">
                        <h3 class="font-bold mb-2">Integrasi Tafsir AI</h3>
                        <p class="text-gray-600 dark:text-gray-400">Menambahkan penjelasan ayat berbasis kecerdasan buatan</p>
                    </div>
                </div>
                <div class="timeline-item">
                    <div class="timeline-date">Q2 2024</div>
                    <div class="timeline-content card">
                        <h3 class="font-bold mb-2">Mode Offline Lengkap</h3>
                        <p class="text-gray-600 dark:text-gray-400">Download surah untuk dibaca tanpa koneksi internet</p>
                    </div>
                </div>
                <div class="timeline-item">
                    <div class="timeline-date">Q3 2024</div>
                    <div class="timeline-content card">
                        <h3 class="font-bold mb-2">Platform Mobile</h3>
                        <p class="text-gray-600 dark:text-gray-400">Aplikasi iOS dan Android native</p>
                    </div>
                </div>
                <div class="timeline-item">
                    <div class="timeline-date">Q4 2024</div>
                    <div class="timeline-content card">
                        <h3 class="font-bold mb-2">Komunitas & Sharing</h3>
                        <p class="text-gray-600 dark:text-gray-400">Fitur berbagi ayat dan diskusi komunitas</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- CTA Section -->
        <div class="text-center">
            <div class="card p-12 bg-gradient-to-r from-purple-600 to-indigo-700 text-white">
                <h2 class="text-4xl font-bold mb-6">Siap Tingkatkan Pengalaman Baca Quran Anda?</h2>
                <p class="text-xl mb-8 opacity-90">
                    Bergabunglah dengan ribuan pengguna yang telah merasakan kemudahan membaca Al-Quran digital
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <button onclick="startReading()" class="btn bg-white text-purple-600 hover:bg-gray-100">
                        <i class="fas fa-play mr-2"></i> Mulai Membaca
                    </button>
                    <a href="index.php" class="btn bg-transparent border-2 border-white text-white hover:bg-white hover:text-purple-600">
                        <i class="fas fa-home mr-2"></i> Kembali ke Beranda
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Feature Demo Modal -->
    <div id="featureDemoModal" class="modal hidden">
        <div class="modal-content">
            <div class="modal-header">
                <h3 id="demoTitle" class="text-2xl font-bold"></h3>
                <button onclick="closeFeatureDemo()" class="modal-close">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="modal-body">
                <div id="demoContent"></div>
            </div>
        </div>
    </div>

    <!-- Notification -->
    <div id="notification" class="notification hidden">
        <div class="flex items-center gap-3">
            <i class="fas fa-check-circle"></i>
            <span id="notificationText"></span>
        </div>
    </div>

    <!-- Theme Script -->
    <script>
        function toggleTheme() {
            const body = document.body;
            const theme = body.getAttribute('data-theme');
            const newTheme = theme === 'dark' ? 'light' : 'dark';
            body.setAttribute('data-theme', newTheme);
            localStorage.setItem('theme', newTheme);
            showNotification(`Mode ${newTheme === 'dark' ? 'Malam' : 'Siang'} diaktifkan`);
        }

        // Load saved theme
        document.addEventListener('DOMContentLoaded', function() {
            const savedTheme = localStorage.getItem('theme') || 'dark';
            document.body.setAttribute('data-theme', savedTheme);
        });
    </script>
</body>
</html>