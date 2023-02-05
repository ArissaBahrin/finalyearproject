<div class="">
    @if (Session::has('message'))
        <div class="alert alert-success" role="alert">
            {{ (Session::get('message')) }}
        </div>
    @endif
</div>