<div class="main-menu menu-fixed menu-dark menu-bg-default rounded menu-accordion menu-shadow">
      <div class="main-menu-content"><a class="navigation-brand d-none d-md-block d-lg-block d-xl-block" href="{{ route('user.dashboard') }}"><img class="brand-logo" alt="crypto ico admin logo" src="/profile/app-assets/images/logo/farmties-white-logo.png"/></a>
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
          <li class="active"><a href="{{ route('user.dashboard') }}"><i class="icon-grid"></i><span class="menu-title" data-i18n="">Dashboard</span></a>
          </li>
          <li class=" nav-item"><a href="{{ route('display.stocks') }}"><i class="icon-layers"></i><span class="menu-title" data-i18n="">My Stock</span></a>
          </li>
          <li class=" nav-item"><a href="{{ route('orders.index') }}"><i class="icon-shuffle"></i><span class="menu-title" data-i18n="">Transactions</span></a>
          </li>
          {{--  
          <li class=" nav-item"><a href="faq.html"><i class="icon-support"></i><span class="menu-title" data-i18n="">FAQ</span></a>
          </li>
          --}}
          <li class=" nav-item"><a href="{{ route('user.profile') }}"><i class="icon-user-following"></i><span class="menu-title" data-i18n="">Profile</span></a>
          </li>
        </ul>
      </div>
    </div>