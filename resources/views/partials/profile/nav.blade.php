<nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-light navbar-bg-color">
      <div class="navbar-wrapper">
        <div class="navbar-header d-md-none">
          <ul class="nav navbar-nav flex-row">
            <li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu font-large-1"></i></a></li>
            <li class="nav-item d-md-none"><a class="navbar-brand" href="index.html"><img class="brand-logo d-none d-md-block" alt="crypto ico admin logo" src="/profile/app-assets/images/logo/farmties-white-logo.png"><img class="brand-logo d-sm-block d-md-none" alt="crypto ico admin logo sm" src="/profile/app-assets/images/logo/farmties-real-logo-sm.png"></a></li>
            <li class="nav-item d-md-none"><a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="la la-ellipsis-v">   </i></a></li>
          </ul>
        </div>
        <div class="navbar-container">
          <div class="collapse navbar-collapse" id="navbar-mobile">
            <ul class="nav navbar-nav mr-auto float-left">
              <li class="nav-item d-none d-md-block"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu">         </i></a></li>
            </ul>
            <ul class="nav navbar-nav float-right">         
              <li class="dropdown dropdown-language nav-item"><a class="dropdown-toggle nav-link" id="dropdown-flag" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="flag-icon flag-icon-ng"></i><span class="selected-language"></span></a>
              </li>



              <li class="dropdown dropdown-notification nav-item"><a class="nav-link nav-link-label" href="{{ route('cart.index') }}"><i class="ficon icon-basket"></i><span class="badge badge-pill badge-default badge-danger badge-default badge-up badge-glow">{{ Cart::content()->count() }}</span></a></li>




              <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">             <span class="avatar avatar-online"><img src="{{ Auth::user()->profile  ? asset('images/avatar/'.Auth::user()->profile->path) : '/profile/app-assets/images/portrait/small/avatar-s-1.png'}}" alt="avatar"></span><span class="mr-1"><span class="user-name text-bold-700">{{ Auth::user()->name }}</span></span></a>
                <div class="dropdown-menu dropdown-menu-right">             <a class="dropdown-item" href="{{ route('user.profile') }}"><i class="ft-award"></i>{{ Auth::user()->name }}</a>
                  <div class="dropdown-divider"></div><a class="dropdown-item" href="{{ route('user.profile') }}"><i class="ft-user"></i> Profile</a><a class="dropdown-item" href="{{ route('cart.index') }}"><i class="icon-wallet"></i> Basket</a><a class="dropdown-item" href="{{ route('orders.index') }}"><i class="ft-check-square"></i> Transactions              </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                           document.getElementById('logout-form').submit();">
                      <i class="ft-power"></i> 
                      {{ __('Logout') }}
                  </a>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                  </form>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </nav>