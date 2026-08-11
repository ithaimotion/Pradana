<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$k = \App\Models\ProfilPerusahaan::first();
echo "Visi: " . \Illuminate\Support\Facades\Storage::disk('public')->url($k->foto_visi) . PHP_EOL;
echo "Misi: " . \Illuminate\Support\Facades\Storage::disk('public')->url($k->foto_misi) . PHP_EOL;
