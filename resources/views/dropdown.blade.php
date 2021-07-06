<meta name="csrf-token" content="{{ csrf_token() }}">
<script src="{{ asset('js/jquery.js') }}"></script>
<script>
    $(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#province').on('change', function() {
            $.ajax({
                url: '{{ route("getKabupaten") }}',
                method: 'post',
                data: {
                    id: $(this).val()
                },
                success: function(response) {
                    $('#city').empty();

                    $.each(response, function(id, name) {
                        $('#city').append(new Option(name, id))
                    })
                }
            })
        });
        $('#city').on('change', function() {
            $.ajax({
                url: '{{ route("getKecamatan") }}',
                method: 'post',
                data: {
                    id: $(this).val()
                },
                success: function(response) {
                    $('#district').empty();

                    $.each(response, function(id, name) {
                        $('#district').append(new Option(name, id))
                    })
                }
            })
        });
        $('#district').on('change', function() {
            $.ajax({
                url: '{{ route("getKelurahan") }}',
                method: 'post',
                data: {
                    id: $(this).val()
                },
                success: function(response) {
                    $('#village').empty();

                    $.each(response, function(id, name) {
                        $('#village').append(new Option(name, id))
                    })
                }
            })
        });
    });
</script>

<form>
    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label">Province</label>
        <div class="col-md-6">
            <select name="province" id="province" class="form-control">
                <option value="">== Select Province ==</option>
                @foreach ($provinces as $id => $name)
                <option value="{{ $id }}">{{ $name }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label">Kabupaten</label>
        <div class="col-md-6">
            <select name="city" id="city" class="form-control">
                <option value="">== Select City ==</option>
            </select>
        </div>
    </div>
    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label">Kecamatan</label>
        <div class="col-md-6">
            <select name="district" id="district" class="form-control">
                <option value="">== Select District ==</option>
            </select>
        </div>
    </div>
    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label">Kelurahan</label>
        <div class="col-md-6">
            <select name="village" id="village" class="form-control">
                <option value="">== Select Village ==</option>
            </select>
        </div>
    </div>
</form>