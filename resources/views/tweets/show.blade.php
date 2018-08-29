@extends('layouts.master')

@section('main-sideprofile')
    @include('profiles.sideprofile')
@endsection

@section('userprofilelist')
    @include('profiles.userprofilelist')
@endsection

@section('content')
    <div class="container">
        <p class="p-title h3 text-white d-block d-sm-none">WowBow</p>
    </div>

    @include('layouts.success')
    @include ('layouts.errors')


    <div class="my-3 p-3 bg-white rounded box-shadow">
        <div class="text-center d-flex align-items-center mb-4">
            <a href="/tweets" class="text-dark pull-left h4"><i class="fa fa-angle-left"></i></a>
            <p class="h4 d-inline mx-auto">Wowbow</p>
        </div>

        <div class="media text-muted pt-3">
            <img src="/img/{{ $tweet->user->avatar }}" alt="Avatar" class="content_avatar">

            <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                <div class="d-flex">
                    <p>
                        <strong class="text-dark">{{ $tweet->user->name }}</strong>
                        <small class="pl-2"><i class="fa fa-at"></i>{{ $tweet->user->name }}</small>
                    </p>
                    @if(Auth::user()->id == $tweet->user_id)
                        <div class="dropright d-inline h4 pr-4 ml-auto">
                            <a class="sudonone dropdown-toggle text-secondary" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>

                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="/tweets/{{ $tweet->id }}/edit"><i class="fa fa-edit"></i> Edit</a>
                                <a class="dropdown-item" href="/tweets/{{ $tweet->id }}/delete"><i class="fa fa-trash-o"></i> Delete</a>
                            </div>
                        </div>
                    @endif
                </div>

                <p class="text-justify">{{ $tweet->body }}</p>
                <em class="text-right">{{ $tweet->created_at }}</em>
            </div>
        </div>

        <div class="container d-flex justify-content-around mt-2">
            <a href="#{{ $tweet->id }}" class="text-dark badge font-weight-light mt-2 icon" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="{{ $tweet->id }}"><i class="fa fa-comment-o"></i> {{ count($tweet->comments) }}</a>

            <a href="#" class="text-dark badge font-weight-light mt-2 icon"><i class="fa fa-retweet"></i> </a>

            <form action="/tweets/{{ $tweet->id }}/like" method="POST">
                @csrf
                <button type="submit" class="btn btn-link text-dark">
                    <i class="fa fa-heart-o"></i> {{ count($tweet->likes) }}
                </button>
            </form>

            <a href="#" class="text-dark mt-2 icon"><i class="fa fa-share-square-o"></i></a>
        </div>
        <hr>


        {{-- Add a Comment form --}}
        @include('comments.addcommentform')

        <p class="h4 px-2">Comments</p>

        {{-- Comment to your Bowwow  --}}
        <div class="container my-3">
            <div class="comments my-4">
                @foreach($tweet->comments as $comment)
                    @include('comments.comments')
                @endforeach
            </div>
        </div>

@endsection
