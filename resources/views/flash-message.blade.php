@if (Session::has('success'))
    <div class="alert alert-success alert-block">
        <strong>{{ Session::get('success') }}</strong>
    </div>
@endif


@if (Session::has('error'))
    <div class="alert alert-danger alert-block">
        <strong>{{ Session::get('error') }}</strong>
    </div>
@endif


@if (Session::has('warning'))
    <div class="alert alert-warning alert-block">
        <strong>{{ Session::get('warning') }}</strong>
    </div>
@endif
