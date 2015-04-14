<?php

spl_autoload_register(function ($class) {
    include_once $class . '.php';
});

$integerFormatterService = new IntegerFormatter();

while (true) {
    echo "Enter number in decimal form: ";
    fscanf(STDIN, "%d\n", $number);

    echo "=========================" . PHP_EOL;
    $integerFormatterService->formatToMultipleBases($number);
    echo "=========================" . PHP_EOL;
}
