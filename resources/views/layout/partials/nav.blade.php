<nav class="navbar navbar-expand-lg navbar-light bg-light justify-content-between mx-5 bg-info">
  <a class="navbar-brand">GIPE 2022</a>
  <div class="text-end" id="navbarNav">
      <ul class="navbar-nav">
          <!-- Authentication Links -->
          @guest
              @if (Route::has('login'))
                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                  </li>
              @endif

              @if (Route::has('register'))
                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                  </li>
              @endif
          @else
              <li class="nav-item dropdown">
                  <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                      aria-haspopup="true" aria-expanded="false" v-pre>
                      {{ Auth::user()->name }}
                  </a>
              </li>
              
              <li class="nav-item active">
                  <a class="nav-link" href='/'>Home</a>
              </li>
              <li class="nav-item active">
                  <a class="nav-link" href="#">Contact</a>
              </li>
              <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown"
                      aria-haspopup="true" aria-expanded="true">
                      Blog Posts
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                      <a class="dropdown-item" href="{{ route('blogposts.index') }}">List of Blogs</a>
                      <a class="dropdown-item" href="{{ route('blogposts.create') }}">New Blog</a>
                  </div>
              </li>
              <li class="nav-item active">
                  <a class="nav-link" href="{{ route('comments.create') }}">Create comment</a>
              </li>
              <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown"
                      aria-haspopup="true" aria-expanded="true">
                      Authors
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                      <a class="dropdown-item" href="{{ route('authors.index') }}">List of Authors</a>
                      <a class="dropdown-item" href="{{ route('authors.create') }}">New Author</a>
                  </div>
              </li>
              <li>
                  {{-- <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown"> --}}
                      <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                          {{ __('Logout') }}
                      </a>

                      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                          @csrf
                      </form>
                  {{-- </div> --}}
              </li>
          @endguest
      </ul>
  </div>
</nav>
