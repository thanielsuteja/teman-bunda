@extends ('navbar.adminSB')

@section ('content')
<div class="container rounded  bg-dark p-5" style="margin-left:20%; margin-top:5%; margin-bottom:5%; height:50%">

    <div class="container rounded p-3 mb-4 bg-primary text-white">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Job Offer Data
        </h2>
    </div>

    <div class="container rounded bg-white p-3">
        
        <div class="card-header">Displaying data of job_offer: {{ $job_offers->job_id }}</div>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Field</th>
                    <th scope="col">Value</th>
                    
                </tr>
            </thead>

            <tbody>
            
                <tr>
                    <td>job_id</td>
                    <td>{{ $job_offers->job_id }}</td>
                </tr>
                <tr>
                    <td>job_status</td>
                    <td>{{ $job_offers->job_status }}</td>
                </tr>
                <tr>
                    <td>user_id</td>
                    <td>{{ $job_offers->user_id }}</td>
                </tr>
                <tr>
                    <td>caretaker_id<</td>
                    <td>{{ $job_offers->caretaker_id }}</td>
                </tr>
                <tr>
                    <td>judul_pekerjaan</td>
                    <td>{{ $job_offers->judul_pekerjaan }}</td>
                </tr>
                <tr>
                    <td>deskripsi_pekerjaan</td>
                    <td>{{ $job_offers->deskripsi_pekerjaan }}</td>
                </tr>
                <tr>
                    <td>tanggal_masuk</td>
                    <td>{{ $job_offers->tanggal_masuk }}</td>
                </tr>
                <tr>
                    <td>tanggal_berakhir</td>
                    <td>{{ $job_offers->tanggal_berakhir }}</td>
                </tr>
                <tr>
                    <td>jam_masuk</td>
                    <td>{{ $job_offers->jam_masuk }}</td>
                </tr>
                <tr>
                    <td>jam_berakhir</td>
                    <td>{{ $job_offers->jam_berakhir }}</td>
                </tr>
                <tr>
                    <td>hari_kerja</td>
                    <td>{{ $job_offers->wd_1 }}</td>
                </tr>
                <tr>
                    <td>estimasi_biaya</td>
                    <td>{{ $job_offers->estimasi_biaya }}</td>
                </tr>
                <tr>
                    <td>created_at</td>
                    <td>{{ $job_offers->created_at }}</td>
                </tr>
                <tr>
                    <td>updated_at</td>
                    <td>{{ $job_offers->updated_at }}</td>
                </tr>
                
                
            </tbody>
        </table>

        <a href="{{ url('admin/job_offers') }}" class="btn btn-primary float-right">Back</a>     
    </div>


</div>

@endsection