<?php

namespace App\Http\Controllers;

use App\Models\Alliance;
use App\Models\Fixture;
use App\Models\FixtureResult;
use App\Models\Player;
use App\Models\Statistic;
use Illuminate\Http\Request;

class FixtureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fixtures = Fixture::with('alliance')->orderBy('date', 'DESC')->get();
        return view('admin.fixtures.view_fixtures',compact('fixtures'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teams = Alliance::all();
        return view('admin.fixtures.add_fixture',compact('teams'));
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
            'team_1_id' => 'required',
            'team_2' => 'required',
            'location' => 'required',
        ]);

        $fixture = new Fixture();
        $fixture->team_1_id = $request->team_1_id;
        $fixture->team_2 = $request->team_2;
        $fixture->location = $request->location;
        $fixture->date = date('Y-m-d',strtotime($request->date));
        $fixture->save();

        return redirect()->route('fixture.index')->with('success', 'New fixture added');        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Fixture  $fixture
     * @return \Illuminate\Http\Response
     */
    public function show(Fixture $fixture)
    {
        $goal_scorers = FixtureResult::where([ ['fixture_id', $fixture->id], ['goals_scored', '>', 0]])->get();
        $yellow_cards = FixtureResult::where([ ['fixture_id', $fixture->id], ['yellow_cards', '>', 0]])->get();
        $red_cards = FixtureResult::where([ ['fixture_id', $fixture->id], ['red_cards', '>', 0]])->get();
        $assists = FixtureResult::where([ ['fixture_id', $fixture->id], ['assists', '>', 0]])->get();
        return view('admin.fixtures.results', compact('fixture', 'goal_scorers', 'yellow_cards', 'red_cards', 'assists'));
    }

    public function addScores(Fixture $fixture){
        $num_players = 0;
        $players = [];
        return view('admin.fixtures.add_scores', compact('fixture', 'num_players', 'players'));
    }

    public function addScoresPost(Fixture $fixture, Request $request){
        $result = $request->result;
        $outcome = $request->outcome;
        $updateFixture = Fixture::where('id', $fixture->id)->update(['result' => $result, 'outcome' =>$outcome ]);

        $num_players = $request->num_players;
        $players = Player::where('alliance_id', $fixture->team_1_id)->get();
        return view('admin.fixtures.add_scores', compact('fixture', 'num_players', 'players'));
    }

    public function UpdateScores(Request $request, Fixture $fixture){
        for($i=0;$i<count($request->player);$i++){
            $statistic = Statistic::where('player_id', $request->player[$i])->first();
            $statistic->increment('goals_scored', $request->score[$i]);
            $statistic->increment('assists', $request->assists[$i]);
            $statistic->increment('red_cards', $request->red_cards[$i]);
            $statistic->increment('yellow_cards', $request->yellow_cards[$i]);
            

            //add fixture result
            $fixtureResult = new FixtureResult();
            $fixtureResult->fixture_id = $fixture->id;
            $fixtureResult->player_id = $request->player[$i];
            $fixtureResult->goals_scored = $request->score[$i];
            $fixtureResult->assists = $request->assists[$i];
            $fixtureResult->red_cards = $request->red_cards[$i];
            $fixtureResult->yellow_cards = $request->yellow_cards[$i];
            $fixtureResult->save();

        }
        $updateFixture = Fixture::where('id', $fixture->id)->update(['score_added' => 1]);
        
        return redirect()->route('fixture.index')->with('success', 'Result Added');        
    }
    


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fixture  $fixture
     * @return \Illuminate\Http\Response
     */
    public function edit(Fixture $fixture)
    {
        $teams = Alliance::all();
        return view('admin.fixtures.edit_fixture',compact('fixture', 'teams'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Fixture  $fixture
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fixture $fixture)
    {
        $validatedData = $request->validate([
            'team_1_id' => 'required',
            'team_2' => 'required',
            'location' => 'required',
        ]);

        $fixture = Fixture::find($fixture->id);
        $fixture->team_1_id = $request->team_1_id;
        $fixture->team_2 = $request->team_2;
        $fixture->location = $request->location;
        $fixture->date = date('Y-m-d',strtotime($request->date));
        $fixture->save();

        return back()->with('success', 'Fixture Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fixture  $fixture
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fixture $fixture)
    {
        $fixture->delete();
        return back()->with('success', 'Fixture Deleted');
    }
}