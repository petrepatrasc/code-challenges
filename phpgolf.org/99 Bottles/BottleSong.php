<?php


class BottleSong
{
    public function playSong($startingBottles)
    {
        $output = '';

        for ($iterator = $startingBottles; $iterator >= 1; $iterator--) {
            $output .= $this->singSongForBottle($iterator) . PHP_EOL . PHP_EOL;
        }

        return $output;
    }

    public function singSongForBottle($currentBottle)
    {
        $nextBottle = $currentBottle - 1;
        $output = "{$this->displayBottleNumber($currentBottle)} of beer on the wall, {$this->displayBottleNumber($currentBottle)} of beer." . PHP_EOL;

        if (1 == $currentBottle) {
            return $output . "Go to the store and buy some more, {$this->displayBottleNumber($nextBottle)} of beer on the wall.";
        } else {
            return $output . "Take one down and pass it around, {$this->displayBottleNumber($nextBottle)} of beer on the wall.";
        }
    }

    protected function displayBottleNumber($bottleNumber)
    {
        if (1 === $bottleNumber) {
            return $bottleNumber . ' bottle';
        } else if (0 === $bottleNumber) {
            return '99 bottles';
        }

        return $bottleNumber . ' bottles';
    }
}

$bottleSongClass = new BottleSong();
echo $bottleSongClass->playSong(99);