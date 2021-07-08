@extends ('navbar.adminSB')

@section ('content')
<div class="container rounded border border-dark bg-dark p-5" style="margin-left:20%; margin-top:5%; height:50%">

    <div class="container rounded p-3 mb-4 bg-primary text-white">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Caretaker Applications
        </h2>
    </div>

    <div class="container rounded bg-white p-3" >

                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ session('success') }}</strong> 
                            <button type="button" class="btn-close"  data-bs-dismiss="alert" aria-label="Close">
                            </button>
                        </div>
                    @endif
        
                <div class="card-header">Applications</div>

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">num</th>
                            <th scope="col">caretaker_id</th>
                            <th scope="col">approval status</th>
                            <th scope="col">user_id</th>
                            <th scope="col">created_at</th>
                            <th scope="col">updated_at</th>
                            <th scope="col">action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($caretakers as $caretaker)
                        <tr>
                        <th scope="row">{{$caretakers->firstItem()+$loop->index}}</th>
                        <td>{{ $caretaker->caretaker_id }}</td>
                        <td>{{ $caretaker->approved }}</td>
                        <td>{{ $caretaker->user_id }}</td>
                        <td>
                            @if($caretaker->created_at==NULL)
                            <span class="text-danger">No Date Set</span>
                            @else
                            {{ $caretaker->created_at }}
                            @endif
                        </td>
                        <td>
                            @if($caretaker->updated_at==NULL)
                            <span class="text-danger">No Date Set</span>
                            @else
                            {{ $caretaker->updated_at }}
                            @endif
                        </td>
                        <td>
                            <a href="{{ url('admin/applications/details/'.$caretaker->caretaker_id) }}" class="btn btn-info">Details</a>
                        </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{$caretakers->links()}}
            
    </div>
</div>



@endsection