<?php


namespace App\Objects;


class Tile
{
    public $isTraversable = false;
    public $isBorder = false;
    public $isEntry = false;
    public $isExit = false;
    public $i;
    public $j;

    public function __construct($i, $j)
    {
        $this->i = $i;
        $this->j = $j;
    }
}
