<?php
$path = __DIR__ . '/resources/views/admin/index.blade.php';
$content = file_get_contents($path);

$newContent = preg_replace(
    '/<form action="([^"]+)" method="POST" onsubmit="return confirm\(\'([^\']+)\'\)">\s*@csrf\s*@method\(\'DELETE\'\)\s*<button type="submit" class="([^"]+)">([^<]+)<\/button>\s*<\/form>/s',
    '<button type="button" @click="confirmDelete(\'$1\', \'Konfirmasi Hapus\', \'$2\')" class="$3">$4</button>',
    $content
);

file_put_contents($path, $newContent);
echo "Replaced pattern in admin/index.blade.php\n";
