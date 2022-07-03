<?php
namespace App\Repositories\Nba;

use Illuminate\Support\Collection;
use App\Repositories\Nba\NbaRepositoryInterface;
use App\Repositories\Player\PlayerRepository;
use App\Models\NbaPlayer;
use App\Models\NbaPlayerStats;

class NbaRepository extends PlayerRepository implements NbaRepositoryInterface
{

    /**
     * Return the collection of Nba player
     *
     * @param int $id
     * @return \Illuminate\Support\Collection
     */
    public function getNbaPlayers(): Collection
    {
        $response = $this->getPlayers(null, 'nba');

        // Format API to NbaPlayer collection 
        $players = collect();
        foreach ($response as $key => $player) {
            $player = collect($player);
            $players->add(new NbaPlayer($player));
        }
        return $players;
    }

    /**
     * Return the nba player data
     *
     * @param int $id
     * @return \App\Models\NbaPlayer
     */
    public function findNbaPlayerById(int $id): NbaPlayer
    {
        $response = $this->getPlayers($id, 'nba');
        
        // Format API to NbaPlayer collection
        $data = collect(array_shift($response));
        $player = new NbaPlayer($data);

        return $player;
    }

    /**
     * Return the collection of Nba player stats
     *
     * @param int $id
     * @return \Illuminate\Support\Collection
     */
    public function getNbaPlayerStats(): Collection
    {
        $response = $this->getPlayerStats();

        // Format API to NbaPlayer collection 
        $stats = collect();
        foreach ($response as $key => $playerStats) {
            $playerStats = collect($playerStats);
            $stats->add(new NbaPlayerStats($playerStats));
        }

        return $stats;
    }

    /**
     * Return the nba player stats data
     *
     * @param int $id
     * @return \App\Models\NbaPlayerStats
     */
    public function findNbaPlayerStatsByPlayerId(int $id): NbaPlayerStats
    {
        $response = $this->getPlayerStats($id);
        
        // Format API to NbaPlayer collection
        $data = collect(array_shift($response));
        $stats = new NbaPlayerStats($data);

        return $stats;
    }
}