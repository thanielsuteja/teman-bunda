@extends ('navbar.adminSB')

@section ('content')
<div class="container rounded border border-dark bg-dark p-5" style="margin-left:20%; margin-top:5%; margin-bottom:5%; height:50%">

    <div class="container p-3 mb-4 bg-primary text-white">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            User Data
        </h2>
    </div>

    <div class="container rounded bg-white p-3">
        
        <div class="card-header">Displaying caretaker application of User: {{ $caretaker->user->nama_depan }} {{ $caretaker->user->nama_belakang }} UID: {{ $caretaker->user_id }}</div>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Field</th>
                    <th scope="col">Value</th>
                    
                </tr>
            </thead>

            <tbody>
            
                <tr>
                    <td>caretaker_id</td>
                    <td>{{ $caretaker->caretaker_id }}</td>
                </tr>
                <tr>
                    <td>caretaker_status</td>
                    <td>{{ $caretaker->caretaker_status }}</td>
                </tr>
                <tr>
                    <td>approval_status</td>
                    <td>{{ $caretaker->approved }}</td>
                </tr>
                <tr>
                    <td>user_id</td>
                    <td>{{ $caretaker->user_id }}</td>
                </tr>
                <tr>
                    <td>professions(id)</td>
                    <td>
                    @foreach($caretaker->ProfessionCaretakerRelation as $Prel)
                    <span>{{$Prel->profession_id}}<span>
                    @endforeach
                    </td>
                </tr>
                <tr>
                    <td>regions(id)</td>
                    <td>
                    @foreach($caretaker->RegionCaretakerRelation as $Rrel)
                    <span>{{$Rrel->region_id}}<span>
                    @endforeach
                    </td>
                </tr>
                <tr>
                    <td>bank_account</td>
                    <td>{{ $caretaker->bank_account }}</td>
                </tr>
                <tr>
                    <td>kode_bank</td>
                    <td>{{ $caretaker->kode_bank }}</td>
                </tr>
                <tr>
                    <td>cost_per_hour</td>
                    <td>{{ $caretaker->cost_per_hour }}</td>
                </tr>
                <tr>
                    <td>umur</td>
                    <td>{{ $caretaker->umur }}</td>
                </tr>
                <tr>
                    <td>edukasi</td>
                    <td>{{ $caretaker->edukasi }}</td>
                </tr>
                <tr>
                    <td>religi</td>
                    <td>{{ $caretaker->religi }}</td>
                </tr>
                <tr>
                    <td>tinggi</td>
                    <td>{{ $caretaker->tinggi }}</td>
                </tr>
                <tr>
                    <td>berat</td>
                    <td>{{ $caretaker->berat }}</td>
                </tr>
                <tr>
                    <td>deskripsi_caretaker</td>
                    <td>{{ $caretaker->deskripsi_caretaker }}</td>
                </tr>
                <tr>
                    <td>pengawasan_kamera</td>
                    <td>
                    @if($caretaker->pengawasan_kamera==1)
                            <span>true</span>
                    @else
                            <span>false</span>
                    @endif
                    </td>
                </tr>
                <tr>
                    <td>takut_anjing</td>
                    <td>
                    @if($caretaker->takut_anjing==1)
                            <span>true</span>
                    @else
                            <span>false</span>
                    @endif
                    </td>
                </tr>
                <tr>
                    <td>NIK</td>
                    <td>{{ $caretaker->NIK }}</td>
                </tr>
                <tr>
                    <td>dokumen_vaksin</td>
                    <td><img src="{{ asset($caretaker->dokumen_vaksin_path) }}" style="height:70px;width:70px"></td>
                </tr>
                <tr>
                    <td>dokumen_ijazah</td>
                    <td><img src="{{ asset($caretaker->dokumen_ijazah_path) }}" style="height:70px;width:70px"></td>
                </tr>
                <tr>
                    <td>dokumen_psikotes</td>
                    <td><img src="{{ asset($caretaker->dokumen_psikotes_path) }}" style="height:70px;width:70px"></td>
                </tr>
                <tr>
                    <td>dokumen_akte_kelahiran</td>
                    <td><img src="{{ asset($caretaker->dokumen_akta_kelahiran_path) }}" style="height:70px;width:70px"></td>
                </tr>
                <tr>
                    <td>rating_caretaker</td>
                    <td>{{ $caretaker->rating_caretaker }}</td>
                </tr>
                <tr>
                    <td>created_at</td>
                    <td>{{ $caretaker->created_at }}</td>
                </tr>
                <tr>
                    <td>updated_at</td>
                    <td>{{ $caretaker->updated_at }}</td>
                </tr>
                <tr>
                    <td>actions</td>
                    <td>
                    @if($caretaker->approved=="pending")
                    <form action="{{ url('/admin/applications/deny/'.$caretaker->caretaker_id) }}" method="POST">
                        @csrf
                        <input type="text" name="approved" class="form-control invisible" style="height:0px; width:0px;" value="denied">
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Deny apllication request ?')">Deny</button>
                    </form>
                    <form action="{{ url('/admin/applications/accept/'.$caretaker->caretaker_id) }}" method="POST">
                        @csrf
                        <input type="text" name="user_id" class="form-control invisible" style="height:0px; width:0px;" value="{{ $caretaker->user_id }}">
                        <input type="text" name="approved" class="form-control invisible" style="height:0px; width:0px;" value="accepted">
                        <button type="submit" class="btn btn-success" onclick="return confirm('Accept apllication request ?')">Accept</button>
                        </form>
                    @else
                    <a href="#" class="btn btn-success float-right disabled">no actions available</a>
                    @endif
                    </td>
                </tr>
                
            </tbody>
        </table>

        <a href="{{ url('admin/applications') }}" class="btn btn-primary float-right">Back</a>      
    </div>


</div>

@endsection