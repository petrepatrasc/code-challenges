<?php

function d($occurences)
{
    $character = '#';
    foreach ($occurences as $occurence) {
        echo str_repeat($character, $occurence);
        $character = ($character == '#') ? ' ' : '#';
    }
    echo "\n";
}

d(array(8, 3, 2, 5, 2, 2, 8, 4, 9, 4, 8, 3, 2, 8, 8));
d(array(2, 5, 2, 2, 2, 5, 2, 2, 2, 5, 2, 2, 2, 7, 2, 2, 2, 6, 2, 2, 2, 8, 2));
d(array(2, 5, 2, 2, 2, 5, 2, 2, 2, 5, 2, 2, 2, 11, 2, 6, 2, 2, 2, 8, 2));
d(array(8, 3, 9, 2, 8, 3, 2, 4, 4, 3, 2, 6, 2, 2, 2, 8, 8));
d(array(2, 9, 2, 5, 2, 2, 2, 9, 2, 7, 2, 2, 2, 6, 2, 2, 2, 8, 2));
d(array(2, 9, 2, 5, 2, 2, 2, 9, 2, 7, 2, 2, 2, 6, 2, 2, 2, 8, 2));
d(array(2, 9, 2, 5, 2, 2, 2, 10, 9, 4, 8, 3, 8, 2, 2));
