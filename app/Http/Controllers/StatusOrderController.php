<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Caretaker;
use App\Models\Job_offer;
use Illuminate\Support\Facades\Auth;

class StatusOrderController extends Controller
{
    public function showOrder () {
        $job = Job_offer::where('user_id', Auth::user()->user_id)->get(); 

        return view('user.order', ['job_offer' => $job]);
    }

    public function showOrderInfo ($id) {
        $job = Job_offer::where('job_id', $id)->first();
        
        return view('user.order-info', ['job' => $job]);
    }

    public function updateGaji($id, Request $request)
    {
        Job_offer::where('job_id', $id)->update([
            'estimasi_biaya' => $request->gaji_baru,
            'permintaan_gaji_baru' => null,
            'job_status' => 'menunggu',
        ]);

        return redirect("/user/order-info/$id");
    }
    
    public function batalkanOrder($id)
    {
        Job_offer::where('job_id', $id)->update([
            'job_status' => 'dibatalkan',
        ]);

        return redirect("/user/order-info/$id");
    }

    public function selesaikanOrder($id)
    {
        Job_offer::where('job_id', $id)->update([
            'job_status' => 'selesai',
        ]);

        return redirect("/user/order-info/$id");
    }
}
