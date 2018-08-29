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
        <div class="text-center d-flex align-items-center mb-3">
            <a href="{{ url()->previous() }}" class="text-dark pull-left h4"><i class="fa fa-angle-left"></i></a>
            <p class="h4 d-inline mx-auto">Edit Comment</p>
        </div>

        <form action="/tweets/{{ $tweet->id }}/comments/{{ $comment->id }}" method="post">
            <input type="hidden" name="_method" value="PUT" />
            {{ csrf_field() }}

            <div class="d-flex border p-2 my-3">
                <span class="h4 text-muted pull-left">
                    <img src="/img/{{ $comment->user->avatar }}" alt="Avatar" class="content_avatar">
                </span>
                <textarea class="border-0 form-control mb-4" type="text" name="body" placeholder="What's happening?">{{ $comment->body }}</textarea>
            </div>

            <div class="text-right">
                <button type="submit" class="btn btn-primary btn-sm">Save Change</button>
            </div>
        </form>
    </div>
@endsection
