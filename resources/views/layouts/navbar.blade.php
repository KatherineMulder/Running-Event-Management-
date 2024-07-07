<style>
    .navbar-nav .nav-item.active {
        background-color: #556B2F;
    }

    .navbar-nav .nav-item.active .nav-link {
        color: #ffffff !important;
    }
</style>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light justify-content-center">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse bg-success bg-gradient" id="navbarNav">
        <ul class="navbar-nav mx-auto"> 
            <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
                <a class="nav-link fs-2 fw-bold px-4 text-white" href="{{ url('/') }}">HOME</a>
            </li>
            <li class="nav-item {{ Request::is('events*') ? 'active' : '' }}">
                <a class="nav-link fs-2 fw-bold px-4 text-white" href="{{ route('events.index') }}">EVENTS</a>
            </li>
            <li class="nav-item {{ Request::is('forum*') ? 'active' : '' }}">
                <a class="nav-link fs-2 fw-bold px-4 text-white" href="{{ route('forum.index') }}">DISCUSSION</a>
            </li>
            @guest
                <li class="nav-item {{ Request::is('auth*') ? 'active' : '' }}">
                    <a class="nav-link fs-2 fw-bold px-4 text-white" href="{{ route('auth') }}">LOGIN</a>
                </li>
            @endguest
            @auth
                <li class="nav-item {{ Request::is('account*') ? 'active' : '' }}">
                    <a class="nav-link fs-2 fw-bold px-4 text-white" href="{{ route('account') }}">ACCOUNT</a>
                </li>
                <li class="nav-item {{ Request::is('bookings/summary') ? 'active' : '' }}">
                    <a class="nav-link fs-2 fw-bold px-4 text-white" href="{{ route('bookings.summary') }}">MY BOOKINGS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fs-2 fw-bold px-4 text-white" href="{{ route('logout') }}" 
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        LOGOUT
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            @endauth
        </ul>
    </div>
</nav>
