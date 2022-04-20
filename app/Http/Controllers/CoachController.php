<?php

namespace App\Http\Controllers;

use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\AssignCoach;
use App\Models\Squad;
use App\Models\Teams;
use Illuminate\Support\Facades\Auth;

class CoachController extends Controller
{

    public function NewCoach() {
        $data['team'] = Teams::all();
        $data['squad'] = Squad::all();
        return view('admin.coaches.coach_registration.new_coach', $data);
    }

    public function ViewCoaches() {
        $data['allData'] = User::where('role', 2)->get();
        return view('admin.coaches.coach_registration.view_coaches',$data);
    } 

    
    public function SaveCoach(Request $request){
        
        $validatedData = $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'dob' => 'required|string|max:255',
            'gender' => 'required|string|max:255',
            'squad' => 'required',
            'team' => 'required',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->username = $request->username;
        $user->password = bcrypt($request->password);
        $user->dob = date('Y-m-d',strtotime($request->dob));
        $user->gender = $request->gender;
        $user->address = $request->address;
        $user->phone = $request->phone;
        $user->current_team_id = $request->team;
        $user->current_squad_id = $request->squad;
        $user->role = 2;

        if ($request->file('photo'))    {
            $avatar = $request->file('photo');
            $filename = time(). '.'.$avatar->getClientOriginalExtension();
            Image::make($avatar)->save(public_path('uploads/coach_photos/'.$filename));
            $file_path = '/uploads/coach_photos/'.$filename;
            $user['photo'] = $filename;
            $user->profile_photo_path = $file_path;
        }
        
        $user->save();

        return redirect()->route('view.coach')->with('success', 'New Coach Registered');
    }

    public function EditCoach($id){
        $data['editData'] = User::find($id);
        $data['teams'] = Teams::all();
        $data['squad'] = Squad::all();
        return view('admin.coaches.coach_registration.edit_coach',$data);
    }

    public function UpdateCoach(Request $request,$id){

        $data = User::find($id);
        $validatedData = $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|'.Rule::unique('users')->ignore($id),
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'dob' => 'required|string|max:255',
            'gender' => 'required|string|max:255',
            'squad' => 'required',
            'team' => 'required',
        ]);

        if ($request->file('photo'))    {
            $avatar = $request->file('photo');
            $filename = time(). '.'.$avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300,300)->save(public_path('uploads/coach_photos/'.$filename));
            $file_path = '/uploads/coach_photos/'.$filename;
            $data->photo = $filename;
            $data->profile_photo_path = $file_path;
        }
        $data->name = $request->name;
        $data->email = $request->email;
        $data->username = $request->username;
        $data->dob = date('Y-m-d',strtotime($request->dob));
        $data->gender = $request->gender;
        $data->address = $request->address;
        $data->phone = $request->phone;
        $data->current_team_id = $request->team;
        $data->current_squad_id = $request->squad;

        $data->save();

        return back()->with('success', 'Coach Details Updated');
    }

    public function DeleteCoach($id) {
        if(Auth::user()->role==1){
            $user = User::find($id);
            $user->delete();
            return back()->with('success', 'Coach Deleted');
        }
    } 

}
