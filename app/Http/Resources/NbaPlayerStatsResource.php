<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class NbaPlayerStatsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            "id"            => $this->id,
            "games"         => $this->games,
            "assists"       => $this->assists,
            "points"        => $this->points,
            "player_id"     => $this->player_id,
            "rebounds"      => $this->rebounds,
            "featured"      => [
                ['label' => 'Assists Per Game', 'value' => round($this->assists/$this->games, 1)],
                ['label' => 'Points Per Game',  'value' => round($this->points/$this->games, 1)],
                ['label' => 'Rebounds Per Game','value' => round($this->rebounds/$this->games, 1)],
            ],
        ];
    }
}
