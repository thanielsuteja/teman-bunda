@extends ('navbar.adminSB')

@section ('content')
    <div class="container rounded border border-dark bg-dark p-5" style="margin-left:20%; margin-top:5%; height:50%">

        <div class="container rounded p-3 mb-4 bg-primary text-white">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Profession Data
            </h2>
        </div>

        <div class="container rounded bg-white p-3">
            

                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ session('success') }}</strong> 
                            <button type="button" class="btn-close"  data-bs-dismiss="alert" aria-label="Close">
                            </button>
                        </div>
                    @endif

                    <div class="card-header">Professions</div>

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                                <th scope="col"><a href="{{ url('/admin/professions/new') }}" class="btn btn-info">Add New Profession</a></th>
                            </tr>
                            <tr>
                                <th scope="col">num</th>
                                <th scope="col">profession_id</th>
                                <th scope="col">profession_name</th>
                                <th scope="col">description</th>
                                <th scope="col">created_at</th>
                                <th scope="col">updated_at</th>
                                <th scope="col">action</th>
                            </tr>
                            
                        </thead>

                        <tbody>
                            @foreach($professions as $profession)
                            <tr>
                            <th scope="row">{{$professions->firstItem()+$loop->index}}</th>
                            <td>{{ $profession->profession_id }}</td>
                            <td>{{ $profession->profession_name }}</td>
                            <td>{{ $profession->profession_desc }}</td>
                            <td>
                                @if($profession->created_at==NULL)
                                <span class="text-danger">No Date Set</span>
                                @else
                                {{ $profession->created_at }}
                                @endif
                            </td>
                            <td>
                                @if($profession->updated_at==NULL)
                                <span class="text-danger">No Date Set</span>
                                @else
                                {{ $profession->updated_at }}
                                @endif
                            </td>
                            <td>
                                <a href="{{ url('admin/professions/edit/'.$profession->profession_id) }}" class="btn btn-info">Edit</a>
                                <a href="{{ url('admin/professions/delete/'.$profession->profession_id) }}" class="btn btn-danger">Delete</a>
                            </td>
                            </tr>
                            @endforeach
                        </tbody>
                        
                    </table>
                    {{$professions->links()}}
                    
                    
                
            
        </div>
        
    </div>




@endsection