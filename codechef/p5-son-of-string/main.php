<?php

require 'SonOfString.php';

while (true) {
    $input = fgets(STDIN, 50000000);

    $son = new SonOfString($input);
    echo $son->getSonForString();

    break;
}