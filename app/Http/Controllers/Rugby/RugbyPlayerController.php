<?php

namespace App\Http\Controllers\Rugby;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\RugbyPlayerResource;
use App\Repositories\Rugby\RugbyRepositoryInterface;

class RugbyPlayerController extends Controller
{

    /**
     * @var RugbyRepositoryInterface
     */
    private $repository;
    
	/**
     * RugbyPlayerController constructor.
     * 
     * @param RugbyRepositoryInterface $repository
     */
    public function __construct(RugbyRepositoryInterface $repository)
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
        $players = $this->repository->getRugbyPlayers();

        // transform Player data
        $data = RugbyPlayerResource::collection($players);
        
        return response()->json(compact('data'));
    }

    /**
     * Show a player profile
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $player = $this->repository->findRugbyPlayerById($id);
    
        if (!$player->id) {
            // return error when player is not found
            return response()->json([
                'error' => 'Rugby Player Not Found'
            ], 404);
        }
    
        // transform Player data
        $data = new RugbyPlayerResource($player); 
        
        return response()->json(compact('data'));
    }

}
