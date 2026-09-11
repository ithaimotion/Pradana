<?php
$path = dirname(__DIR__) . '/public/images/logo-pnusa.png';
$size = getimagesize($path);
echo "WIDTH: " . $size[0] . " | HEIGHT: " . $size[1] . "\n";
