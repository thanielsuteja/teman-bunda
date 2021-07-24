<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Region;
use Illuminate\Support\Carbon;

class RegionController extends Controller
{
    //
    public function AllRegions(){

        $regions = Region::oldest()->paginate(5);
        return view('admin.region.regions', compact('regions') );
    }

    public function ViewAddPage(){
        return view('admin.region.add_region');
    }
   
    public function AddNew(Request $request){
        $validatedData = $request->validate([
            'region_name' => ['required', 'unique:regions', 'max:30'],
        ],
        [
            'region_name.required' => "please input region name",
            'region_name.unique' => "region name already in use",
            'region_name.max' => "region name exceeds maximum length of 30 characters",
        ]);
        
        
        $region = new Region;
        $region->region_name = $request->region_name;
        $region->save();


        return Redirect()->route('adm.regions')->with('success','Region created successfully');
    }


    public function Edit($id){
        $regions = Region::find($id);
        return view('admin.region.edit_region',compact('regions'));

    }

    public function Update(Request $request ,$id){
        Region::find($id)->update([
            'region_name' => $request->region_name,
            'updated_at' => Carbon::now()
        ]);
        
        return Redirect()->route('adm.regions')->with('success','Region updated successfully');
    }

    public function Delete($id){
      
        Region::find($id)->delete();

        return Redirect()->route('adm.regions')->with('success','Region deleted Successfully');
    }
}
