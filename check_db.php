<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$g = \App\Models\Galeri::where('kategori', '!=', 'client')->orderBy('urutan')->get(['id','judul','kategori','path_gambar']);
foreach($g as $item) {
    echo "ID: {$item->id} | path: {$item->path_gambar} | url: {$item->url_gambar}\n";
}
