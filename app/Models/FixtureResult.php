<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FixtureResult extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'fixture_id',
        'player_id',
        'goals_scored',
        'assists',
        'red_cards',
        'yellow_cards',
    ];

    //has one player
    public function player()
    {
        return $this->belongsTo(Player::class);
    }
    
    //has one fixture
    public function fixture()
    {
        return $this->belongsTo(Fixture::class);
    }
}
