<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Contact | Quran Digital</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body data-theme="dark" class="bg-black text-white">

<!-- NAVBAR (SAMA DENGAN INDEX) -->
<nav class="nav py-4">
    <div class="container mx-auto px-4">
        <div class="flex items-center justify-between">

            <!-- Logo -->
            <div class="flex items-center gap-3">
                <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-purple-600 to-indigo-700 flex items-center justify-center">
                    <i class="fas fa-quran text-white text-xl"></i>
                </div>
                <div>
                    <h1 class="nav-logo">Quran Digital</h1>
                    <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">
                        Bacaan dan Tadabur
                    </p>
                </div>
            </div>

            <!-- Menu -->
            <div class="flex items-center gap-4">
                <a href="index.php" class="btn btn-outline">
                    <i class="fas fa-home"></i>
                    <span class="hidden md:inline">Beranda</span>
                </a>
                <a href="about.php" class="btn btn-outline">
                    <span class="hidden md:inline">About</span>
                </a>
                <a href="contact.php" class="btn btn-outline bg-purple-600/20 border-purple-600">
                    <span class="hidden md:inline">Contact</span>
                </a>
                <a href="fitur.php" class="btn btn-outline">
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

<!-- HERO -->
<section class="container mx-auto px-4 py-16 text-center">
    <h2 class="text-4xl font-bold mb-4 bg-gradient-to-r from-purple-500 to-indigo-500 bg-clip-text text-transparent">
        Hubungi Kami
    </h2>
    <p class="text-gray-400 max-w-2xl mx-auto">
        Kritik, saran, dan masukan Anda sangat berarti untuk  
        pengembangan <span class="text-white font-medium">Quran Digital</span>.
    </p>
</section>

<!-- CONTENT -->
<section class="container mx-auto px-4 pb-20">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">

        <!-- INFO -->
        <div class="space-y-6">
            <div class="card p-6 bg-zinc-900 hover:border-purple-600 transition">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 rounded-xl bg-purple-600 flex items-center justify-center">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <div>
                        <h3 class="font-semibold text-lg">Email</h3>
                        <p class="text-gray-400">support@qurandigital.id</p>
                    </div>
                </div>
            </div>

            <div class="card p-6 bg-zinc-900 hover:border-indigo-600 transition">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 rounded-xl bg-indigo-600 flex items-center justify-center">
                        <i class="fas fa-phone"></i>
                    </div>
                    <div>
                        <h3 class="font-semibold text-lg">Telepon</h3>
                        <p class="text-gray-400">+62 812 3456 7890</p>
                    </div>
                </div>
            </div>

            <div class="card p-6 bg-zinc-900 hover:border-emerald-600 transition">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 rounded-xl bg-emerald-600 flex items-center justify-center">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <div>
                        <h3 class="font-semibold text-lg">Lokasi</h3>
                        <p class="text-gray-400">Indonesia</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- FORM -->
        <div class="card p-8 bg-zinc-900">
            <h3 class="text-2xl font-bold mb-6">Kirim Pesan</h3>

            <form class="space-y-5">
                <input type="text" placeholder="Nama Lengkap"
                    class="w-full p-3 rounded-xl bg-black border border-zinc-700 focus:ring-2 focus:ring-purple-600">

                <input type="email" placeholder="Email"
                    class="w-full p-3 rounded-xl bg-black border border-zinc-700 focus:ring-2 focus:ring-indigo-600">

                <textarea rows="5" placeholder="Pesan"
                    class="w-full p-3 rounded-xl bg-black border border-zinc-700 focus:ring-2 focus:ring-purple-600"></textarea>

                <button type="submit"
                    class="btn btn-primary w-full">
                    <i class="fas fa-paper-plane mr-2"></i>Kirim Pesan
                </button>
            </form>
        </div>

    </div>
</section>

<!-- FOOTER -->
<footer class="text-center py-6 text-gray-500">
    © <?= date('Y') ?> Quran Digital • Dark Elegant Interface
</footer>

</body>
</html>
