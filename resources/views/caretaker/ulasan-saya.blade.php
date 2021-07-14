@extends ('layout.master')
@section ('title','Ulasan Saya | Teman Bunda')
@include ('layout.navbar.navbar-caretaker')
@include ('layout.sidebar.sidebar-caretaker')

@section ('content')
    <style>
        body {
            background-color: #efefef;
        }
    </style>

    <div class="container main col-xxl-12 px-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card mb-5" style="border-radius: 20px; overflow: hidden;">
                    <div class="card-header bg-temanbunda d-flex justify-content-between align-items-center py-4">
                        <h3 class="ps-3 fw-bold m-0">Ulasan</h3>
                    </div>
                    <div class="card-body">
                        @foreach ($reviews as $review)
                            <div class="text-decoration-none" style="color: black;">
                                <div class="card border-2 mx-4 my-2" style="background-color: #f3f3f3; border-radius: 10px; overflow: hidden;">
                                    <div class="card-header d-flex justify-content-between py-3" style="background: #FFEEA8;">
                                        <div><span class="text-secondary me-1">Ulasan dari</span> {{ $review->User->nama_depan }} {{ $review->User->nama_belakang }}</div>
                                        <div><span class="text-secondary me-1">Tanggal kerja</span> {{ date('d/m/Y', strtotime($review->tanggal_masuk)) }} - {{ date('d/m/Y', strtotime($review->tanggal_berakhir)) }}</div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-3 px-2 text-center">
                                                @if ($review->User->profile_img_path != null)
                                                    <img src="{{ asset($review->User->profile_img_path) }}" style="border-radius: 50%; object-fit: cover; width: 110px; height: 110px; border: 7px solid #FFE074">
                                                @else
                                                    <img src="{{ asset('img/no-profile.png') }}" style="border-radius: 50%; object-fit: cover; width: 110px; height: 110px; border: 7px solid #FFE074">
                                                @endif
                                            </div>
                                            <div class="col-md-9">
                                                <p class="m-0"><span class="text-secondary">Order ID</span> {{ $review->job_id }}</p>
                                                <p class="m-0">{{ $review->judul_pekerjaan }}</p>
                                                <div>
                                                    @for ($i = 1; $i < 6; $i++)
                                                        @if ($review->ReviewUser->review_rating >= $i)
                                                            <i class="bi-star-fill" style="color: #FFDE59;"></i>
                                                        @elseif (($i - $review->ReviewUser->review_rating) >= 1)
                                                            <i class="bi-star" style="color: #FFDE59;"></i>
                                                        @elseif (fmod($review->ReviewUser->review_rating, 1) != 0)
                                                            <i class="bi-star-half" style="color: #FFDE59;"></i>
                                                        @endif
                                                    @endfor
                                                </div>
                                                <p class="m-0">{{ $review->ReviewUser->review_content }}</p>
                                                <p class="m-0 text-end">
                                                    <a href="#" class="text-decoration-none" style="color: #FFDE59">Lihat Detail Order</a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection