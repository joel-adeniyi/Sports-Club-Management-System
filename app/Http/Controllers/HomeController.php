<?php

namespace App\Http\Controllers;

use App\Models\Alliance;
use App\Models\Fixture;
use App\Models\Player;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $date = date('Y-m-d');
        // $fixtures = Fixture::where('date', '>', $date)->get();
        $fixtures = Fixture::orderBy('date', 'DESC')->limit(12)->get();

        $num_players = Player::count();
        $num_coaches = User::where('role', 2)->count();
        $num_alliances = Alliance::count();
        return view('admin.dashboard', compact('fixtures', 'num_players', 'num_coaches', 'num_alliances'));
    }
}