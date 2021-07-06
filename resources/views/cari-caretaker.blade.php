@extends('layout.master')
@include('layout.navbar.navbar-user')
@include('layout.sidebar.sidebar-user')

@section('content')

<div class="container main col-xxl-12 px-5">
    <div class="row">
        <div class="col-md-8 offset-md-2 text-center">
            <div class="card mb-5">
                <div class="card-header bg-whitesmoke">
                    Filter
                    <select name="filter_profesi" id="">
                        <option value="">Profesi</option>
                        <option value="">asu</option>
                    </select>
                    <select name="filter_area" id="">
                        <option value="">Area</option>
                        <option value="">asu</option>
                    </select>

                </div>
                <div class="card-body">
                    <div class="card bg-whitesmoke border-2">
                        <div class="class-body">
                            <h5 class="card-title">Mia Damae</h5>
                            <p class="card-text">Aku bisa nyuci masak rawat bayi kamu ampe mampi. Dulu pernah kerja di Binus kobek-kobek sebuah big mump dari Pak Asyo</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection