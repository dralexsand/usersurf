<nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">

        <div class="navbar-nav">

            <a class="nav-link active" aria-current="page" href="/">Home</a>

            @for ($i = 1; $i <= 6; $i++)
                @php
                    $page = "page{$i}";
                @endphp
                <a
                    class="nav-link"
                    href="{{ route($page) }}">
                    Page {{ $i }}
                </a>
            @endfor

            <a
                class="nav-link"
                href="{{ route('report') }}">
                Report
            </a>

        </div>
        <ul class="nav navbar-nav navbar-right">

            @guest
                @if (Route::has('login'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                @endif

                @if (Route::has('register-user'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register-user') }}">{{ __('Register') }}</a>
                    </li>
                @endif
            @else
                <li class="nav-item">
                    {{ Auth::user()->name }}
                </li>
                <span style="padding: 10px;"></span>
                <li class="nav-item">
                    <a href="{{ route('signout') }}">
                        {{ __('Logout') }}
                    </a>
                </li>
            @endguest


        </ul>
    </div>
</nav>
