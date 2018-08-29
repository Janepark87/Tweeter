@extends('layouts.master')

@section('main-sideprofile')
    @include('profiles.sideprofile')
@endsection

@section('userprofilelist')
    @include('profiles.userprofilelist')
@endsection

@section('content')
    <div class="container">
        <p class="p-title h3 text-white d-block d-sm-none">HOME</p>
    </div>

    <div class="my-3 p-3 bg-white rounded box-shadow">

    <div class="container">
        <div class="text-center d-flex align-items-center mb-4">
            <a href="{{ url()->previous() }}" class="text-dark pull-left h4"><i class="fa fa-angle-left"></i></a>
            <p class="h4 d-inline mx-auto">Delete Comment ??</p>
        </div>

        <!-- Comment delete form -->
        <form action="/tweets/{{ $tweet->id }}/comments/{{ $comment->id }}" method="post">
            <input type="hidden" name="_method" value="DELETE" />
            {{ csrf_field() }}

            <div class="d-flex border p-2 my-3">
                <span class="h4 text-muted pull-left ">
                    <img src="/img/{{ $comment->user->avatar }}" alt="Avatar" class="content_avatar">
                </span>

                <div class="media-body pb-3 mb-0 small lh-125">
                    <div class="d-flex">
                        <p>
                            <strong>{{ $comment->user->name }} </a></strong>
                            <small class="pl-2"><i class="fa fa-at"></i>{{ $comment->user->name }}</small>
                        </p>
                    </div>
                    <div class="d-flex">
                        <p class="mb-4"><em>Replying to </em><em class="text-primary"><i class="fa fa-at"></i> {{ $tweet->user->name }}</em></p>
                        <em class="ml-auto mr-2">{{ $comment->created_at->diffForHumans() }}</em>
                    </div>
                    <p>{{ $comment->body }}</p>
                </div>
            </div>

            <div class="form-group text-center">
                <button class="btn btn-danger btn-sm" type="submit">Delete Comment</button>
            </div>
        </form>
    </div>
@endsection
