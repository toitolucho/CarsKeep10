<div class="sidebar" data-color="orange" data-background-color="white" data-image="{{ asset('material') }}/img/sidebar-1.jpg">
  <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
  <div class="logo">
    <a href="https://creative-tim.com/" class="simple-text logo-normal">
      {{ __('Creative Tim') }}
    </a>
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">
      <li class="nav-item{{ $activePage == 'dashboard' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('home') }}">
          <i class="material-icons">dashboard</i>
            <p>{{ __('Sistema CarsKeep') }}</p>
        </a>
      </li>
      <li class="nav-item {{ ($activePage == 'Clientes' || $activePage == 'Categorias') ? ' active' : '' }}">
{{--        <a class="nav-link" data-toggle="collapse" href="#laravelExample" aria-expanded="true">--}}
        <a class="nav-link collapsed" data-toggle="collapse" href="#laravelExample" aria-expanded="false">
            <i class="material-icons">settings</i>
          <p>{{ __('Conf. Insumos') }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse show" id="laravelExample">
          <ul class="nav">
              <li class="nav-item{{ $activePage == 'Clientes' ? ' active' : '' }}">
                  <a class="nav-link" href="{{ route('clientes.index') }}">
                      <i class="material-icons">face</i>
                      <p>{{ __('Clientes') }}</p>
                  </a>
              </li>

              <li class="nav-item{{ $activePage == 'Categorias' ? ' active' : '' }}">
                  <a class="nav-link" href="{{ route('categorias.index') }}">
                      <i class="material-icons">category</i>
                      <p>{{ __('Categorias') }}</p>
                  </a>
              </li>
          </ul>
        </div>
      </li>
      <li class="nav-item{{ $activePage == 'table' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('table') }}">
          <i class="material-icons">content_paste</i>
            <p>{{ __('Table List') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'Articulos' ? ' active' : '' }}">
            <a class="nav-link" href="{{ route('articulos.index') }}">
                <i class="material-icons">content_paste</i>
                <p>{{ __('Articulos') }}</p>
            </a>
      </li>




{{--      <li class="nav-item{{ $activePage == 'typography' ? ' active' : '' }}">--}}
{{--        <a class="nav-link" href="{{ route('typography') }}">--}}
{{--          <i class="material-icons">library_books</i>--}}
{{--            <p>{{ __('Typography') }}</p>--}}
{{--        </a>--}}
{{--      </li>--}}
{{--      <li class="nav-item{{ $activePage == 'icons' ? ' active' : '' }}">--}}
{{--        <a class="nav-link" href="{{ route('icons') }}">--}}
{{--          <i class="material-icons">bubble_chart</i>--}}
{{--          <p>{{ __('Icons') }}</p>--}}
{{--        </a>--}}
{{--      </li>--}}
{{--      <li class="nav-item{{ $activePage == 'map' ? ' active' : '' }}">--}}
{{--        <a class="nav-link" href="{{ route('map') }}">--}}
{{--          <i class="material-icons">location_ons</i>--}}
{{--            <p>{{ __('Maps') }}</p>--}}
{{--        </a>--}}
{{--      </li>--}}
{{--      <li class="nav-item{{ $activePage == 'notifications' ? ' active' : '' }}">--}}
{{--        <a class="nav-link" href="{{ route('notifications') }}">--}}
{{--          <i class="material-icons">notifications</i>--}}
{{--          <p>{{ __('Notifications') }}</p>--}}
{{--        </a>--}}
{{--      </li>--}}
{{--      <li class="nav-item{{ $activePage == 'language' ? ' active' : '' }}">--}}
{{--        <a class="nav-link" href="{{ route('language') }}">--}}
{{--          <i class="material-icons">language</i>--}}
{{--          <p>{{ __('RTL Support') }}</p>--}}
{{--        </a>--}}
{{--      </li>--}}
{{--      <li class="nav-item active-pro{{ $activePage == 'upgrade' ? ' active' : '' }} bg-danger">--}}
{{--        <a class="nav-link text-white" href="{{ route('upgrade') }}">--}}
{{--          <i class="material-icons">unarchive</i>--}}
{{--          <p>{{ __('Upgrade to PRO') }}</p>--}}
{{--        </a>--}}
{{--      </li>--}}
    </ul>
  </div>
</div>