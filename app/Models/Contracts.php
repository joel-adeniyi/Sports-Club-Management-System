<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contracts extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'type'
    ];
    //belongs to a player
    public function player()
    {
        return $this->hasMany(Player::class);
    }
}
