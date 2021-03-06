@extends ('layout.navbar.adminSB')

@section ('content')
<div class="container rounded border border-dark bg-dark p-5" style="margin-left:20%; margin-top:5%; height:50%">

    <div class="container rounded p-3 mb-4 bg-primary text-white">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Add New Region
        </h2>
    </div>

    <div class="container rounded bg-white p-3">
        
        <div class="card-header">Data Input</div>

            <div class="form-group">
                <form action="{{ route('adm.regions.add') }}" method="POST">
                @csrf
                    <div class="form-group">
                        <div class="mb-3">
                            <label>Region Name</label>
                            <input type="text" name="region_name" class="form-control">
                            @error('region_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <a href="{{ url('admin/regions') }}" class="btn btn-danger">Cancel</a>
                    <button type="submit" class="btn btn-success">Add Region</button>
                </form>
            </div>

            
    </div>
    
</div>



@endsection