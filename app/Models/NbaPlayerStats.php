<?php

namespace App\Models;

use Illuminate\Support\Collection;

class NbaPlayerStats
{
    public $id          = null;
    public $games        = null;
    public $assists      = null;
    public $points      = null;
    public $player_id    = null;
    public $rebounds   = null;


    public function __construct(Collection $player) {
            $this->id           = $player->get('id');
            $this->games    = $player->get('games');
            $this->assists   = $player->get('assists');
            $this->points       = $player->get('points');
            $this->player_id         = $player->get('player_id');
            $this->rebounds       = $player->get('rebounds');
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
            "games"         => $this->games,
            "assists"       => $this->assists,
            "points"        => $this->points,
            "player_id"     => $this->player_id,
            "rebounds"      => $this->rebounds,
        ];
    }
}
