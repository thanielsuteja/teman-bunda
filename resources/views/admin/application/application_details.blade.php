@extends ('layout.navbar.adminSB')

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
                    <td>tipe_caretaker</td>
                    <td>{{ $caretaker->tipe_caretaker }}</td>
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
                    <td>{{ $caretaker->age }}</td>
                </tr>
                <tr>
                    <td>edukasi</td>
                    <td>{{ $caretaker->edukasi }}</td>
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
                    <td>
                        @if ($caretaker->dokumen_vaksin_path != null)
                        <a type="button" class="" data-bs-toggle="modal" href="#lihatVaksinModal">
                            <img src="{{ asset('storage/vaksin/'.$caretaker->dokumen_vaksin_path) }}" style="height:70px;width:70px">
                        </a>
                        @else
                        <div class="box-placeholder" style="height:70px;width:70px"></div>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>dokumen_ijazah</td>
                    <td>
                        @if ($caretaker->dokumen_ijazah_path != null)
                        <a type="button" class="" data-bs-toggle="modal" href="#lihatIjazahModal">
                            <img src="{{ asset('storage/ijazah/'.$caretaker->dokumen_ijazah_path) }}" style="height:70px;width:70px">
                        </a>
                        @else
                        <div class="box-placeholder" style="height:70px;width:70px"></div>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>dokumen_psikotes</td>
                    <td>
                        @if ($caretaker->dokumen_psikotes_path != null)
                        <a type="button" class="" data-bs-toggle="modal" href="#lihatPsikotesModal">
                            <img src="{{ asset('storage/psikotes/'.$caretaker->dokumen_psikotes_path) }}" style="height:70px;width:70px">
                        </a>
                        @else
                        <div class="box-placeholder" style="height:70px;width:70px"></div>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>dokumen_skck</td>
                    <td>
                        @if ($caretaker->dokumen_skck_path != null)
                        <a type="button" class="" data-bs-toggle="modal" href="#lihatSkckModal">
                            <img src="{{ asset('storage/skck/'.$caretaker->dokumen_skck_path) }}" style="height:70px;width:70px">
                        </a>
                        @else
                        <div class="box-placeholder" style="height:70px;width:70px"></div>
                        @endif
                    </td>
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
                        <a href="/admin/applications/deny/{{ $caretaker->caretaker_id }}" class="btn btn-danger" onclick="return confirm('Deny apllication request ?')">Tolak</a>
                        <a href="/admin/applications/accept/{{ $caretaker->caretaker_id }}" class="btn btn-success" onclick="return confirm('Accept apllication request ?')">Izinkan</a>
                        @else
                        <a href="#" class="btn btn-success float-right disabled">No actions available</a>
                        @endif
                    </td>
                </tr>

            </tbody>
        </table>

        <a href="{{ url('admin/applications') }}" class="btn btn-primary float-right">Back</a>
    </div>


</div>

<div class="modal fade" id="lihatVaksinModal" tabindex="-1" aria-labelledby="lihatVaksinModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="lihatVaksinModalLabel">Preview</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @if ($caretaker->dokumen_vaksin_path != null)
                <img src="{{ asset('storage/vaksin/'.$caretaker->dokumen_vaksin_path) }}" class="img-fluid">
                @else
                <div class="box-placeholder"></div>
                @endif
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="lihatPsikotesModal" tabindex="-1" aria-labelledby="lihatPsikotesModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="lihatPsikotesModalLabel">Preview</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @if ($caretaker->dokumen_psikotes_path != null)
                <img src="{{ asset('storage/psikotes/'.$caretaker->dokumen_psikotes_path) }}" class="img-fluid">
                @else
                <div class="box-placeholder"></div>
                @endif
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="lihatIjazahModal" tabindex="-1" aria-labelledby="lihatIjazahModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="lihatIjazahModalLabel">Preview</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @if ($caretaker->dokumen_ijazah_path != null)
                <img src="{{ asset('storage/ijazah/'.$caretaker->dokumen_ijazah_path) }}" class="img-fluid">
                @else
                <div class="box-placeholder"></div>
                @endif
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="lihatSkckModal" tabindex="-1" aria-labelledby="lihatSkckModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="lihatSkckModalLabel">Preview</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @if ($caretaker->dokumen_skck_path != null)
                <img src="{{ asset('storage/skck/'.$caretaker->dokumen_skck_path) }}" class="img-fluid">
                @else
                <div class="box-placeholder"></div>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection