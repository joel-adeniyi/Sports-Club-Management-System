<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Teams;

class TeamController extends Controller
{
    public function ViewTeam (){
        $data['allData'] = Teams::all();
        return view('admin.teams.view_team',$data);
    }

    public function NewTeam(){

        return view('admin.teams.add_team');
    }

    public function SaveTeam(Request $request){

        $validatedData = $request->validate([
            'name' => 'required|unique:teams,name',

        ]);

        $data = new Teams();
        $data->name = $request->name;
        $data->save();
        $notification = array(
            'message' => 'New Team Added',
            'alert-type' => 'success'
        );
        return redirect()->route('view.team')->with($notification);
    }

    public function EditTeam($id){
        $editData = Teams::find($id);


        return view('admin.teams.edit_team',compact('editData'));
    }

    public function UpdateTeam(Request $request,$id){

        $data = Teams::find($id);
        $validatedData = $request->validate([
            'name' => 'required|unique:teams,name,'.$data->id

        ]);

        
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Team Updated',
            'alert-type' => 'success'
        );
        return redirect()->route('view.team')->with($notification);



    }

    public function DeleteTeam($id)   {

        $team = Teams::find($id);
        $team->delete();

        return redirect()->route('view.team')->with('success', 'Team Deleted');
    }
}

