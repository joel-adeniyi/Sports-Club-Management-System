<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statistic extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'player_id',
        'goals_scored',
        'goals_conceded',
        'assists',
        'games_played',
        'shots_taken',
        'shots_missed',
        'minutes_played',
        'red_cards',
        'yellow_cards',
    ];

    //has one player
    public function player()
    {
        return $this->belongsTo(Player::class);
    }
}
