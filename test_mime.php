<?php
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
require 'vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

$filename = 'peralatan_6a85683e8d40b.jpg';
$tmp = TemporaryUploadedFile::createFromLivewire($filename);
echo "Mime: " . $tmp->getMimeType() . "\n";
