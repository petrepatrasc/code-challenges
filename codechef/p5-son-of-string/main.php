<?php

require 'SonOfString.php';

while (true) {
    $input = fgets(STDIN, 5000000);

    $son = new SonOfString($input);
    echo $son->getSonForString();

    break;
}