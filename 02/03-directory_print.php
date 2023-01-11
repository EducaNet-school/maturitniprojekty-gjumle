<?php

function print_directory($dir) {
    $files = scandir($dir);
    foreach ($files as $file) {
        echo $dir . '/' . $file;
        echo '<br>';
    }
}

echo print_directory('C:\GitHub\maturitniprojekty-gjumle');