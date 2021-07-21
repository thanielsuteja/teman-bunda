@extends ('layout.navbar.adminSB')

@section ('content')
<div class="container rounded border border-dark bg-dark p-5" style="margin-left:20%; margin-top:5%; margin-bottom:5%; height:50%">

    <div class="container p-3 mb-4 bg-primary text-white">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            My Profile
        </h2>
    </div>

    <div class="container rounded bg-white p-3">

        <div class="card-header">My user profile data</div>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Field</th>
                    <th scope="col">Value</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td>user_id</td>
                    <td>{{ Auth::user()->user_id }}</td>
                </tr>
                <tr>
                    <td>nama_depan</td>
                    <td>{{ Auth::user()->nama_depan }}</td>
                </tr>
                <tr>
                    <td>nama_belakang</td>
                    <td>{{ Auth::user()->nama_belakang }}</td>
                </tr>
                <tr>
                    <td>role</td>
                    <td>{{ Auth::user()->role }}</td>
                </tr>
                <tr>
                    <td>profile_img</td>
                    <td><img src="{{ asset(Auth::user()->profile_img_path) }}" style="height:70px;width:70px"></td>
                </tr>
                <tr>
                    <td>tanggal_lahir</td>
                    <td>{{ Auth::user()->tanggal_lahir }}</td>
                </tr>
                <tr>
                    <td>jenis_kelamin</td>
                    <td>{{ Auth::user()->jenis_kelamin }}</td>
                </tr>
                <tr>
                    <td>nomor_telepon</td>
                    <td>{{ Auth::user()->nomor_telepon }}</td>
                </tr>
                <tr>
                    <td>email</td>
                    <td>{{ Auth::user()->email }}</td>
                </tr>
                <tr>
                    <td>alamat</td>
                    <td>{{ Auth::user()->alamat }}</td>
                </tr>
                <tr>
                    <td>dokumen_ktp</td>
                    <td><img src="{{ asset(Auth::user()->dokumen_ktp_path) }}" style="height:70px;width:70px"></td>
                </tr>
                <tr>
                    <td>created_at</td>
                    <td>{{ Auth::user()->created_at }}</td>
                </tr>
                <tr>
                    <td>updated_at</td>
                    <td>{{ Auth::user()->updated_at }}</td>
                </tr>
                <tr>
                    <td>Action</td>
                    <td><a href="{{ url('/admin/profile/edit-profile')}}" class="btn btn-info float-right">Edit</a></td>
                </tr>

            </tbody>
        </table>
        <a href="{{ url('admin/users') }}" class="btn btn-primary float-right">Back</a>
    </div>
</div>
@endsection