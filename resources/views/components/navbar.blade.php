<nav class="navbar navbar-expand-lg bg-navbar">
    <!-- Container wrapper -->
    <div class="container">
        <!-- Toggle button -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars text-icewhite"></i>
        </button>
        
        <!-- Collapsible wrapper -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Navbar brand -->
            <a class="navbar-brand mt-2 my-auto" href="{{Route('homepage')}}"><h3>Presto.it</h3>
                {{-- <img src="storage/images/logo_presto.svg" class="img-fluid logo-sito" alt="logo_presto.it">     --}}
            <!-- <h3>Presto.it</h3> -->
            </a>
            <!-- Left links -->
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                {{-- @auth
                <li class="nav-item">
                    <a class="nav-link text-icewhite" href="{{Route('announcements.create')}}">Crea Annuncio</a>
                </li>
                @endif --}}
                {{-- <li class="nav-item">
                    <a class="nav-link text-icewhite" href="{{Route('announcements.index')}}">Annunci</a>
                </li> --}}
                <li>
                    <div class="dropdown">
                        <a class="nav-link text-icewhite dropdown-toggle" href="#" id="categoriesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ __('ui.categories') }} 
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="categoriesDropdown">
                            @foreach ($categories as $category)
                            <li>
                                <a class="dropdown-item" href="{{route('categoryShow',compact('category'))}}"><x-CategoryName :category="$category"/></a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </li>

                    <form action="{{route('announcements.search')}}" method="GET" class="d-flex input-group w-auto">
                        <input
                        name="searched"
                        type="search"
                        class="form-control"
                        placeholder="{{ __('ui.search') }}"
                        aria-label="Search"
                        aria-describedby="search-addon"
                        />
                        <span class="input-group-text" id="search-addon">
                            <a href="" type="submit">
                                <i class="fas fa-search text-darkgreen" type="submit"></i>
                            </a>
                        </span>
                    </form>

                    {{-- <form action="{{route('announcements.search')}}" method="GET" class="d-flex">
                        <input name="searched" class="form-control me-2" type="search" placeholder="Search"
                        aria-label="Search">
                        
                        <button class="btn btn-custom-primary" type="submit">Cerca</button>
                    </form> --}}
            </ul>
            <!-- Left links -->
        </div>
        <!-- Collapsible wrapper -->
        
        <!-- Right elements -->
        <div id="profile-menu" class="d-flex align-items-center">
            <div class="dropdown">
                <a class="nav-link text-icewhite dropdown-toggle" href="#" id="categoriesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa-solid fa-globe text-icewhite"></i> 
                </a>
                <ul class="dropdown-menu bg-icewhite" aria-labelledby="categoriesDropdown">
                    <li class="nav-item">
                        <div class="d-flex align-items-baseline">
                            <x-_locale lang='it' nation='it'/><p class="">Italiano</p>
                        </div>
                    </li>
                    <li class="nav-item">
                        <div class="d-flex align-items-baseline">
                            <x-_locale lang='en' nation='gb'/><p>English</p>
                        </div>
                    </li>
                    <li class="nav-item">
                        <div class="d-flex align-items-baseline">
                            <x-_locale lang='es' nation='es'/><p>Español</p>
                        </div>
                    </li>
                </ul>
            </div>
            <!-- Icon -->
            <a class="text-reset me-3" href="#" data-bs-toggle="modal" data-bs-target="#ModalContattaci">
                <i class="fa-solid fa-comment  text-icewhite"></i>
                {{-- <i class="cart fas fa-shopping-cart"></i> --}}
            </a>
            @auth 
            <div class="dropdown">
                <a class="dropdown-toggle d-flex align-items-center hidden-arrow" href="#" id="navbarDropdownMenuAvatar" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa-solid fa-user x-1 text-icewhite"></i>
                    {{-- <img src="https://picsum.photos/24" class="rounded-circle" height="25" alt="profile" loading="lazy"/> --}}
                </a>
                <ul class="dropdown-menu dropdown-end" aria-labelledby="navbarDropdownMenuAvatar">
                    <li>
                        <p class="dropdown-item" href="">{{__('ui.welcome')}} {{Auth::user()->name}}</p>
                    </li>
                    @if(Auth::user()->is_revisor)
                    <li class="nav-item">
                        <a class="dropdown-item" href="{{route('revisor.index')}}">{{__('ui.revisorZone')}}</a>
                        <span class="position-absolute top-0 start-100 translate-middle badge roundedpill bg-danger">
                            {{App\Models\Announcement::toBeRevisionedCount()}}
                            <p class="visually-hidden">{{__('ui.revisorZone')}}</p>
                        </span>
                    </li>
                    @endif
                    <li>
                        <a class="dropdown-item" href="{{Route('announcements.create')}}">{{__('ui.insertAd')}}</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="" onclick="event.preventDefault(); document.querySelector('#form-logout').submit();">{{__('ui.logout')}}</a>
                        <form id="form-logout" action="{{route('logout')}}" method="post" class="d-none">@csrf</form>
                    </li>
                </ul>
            </div>
            @else
            <div class="dropdown">
                <a class="dropdown-toggle d-flex align-items-center hidden-arrow" href="#" id="navbarDropdownMenuAvatar" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa-solid fa-user x-1 text-icewhite"></i>
                    {{-- <img src="https://picsum.photos/24" class="rounded-circle" height="25" alt="profile" loading="lazy"/> --}}
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuAvatar">
                    <li>
                        <a class="dropdown-item" href="{{route('login')}}">{{__('ui.login')}}</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{Route('register')}}">{{__('ui.register')}}</a>
                    </li>
                </ul>
            </div>
            @endauth

            {{-- @if(Auth::user()->is_revisor)
            <div class="dropdown">
                <a class="dropdown-toggle d-flex align-items-center hidden-arrow" href="#" id="navbarDropdownMenuAvatar" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="https://picsum.photos/24" class="rounded-circle" height="25" alt="profile" loading="lazy"/>
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuAvatar">
                    <li>
                        <a class="dropdown-item" href="{{route('login')}}">Log in</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{Route('register')}}">Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-icewhite" href="">Zona Revisore</a>
                        <span class="position-absolute top-0 start-100 translate-middle badge roundedpill bg-danger">
                            {{App\Models\Announcement::toBeRevisionedCount()}}
                            <span class="visually-hidden">Messaggi non letti</span>
                        </span>
                    </li>
                </ul>
            </div>
            @endif --}}
            
        </div>
        <!-- Right elements -->
    </div>
    <!-- Container wrapper -->
</nav>
<!-- Navbar -->