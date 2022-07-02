<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Support\Facades\Http;

class Rugbytest extends TestCase
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
    public function testRugbyRouteResponseStructure()
    {
        $response = $this->get('api/rugby');
        $response->assertStatus(200);
        
        $response->assertJsonStructure([
            'data' => [
                [
                    "id",
                    "last_name",
                    "first_name",
                    "tries",
                    "games",
                    "number",
                    "position",
                    "points",
                    "height",
                    "age",
                    "conversions",
                    "weight",
                    "penalties",
                    "image",
                    "game_type",
                    "featured"
                ],
            ],
        ]);
    }

    /**
     * Test structure of response.
     * 
     * @return void
     */
    public function testRugbyRouteByIdResponseStructure()
    {
        $response = $this->get('api/rugby/1');
        $response->assertStatus(200);
        $response->assertJsonCount(1);
        $response->assertJsonStructure([
            'data' => [
                    "id",
                    "last_name",
                    "first_name",
                    "tries",
                    "games",
                    "number",
                    "position",
                    "points",
                    "height",
                    "age",
                    "conversions",
                    "weight",
                    "penalties",
                    "image",
                    "game_type",
                    "featured"
                ],
            ]);
    }
    
    /**
     * Test rugby route by ID and test last_name value.
     * 
     * @return void
     */
    public function testRugbyRouteByIdResponseLastName()
    {
        $response = $this->get('api/rugby/1');
        $response->assertStatus(200);
        $response->assertJsonFragment([
            'last_name' => 'Smith',
        ]);
    }
    
    /**
     * Test rugby route by ID and test first_name value.
     * 
     * @return void
     */
    public function testRugbyRouteByIdResponseFirstName()
    {
        $response = $this->get('api/rugby/1');
        $response->assertStatus(200);
        $response->assertJsonFragment([
            'first_name' => 'Aaron',
        ]);
    }
    
    /**
     * Test rugby route by ID and test first_name value.
     * 
     * @return void
     */
    public function testRugbyRouteByIdResponseImage()
    {
        $response = $this->get('api/rugby/1');
        $response->assertStatus(200);
        $response->assertJsonFragment([
            'image' => 'aaron-smith.png',
        ]);
    }
    
    /**
     * Test rugby route but ID not found.
     * 
     * @return void
     */
    public function testRugbyRouteButIdNotFound()
    {
        $response = $this->get('api/rugby/12345678');
        $response->assertStatus(404);
        $response->assertExactJson(["error" => "Rugby Player Not Found"]);
    }
}
