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
        <div class="text-right">
            <a href="/tweets/create">
                <span class="text-muted pull-left"><span class="h5 pr-2"><i class="fa fa-user-circle"></i></span> What's happening?</span>
                <span class="h4"><i class="fa fa-pencil-square-o"></i></span>
            </a>
        </div>
    </div>

    @include('layouts.success')
    @include ('layouts.errors')
    @include ('layouts.msg_comment')

    <div class="my-3 p-3 bg-white rounded box-shadow">
        {{-- 만약에 트위트가 한개도 없다면, --}}
        @if(!Auth::guest())
            @unless (count($tweets) > 0)
                <div class="d-flex flex-column text-center py-3">
                    <p class="h5 pb-2">You haven't wowbowed yet</p>
                    <p class="text-muted pb-2"><small>When you post a Wowbow, it'll show up here.<small></p>
                    <a href="/tweets/create" class="btn btn-primary btn-sm">Wowbow now</a>
                </div>
            @endunless
        @endif

        @if(!Auth::guest())
            @foreach ($tweets as $tweet)
                @include('tweets.tweets-list')
            @endforeach
            {{-- paginate --}}
            <div class="d-flex justify-content-center mt-4">
                {{ $tweets->appends($_GET)->links() }}
            </div>

        @else
            <div class="d-flex flex-column text-center py-3">
                <span class="h4 pb-2">What? No WowBow yet ?</span>
                <span class="text-muted pb-2">Sign up now to get your own personalized timeline!</span>
                <span class="text-muted pb-2">Hear what dogs are talking about.</span>
                <span class="h5 text-dark mt-3">Join the conversation!</span>
                <div class="d-inline-flex justify-content-center mt-3">
                    <a href="/register" class="btn btn-primary btn-sm">Sing up</a>
                </div>
            </div>

        @endif
    </div>
@endsection
