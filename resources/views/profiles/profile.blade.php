@extends('layouts.master')

@section('sideInprofile')
    <div class="my-3 p-3 bg-white rounded box-shadow">
        <div class="row">
            <img src="/img/saveImg/{{ $user->avatar }}" alt="Avatar" class="avatar m-auto">
        </div>
        <h3 class="text-center">{{  $user->name }}'s Profile</h3>
        <div class="d-flex justify-content-center">
            <p>
                <strong>{{  $user->name }}</strong>
                <small class="pl-2"><i class="fa fa-at"></i>{{  $user->name }}</small>
            </p>
        </div>

        <div class="text-center">
            <p class="text-muted">{{ $user->bio }}</p>
        </div>

        <div class="d-flex justify-content-center">
            <p class="mr-3">Wowbows <span class="badge badge-light text-primary">{{ count($user->tweets) }} </span></p>
            <p>Following <span class="badge badge-light text-primary"> {{ count($user->followers) }}</span></p>
        </div>

        @if(Auth::user()->id == $user->id)
            <div class="row my-3">
                <a href="/profile/{{ Auth::user()->id }}/update" class="btn btn-primary btn-sm m-auto">Edit Profile</a>
            </div>
        @else
            <div class="row my-3">
                @include('follow.follow')
            </div>
        @endif
    </div>
@endsection

{{-- @section('userprofilelist')
    @include('profiles.userprofilelist')
@endsection --}}

@section('content')

    <div class="container">
        <p class="p-title h3 text-white d-block d-sm-none">My Profile</p>
    </div>

    <div class="my-3 p-3 bg-white rounded box-shadow">
        @if(!Auth::guest())
            <div class="text-right">
                <a href="/tweets/create">
                    <span class="text-muted pull-left"><span class="h5 pr-2"><i class="fa fa-user-circle"></i></span> What's happening?</span>
                    <span class="h4"><i class="fa fa-pencil-square-o"></i></span>
                </a>
            </div>
        @endif
    </div>

    @include('layouts.success')

    <div class="my-3 p-3 bg-white rounded box-shadow">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                 <a class="nav-link active" id="home-tab" data-toggle="tab" href="#tweets" role="tab" aria-controls="home" aria-selected="true">Wowbows {{ count($user->tweets) }}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#comments" role="tab" aria-controls="profile" aria-selected="false">Comments {{ count($user->comments)}}</a>
            </li>
            <li class="nav-item">
                 <a class="nav-link" id="contact-tab" data-toggle="tab" href="#following" role="tab" aria-controls="contact" aria-selected="false">Following {{ count($user->followers) }}</a>
            </li>
        </ul>

        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="tweets" role="tabpanel" aria-labelledby="home-tab">
                <div class="container">
                    @forelse($user->tweets as $tweet)
                        @include('tweets.tweets-list')
                    @empty
                        <div class="d-flex flex-column text-center py-3">
                            <p class="h5 pb-2">You haven't Wowbowed yet</p>
                            <p class="text-muted pb-2"><small>When you post a Wowbow, it'll show up here.<small></p>
                            <a href="/tweets/create" class="btn btn-primary btn-sm">Tweet now</a>
                        </div>
                    @endforelse
                    {{-- paginate --}}
                    <div class="d-flex justify-content-center mt-4">
                        {{-- {{  $tweets->links() }} --}}
                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="comments" role="tabpanel" aria-labelledby="profile-tab">
                <div class="container">
                    @forelse($user->comments as $comment)
                        @include('comments.comments')
                    @empty
                        <div class="d-flex flex-column text-center py-3">
                            <p class="h5 pb-2">You haven't Comment yet</p>
                            <p class="text-muted pb-2"><small>When you post a Wowbow, it'll show up here.<small></p>
                            <a href="/tweets/create" class="btn btn-primary btn-sm">Wowbow now</a>
                        </div>
                    @endforelse

                    {{-- paginate --}}
                    <div class="d-flex justify-content-center mt-4">
                    {{-- {{  $user->comments->links()  }} --}}
                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="following" role="tabpanel" aria-labelledby="contact-tab">
                <div class="containers">
                    @forelse ($followingUser as $following)
                        <div class="container  border-bottom border-gray">
                            <div class="d-flex align-items-center justify-content-between mt-2">
                                <div class="d-flex align-items-center p-3">
                                    <a href="/profile/{{  $following->id }}">
                                        <img src="/img/{{ $following->avatar }}" alt="Avatar" class="content_avatar">
                                    </a>
                                    <div class="d-lg-flex">
                                        <span class="font-weight-bold "><a href="/profile/{{  $following->id }}" class="text-dark">{{ $following->name }}</a></span>
                                        <small class="d-block pl-1 pt-1"><i class="fa fa-at"></i>{{ $following->name }}</small>
                                    </div>
                                </div>
                                <div class="justify-content-end">
                                    <a href="/profile/{{  $following->id }}" class="btn btn-primary btn-xs">View</a>
                                </div>
                            </div>

                            {{-- follow & unfollow  --}}
                            {{-- <div class="text-right border-bottom border-gray py-2">
                                @include('follow.unfollow')
                            </div> --}}
                        </div>
                    @empty
                        <div class="d-flex flex-column text-center py-4">
                            <p class="h5 pb-2">You haven't Followed yet</p>
                            <p class="text-muted pb-2"><small>When you follow someone, it'll show up here.<small></p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection
