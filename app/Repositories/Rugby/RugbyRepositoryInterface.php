<?php

namespace App\Repositories\Rugby;

use Illuminate\Support\Collection;
use App\Models\RugbyPlayer;

interface RugbyRepositoryInterface
{
    public function getRugbyPlayers(): Collection;

    public function findRugbyPlayerById(int $id): RugbyPlayer;
}
