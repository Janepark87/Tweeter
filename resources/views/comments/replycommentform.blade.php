<div class="container">
    <div class="collapse bg-white" id="{{ $comment->id }}">
        <form action="{{ route('replycomment.store', $comment->id) }}" method="post">
            {{ csrf_field() }}

            <div class="form-group d-flex border-0 my-1">
                <span class="comment-avatar text-muted mt-1 pull-left "><i class="fa fa-user-circle"></i></span>

                <textarea name="body" placeholder="Comment your reply?" class="replytextarea form-control bg-light border-rounded border-0 m-2" rows="1" required></textarea>

                <button type="submit" class="replybtn btn-sm border-0">Reply</button>
            </div>
        </form>

        @include('layouts.errors')

    </div>
</div>
