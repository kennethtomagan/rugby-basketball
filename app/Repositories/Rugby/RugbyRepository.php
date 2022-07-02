<?php
namespace App\Repositories\Rugby;

use Illuminate\Support\Collection;
use App\Repositories\Rugby\RugbyRepositoryInterface;
use App\Repositories\Player\PlayerRepository;
use App\Models\RugbyPlayer;

class RugbyRepository extends PlayerRepository implements RugbyRepositoryInterface
{

    /**
     * Return the collection of rugby player
     *
     * @param int $id
     * @return \Illuminate\Support\Collection
     */
    public function getRugbyPlayers(): Collection
    {
        $response = $this->getPlayers();

        // Format API to RugbyPlayer collection 
        $players = collect();
        foreach ($response as $key => $player) {
            $player = collect($player);
            $players->add(new RugbyPlayer($player));
        }
        return $players;
    }

    /**
     * Return the rugby player data
     *
     * @param int $id
     * @return \App\Models\RugbyPlayer
     */
    public function findRugbyPlayerById(int $id): RugbyPlayer
    {
        $response = $this->getPlayers($id);
        
        // Format API to RugbyPlayer collection
        $data = collect(array_shift($response));
        $player = new RugbyPlayer($data);

        return $player;
    }
}