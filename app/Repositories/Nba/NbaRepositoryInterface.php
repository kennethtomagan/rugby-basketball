<?php

namespace App\Repositories\Nba;

use Illuminate\Support\Collection;
use App\Models\NbaPlayer;
use App\Models\NbaPlayerStats;

interface NbaRepositoryInterface
{
    public function getNbaPlayers(): Collection;

    public function findNbaPlayerById(int $id): NbaPlayer;
    
    public function getNbaPlayerStats(): Collection;

    public function findNbaPlayerStatsByPlayerId(int $id): NbaPlayerStats;
}
