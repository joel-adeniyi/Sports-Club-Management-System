<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Squad;

class TeamManagementController extends Controller
{
    public function ViewSquad() {
        $data['allData'] = Squad::all();
        return view('admin.squad.view_squad',$data);

    }

    public function NewSquad(){

        return view('admin.squad.add_squad');
    }

    public function SaveSquad(Request $request){

        $validatedData = $request->validate([
            'name' => 'required|unique:squads,name',

        ]);

        $data = new Squad();
        $data->name = $request->name;
        $data->save();
        
        return redirect()->route('view.squad')->with('success', 'Squad added successfully');
    }

    public function EditSquad($id){
        $editData = Squad::find($id);


        return view('admin.squad.edit_squad',compact('editData'));
    }

    public function UpdateSquad(Request $request,$id){

        $data = Squad::find($id);
        $validatedData = $request->validate([
            'name' => 'required|unique:squads,name,'.$data->id

        ]);

        
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Squad Updated',
            'alert-type' => 'success'
        );
        return redirect()->route('view.squad')->with($notification);



    }

    public function DeleteSquad($id)   {

        $user = Squad::find($id);
        $user->delete();

        $notification = array(

            'message' => 'Squad Deleted',
            'alert-type' => 'success'
        );

        return redirect()->route('view.squad')->with($notification);


    }
}
