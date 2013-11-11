<?php

require 'Universe.php';

$universe = new Universe();

while (true) {
    $input = fgets(STDIN, 3);

    if ($universe->providedNumberIsTheAnswer($input)) {
        break;
    } else {
        echo $input;
    }
}
?>