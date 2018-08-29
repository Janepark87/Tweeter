<header>
    <nav class="navbar fixed-top bg-bulldog navbar-dark navbar-expand-md">
        <div class="container">
            @guest
                <a href="/"><img src="/img/b-w.png" alt="Tweeter" width="50" height="50"></a>
            @else
                <a href="/tweets"><img src="/img/b-w.png" alt="Tweeter" width="50" height="50"></a>
            @endguest
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="/login">{{ __('Login') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="/register">{{ __('Register') }}</a>
                        </li>
                    @else
                        <li class="nav-item active" >
                            <a class="nav-link" href="/tweets">Home</a>
                        </li>
                        <li class="nav-item pr-3">
                            <a class="nav-link" href="/profile/{{ Auth::user()->id }}">My profile</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle sudonone " href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <img src="/img/{{ Auth::user()->avatar }}" alt="Avatar" class="nav_avatar d-none d-md-block">
                                <span class="d-block d-md-none" >{{ Auth::user()->name }} <i class="fa fa-caret-down"></i></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <p class="dropdown-item d-none d-md-block"><a href="/profile/{{ Auth::user()->id }}"><i class="fa fa-user"></i> {{ Auth::user()->name }}</p></a>
                                <a class="dropdown-item" href="/logout"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();"><i class="fa fa-sign-out"></i>
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="/logout" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
      </div>
    </nav>
</header>
