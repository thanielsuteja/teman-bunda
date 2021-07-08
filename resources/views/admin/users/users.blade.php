@extends ('navbar.adminSB')

@section ('content')
<div class="container rounded border border-dark bg-dark p-5" style="margin-left:20%; margin-top:5%; height:50%">

    <div class="container rounded p-3 mb-4 bg-primary text-white">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            User Data
        </h2>
    </div>

    <div class="container rounded bg-white p-3" >
        
                <div class="card-header">Users</div>

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">num</th>
                            <th scope="col">user_id</th>
                            <th scope="col">nama</th>
                            <th scope="col">role</th>
                            <th scope="col">email</th>
                            <th scope="col">virtual_account</th>
                            <th scope="col">created_at</th>
                            <th scope="col">action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($users as $user)
                        <tr>
                        <th scope="row">{{$users->firstItem()+$loop->index}}</th>
                        <td>{{ $user->user_id }}</td>
                        <td>{{ $user->nama_depan }} {{ $user->nama_belakang }}</td>
                        <td>{{ $user->role }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->virtual_account }}</td>
                        <td>
                            @if($user->created_at==NULL)
                            <span class="text-danger">No Date Set</span>
                            @else
                            {{ $user->created_at }}
                            @endif
                        </td>
                        <td>
                            <a href="{{ url('admin/users/details/'.$user->user_id) }}" class="btn btn-info">Details</a>
                        </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{$users->links()}}
            
    </div>
</div>



@endsection