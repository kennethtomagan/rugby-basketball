<?php

namespace App\Models;

use Illuminate\Support\Collection;

class RugbyPlayer
{
    public $id          = null;
    public $tries       = null;
    public $games       = null;
    public $number      = null;
    public $position    = null;
    public $points      = null;
    public $name        = null;
    public $height      = null;
    public $age         = null;
    public $conversions = null;
    public $weight      = null;
    public $penalties   = null;

    public function __construct(Collection $player) {
            $this->id           = $player->get('id');
            $this->name         = $player->get('name');
            $this->tries        = $player->get('tries');
            $this->games        = $player->get('games');
            $this->number       = $player->get('number');
            $this->position     = $player->get('position');
            $this->points       = $player->get('points');
            $this->height       = $player->get('height');
            $this->age          = $player->get('age');
            $this->conversions  = $player->get('conversions');
            $this->weight       = $player->get('weight');
            $this->penalties    = $player->get('penalties');
    }
   
    /**
     * Transform attributes to array
     * 
     * @return array
     */
    public function toArray()
    {
        return [
            "id"            => $this->id,
            "tries"         => $this->tries,
            "games"         => $this->games,
            "number"        => $this->number,
            "position"      => $this->position,
            "points"        => $this->points,
            "name"          => $this->name,
            "height"        => $this->height,
            "age"           => $this->age,
            "conversions"   => $this->conversions,
            "weight"        => $this->weight,
            "penalties"     => $this->penalties,
        ];
    }
}
