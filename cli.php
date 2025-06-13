<?php

$size = 7;

// Loop baris
for ($i = 0; $i < $size; $i++) {
    for ($j = 0; $j < $size; $j++) {
        if ($i == $j || ($i + $j) == ($size - 1)) {
            echo "X ";
        } else {
            echo "O ";
        }
    }

    echo "\n";
}
