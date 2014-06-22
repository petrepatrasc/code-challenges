<?php


class Pacman
{

    public function drawLine($characters, $occurences)
    {
        $output = '';

        foreach ($characters as $key => $character) {
            $output .= str_repeat($character, $occurences[$key]);
        }

        return $output;
    }

    public function drawPacman()
    {
        return $this->drawLine(array(' ', '@', ' '), array(8, 18, 12)) . "\n"
        . $this->drawLine(array(' ', '@', ' '), array(4, 26, 8)) . "\n"
        . $this->drawLine(array(' ', '@', ' '), array(2, 30, 6)) . "\n"
        . $this->drawLine(array('@', ' ', '@', ' '), array(16, 2, 16, 4)) . "\n"
        . $this->drawLine(array('@', ' ', '@', ' '), array(14, 6, 16, 2)) . "\n"
        . $this->drawLine(array(' ', '@', ' ', '@', ' '), array(4, 12, 2, 18, 2)) . "\n"
        . $this->drawLine(array(' ', '@'), array(6, 32)) . "\n"
        . $this->drawLine(array(' ', '@'), array(8, 30)) . "\n"
        . $this->drawLine(array(' ', '@'), array(12, 26)) . "\n"
        . $this->drawLine(array(' ', '@'), array(14, 24)) . "\n"
        . $this->drawLine(array(' ', '@'), array(16, 22)) . "\n"
        . $this->drawLine(array(' ', '@'), array(14, 24)) . "\n"
        . $this->drawLine(array(' ', '@'), array(12, 26)) . "\n"
        . $this->drawLine(array(' ', '@'), array(8, 30)) . "\n"
        . $this->drawLine(array(' ', '@'), array(6, 32)) . "\n"
        . $this->drawLine(array(' ', '@', ' '), array(4, 32, 2)) . "\n"
        . $this->drawLine(array('@', ' '), array(36, 2)) . "\n"
        . $this->drawLine(array('@', ' '), array(34, 4)) . "\n"
        . $this->drawLine(array(' ', '@', ' '), array(2, 30, 6)) . "\n"
        . $this->drawLine(array(' ', '@', ' '), array(4, 26, 8)) . "\n"
        . $this->drawLine(array(' ', '@', ' '), array(8, 18, 12))
        ;
    }
}

$pacmanClass = new Pacman();
echo $pacmanClass->drawPacman();