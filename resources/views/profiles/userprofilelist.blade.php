@if(!Auth::guest())
    @section('userprofilelist')
        <div class="d-none d-md-block p-3 bg-white rounded box-shadow">
            <h4 class="text-center p-2">Who to follow</h4>
            @foreach($users as $user)
                <div class="container">
                    <div class="d-flex align-items-center justify-content-between mt-2">
                        <div class="d-flex align-items-center">
                            <a href="/profile/{{ $user->id }}">
                                <img src="/img/{{ $user->avatar }}" alt="Avatar" class="content_avatar">
                            </a>
                            <div class="d-lg-flex">
                                <span class="font-weight-bold "><a href="{{ route('tweets.show', $user->id) }}" class="text-dark">{{ $user->name }}</a></span>
                                <small class="d-block pl-1 pt-1"><i class="fa fa-at"></i>{{ $user->name }}</small>
                            </div>
                        </div>
                    </div>

                    <div class="text-right border-bottom border-gray py-2">
                        @include('follow.follow')
                    </div>
                </div>
            @endforeach
            <div class="d-flex justify-content-center mt-4">
                {{ $users->appends($_GET)->links() }}
            </div>
        </div>
    @endsection
@endif
