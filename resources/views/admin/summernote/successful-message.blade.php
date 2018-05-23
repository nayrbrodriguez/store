    @if(session()->has('message'))
    <div class="alert alert-info alert-dismissable">
        {{ session()->get('message') }}
    </div>
@endif

