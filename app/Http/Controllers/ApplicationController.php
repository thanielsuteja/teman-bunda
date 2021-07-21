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

    public function getAgeAttribute()
    {
        return \Carbon\Carbon::parse($this->User->tanggal_lahir)->age;
    }

    public function Details($id){

        $caretaker = Caretaker::find($id);
        return view('admin.application.application_details',compact('caretaker'));
    }

    public function AcceptApplication($id){
        
        Caretaker::find($id)->update([
            'approved' => 'accepted',
            'updated_at' => Carbon::now()
        ]);
        
        $user = Caretaker::select('user_id')->where('caretaker_id',$id)->first();

        User::where('user_id', $user->user_id)->update([
            'role' => 'caretaker',
            'updated_at' => Carbon::now()
        ]);

        return Redirect()->route('adm.applications')->with('success','Caretaker application accepted, role of apllying user has been updated to "caretaker"');
    }

    public function DenyApplication($id){

        Caretaker::find($id)->update([
            'approved' => 'denied',
            'updated_at' => Carbon::now()
        ]);

        return Redirect()->route('adm.applications')->with('success','Caretaker application denied');
    }
}
