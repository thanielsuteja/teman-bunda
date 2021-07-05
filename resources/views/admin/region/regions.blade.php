@extends ('navbar.adminSB')

@section ('content')
    <div class="container rounded border border-dark bg-dark p-5" style="margin-left:20%; margin-top:5%; height:50%">

        <div class="container rounded p-3 mb-4 bg-primary text-white">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Region Data
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

                    <div class="card-header">Regions</div>

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                                <th scope="col"><a href="{{ url('/admin/regions/new') }}" class="btn btn-info">Add New Region</a></th>
                            </tr>
                            <tr>
                                <th scope="col">num</th>
                                <th scope="col">region_id</th>
                                <th scope="col">region_name</th>
                                <th scope="col">created_at</th>
                                <th scope="col">updated_at</th>
                                <th scope="col">action</th>
                            </tr>
                            
                        </thead>

                        <tbody>
                            @foreach($regions as $region)
                            <tr>
                            <th scope="row">{{$regions->firstItem()+$loop->index}}</th>
                            <td>{{ $region->region_id }}</td>
                            <td>{{ $region->region_name }}</td>
                            <td>
                                @if($region->created_at==NULL)
                                <span class="text-danger">No Date Set</span>
                                @else
                                {{ $region->created_at }}
                                @endif
                            </td>
                            <td>
                                @if($region->updated_at==NULL)
                                <span class="text-danger">No Date Set</span>
                                @else
                                {{ $region->updated_at }}
                                @endif
                            </td>
                            <td>
                                <a href="{{ url('admin/regions/edit/'.$region->region_id) }}" class="btn btn-info">Edit</a>
                                <a href="{{ url('admin/regions/delete/'.$region->region_id) }}" class="btn btn-danger">Delete</a>
                            </td>
                            </tr>
                            @endforeach
                        </tbody>
                        
                    </table>
                    {{$regions->links()}}
                    
                    
                
            
        </div>
        
    </div>




@endsection