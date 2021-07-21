<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Carbon;

class AdmUsersController extends Controller
{

    /*  public function __construct(){
        $this->middleware('auth');
    } */

    public function AllUsers()
    {
        $users = User::oldest()->paginate(5);
        return view('admin.users.users', compact('users'));
    }

    public function Details($id)
    {
        $user = User::find($id);
        return view('admin.users.user_details', compact('user'));
    }

    public function AdmDetails()
    {
        return view('admin.profile.AdmProfile_details');
    }

    public function AdmEdit()
    {
        return view('admin.profile.AdmProfile_edit');
    }

    public function AdmUpdate(Request $request, $id)
    {
        $validatedData = $request->validate(
            [
                'nama_depan' => ['required'],
                'nama_belakang' => ['required'],
                'nomor_telepon' => ['required'],
                'alamat' => ['required'],
            ],
            [
                'nama_depan.required' => "please input first name",
                'nama_belakang.required' => "please input surname",
                'nomor_telepon.required' => "please input phone number",
                'alamat.required' => "please input address",
            ]
        );

        $old_image = $request->old_image;

        $profile_image_path = $request->file('profile_img_path');

        if ($profile_image_path) {
            $name_gen = hexdec(uniqid());
            $img_ext = strtolower($profile_image_path->getClientOriginalExtension());
            $img_name = $name_gen . '.' . $img_ext;
            $up_location = 'img/user/';
            $last_img = $up_location . $img_name;
            $profile_image_path->move($up_location, $img_name);

            unlink($old_image);
            User::find($id)->update([
                'nama_depan' => $request->nama_depan,
                'nama_belakang' => $request->nama_belakang,
                'nomor_telepon' => $request->nomor_telepon,
                'alamat' => $request->alamat,
                'profile_img_path' => $last_img,
                'updated_at' => Carbon::now()
            ]);
        } else {
            User::find($id)->update([
                'nama_depan' => $request->nama_depan,
                'nama_belakang' => $request->nama_belakang,
                'nomor_telepon' => $request->nomor_telepon,
                'alamat' => $request->alamat,
                'updated_at' => Carbon::now()
            ]);
        }

        return Redirect()->route('adm.profile')->with('success', 'Profile Updated Successfully');
    }
}
