<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Http\Request;
use App\Models\AssignPlayer;
use App\Models\User;
use App\Models\Squad;
use App\Models\Teams;
use App\Models\Contracts;
use App\Models\Player;
use App\Models\PlayerPosition;
use App\Models\Statistic;
use Illuminate\Support\Facades\Auth;

class PlayerController extends Controller
{
    public function ViewPlayers() {
        $data['allData'] = Player::all();
        return view('admin.players.view_players',$data);


    } 

    public function NewPlayer() {
        $data['teams'] = Teams::all();
        $data['squads'] = Squad::all();
        $data['contracts'] = Contracts::all();
        $data['player_positions'] = PlayerPosition::all();

        return view('admin.players.new_player',$data);
    }

    public function SavePlayer(Request $request){
        
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'dob' => 'required|string|max:255',
            'squad' => 'required',
            'team' => 'required',
            'contract' => 'required',
            'player_position' => 'required',
        ]);

        $player = new Player();

        $player->team_id = $request->team;
        $player->squad_id = $request->squad;
        $player->contract_id = $request->contract;
        $player->player_position_id = $request->player_position;
        $player->name = $request->name;
        $player->address = $request->address;
        $player->phone = $request->phone;
        $player->dob = date('Y-m-d',strtotime($request->dob));

        if ($request->file('photo'))    {
            $avatar = $request->file('photo');
            $filename = time(). '.'.$avatar->getClientOriginalExtension();
            Image::make($avatar)->save(public_path('uploads/player_photos/'.$filename));
            $file_path = '/uploads/player_photos/'.$filename;
            $player['photo'] = $file_path;
        }

        if($player->save()){
            $player_statistics = new Statistic();
            $player_statistics->player_id = $player->id;
            $player_statistics->save();
            
            return redirect()->route('view.player')->with('success', 'New Player Registered');        }

    }

    public function EditPlayer($id){
        $data['editData'] = Player::find($id);
        
        $data['teams'] = Teams::all();
        $data['squads'] = Squad::all();
        $data['contracts'] = Contracts::all();
        $data['player_positions'] = PlayerPosition::all();
        return view('admin.players.edit_player',$data);
    }

    public function UpdatePlayer(Request $request,$id){
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'dob' => 'required|string|max:255',
            'squad' => 'required',
            'team' => 'required',
            'contract' => 'required',
            'player_position' => 'required',
        ]);
        
        $player = Player::find($id);

        $player->team_id = $request->team;
        $player->squad_id = $request->squad;
        $player->contract_id = $request->contract;
        $player->player_position_id = $request->player_position;
        $player->name = $request->name;
        $player->address = $request->address;
        $player->phone = $request->phone;
        $player->dob = date('Y-m-d',strtotime($request->dob));

        if ($request->file('photo'))    {
            $avatar = $request->file('photo');
            $filename = time(). '.'.$avatar->getClientOriginalExtension();
            Image::make($avatar)->save(public_path('uploads/player_photos/'.$filename));
            $file_path = '/uploads/player_photos/'.$filename;
            $player->photo = $file_path;
        }

        $player->save();
        return back()->with('success', 'Player Updated');

    }

    public function DeletePlayer($id) {
        if(Auth::user()->role==1){
            $player = Player::find($id);
            $player->delete();
            return back()->with('success', 'Player Deleted');
        }
    }

    

}
