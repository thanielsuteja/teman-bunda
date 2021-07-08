@extends ('navbar.master')

@section ('content')

<div class="container my-5 p-2 ">
    <section class="row py-5">
        <h1 class="container rounded bg-danger p-2">Access Denied!</h1>
        <div class="container rounded bg-light p-2">
         You have been logged out as you do not have the necessary clearance to access to this page.
        </div>
    </section>
</div>

@endsection