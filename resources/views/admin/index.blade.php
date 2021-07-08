@extends ('navbar.adminSB')

@section ('content')
<div class="container rounded border border-dark bg-dark p-5" style="margin-left:20%; margin-top:5%; height:50%">

<div class="container rounded p-3 mb-4 bg-primary text-white">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Welcome
    </h2>
</div>

<div class="container rounded bg-white p-3">
    
    <div class="card-header">Logged in as admin: {{ Auth::user()->nama_depan }} {{ Auth::user()->nama_belakang }}, UID: {{ Auth::user()->user_id }} </div>
    </div>

</div>


@endsection