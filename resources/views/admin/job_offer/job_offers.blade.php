@extends ('navbar.adminSB')

@section ('content')
<div class="container rounded border border-dark bg-dark p-5" style="margin-left:20%; margin-top:5%; height:50%">

    <div class="container rounded p-3 mb-4 bg-primary text-white">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Job Offer Data
        </h2>
    </div>

    <div class="container rounded bg-white p-3" >
        
                <div class="card-header">Job Offers</div>

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">num</th>
                            <th scope="col">job_id</th>
                            <th scope="col">job_status</th>
                            <th scope="col">user_id</th>
                            <th scope="col">caretaker_id</th>
                            <th scope="col">created_at</th>
                            <th scope="col">updated_at</th>
                            <th scope="col">actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($job_offers as $job_offer)
                        <tr>
                        <th scope="row">{{$job_offers->firstItem()+$loop->index}}</th>
                        <td>{{ $job_offer->job_id }}</td>
                        <td>{{ $job_offer->job_status }}</td>
                        <td>{{ $job_offer->user_id }}</td>
                        <td>{{ $job_offer->caretaker_id }}</td>
                        <td>
                            @if($job_offer->created_at==NULL)
                            <span class="text-danger">No Date Set</span>
                            @else
                            {{ $job_offer->created_at }}
                            @endif
                        </td>
                        <td>
                            @if($job_offer->updated_at==NULL)
                            <span class="text-danger">No Date Set</span>
                            @else
                            {{ $job_offer->updated_at }}
                            @endif
                        </td>
                        <td>
                            <a href="{{ url('admin/job_offers/details/'.$job_offer->job_id) }}" class="btn btn-info">Details</a>
                        </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{$job_offers->links()}}
            
    </div>
</div>



@endsection