<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container">
    <a class="navbar-brand fs-4 fst-italic" href="/"><span class="fw-bold">Kopi</span> Bubuk.</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item fs-5">
          <a class="nav-link {{ Request::is('products*') ? 'active' : '' }}"
            href="{{ route('client.product.index') }}">Produk</a>
        </li>
        <li class="nav-item fs-5 ms-5">
          <a class="nav-link" href="#">Tentang Kami</a>
        </li>
        <li class="nav-item fs-5 ms-5 dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
            aria-expanded="false">
            <i class="bi bi-person-fill"></i>
          </a>
          @if (Route::has('login'))
            <ul class="dropdown-menu">
              @auth
                <li><a class="dropdown-item" href="#">Profile</a></li>
                <li><a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                  </form>
                </li>
              @else
                <li><a class="dropdown-item" href="{{ route('login') }}">Login</a></li>

                @if (Route::has('register'))
                  <li><a class="dropdown-item" href="{{ route('register') }}">Register</a></li>
                @endauth
              @endif
            </ul>
          @endif
        </li>

        @if (Route::has('login'))
          @auth
            <li class="nav-item fs-5">
              <a class="nav-link {{ Request::is('keranjang-saya*') ? 'active' : '' }}" href="#"><i
                  class="bi bi-cart3"></i></a>
            </li>
          @endauth
        @endif

      </ul>
    </div>
  </div>
</nav>
