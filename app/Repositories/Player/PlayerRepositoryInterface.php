<?php

namespace App\Repositories\Player;

use Illuminate\Support\Collection;
use App\Models\RugbyPlayer;

interface PlayerRepositoryInterface
{
    public function getPlayers(int $id, string $type): Array;

    public function getPlayerStats(int $id): Array;
}
