<ul class="list-group list-unstyled">
    <li>
        <div class="media text-muted pt-3">
            <img src="/img/{{  $reply->user->avatar }}" alt="Avatar" class="content_avatar">

            <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                <div class="d-flex">
                    <p>
                        <strong>{{ $reply->user->name }} </a></strong>
                        <small class="pl-2"><i class="fa fa-at"></i>{{ $reply->user->name }}</small>

                        <div class="d-inline ml-auto">
                            @if(!Auth::guest())
                                @if(Auth::user()->id == $reply->user_id)
                                    <div class="dropright d-inline h4 pr-3 ml-auto">
                                        <a class="sudonone dropdown-toggle text-secondary" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>

                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                            <a class="dropdown-item" href="/tweets/{{ $tweet->id }}/comments/{{$comment->id}}/edit"><i class="fa fa-edit"></i> Edit</a>
                                            <a class="dropdown-item" href="/tweets/{{$tweet->id or $comment->tweet->id}}/comments/{{$comment->id}}/delete"><i class="fa fa-trash-o"></i> Delete</a>
                                        </div>
                                    </div>
                                @endif
                            @endif
                        </div>
                    </p>
                </div>
                <div class="d-flex">
                    <p><em>Replying to <a href="#"></em><em class="text-primary"><i class="fa fa-at"></i>{{ $comment->user->name }}</em></p></a>
                    <em class="ml-auto">{{ $reply->created_at->diffForHumans() }}</em>
                </div>

                <p>{{ $reply->body }}</p>

                <div class="container d-flex justify-content-around mt-2">
                    <a href="#" class="text-dark badge font-weight-light"><i class="fa fa-retweet"></i></a>
                    <a href="#" class="text-dark badge font-weight-light"><i class="fa fa-heart-o"></i></a>
                    <a href="#" class="text-dark"><i class="fa fa-share-square-o"></i></a>
                </div>
            </div>
        </div>
    </li>
</ul>
