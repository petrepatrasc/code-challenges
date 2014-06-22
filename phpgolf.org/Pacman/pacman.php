<?php

function d($occurences, $character = ' ', $trailing = 1)
{
    foreach ($occurences as $occurence) {
        echo str_repeat($character, $occurence);
        $character = ($character == ' ') ? '@' : ' ';
    }
    echo ($trailing == 1) ? "\n" : "";
}

d(array(8, 18, 12));
d(array(4, 26, 8));
d(array(2, 30, 6));
d(array(16, 2, 16, 4), '@');
d(array(14, 6, 16, 2), '@');
d(array(4, 12, 2, 18, 2));
d(array(6, 32));
d(array(8, 30));
d(array(12, 26));
d(array(14, 24));
d(array(16, 22));
d(array(14, 24));
d(array(12, 26));
d(array(8, 30));
d(array(6, 32));
d(array(4, 32, 2));
d(array(36, 2), '@');
d(array(34, 4), '@');
d(array(2, 30, 6));
d(array(4, 26, 8));
d(array(8, 18, 12), ' ', 0);