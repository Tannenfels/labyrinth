<?php


namespace App\Objects;


class Labyrinth
{
    private const DEFAULT_SIZE = 20;

    /**
     * @var Tile[][]
     */
    private $tiles;
    private $height;
    private $width;
    private $entryTile;
    private $exitTile;

    public function __construct(int $size = self::DEFAULT_SIZE)
    {
        for($i = 0; $i < $size; $i++) {
            for($j = 0; $j < $size; $j++) {
                $this->tiles[$i][] = new Tile($i, $j);
            }
        }

        $this->height = $size;
        $this->width = $size;
        $this->setBorderTiles($this->tiles[0]);
        $this->setBorderTiles($this->tiles[$this->width - 1]);
    }

    public function getBorderTiles(): array
    {
        $borderTiles = [];
        foreach ($this->tiles as $tileArray)
        {
            foreach ($tileArray as $tile)
            {
                if ($tile->isBorder === true) {
                    $borderTiles[] = &$tile;
                }
            }
        }

        return $borderTiles;
    }

    public function getBottomTiles()
    {
        $bottom = [];
        for ($i = 0; $i < $this->width; $i++)
        {
            $bottom[] = &$this->tiles[$i][0];
        }

        return $bottom;
    }
    public function getTopTiles()
    {
        $top = [];
        for ($i = 0; $i < $this->width; $i++)
        {
            $top[] = &$this->tiles[$i][$this->height - 1];
        }

        return $top;
    }

    public function getAllTiles(): array
    {
        $tiles = [];
        foreach ($this->tiles as $tileArray)
        {
            foreach ($tileArray as $tile)
            {
                $tiles[] = &$tile;
            }
        }

        return $tiles;
    }

    public function getTileField()
    {
        return $this->tiles;
    }

    public function setTraversableTiles(array &$tiles)
    {
        foreach ($tiles as &$tile) {
            $tile->isTraversable = true;
        }
    }

    public function setBorderTiles(array &$tiles)
    {
        foreach ($tiles as &$tile) {
            $tile->isBorder = true;
        }
    }
    public function setEntry()
    {
        $this->tiles[mt_rand(1, $this->width - 2)][0]->isEntry = true;
    }
    public function setExit(int $point)
    {
        $this->tiles[$point][$this->height - 1]->isExit = true;
    }
}
