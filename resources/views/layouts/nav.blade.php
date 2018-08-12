<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <a class="navbar-brand" href="#">The School</a>
    @auth
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="/school">School</a>
            </li>

            @if (auth()->user()->role == 'Owner')
            <li class="nav-item">
                <a class="nav-link" href="/admin">Admin</a>
            </li>
            @endif
        </ul>

        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <p class="navbar-text">{{auth()->user()->name}} | {{auth()->user()->role}}</p>
            </li>
        </ul>

        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link btn btn-danger" href="/logout">Logout</a>
            </li>
        </ul>
    </div>
    @endauth
</nav>
