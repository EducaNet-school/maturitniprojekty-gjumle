<?php

function print_directory($dir) {
    $files = scandir($dir);
    foreach ($files as $file) {
        echo $dir . '/' . $file .  '\n';
    }
}

echo print_directory('')