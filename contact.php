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

<body data-theme="dark">

<!-- Navbar -->
<nav class="nav py-4">
    <div class="container mx-auto px-4 flex justify-between items-center">
        <h1 class="nav-logo">Quran Digital</h1>
        <a href="index.php" class="btn btn-outline">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>
</nav>

<!-- Contact Content -->
<div class="container mx-auto px-4 py-12">
    <div class="max-w-xl mx-auto card p-8">
        <h2 class="text-3xl font-bold text-center mb-6">Hubungi Kami</h2>

        <form class="space-y-4">
            <div>
                <label class="block mb-1">Nama</label>
                <input type="text" class="w-full p-3 rounded-lg border dark:bg-gray-800" placeholder="Nama Anda">
            </div>

            <div>
                <label class="block mb-1">Email</label>
                <input type="email" class="w-full p-3 rounded-lg border dark:bg-gray-800" placeholder="Email Anda">
            </div>

            <div>
                <label class="block mb-1">Pesan</label>
                <textarea rows="4" class="w-full p-3 rounded-lg border dark:bg-gray-800" placeholder="Tulis pesan..."></textarea>
            </div>

            <button type="submit" class="btn btn-primary w-full">
                <i class="fas fa-paper-plane"></i> Kirim Pesan
            </button>
        </form>
    </div>
</div>

</body>
</html>
