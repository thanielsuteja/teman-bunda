<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JobOffer;

class JobOfferController extends Controller
{
    //
    public function AllJobs(){

        $job_offers = JobOffer::latest()->paginate(5);
        return view('admin.job_offer.job_offers', compact('job_offers') );
    }


    public function Details($id){
        $job_offers= JobOffer::find($id);
        return view('admin.job_offer.job_offer_details',compact('job_offers'));
    }
}
