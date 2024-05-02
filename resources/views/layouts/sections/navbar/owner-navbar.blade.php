@php
$containerNav = $containerNav ?? 'container-xxl';
$navbarDetached = ($navbarDetached ?? 'navbar-detached');
$navbarFull = ($navbarFull ?? 'true');
@endphp

<!-- Navbar -->
<nav class=" navbar navbar-expand-lg navbar-light bg-primary py-3 align-items-center" id="layout-navbar">
  <div class="{{$containerNav}}">
    <a href="{{url('/owner/home')}}" class="app-brand-link gap-2">
      <img src="{{asset('assets/img/landing/logop.png')}}" height="35" alt="savecut" />
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0 fw-bold">
          <li class="nav-item me-2">
            <a class="nav-link" aria-current="page" href="{{url('/owner/home')}}">Home</a>
          </li>
          <!-- User -->
          <li class="nav-item me-2 navbar-dropdown dropdown-user dropdown">
                <a class="nav-link dropdown-toggle" href="javascript:void(0);" data-bs-toggle="dropdown">
                  Account
                </a>
                <ul class="dropdown-menu dropdown-menu-end mt-3 py-2">
                  <li>
                    <a class="dropdown-item pb-2 mb-1" href="javascript:void(0);">
                      <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                          <h6 class="mb-0">{{Auth::user()->name}} <small class="ms-2 text-muted">{{Auth::user()->email}}</small></h6>
                          <small class="text-muted">{{Auth::user()->role}}</small><br>
                        </div>
                      </div>
                    </a>
                  </li>
                  <li>
                    <div class="dropdown-divider my-1"></div>
                  </li>
                  <li>
                    <a class="dropdown-item" href="{{route('actionlogout')}}">
                      <i class='mdi mdi-power me-1 mdi-20px'></i>
                      <span class="align-middle">Log Out</span>
                    </a>
                  </li>
                </ul>
              </li>
              <!--/ User -->
        </ul>
    </div>
  </div>
</nav>
  <!-- / Navbar -->
