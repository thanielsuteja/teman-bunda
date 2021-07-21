@extends ('layout.navbar.adminSB')

@section ('content')
<div class="container rounded border border-dark bg-dark p-5" style="margin-left:20%; margin-top:5%; margin-bottom:5%; height:50%">

    <div class="container p-3 mb-4 bg-primary text-white">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit User Data
        </h2>
    </div>

    <div class="container rounded bg-white p-3">

        <div class="card-header">Edit Admin Profile</div>
        @php($cur_id = Auth::user()->user_id)
        <div class="form-group">
            <form action="{{ url('/admin/profile/update-profile/'.$cur_id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">

                    <div class="mb-3">
                        <label>nama depan</label>
                        <input type="text" name="nama_depan" class="form-control" value="{{ Auth::user()->nama_depan }}">
                        @error('nama_depan')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label>nama belakang</label>
                        <input type="text" name="nama_belakang" class="form-control" value="{{ Auth::user()->nama_belakang }}">
                        @error('nama_belakang')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label>profile img</label>
                        <input type="hidden" name="old_image" value="{{ Auth::user()->profile_img_path }}">
                        <input type="file" name="profile_img_path" id="profile_img_path" class="form-control" value="{{ Auth::user()->profile_img_path }}">
                        @error('profile_img_path')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <img src="{{ asset(Auth::user()->profile_img_path)}}" style="height:70px;width:70px">
                    </div>

                    <div class="mb-3">
                        <label>nomor telepon</label>
                        <input type="text" name="nomor_telepon" class="form-control" value="{{ Auth::user()->nomor_telepon }}">
                        @error('nomor_telpon')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label>alamat</label>
                        <input type="text" name="alamat" class="form-control" value="{{ Auth::user()->alamat }}">
                        @error('alamat')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                </div>
                <a href="{{ url('/admin/profile') }}" class="btn btn-danger">Cancel</a>
                <button type="submit" class="btn btn-success">Edit Profile</button>
            </form>
        </div>
    </div>
</div>

@endsection