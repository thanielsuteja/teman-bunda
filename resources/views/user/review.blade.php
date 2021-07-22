@extends ('layout.master')
@section ('title', 'Ulasan | Teman Bunda')
@include ('layout.navbar.navbar-user')

@section ('content')
<style>
    body {
        overflow-x: hidden;
    }

    .stars {
        margin-bottom: 15px;
    }

    .stars i {
        font-size: 30px;
    }
</style>
<div class="row justify-content-center">
    <div class="col-5 border-2 border-start border-end px-5" style="min-height: 632px; margin-top: 97px;">
        <form action="/user/simpan-review/" method="POST">
            <input type="hidden" name="penilaian" id="penilaian" value="0">
            <input type="hidden" name="job_id" value="{{ $job->job_id }}">
            @csrf
            <div class="row text-end mt-3">
                <p><span class="text-808080">Order </span>{{ $job->job_id }}</p>
            </div>
            <div class="row justify-content-center">
                @if ($job->Caretaker->User->profile_img_path != null)
                <img src="{{ asset('storage/foto_profil/'.$job->Caretaker->User->profile_img_path) }}" class="profile-pic p-0" style="width: 150px; height: 150px; border: 8px solid;">
                @else
                <img src="{{ asset('img/no-profile.png') }}" class="profile-pic border border-5 p-0" style="width: 150px; height: 150px; border: 8px solid;">
                @endif
                <h4 class="text-center pt-3">{{ $job->Caretaker->User->nama_depan }} {{ $job->Caretaker->User->nama_belakang }}</h4>

                <div class="row pt-4">
                    <div class="col">
                        <h5 class="mb-1">{{ $job->judul_pekerjaan }}</h5>
                        <p><span class="text-808080">Order selesai tanggal </span>{{ $job->updated_at }}</p>
                    </div>
                    <div class="col-4 text-end">
                        <a href="" class="text-decoration-none" style="color: #ffde59;">Lihat Detail Order</a>
                    </div>
                </div>
            </div>
            <hr class="my-1">
            <div class="row">
                <p class="mb-2">Bagaimana kualitas pelayanan caregiver ini?</p>
                <div class="row justify-content-center">
                    <div class="stars p-0" style="width: 150px;"></div>
                </div>
                <textarea name="ulasan" id="ulasan" cols="30" rows="10" class="form-control rounded-input-sm" placeholder="Berikan ulasan untuk pengguna ini (opsional)" style="height: 110px !important; background-color: #f1f1f1;"></textarea>
            </div>
            <div class="d-flex justify-content-end mt-4">
                <input type="submit" class="btn bg-temanbunda fw-bold" value="Kirim" style="height: 45px; width: 140px;">
            </div>
        </form>
    </div>
</div>
<script src="{{ asset('js/stars.js') }}"></script>
<script>
    $('.stars').stars({
        stars: 5,
        emptyIcon: 'bi-star',
        filledIcon: 'bi-star-fill',
        click: function(index) {
            $('#penilaian').val(index);
        }
    });
</script>
@endsection