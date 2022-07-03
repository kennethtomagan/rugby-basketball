<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Support\Facades\Http;

class Nbatest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
    }

    /**
     * Test structure of response.
     * 
     * @return void
     */
    public function testNbaRouteResponseStructure()
    {
        $response = $this->get('api/nba');
        $response->assertStatus(200);
        
        $response->assertJsonStructure([
            'data' => [
                [
                    "id",
                    "last_name",
                    "first_name",
                    "number",
                    "feet",
                    "inches",
                    "position",
                    "weight",
                    "birthday",
                    "current_team",
                    "image",
                ],
            ],
        ]);
    }

    /**
     * Test structure of response of nba route by id.
     * 
     * @return void
     */
    public function testNbaRouteByIdResponseStructure()
    {
        $response = $this->get('api/nba/1');
        $response->assertStatus(200);
        $response->assertJsonCount(1);
        $response->assertJsonStructure([
            'data' => [
                    "id",
                    "last_name",
                    "first_name",
                    "number",
                    "feet",
                    "inches",
                    "position",
                    "weight",
                    "birthday",
                    "current_team",
                    "image",
                ],
            ]);
    }
    
    /**
     * Test nba route by ID and test last_name value.
     * 
     * @return void
     */
    public function testNbaRouteByIdResponseLastName()
    {
        $response = $this->get('api/nba/1');
        $response->assertStatus(200);
        $response->assertJsonFragment([
            'last_name' => 'Thompson',
        ]);
    }
    
    /**
     * Test nba route by ID and test first_name value.
     * 
     * @return void
     */
    public function testNbaRouteByIdResponseFirstName()
    {
        $response = $this->get('api/nba/1');
        $response->assertStatus(200);
        $response->assertJsonFragment([
            'first_name' => 'Klay',
        ]);
    }
    
    /**
     * Test nba route by ID and test first_name value.
     * 
     * @return void
     */
    public function testNbaRouteByIdResponseImage()
    {
        $response = $this->get('api/nba/1');
        $response->assertStatus(200);
        $response->assertJsonFragment([
            'image' => 'klay-thompson.png',
        ]);
    }
    
    /**
     * Test nba route but ID not found.
     * 
     * @return void
     */
    public function testNbaRouteButIdNotFound()
    {
        $response = $this->get('api/nba/12345678');
        $response->assertStatus(404);
        $response->assertExactJson(["error" => "Nba Player Not Found"]);
    }
    
    /**
     * Test structure of response of nba stats route.
     * 
     * @return void
     */
    public function testNbaStatsRouteResponseStructure()
    {
        $response = $this->get('api/nba/stats');
        $response->assertStatus(200);
        
        $response->assertJsonStructure([
            'data' => [
                [
                    "id",
                    "games",
                    "assists",
                    "points",
                    "player_id",
                    "rebounds",
                    "featured",
                ],
            ],
        ]);
    }

    /**
     * Test structure of response of nba stats route by id.
     * 
     * @return void
     */
    public function testNbaStatsByIdRouteResponseStructure()
    {
        $response = $this->get('api/nba/stats/player_id/1');
        $response->assertStatus(200);
        
        $response->assertJsonStructure([
            'data' => [
                "id",
                "games",
                "assists",
                "points",
                "player_id",
                "rebounds",
                "featured",
            ],
        ]);
    }

    /**
     * Test structure of response of nba stats route by id.
     * 
     * @return void
     */
    public function testNbaStatsByIdRouteButPlayerNotFdund()
    {
        $response = $this->get('api/nba/stats/player_id/123456789');
        $response->assertStatus(404);
        $response->assertExactJson(["error" => "Player Stats Not Found"]);
    }
}
