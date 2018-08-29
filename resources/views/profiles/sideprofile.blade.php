@if(!Auth::guest())
    <div class="d-none d-md-block my-3 p-3 bg-white rounded box-shadow">
        <div class="row">
            <img src="/img/{{ Auth::user()->avatar }}" alt="Avatar" class="avatar m-auto">
        </div>
        <h4 class="text-center">{{ Auth::user()->name }}'s Profile</h4>
        <div class="d-flex justify-content-center">
            <p>
                <strong>{{ Auth::user()->name }}</strong>
                <small class="pl-2"><i class="fa fa-at"></i>{{ Auth::user()->name }}</small>
            </p>
        </div>

        <div class="text-center">
            <p class="text-muted">{{ Auth::user()->bio }}</p>
        </div>

        <div class="d-flex justify-content-center">
            <p class="mr-3">Wowbows <span class="badge badge-light text-primary"> {{ $tweetsCount }}</span></p>
            <p>Following<span class="badge badge-light text-primary"> {{ $followingCount }}</span></p>
        </div>
    </div>
@else
    {{-- 너가 게스트로 온거라면 아래를 보여줘라~! --}}
    <div class="d-none d-md-block d-flex flex-column text-center my-3 p-3 bg-white rounded box-shadow">
        <h4 class="text-center text-primary">Oh, Have an account ?</h4>
        <p class="text-muted p-2">Let's start now! You are ready to go!!</p>
        <div class="d-inline-flex justify-content-center mt-2">
            <a href="/login" class="btn btn-primary btn-sm">Log In</a>
        </div>
    </div>
@endif
