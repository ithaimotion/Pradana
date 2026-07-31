<?php
$dir = __DIR__ . '/resources/views/admin';
$iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($dir));
$count = 0;

foreach ($iterator as $file) {
    if (!$file->isFile() || $file->getExtension() !== 'php') continue;
    $path = $file->getRealPath();
    $original = file_get_contents($path);
    $content = $original;

    // Pattern 1: <form ... onsubmit="return confirm('Message')"> ... <button type="submit" class="...">SVG</button> </form>
    // We want to capture the form action, the message, the button classes and the button content (like SVG).
    // It's multi-line, so we use 's' modifier or just careful parsing.
    
    // Instead of complex regex, let's just do a simpler search and replace for each file manually or with basic regex if possible.
    // Actually, writing a good regex for this is tricky because of nested tags.
    // Let's just list the files and do them one by one using multi_replace_file_content for precision.
}
