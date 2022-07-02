<?php
namespace App\Repositories\Player;

use Illuminate\Support\Collection;
use App\Repositories\Player\PlayerRepositoryInterface;
use Illuminate\Support\Facades\Http;
use App\Models\RugbyPlayer;

class PlayerRepository implements PlayerRepositoryInterface
{
    
	/**
     * Rugby player API Endpoint
     */
    private $rugbyEndpoint;
    
	/**
     * Nba player API Endpoint
     */
    private $nbaEndpoint;

	/**
     * PlayerRepository constructor.
     */
    public function __construct()
    {
        $this->rugbyEndpoint    = config('player.rugby.url');
        $this->nbaEndpoint      = config('player.nba.player.url');
    }

    /**
     * Retrieve player data from the API
     *
     * @param int $id
     * @param string $type
     * 
     * @return Array
     */
    public function getPlayers(int $id = null, string $type = 'rugby'): Array
    {
        // Set endpoint variable to rugby Endpoint
        $endpoint = $this->rugbyEndpoint;

        // If $type is equal to nba set $endpoint to nba Endpoint;
        if ($type === 'nba') {
            $endpoint = $this->nbaEndpoint;
        }

        $apiEndpoint = $id ? $endpoint ."/id/$id" : $endpoint;

        $response = Http::get($apiEndpoint, [
            'API_KEY' => config('api.key'),
        ])->json();

        return $response;
    }

}