<?php

namespace App\Http\Controllers\Nba;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\NbaPlayerStatsResource;
use App\Repositories\Nba\NbaRepositoryInterface;

class NbaPlayerStatsController extends Controller
{

    /**
     * @var NbaRepositoryInterface
     */
    private $repository;
    
	/**
     * NbaPlayerStatsController constructor.
     * 
     * @param NbaRepositoryInterface $repository
     */
    public function __construct(NbaRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }


    /**
     * Display a listing of the player.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $players = $this->repository->getNbaPlayerStats();

        // transform Player data
        $data = NbaPlayerStatsResource::collection($players);
        
        return response()->json(compact('data'));
    }

    /**
     * Show a player profile
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $player = $this->repository->findNbaPlayerStatsByPlayerId($id);

        if (!$player->id) {
            // return error when player is not found
            return response()->json([
                'error' => 'Player Stats Not Found'
            ], 404);
        }
    
        // transform Player data
        $data = new NbaPlayerStatsResource($player); 
        
        return response()->json(compact('data'));
    }

}
