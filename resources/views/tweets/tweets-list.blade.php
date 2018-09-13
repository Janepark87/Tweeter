<div class="media text-muted pt-3">
    <a href="/profile/{{ $tweet->user->id }}">
        <img src="/img/saveImg/{{ $tweet->user->avatar }}" alt="Avatar" class="content_avatar">
    </a>
    <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
        <div class="d-flex">
            <p>
                <strong><a href="{{ route('tweets.show', $tweet->id) }}" class="text-dark">{{ $tweet->user->name }}</a></strong>
                <small class="pl-2"><i class="fa fa-at"></i>{{ $tweet->user->name }}</small>
            </p>

            <div class="droplefe d-inline h4 pr-4 ml-auto">
                <a class="sudonone dropdown-toggle text-secondary" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa  fa-ellipsis-v"></i></a>

                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="/tweets/{{ $tweet->id }}/edit"><i class="fa fa-edit"></i>  Edit</a>
                    <a class="dropdown-item" href="/tweets/{{ $tweet->id }}/delete"><i class="fa fa-trash-o"></i> Delete</a>
                </div>
            </div>
        </div>

        <a href="{{ route('tweets.show', $tweet->id) }}" class="text-dark"><p class="text-justify">{{ str_limit($tweet->body, 140) }}</p></a>
        <em class="text-right">{{ $tweet->created_at }}</em>
    </div>
</div>

{{-- Icons  --}}
<div class="container d-flex justify-content-around mt-2">
    <a href="#{{ $tweet->id }}" class="text-dark badge font-weight-light mt-2 icon" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="{{ $tweet->id  }}"><i class="fa fa-comment-o"> {{ count($tweet->comments) }}</i></a>

    <a href="#" class="text-muted badge font-weight-light mt-2 icon"><i class="fa fa-retweet"></i></a>

    <form action="/tweets/{{  $tweet->id }}/like" method="POST">
        @csrf
        <button type="submit" class="btn btn-link text-dark icon">
            <i class="fa fa-heart-o"></i> {{ count($tweet->likes) }}
        </button>
    </form>

    <a href="#" class="text-muted mt-2 icon"><i class="fa fa-share-square-o"></i></a>
</div>
<hr>
@include('comments.addcommentform')
