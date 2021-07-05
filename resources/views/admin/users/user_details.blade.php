@extends ('navbar.adminSB')

@section ('content')
<div class="container" style="margin-left:15%;">

    <div class="container p-3 mb-2 bg-primary text-white">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            User Data
        </h2>
    </div>

    <div class="container">
        
        <div class="card-header">Displaying data of User: {{ $users->nama }} UID: {{ $users->user_id }}</div>

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
                    <td>{{ $users->user_id }}</td>
                </tr>
                <tr>
                    <td>nama</td>
                    <td>{{ $users->nama }}</td>
                </tr>
                <tr>
                    <td>peran_user</td>
                    <td>{{ $users->peran_user }}</td>
                </tr>
                <tr>
                    <td>no_telpon<</td>
                    <td>{{ $users->no_telepon }}</td>
                </tr>
                <tr>
                    <td>email</td>
                    <td>{{ $users->email }}</td>
                </tr>
                <tr>
                    <td>alamat</td>
                    <td>{{ $users->alamat }}</td>
                </tr>
                <tr>
                    <td>provinsi</td>
                    <td>{{ $users->provinsi }}</td>
                </tr>
                <tr>
                    <td>kabupaten</td>
                    <td>{{ $users->kabupaten }}</td>
                </tr>
                <tr>
                    <td>tanggal_lahir</td>
                    <td>{{ $users->tanggal_lahir }}</td>
                </tr>
                <tr>
                    <td>jenis_kelamin</td>
                    <td>{{ $users->jenis_kelamin }}</td>
                </tr>
                <tr>
                    <td>virtual_account</td>
                    <td>{{ $users->virtual_account }}</td>
                </tr>
                <tr>
                    <td>created_at</td>
                    <td>{{ $users->created_at }}</td>
                </tr>
                <tr>
                    <td>updated_at</td>
                    <td>{{ $users->updated_at }}</td>
                </tr>
                
                
            </tbody>
        </table>

            
    </div>


</div>

@endsection