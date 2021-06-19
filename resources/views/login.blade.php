@extends ('navbar.master')

@section ('content')

<div class="container my-5">
    <section class="row py-5">
        <form action="/login/store" method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <label>Email : </label>
                <input type="text" name="email" class="form-control">
            </div>
            <div class="form-group">
                <label>Password : </label>
                <input type="text" name="password" class="form-control">
            </div>
            <input type="submit" value="Log in" class="btn btn-default">
        </form>
    </section>
</div>

@endsection