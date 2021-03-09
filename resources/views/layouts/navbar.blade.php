<nav class="navbar navbar-expand-lg navbar-dark"
    style="position: sticky; top: 0; background-color: rgba(0,0,0,0.6); z-index:10">
    <a class="navbar-brand" href="/">Menu</a>
    <button class="navbar-toggler" 
            type="button" 
            data-toggle="collapse" 
            data-target="#navbarSupportedContent" 
            aria-controls="navbarSupportedContent" 
            aria-expanded="false" 
            aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link text-white text-uppercase" href="/">Главная</a>
        </li>

        <li class="nav-item">
          <a class="nav-link text-white text-uppercase sale" href="/sale">%Акции</a>
        </li>

        <li class="nav-item">
          <a class="nav-link text-white text-uppercase" href="/news">Новости</a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link text-white text-uppercase" href="/reviews">Отзывы</a>
        </li>

        <li class="nav-item">
          <a class="nav-link text-white text-uppercase" href="/contacts">Контакты</a>
        </li>
      </ul>

      <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" 
               type="search" 
               placeholder="Search" 
               aria-label="Search">
        <button class="btn btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
      </form>

      <ul class="navbar-nav ml-auto">
        <!-- Authentication Links -->
        <li class="nav-item">
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#cartModal">
            Cart
          </button>
        </li>

        @role('admin')
          <li class="nav-item">
            <a class="nav-link" href="/admin">Admin panel</a>
          </li>
        @endrole



        {{-- {{ dump(Gate::allows('manage-categories')) }} --}}

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
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }} 
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
        @endguest
    </ul>
    </div>
</nav>