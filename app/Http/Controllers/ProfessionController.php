<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profession;
use Illuminate\Support\Carbon;

class ProfessionController extends Controller
{
    //
    public function AllProfessions(){

        $professions = Profession::latest()->paginate(5);
        return view('admin.profession.professions', compact('professions') );
    }

    public function ViewAddPage(){
        return view('admin.profession.add_profession');
    }
   
    public function AddNew(Request $request){
        $validatedData = $request->validate([
            'profession_name' => ['required', 'unique:professions', 'max:30'],
            'profession_desc' => ['required', 'max:255'],
        ],
        [
            'profession_name.required' => "please input profession name",
            'profession_name.unique' => "profession name already in use",
            'profession_name.max' => "profession name exceeds maximum length of 30 characters",
            'profession_desc.required' => "please input profession description",
            'profession_desc.max' => "profession description exceeds maximum length of 255 characters",
        ]);
        
        
        $profession = new Profession;
        $profession->profession_name = $request->profession_name;
        $profession->profession_desc = $request->profession_desc;
        $profession->save();


        return Redirect()->route('adm.professions')->with('success','Profession created successfully');
    }


    public function Edit($id){
        $professions = Profession::find($id);
        return view('admin.profession.edit_profession',compact('professions'));

    }

    public function Update(Request $request ,$id){
        $update = Profession::find($id)->update([
            'profession_name' => $request->profession_name,
            'profession_desc' => $request->profession_desc,
            'updated_at' => Carbon::now()
        ]);
        
        return Redirect()->route('adm.professions')->with('success','Profession updated successfully');
    }

    public function Delete($id){
      
        Profession::find($id)->delete();

        return Redirect()->route('adm.professions')->with('success','Profession deleted Successfully');
    }
}
