<header class="navbar navbar-dark sticky-top bg-primary flex-md-nowrap p-0 shadow">
    <div>
        <img src="/img/logo.png" width="60" height="60"><a class="text-white fw-semibold fs-4 text-decoration-none">BP3MI</a>
    </div>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="dropdown px-5 py-2">
        <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            <span class="badge d-flex align-items-center p-1 pe-2 text-primary-emphasis bg-primary-subtle border border-primary-subtle rounded-pill">
                <svg class="me-1" xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                </svg>
                <strong class="text-uppercase"> {{ auth()->user()->username }} </strong>
            </span>
        </a>
        <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
            <li><a class="dropdown-item btn btn-primary" href="/dashboard/viewakun">Profile</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><form action="/logout" method="post">
                @csrf
            <li><button type="submit" class="dropdown-item container bg-danger"><i class="bi bi-door-open-fill"></i> Logout</button></li>
            </form></li>
        </ul>
    </div>
    </header>