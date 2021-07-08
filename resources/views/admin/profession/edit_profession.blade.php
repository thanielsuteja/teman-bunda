@extends ('navbar.adminSB')

@section ('content')
<div class="container rounded border border-dark bg-dark p-5" style="margin-left:20%; margin-top:5%; height:50%">

    <div class="container rounded p-3 mb-4 bg-primary text-white">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Profession
        </h2>
    </div>

    <div class="container rounded bg-white p-3">
        
        <div class="card-header">Editing Profession: {{ $professions->profession_name }}</div>

            <div class="form-group">
                <form action="{{ url('/admin/professions/update/'.$professions->profession_id) }}" method="POST">
                @csrf
                    <div class="form-group">
                        <div class="mb-3">
                            <label>Profession Name</label>
                            <input type="text" name="profession_name" class="form-control" value="{{ $professions->profession_name }}">
                            @error('profession_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label>Profession Description</label>
                            <textarea name="profession_desc" class="form-control">{{ $professions->profession_desc }}</textarea>
                            @error('profession_desc')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <a href="{{ url('admin/professions') }}" class="btn btn-danger">Cancel</a>
                    <button type="submit" class="btn btn-success">Edit Profession</button>
                </form>
            </div>

            
    </div>
    
</div>



@endsection