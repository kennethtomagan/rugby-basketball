<?php

namespace App\Repositories\Nba;

use Illuminate\Support\Collection;
use App\Models\NbaPlayer;

interface NbaRepositoryInterface
{
    public function getNbaPlayers(): Collection;

    public function findNbaPlayerById(int $id): NbaPlayer;
}
