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

    @include ('layouts.errors')

    <div class="my-3 p-3 bg-white rounded box-shadow">
        <div class="text-center d-flex align-items-center mb-4">
            <a href="/tweets" class="text-dark pull-left h4"><i class="fa fa-angle-left"></i></a>
            <p class="h4 d-inline mx-auto">New Wowbow</p>
        </div>

        <form action="/tweets" method="post" class="mb-4">
            {{ csrf_field() }}
            <div class="d-flex border p-2 my-3">
                <span class="h3 text-muted pull-left ">
                    <img src="/img/{{ Auth::user()->avatar }}" alt="Avatar" class="content_avatar">
                </span>
                <textarea class="border-0 form-control " type="text" name="body" placeholder="What's happening?"></textarea>
            </div>

            <div class="text-right">
                <button type="submit" class="btn btn-primary btn-sm" name="button">Save</button>
            </div>
        </form>
    </div>
@endsection
