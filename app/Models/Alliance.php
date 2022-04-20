<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alliance extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name'
    ];
    
    //has many players
    public function players()
    {
        return $this->hasMany(Player::class);
    }

    //has many coaches
    public function coaches()
    {
        return $this->hasMany(User::class);
    }

    //has many players
    public function fixtures()
    {
        return $this->hasMany(Fixture::class);
    }
}
