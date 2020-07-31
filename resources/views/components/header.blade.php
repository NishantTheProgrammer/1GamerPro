

<header class="main_menu single_page_menu">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="navbar-brand" href="/"> <img src="img/logo.png" alt="logo" style="max-height: 70px;"> </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="menu_icon"><i class="fas fa-bars"></i></span>
                    </button>

                    <div class="collapse navbar-collapse main-menu-item" id="navbarSupportedContent">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="/">Home</a>
                            </li>
                            @if (Auth::check() && Auth::user()->role == 'admin')
                                <li class="nav-item">
                                <a class="nav-link" href="{{url('/admin')}}">Admin Dashboard</a>
                                </li>
                                
                            @endif
                            @if (Auth::check())
                                <li class="nav-item">
                                <a class="nav-link" href="{{url('/participations')}}">Participations</a>
                                </li>
                                <li class="nav-item">
                                <a class="nav-link" href="{{url('/profile')}}">Profile</a>
                                </li>
                                
                            @endif
                            @if (!auth::check())
                                <li class="nav-item">
                                    <a href="{{ url('login') }}" class="nav-link"" style="border-top-right-radius: 20px; border-bottom-right-radius: 20px"> Login</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('register') }}" class="nav-link"" style="border-top-left-radius: 20px; border-bottom-left-radius: 20px">Sign Up</a>
                                </li>
                                
                            @else
                                <li class="nav-item">
                                    <a class="nav-link"" href="{{ route('logout') }}"
                                                    onclick="event.preventDefault();
                                                                    document.getElementById('logout-form').submit();">
                                                        {{ __('Logout') }}
                                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                            @endif
                            
                        </ul>
                    </div>

                    
                </nav>
            </div>
        </div>
    </div>
</header>