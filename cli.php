<?php

require 'vendor/autoload.php';

use App\Conversion;

if (php_sapi_name() !== 'cli') {
    exit;
}

if (!isset($argv[1]) || !isset($argv[2]) || !isset($argv[3])) {
    echo "Usage: php {$argv[0]} <input_file> <output_file>\n";
    exit;
}

echo (new Conversion())->convert($argv[1], $argv[2], $argv[3]) . "\n";
