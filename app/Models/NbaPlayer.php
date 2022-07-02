<?php

namespace App\Models;

use Illuminate\Support\Collection;

class NbaPlayer
{
    public $id          = null;
    public $feet        = null;
    public $inches      = null;
    public $number      = null;
    public $position    = null;
    public $last_name   = null;
    public $first_name  = null;
    public $weight      = null;
    public $birthday    = null;
    public $current_team= null;
    public $image       = null;

    public function __construct(Collection $player) {
            $this->id           = $player->get('id');
            $this->last_name    = $player->get('last_name');
            $this->first_name   = $player->get('first_name');
            $this->number       = $player->get('number');
            $this->feet         = $player->get('feet');
            $this->inches       = $player->get('inches');
            $this->position     = $player->get('position');
            $this->weight       = $player->get('weight');
            $this->birthday     = $player->get('birthday');
            $this->current_team = $player->get('current_team');
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
            "last_name"     => $this->last_name,
            "first_name"    => $this->first_name,
            "number"        => $this->number,
            "feet"          => $this->feet,
            "inches"        => $this->inches,
            "position"      => $this->position,
            "weight"        => $this->weight,
            "birthday"      => $this->birthday,
            "current_team"  => $this->current_team,
        ];
    }
}
