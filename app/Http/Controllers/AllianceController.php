<?php

namespace App\Http\Controllers;

use App\Models\Alliance;
use App\Models\Player;
use App\Models\Statistic;
use App\Models\User;
use Illuminate\Http\Request;

class AllianceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams = Alliance::all();
        return view('admin.alliances.view_alliances', compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.alliances.add_alliance');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
        ]);

        $alliance = new Alliance();
        $alliance->name = $request->name;
        $alliance->save();
        
        return redirect()->route('alliance.index')->with('success', 'Team added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Alliance  $alliance
     * @return \Illuminate\Http\Response
     */
    public function show(Alliance $alliance)
    {
        $coaches = User::with('alliance')->where([ ['role', 2], ['alliance_id', '!=', $alliance->id ] ])->orWhere([ ['role', 2], ['alliance_id', null ] ])->get();
        $players = Player::with('alliance')->where('alliance_id', '!=', $alliance->id)->orWhere('alliance_id',  null)->get();
        $teamCoaches = User::with('alliance')->where([ ['role', 2], ['alliance_id', $alliance->id ] ])->get();
        $teamPlayers = Player::with('alliance')->where('alliance_id', $alliance->id)->get();
        $teamPlayersIds = Player::where('alliance_id', $alliance->id)->pluck('id')->all();
        $teamGoalKeeperIds = Player::where([ ['alliance_id', $alliance->id], ['player_position_id', 1] ])->pluck('id')->all();
        $mostGoalsScored = Statistic::whereIn('id', $teamPlayersIds)->orderBy('goals_scored', 'DESC')->first();
        $mostAssists = Statistic::whereIn('id', $teamPlayersIds)->orderBy('assists', 'DESC')->first();
        $mostYellowCards = Statistic::whereIn('id', $teamPlayersIds)->orderBy('yellow_cards', 'DESC')->first();
        $mostRedCards = Statistic::whereIn('id', $teamPlayersIds)->orderBy('red_cards', 'DESC')->first();
        $leastGoalsConceded = Statistic::whereIn('id', $teamGoalKeeperIds)->orderBy('goals_conceded', 'ASC')->first();

        return view('admin.alliances.show_alliance', compact('alliance', 'coaches', 'players', 'teamCoaches', 'teamPlayers' ,'mostGoalsScored' ,'mostAssists' ,'mostYellowCards' ,'mostRedCards' ,'leastGoalsConceded'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Alliance  $alliance
     * @return \Illuminate\Http\Response
     */
    public function edit(Alliance $alliance)
    {
        return view('admin.alliances.edit_alliance',compact('alliance'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Alliance  $alliance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Alliance $alliance)
    {
        $validatedData = $request->validate([
            'name' => 'required',
        ]);

        $alliance->name = $request->name;
        $alliance->save();
        
        return redirect()->route('alliance.index')->with('success', 'Team updated successfully');
    }

    public function addCoach(Request $request, Alliance $alliance)
    {
        $validatedData = $request->validate([
            'coach' => 'required',
        ]);
        $coach = User::find($request->coach)->update(['alliance_id' => $alliance->id]);
        
        return back()->with('success', 'New coach added');
    }

    public function removeCoach($coach_id)
    {
        $removeCoach = User::find($coach_id)->update(['alliance_id' => null]);
        
        if($removeCoach){
            return back()->with('success', 'Coach Removed');
        }else{
            return back()->with('error', 'Something went wrong!');
        }
    }
    
    public function addPlayer(Request $request, Alliance $alliance)
    {
        $player_validation = Player::where('alliance_id', $alliance->id)->count();
        if($player_validation<18){
            $validatedData = $request->validate([
                'player' => 'required',
            ]);
            $player = Player::find($request->player)->update(['alliance_id' => $alliance->id]);
            return back()->with('success', 'New player added');
        }else{
            return back()->with('error', 'Maximum of 18 players allowed');
        }
    }
    
    
    public function removePlayer($player_id)
    {
        $removePlayer = Player::find($player_id)->update(['alliance_id' => null]);
        
        if($removePlayer){
            return back()->with('success', 'Player Removed');
        }else{
            return back()->with('error', 'Something went wrong!');
        }
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Alliance  $alliance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Alliance $alliance)
    {
        $alliance->delete();
        return back()->with('success', 'Team Deleted');
    }
}