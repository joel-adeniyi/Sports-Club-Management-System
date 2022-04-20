<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contracts;

class ContractController extends Controller
{
    public function ViewContract (){

        $data['allData'] = Contracts::all();
        return view('admin.contracts.view_contract',$data);
    }   

    public function NewContract(){

        return view('admin.contracts.add_contract');
    }   

    public function SaveContract(Request $request){

        $validatedData = $request->validate([
            'type' => 'required|unique:contracts,type',

        ]);

        $data = new Contracts();
        $data->type = $request->type;
        $data->save();
        return redirect()->route('view.contract')->with('success', 'New contract added');
    }

    public function EditContract($id){
        $editData = Contracts::find($id);


        return view('admin.contracts.edit_contract',compact('editData'));
    }   

    public function UpdateContract(Request $request,$id){

        $data = Contracts::find($id);
        $validatedData = $request->validate([
            'type' => 'required|unique:contracts,type,'.$data->id

        ]);

        
        $data->type = $request->type;
        $data->save();

        return redirect()->route('view.contract')->with('success', 'Contract Updated');



    }

    public function DeleteContract($id)   {

        $user = Contracts::find($id);
        $user->delete();
        return redirect()->route('view.contract')->with('success', 'Contract Deleted');


    }
}



