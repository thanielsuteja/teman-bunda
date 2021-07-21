@extends ('layout.master')
@section ('title','Review User | Teman Bunda')
@include ('layout.navbar.navbar-caretaker')
@include ('layout.sidebar.sidebar-caretaker')

@section ('content')
<style>
    body {
        background-color: #efefef;
    }

    table {
        width: 100%;
    }

    p {
        margin-bottom: 0.3rem;
    }

    .card-review {
        background: #E9E9E9;
        border-radius: 16px;
        margin-bottom: 20px;
        padding: 21px 24px;
    }
</style>

<div class="container col-xxl-12 px-5">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card shadow" style="border-radius: 20px; overflow: 0; margin-top: 90px;">
                <div class="card-header bg-temanbunda d-flex align-items-center p-0" style="height: 107px; overflow: 0; border-top-right-radius: 20px; border-top-left-radius: 20px">
                    <div class="row">
                        <div class="col-1 d-flex align-items-center">
                            <a href="{{ url()->previous() }}" class="text-decoration-none fw-bold" style="color: black;">
                                <i class="bi bi-chevron-left ps-3" style="font-size: 36px; height: 36; width: 36;"></i>
                            </a>
                        </div>
                        <div class="col">
                            <h2 class="m-0 ms-5">{{ $user->nama_depan }} {{ $user->nama_belakang }}<span class="text-808080">, {{ $user->age }}</span></h2>
                        </div>
                    </div>
                </div>
                <div class="card-body mx-5" style=" min-height: 532px;">
                    <div class="row px-4" style="margin-top: -50px;">
                        <div class="col-9">
                            @for ($i = 1; $i < 6; $i++) @if ($user->meanRating >= $i)
                                <i class="bi-star-fill" style="color: #FF8A00; font-size: 14px;"></i>
                                @elseif (($i - $user->meanRating) >= 1)
                                <i class="bi-star" style="color: #FF8A00; font-size: 14px;"></i>
                                @elseif (fmod($user->meanRating, 1) != 0)
                                <i class="bi-star-half" style="color: #FF8A00; font-size: 14px;"></i>
                                @endif
                            @endfor
                            <span class="ps-4" style="font-size: 20px;">
                                {{ $user->JobOffers->reduce(function($total, $jobOffer) {
                                    return $total + ($jobOffer->ReviewUser == null ? 0 : 1);
                                }) }} ulasan
                            </span>
                        </div>
                        <div class="col-3" style="margin-top: -90px;">
                            @if ($user->profile_img_path != null)
                            <img src="{{ asset('storage/foto_profil/'.$user->profile_img_path) }}" class="profile-pic-lg border">
                            @else
                            <img src="{{ asset('img/no-profile.png') }}" class="profile-pic-lg border">
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <span class="text-secondary">ID User</span> {{ $user->user_id }}
                        </div>
                    </div>
                    <div class="row mb-5">
                        <div class="col">
                            <span class="text-secondary">Aktif sejak</span> {{ date('d-m-Y', strtotime($user->created_at)) }}
                        </div>
                    </div>
                    @foreach ($user->JobOffers()->has('ReviewCaretaker')->get() as $jobOffer)
                        <div class="card-review">
                            <div class="d-flex">
                                <div class="">
                                    @if ($user->profile_img_path != null)
                                        <img src="{{ asset($user->profile_img_path) }}" style="border-radius: 50%; object-fit: cover; width: 69px; height: 69px">
                                    @else
                                        <img src="{{ asset('img/no-profile.png') }}" style="border-radius: 50%; object-fit: cover; width: 69px; height: 69px">
                                    @endif
                                </div>
                                <div class="ms-3">
                                    <p class="m-0">{{ $jobOffer->Caretaker->User->nama_depan }} {{ $jobOffer->Caretaker->User->nama_belakang }}</p>
                                    <div class="d-flex">
                                        <div class="me-2">
                                            @for ($i = 1; $i < 6; $i++)
                                                @if ($jobOffer->ReviewCaretaker->review_rating >= $i)
                                                    <i class="bi-star-fill" style="color: #FFDE59; font-size: 14px;"></i>
                                                @elseif (($i - $jobOffer->ReviewCaretaker->review_rating) >= 1)
                                                    <i class="bi-star" style="color: #FFDE59; font-size: 14px;"></i>
                                                @elseif (fmod($jobOffer->ReviewCaretaker->review_rating, 1) != 0)
                                                    <i class="bi-star-half" style="color: #FFDE59; font-size: 14px;"></i>
                                                @endif
                                            @endfor
                                        </div>
                                        <span class="text-secondary">
                                            {{ \Carbon\Carbon::parse($jobOffer->created_at)->diffForHumans() }}
                                        </span>
                                    </div>
                                    <p>{{ $jobOffer->ReviewCaretaker->review_content }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection