<?php

spl_autoload_register(function ($class) {
    include_once $class . '.php';
});

$postOffice     = new PostOffice();
$northMailman   = new NorthMailman();
$southMailman   = new SouthMailman();
$generalMailman = new GeneralMailMan();

$postOffice->setNextMailman($northMailman);
$northMailman->setNextMailman($southMailman);
$southMailman->setNextMailman($generalMailman);

$seedData = [
    [
        'content'  => 'Hi North mailman!',
        'postcode' => 3500
    ],
    [
        'content'  => 'Hi South mailman!',
        'postcode' => 9500
    ],
    [
        'content'  => 'Hi General mailman!',
        'postcode' => 5000
    ],
    [
        'content'  => 'I don\'t really know what I\'m doing.',
        'postcode' => 'A324NYC'
    ],
];

foreach ($seedData as $datum) {
    $message = new Message();
    $message
        ->setMessage($datum['content'])
        ->setPostcode($datum['postcode']);

    echo "Sending message: {$message}" . PHP_EOL;
    echo $postOffice->deliverMessage($message) . PHP_EOL;

    echo PHP_EOL;
}
