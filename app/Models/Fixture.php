<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fixture extends Model
{
    use HasFactory;

    protected $fillable = [
        'team_1_id',
        'team_2',
        'location',
        'result',
        'outcome',
        'date'
    ];

    //belongs to a team
    public function alliance()
    {
        return $this->belongsTo(Alliance::class);
    }

    //has many fixture results
    public function fixtureResults()
    {
        return $this->hasMany(FixtureResult::class);
    }
}
