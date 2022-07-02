<?php

namespace App\Http\Controllers\Nba;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\NbaPlayerResource;
use App\Repositories\Nba\NbaRepositoryInterface;

class NbaPlayerController extends Controller
{

    /**
     * @var NbaRepositoryInterface
     */
    private $repository;
    
	/**
     * NbaPlayerController constructor.
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
        $players = $this->repository->getNbaPlayers();

        // transform Player data
        $data = NbaPlayerResource::collection($players);
        
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
        $player = $this->repository->findNbaPlayerById($id);

        if (!$player->id) {
            // return error when player is not found
            return response()->json([
                'error' => 'Nba Player Not Found'
            ], 404);
        }
    
        // transform Player data
        $data = new NbaPlayerResource($player); 
        
        return response()->json(compact('data'));
    }

}
