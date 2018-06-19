<?php

namespace BeerSong;

class BeerSong
{
    const STARTING_BOTTLES_COUNT = 99;

    /* @var int */
    private $bottlesCount;

    public function __construct()
    {
        $this->bottlesCount = self::STARTING_BOTTLES_COUNT;
    }

    public function verse($number)
    {
        switch ($number) {
            case 2:
                $text = "2 bottles of beer on the wall, 2 bottles of beer.\n"
                    . "Take one down and pass it around, 1 bottle of beer on the wall.\n";
                break;

            case 1:
                $text = "1 bottle of beer on the wall, 1 bottle of beer.\n"
                    . "Take it down and pass it around, no more bottles of beer on the wall.\n";
                break;

            case 0:
                $text = "No more bottles of beer on the wall, no more bottles of beer.\n"
                    . "Go to the store and buy some more, 99 bottles of beer on the wall.";
                break;

            default:
                $text = "$number bottles of beer on the wall, "
                    . "$number bottles of beer.\n"
                    . "Take one down and pass it around, "
                    . ($number-1) . " bottles of beer on the wall.\n";
                break;
        }

        return $text;
    }

    public function verses($start, $end)
    {
        $verses = [];

        for ($i = $start; $i >= $end; $i--) {
            $verses[] = $this->verse($i);
        }

        return implode("\n", $verses);
    }

    public function lyrics()
    {
        return $this->verses(99, 0);
    }

    /**
     * @param int $bottlesLeft
     *
     * @return string
     */
    /*public function verse($bottlesLeft)
    {
        $oneBottleLess = $bottlesLeft - 1;

        $bottleLeftText = $bottlesLeft == 1 ? 'bottle' : 'bottles';
        $oneBottleLessText = $oneBottleLess == 1 ? 'bottle' : 'bottles';

        $takeDownText = $bottlesLeft == 1 ? 'it' : 'one';

        if ($bottlesLeft == 0) {
            $bottlesLeft = 'no more';
            $goStoreTest = "Take $takeDownText down and pass it around";
        } else {
            $goStoreTest = "Go to the store and buy some more";
        }

        if ($oneBottleLess == 0) {
            $oneBottleLess = 'no more';
        }

        return "$bottlesLeft $bottleLeftText of beer on the wall, $bottlesLeft $bottleLeftText of beer.\n" .
            "$goStoreTest, $oneBottleLess $oneBottleLessText of beer on the wall.\n";
    }*/
}
