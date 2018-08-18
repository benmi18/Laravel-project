<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="container">
        {{-- Logo --}}
        <a class="navbar-brand" href="/">The School</a>
        @auth
        <div class="collapse navbar-collapse" id="navbarCollapse">
            {{-- Nav Links --}}
            <ul class="navbar-nav mr-auto ml-5">
                {{-- School --}}
                <li class="nav-item active">
                    <a class="nav-link" href="/school">School</a>
                </li>

                {{-- Admin --}}
                @if (auth()->user()->role != 'sales')
                <li class="nav-item">
                    <a class="nav-link" href="/admin">Admin</a>
                </li>
                @endif
            </ul>

            {{-- Loged In Info --}}
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <div class="row nav-user d-flex justify-content-end">
                        <div class="col m-0 text-right p-0">
                            <p class="navbar-text">{{auth()->user()->name}} | {{auth()->user()->role}}</p>
                        </div>
                        {{-- Image --}}
                        <div class="col col-2 m-0">
                            <img class="mt-1 nav-user-image" src="/storage/images/users/{{auth()->user()->image}}">
                        </div>
                    </div>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link btn btn-danger" href="/logout">Logout</a>
                </li>
            </ul>
        </div>
        @endauth
    </div>
</nav>