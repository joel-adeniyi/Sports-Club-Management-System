<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DatabaseTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testcreateData()
    {
        $data = [
            'alliance_id' => 1,
            'team_id' => 1,
            'contract_id' => 1,
            'player_position_id' => 1,
            'name' => "John Doe",
            'address' => "1 London Road",
            'phone' => "12345678",
            'dob' => '1996-10-23',
            
                   ];

    $response = $this->json('POST', '/alliance/add_player/{alliance}',$data);
    $response->assertStatus(401);
    $response->assertJson(['message' => "Unauthenticated."]);



    }

   

}
