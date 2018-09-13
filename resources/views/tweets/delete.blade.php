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
                <a href="/tweets/{{ $tweet->id }}" class="text-dark pull-left h4"><i class="fa fa-angle-left"></i></a>
                <p class="h4 d-inline mx-auto">Delete Wowbow ??</p>
            </div>

            <form class="" action="/tweets/{{ $tweet->id }}" method="post">
                <input type="hidden" name="_method" value="DELETE" />
                {{ csrf_field() }}
                <div class="d-flex border p-2 my-3">
                    <span class="h4 text-muted pull-left ">
                        <img src="/img/saveImg/{{ Auth::user()->avatar }}" alt="Avatar" class="content_avatar">
                    </span>

                    <div class="media-body pb-3 mb-0 small lh-125">
                        <p>
                            <strong><a href="/tweets/{{ $tweet->id }}" class="text-dark">{{ $tweet->user->name }} </a></strong>
                            <small class="pl-2"><i class="fa fa-at"></i>{{ $tweet->user->name }}</small>

                        </p>
                        <p class="py-3">{{ $tweet->body }}</p>
                        <em class="py-3">{{ $tweet->created_at }}</em>
                    </div>
                </div>

                <div class="form-grop text-center">
                    <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                </div>
            </form>
        </div>
    </div>
@endsection
