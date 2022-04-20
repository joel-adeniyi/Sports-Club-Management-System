<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlayerPosition extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name'
    ];
    //belongs to a player position
    public function playerPosition()
    {
        return $this->hasMany(Player::class);
    }
}
