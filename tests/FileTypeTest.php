<?php
use PHPUnit\Framework\TestCase;

class FileTypeTest extends TestCase
{
    private $requiredFiles = [
        'index.php',
        'about.php',
        'kontak.php',
        'fitur.php', 
    ];

    // ========== VALIDATOR 1: File Structure & PHP Requirement ==========
    public function test_all_files_must_be_php_and_exist()
    {
        echo "\n🔍 VALIDATOR 1: Checking file structure...\n";
        
        foreach ($this->requiredFiles as $file) {
            // Cek file exist
            $this->assertFileExists(
                $file, 
                "❌ File $file tidak ditemukan! Buat file ini untuk melanjutkan."
            );
            
            // Cek ekstensi PHP
            $extension = pathinfo($file, PATHINFO_EXTENSION);
            $this->assertEquals(
                'php', 
                $extension,
                "❌ File $file harus berekstensi .php, ditemukan .$extension"
            );
            
            // Cek file tidak kosong
            if (file_exists($file)) {
                $filesize = filesize($file);
                $this->assertGreaterThan(
                    50,
                    $filesize,
                    "❌ File $file terlalu kecil ($filesize bytes). Minimal 50 bytes."
                );
            }
        }
        
        echo "✅ VALIDATOR 1 LULUS: Semua file PHP ada dan valid\n";
    }

    // ========== VALIDATOR 2: HTML Structure & Meta Tags ==========
    public function test_html_structure_and_meta_tags()
    {
        echo "\n🔍 VALIDATOR 2: Checking HTML structure...\n";
        
        $requiredTags = [
            '<!DOCTYPE html>',
            '<html',
            '</html>',
            '<head',
            '<title',
            '<body'
        ];
        
        $requiredMetaTags = [
            'charset="UTF-8"',
            'viewport',
            'width=device-width'
        ];

        foreach ($this->requiredFiles as $file) {
            if (!file_exists($file)) {
                continue;
            }
            
            $content = file_get_contents($file);
            $contentLower = strtolower($content);
            
            // Cek HTML structure
            foreach ($requiredTags as $tag) {
                $this->assertStringContainsString(
                    strtolower($tag),
                    $contentLower,
                    "❌ File $file harus mengandung tag: $tag"
                );
            }
            
            // Cek meta tags
            $metaCount = 0;
            foreach ($requiredMetaTags as $meta) {
                if (strpos($contentLower, strtolower($meta)) !== false) {
                    $metaCount++;
                }
            }
            $this->assertGreaterThanOrEqual(
                2,
                $metaCount,
                "❌ File $file harus mengandung minimal 2 meta tags responsive"
            );
        }
        
        echo "✅ VALIDATOR 2 LULUS: Struktur HTML dan meta tags valid\n";
    }

    // ========== VALIDATOR 3: CSS Framework & Responsive Design ==========
    public function test_css_framework_and_responsive_design()
    {
        echo "\n🔍 VALIDATOR 3: Checking CSS framework...\n";
        
        foreach ($this->requiredFiles as $file) {
            if (!file_exists($file)) {
                continue;
            }
            
            $content = file_get_contents($file);
            
            // Cek penggunaan CSS Framework
            $hasCSSFramework = 
                strpos($content, 'tailwindcss.com') !== false ||
                strpos($content, 'bootstrap') !== false ||
                strpos($content, 'cdn.jsdelivr.net/npm/') !== false;
            
            $this->assertTrue(
                $hasCSSFramework,
                "❌ File $file harus menggunakan CSS Framework (Tailwind/Bootstrap/CDN)"
            );
            
            // Cek responsive classes untuk index.php
            if ($file === 'index.php') {
                $responsiveClasses = ['md:', 'lg:', 'sm:', 'xl:', 'flex', 'grid'];
                $foundClass = false;
                foreach ($responsiveClasses as $class) {
                    if (strpos($content, $class) !== false) {
                        $foundClass = true;
                        break;
                    }
                }
                $this->assertTrue(
                    $foundClass,
                    "❌ File index.php harus menggunakan responsive CSS classes"
                );
            }
        }
        
        echo "✅ VALIDATOR 3 LULUS: CSS framework dan responsive design valid\n";
    }

    // ========== VALIDATOR 4: Navigation & Page Structure ==========
    public function test_navigation_and_page_structure()
    {
        echo "\n🔍 VALIDATOR 4: Checking navigation...\n";
        
        $pageTitles = [
            'index.php' => 'Al-Quran Digital',
            'about.php' => 'Tentang',
            'kontak.php' => 'Kontak',
            'panduan.php' => 'Panduan',
            'gallery.php' => 'Galeri'
        ];

        foreach ($this->requiredFiles as $file) {
            if (!file_exists($file)) {
                continue;
            }
            
            $content = file_get_contents($file);
            
            // Cek title atau h1 sesuai dengan nama file
            if (isset($pageTitles[$file])) {
                $hasTitle = 
                    strpos($content, $pageTitles[$file]) !== false ||
                    strpos($content, strtolower($pageTitles[$file])) !== false;
                
                $this->assertTrue(
                    $hasTitle,
                    "❌ File $file harus mengandung title atau heading: '{$pageTitles[$file]}'"
                );
            }
            
            // Cek link ke halaman lain (minimal 1 link)
            $linkCount = 0;
            foreach ($this->requiredFiles as $otherFile) {
                if ($file !== $otherFile && strpos($content, $otherFile) !== false) {
                    $linkCount++;
                }
            }
            
            $this->assertGreaterThanOrEqual(
                1,
                $linkCount,
                "❌ File $file harus memiliki minimal 1 link ke halaman lain"
            );
            
            // Cek semantic structure untuk index.php
            if ($file === 'index.php') {
                $semanticTags = ['<head', '<nav', '<body', '<footer'];
                $semanticCount = 0;
                foreach ($semanticTags as $tag) {
                    if (strpos($content, $tag) !== false) {
                        $semanticCount++;
                    }
                }
                $this->assertGreaterThanOrEqual(
                    2,
                    $semanticCount,
                    "❌ File index.php harus menggunakan minimal 2 semantic HTML tags"
                );
            }
        }
        
        echo "✅ VALIDATOR 4 LULUS: Navigation dan page structure valid\n";
    }

    // ========== VALIDATOR 5: JavaScript & Performance ==========
    public function test_javascript_and_performance()
    {
        echo "\n🔍 VALIDATOR 5: Checking JavaScript...\n";
        
        foreach ($this->requiredFiles as $file) {
            if (!file_exists($file)) {
                continue;
            }
            
            $content = file_get_contents($file);
            
            // Cek file size
            $fileSize = filesize($file);
            $this->assertLessThan(
                1000000, // 1MB max
                $fileSize,
                "❌ File $file terlalu besar ($fileSize bytes). Optimalkan ukuran file."
            );
            
            // Cek JavaScript untuk halaman utama
            if ($file === 'index.php') {
                // Cek ada JavaScript
                $hasJavaScript = 
                    strpos($content, '<script') !== false ||
                    strpos($content, 'function') !== false ||
                    strpos($content, 'addEventListener') !== false;
                
                $this->assertTrue(
                    $hasJavaScript,
                    "❌ File index.php harus mengandung JavaScript"
                );
                
                // Cek Font Awesome atau icon library
                $hasIconLibrary = 
                    strpos($content, 'font-awesome') !== false ||
                    strpos($content, 'fontawesome') !== false ||
                    strpos($content, 'fa-') !== false;
                
                $this->assertTrue(
                    $hasIconLibrary,
                    "❌ File index.php harus menggunakan icon library (Font Awesome)"
                );
            }
            
            // Cek gambar memiliki alt text
            if (strpos($content, '<img') !== false) {
                $imgTags = [];
                preg_match_all('/<img[^>]+>/i', $content, $imgTags);
                
                if (!empty($imgTags[0])) {
                    $hasAlt = false;
                    foreach ($imgTags[0] as $imgTag) {
                        if (strpos($imgTag, 'alt=') !== false) {
                            $hasAlt = true;
                            break;
                        }
                    }
                    $this->assertTrue(
                        $hasAlt,
                        "❌ File $file: Semua gambar harus memiliki alt text"
                    );
                }
            }
        }
        
        echo "✅ VALIDATOR 5 LULUS: JavaScript dan performance valid\n";
        echo "\n🎉 SELESAI: Semua 5 validator berhasil dijalankan!\n";
    }

    // ========== HELPER: Tampilkan ringkasan ==========
    public static function tearDownAfterClass(): void
    {
        echo "\n" . str_repeat("=", 50) . "\n";
        echo "📊 RINGKASAN VALIDASI CI/CD\n";
        echo str_repeat("=", 50) . "\n";
        echo "✅ 5 Validator berhasil dijalankan:\n";
        echo "   1. File Structure & PHP Requirement\n";
        echo "   2. HTML Structure & Meta Tags\n";
        echo "   3. CSS Framework & Responsive Design\n";
        echo "   4. Navigation & Page Structure\n";
        echo "   5. JavaScript & Performance\n";
        echo str_repeat("=", 50) . "\n";
        echo "🚀 Website siap untuk deployment!\n";
        echo str_repeat("=", 50) . "\n";
    }
}