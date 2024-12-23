<header>
  <nav class="{{ !auth()->check() ? 'bg-cm-purple-1' : (auth()->user()->role_id == 4 ? 'bg-cm-purple-1' : 'bg-cm-blue-8') }}">
    <div class="flex items-center justify-between h-12 mx-5">
      <!-- Logo y Nombre -->
      <a href="{{ route('default_home') }}" class="flex items-center">
        <img class="w-9 h-9" src="{{ asset('images/logo.png') }}" alt="">
        <span class="text-lg ml-3 font-bold font-sans text-white hover:text-cm-purple-9">Belikekis Components</span>
    </a>


      <div class="flex items-center text-lg text-white space-x-5">
        @auth 
          @if(auth()->user()->role_id == 4)
          <!-- Campo de búsqueda -->
          <div class="relative text-gray-300 focus-within:text-white">
            <i class="fa-solid fa-magnifying-glass absolute left-3 top-1/2 transform -translate-y-1/2 text-white text-base"></i>
            <input
                type="search"
                class="w-64 pl-10 py-1 rounded-2xl text-sm border border-black bg-cm-purple-4 focus:outline-none"
                placeholder="Buscar..."
            />
          </div>
          @endif

          @if(auth()->user()->role_id == 4)
          <!-- Contenedor principal del dropdown -->
          <div class="relative inline-block">
            <!-- Botón del Dropdown -->
            <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown" type="button" class="hover:text-cm-purple-9">
              <i class="fa-solid fa-chevron-down" id="chevronDownIcon"></i>
              <i class="fa-solid fa-chevron-up hidden" id="chevronUpIcon"></i>
            </button>

            <!-- Dropdown Menu -->
            <div id="dropdown" class="z-10 hidden bg-cm-gray-6 divide-y rounded-b-lg shadow w-44 absolute top-full left-0 mt-2 py-2">
              <ul class="text-base text-white" aria-labelledby="dropdownDefaultButton">
                <li class="flex items-center hover:bg-gray-600">
                  <a href="{{ route('client_edit') }}" class="block px-3 py-2 text-dark">
                    <i class="fa-solid fa-user text-cm-purple-3 mr-2"></i>
                    <span>Perfil</span>
                  </a>
                </li>
                <li class="flex items-center hover:bg-gray-600">
                  <a href="{{ route('client_purchases') }}" class="block px-3 py-2 text-dark">
                    <i class="fa-brands fa-shopify text-cm-purple-3 mr-2"></i>
                    <span>Mis compras</span>
                  </a>
                </li>
                <li class="flex items-center hover:bg-gray-600">
                  <a href="{{ route('client_bills') }}" class="block px-3 py-2 text-dark">
                    <i class="fa-solid fa-file-invoice-dollar text-cm-purple-3 mr-2"></i>
                    <span>Mis facturas</span>
                  </a>
                </li>
                <li class="flex items-center hover:bg-gray-600">
                  <a href="#" class="block px-3 py-2 text-dark">
                    <i class="fa-solid fa-location-dot text-cm-purple-3 mr-2"></i>
                    <span>Mis direcciones</span>
                  </a>
                </li>
                <li class="flex items-center hover:bg-gray-600">
                  <a href="#" class="block px-3 py-2 text-dark">
                    <i class="fa-solid fa-user text-cm-purple-3 mr-2"></i>
                    <span>Mis facturas</span>
                  </a>
                </li>
                <li class="flex items-center hover:bg-gray-600">
                  <a href="#" class="block px-3 py-2 text-dark">
                    <i class="fa-solid fa-star text-cm-purple-3 mr-2"></i>
                    <span>Mis reseñas</span>
                  </a>
                </li>
                <li class="flex items-center hover:bg-gray-600">
                  <a href="#" class="block px-3 py-2 text-dark">
                    <i class="fa-solid fa-rectangle-list text-cm-purple-3 mr-2"></i>
                    <span>Lista de deseos</span>
                  </a>
                </li>
              </ul>
            </div>

          </div>
          @endif

          <!--Usuario -->
          <div class="flex items-center ml-4 text-base">
            @php
                $user = Auth::user(); // Asegúrate de obtener el usuario autenticado
                $imageData = $user->picture_profile ? 'data:image/jpeg;base64,'.base64_encode($user->picture_profile) : asset('images/default-user-profile.jpg');
            @endphp
            <img class="h-8 w-8 rounded-full" src="{{ $imageData }}" alt="{{ $user->username }}">
            <span class="ml-3">{{ $user->username }}</span>
          </div>

          <!-- Campana de notificaciones -->
          <button type="button" class="hover:text-cm-purple-9">
            <i class="fa-solid fa-bell"></i>
          </button>

          @if(auth()->user()->role_id == 4)
          <!-- Botón de carrito de compras blanco, sin fondo -->
          <button type="button" class="hover:text-cm-purple-9">
            <i class="fa-solid fa-cart-shopping"></i>
          </button>
          @endif
          
          <!-- Botón logout -->
          <a href="{{route('to_logout')}}" class="hover:text-cm-purple-9">
            <i class="fa-solid fa-right-from-bracket"></i>
          </a>
        @else
          <!-- Botón login -->
          <a href="{{route('login')}}" class="hover:text-cm-purple-9">
            <i class="fa-solid fa-right-to-bracket"></i>
          </a>
        @endauth



      </div>
    </div>
  </nav>
</header>
