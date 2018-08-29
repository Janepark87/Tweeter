@if(session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
        {{-- <a href="/tweets/{{ $tweet->id }}" class="pull-right">View</a> --}}
    </div>
@endif
