<header>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="#">Fixed navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
            aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ asset('/') }}">Home <span
                            class="sr-only">(current)</span></a>
                </li>


                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Send To View
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ asset('send-to-view/with') }}">With</a>
                        <a class="dropdown-item" href="{{ asset('send-to-view/with-name') }}">With Name</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ asset('send-to-view/compact') }}">Compact</a>
                        <a class="dropdown-item" href="{{ route('upload-file') }}">Upload File</a>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Session / Cookies
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ asset('session/login') }}">Session Login</a>
                        <a class="dropdown-item" href="{{ asset('session/secure') }}">Session Secure Page</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ asset('cookies/login') }}">Cookie Login</a>
                        <a class="dropdown-item" href="{{ asset('cookies/secure') }}">Cookie Secure Page</a>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Database
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ asset('students') }}">Manage Students</a>
                        <a class="dropdown-item" href="{{ asset('employess') }}">Manage Employess</a>
                        <a class="dropdown-item" href="{{ asset('employess-model') }}">Manage Employess Model</a>
                        <a class="dropdown-item" href="{{ route('employess-search-paging-advanced') }}">Employess
                            Search Paging Advanced</a>

                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('users.index') }}">Manage Users</a>

                    </div>
                </li>

            </ul>

            <ul class="navbar-nav navbar-right">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Welcome {{ auth()->user()->name ?? '' }}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a class="dropdown-item" href="{{ asset('change-password') }}">Change Password</a>
                            <a class="dropdown-item" href="{{ asset('profile') }}">Profile</a>

                            <a href='#' class="dropdown-item" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Logout') }}
                            </a>
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</header>
