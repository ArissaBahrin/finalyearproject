<div class="container d-flex">
    @if (Session::has('message'))
        <div class="alert alert-success" role="alert">
            {{ (Session::get('message')) }}
        </div>
    @endif
</div>