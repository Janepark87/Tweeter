@if(session('comment'))
    <div class="alert alert-success">
        {{ session('comment') }}
        {{-- <a href="/tweets/{{ $comment->tweet->user_id }}" class="pull-right">View</a> --}}
    </div>
@endif
