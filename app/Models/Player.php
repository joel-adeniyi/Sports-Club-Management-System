<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;

    protected $fillable = [
        'alliance_id',
        'team_id',
        'squad_id',
        'contract_id',
        'player_position_id',
        'name',
        'dob',
        'address',
        'phone',
        'photo',
    ];

    
    //has one team
    public function team()
    {
        return $this->belongsTo(Teams::class);
    }
    
    //has one squad
    public function squad()
    {
        return $this->belongsTo(Squad::class);
    }

    
    //has one contract
    public function contract()
    {
        return $this->belongsTo(Contracts::class);
    }

    
    //has one player poistion
    public function playerPosition()
    {
        return $this->belongsTo(PlayerPosition::class);
    }

    //has one statistic
    public function statistic()
    {
        return $this->hasOne(Statistic::class);
    }

    //has many fixture results
    public function fixtureResults()
    {
        return $this->hasMany(FixtureResult::class);
    }
    
    //belongs to a team
    public function alliance()
    {
        return $this->belongsTo(Alliance::class);
    }

}
