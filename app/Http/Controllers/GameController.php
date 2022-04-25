<?php

namespace App\Http\Controllers;

use App\Objects\Labyrinth;
use App\Objects\Tile;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function index()
    {
        $labyrinth = new Labyrinth();

    }
}
