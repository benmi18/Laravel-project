<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#">The School</a>
        @auth
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="/school">School</a>
                </li>

                @if (auth()->user()->role != 'sales')
                <li class="nav-item">
                    <a class="nav-link" href="/admin">Admin</a>
                </li>
                @endif
            </ul>

            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <div class="row d-flex justify-content-end">
                        <div class="col col-3 m-0 text-right pr-2">
                            <p class="navbar-text">{{auth()->user()->name}} | {{auth()->user()->role}}</p>
                        </div>
                        <div class="col col-1 m-0 pl-2">
                            <img class="mt-1" src="/storage/images/users/{{auth()->user()->image}}" width="100%">
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