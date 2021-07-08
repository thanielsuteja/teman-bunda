@extends ('navbar.adminSB')

@section ('content')
<div class="container rounded border border-dark bg-dark p-5" style="margin-left:20%; margin-top:5%; margin-bottom:5%; height:50%">

    <div class="container p-3 mb-4 bg-primary text-white">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            User Data
        </h2>
    </div>

    <div class="container rounded bg-white p-3">
        
        <div class="card-header">Displaying data of User: {{ $user->nama }} UID: {{ $user->user_id }}</div>

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
                    <td>{{ $user->user_id }}</td>
                </tr>
                <tr>
                    <td>nama_depan</td>
                    <td>{{ $user->nama_depan }}</td>
                </tr>
                <tr>
                    <td>nama_belakang</td>
                    <td>{{ $user->nama_belakang }}</td>
                </tr>
                <tr>
                    <td>role</td>
                    <td>{{ $user->role }}</td>
                </tr>
                <tr>
                    <td>profile_img</td>
                    <td><img src="{{ asset($user->profile_img_path) }}" style="height:70px;width:70px"></td>
                </tr>
                <tr>
                    <td>tanggal_lahir</td>
                    <td>{{ $user->tanggal_lahir }}</td>
                </tr>
                <tr>
                    <td>jenis_kelamin</td>
                    <td>{{ $user->jenis_kelamin }}</td>
                </tr>
                <tr>
                    <td>nomor_telpon<</td>
                    <td>{{ $user->nomor_telpon }}</td>
                </tr>
                <tr>
                    <td>email</td>
                    <td>{{ $user->email }}</td>
                </tr>
                <tr>
                    <td>alamat</td>
                    <td>{{ $user->alamat }}</td>
                </tr>
                <tr>
                    <td>provinsi</td>
                    <td>{{ $user->provinsi }}</td>
                </tr>
                <tr>
                    <td>kabupaten</td>
                    <td>{{ $user->kabupaten }}</td>
                </tr>
                <tr>
                    <td>kecamatan</td>
                    <td>{{ $user->kabupaten }}</td>
                </tr>
                <tr>
                    <td>kelurahan</td>
                    <td>{{ $user->kabupaten }}</td>
                </tr>
                <tr>
                    <td>dokumen_ktp</td>
                    <td><img src="{{ asset($user->dokumen_ktp_path) }}" style="height:70px;width:70px"></td>
                </tr>
                <tr>
                    <td>virtual_account</td>
                    <td>{{ $user->virtual_account }}</td>
                </tr>
                <tr>
                    <td>rating_user</td>
                    <td>{{ $user->rating_user }}</td>
                </tr>
                <tr>
                    <td>created_at</td>
                    <td>{{ $user->created_at }}</td>
                </tr>
                <tr>
                    <td>updated_at</td>
                    <td>{{ $user->updated_at }}</td>
                </tr>
                
                
            </tbody>
        </table>

        <a href="{{ url('admin/users') }}" class="btn btn-primary float-right">Back</a>      
    </div>


</div>

@endsection