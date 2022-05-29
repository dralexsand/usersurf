<nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
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

                @include('lara.components.login')

            </div>
        </div>
    </div>
</nav>
