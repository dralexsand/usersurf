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

                <li><a href="{{ route('registration') }}">
                        <span class="glyphicon glyphicon-user"></span>
                        Sign Up
                    </a>
                </li>
                <li>
                    <a href="{{ route('login') }}">
                        <span class="glyphicon glyphicon-log-in"></span>
                        Login
                    </a>
                </li>

            @else

                <li><a href="{{ route('registration') }}">
                        <span class="glyphicon glyphicon-user"></span>
                        Sign Up
                    </a>
                </li>
                <li>
                    <a href="{{ route('login') }}">
                        <span class="glyphicon glyphicon-log-in"></span>
                        Login
                    </a>
                </li>

            @endguest

        </ul>
    </div>
</nav>
