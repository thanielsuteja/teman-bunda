<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Caretaker;
use App\Models\User;
use Illuminate\Support\Carbon;

class ApplicationController extends Controller
{
    //
    public function AllApplications(){

         $caretakers = Caretaker::latest()->paginate(5);
        return view('admin.application.applications', compact('caretakers') ); 
    }

    public function Details($id){

        $caretaker= Caretaker::find($id);
        return view('admin.application.application_details',compact('caretaker'));
    }

    public function AcceptApplication(Request $request,$id){

        $update = Caretaker::find($id)->update([
            'approved' => $request->approved,
            'updated_at' => Carbon::now()
        ]);

        $update2 = User::where('user_id',$request->user_id)->update([
            'role' => "caretaker",
            'updated_at' => Carbon::now()
        ]);

        return Redirect()->route('adm.applications')->with('success','Caretaker application accepted, role of apllying user has been updated to "caretaker"');
    }

    public function DenyApplication(Request $request,$id){

        $update = Caretaker::find($id)->update([
            'approved' => $request->approved,
            'updated_at' => Carbon::now()
        ]);

        return Redirect()->route('adm.applications')->with('success','Caretaker application denied');
    }
}
