<header class="main-header">
   <!-- Logo -->
   <a href="{{ route('homepage') }}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Administration</b></span>
   </a>
   <!-- Header Navbar: style can be found in header.less -->
   <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
         <span class="sr-only">Toggle navigation</span>
      </a>
      <div class="navbar-custom-menu">
         <ul class="nav navbar-nav">
            <li class="dropdown tasks-menu">
               <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                  <i class="fa fa-flag-o"></i>
               </a>
               <ul class="dropdown-menu">
                  @if (Session::has('like') && count(Session::get('like')))
                  @foreach (Session::get('like') as $value)
                     <li>{{ $value }}</li>
                  @endforeach
               @else
                  <li>Panier vide</li>
               @endif
               </ul>
            </li>
            <li class="dropdown tasks-menu">
               <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                  <i class="fa fa-flag-o"></i>
               </a>
               <ul class="dropdown-menu">
                  <li>
                     <!-- inner menu: contains the actual data -->

                     <ul class="menu">
                        <li><!-- Task item -->
                           <a href="{{ route('langue', ['locale' => 'fr']) }}">
                              <h3>
                                 Français
                              </h3>
                           </a>
                        </li>
                        <li><!-- Task item -->
                           <a href="{{ route('langue', ['locale' => 'en']) }}">
                              <h3>
                                 English
                              </h3>
                           </a>
                        </li>
                     </ul>
                  </li>
               </ul>
            </li>
            <!-- User Account: style can be found in dropdown.less -->
            <li class="dropdown user user-menu">
               <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="{{ asset('uploads/'. Auth::user()->avatar) }}" class="user-image" alt="User Image">
                  <span class="hidden-xs">{{ Auth::user()->nom }}</span>
               </a>
               <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                     <img src="{{ asset('uploads/'. Auth::user()->avatar) }}" class="img-circle" alt="User Image">
                     <p>
                        {{ Auth::user()->nom }}
                        <small>since date</small>
                     </p>
                  </li>
                  <!-- Menu Body -->
                  <!-- Menu Footer-->
                  <li class="user-footer">
                     <div class="pull-left">
                        <a href="#" class="btn btn-default btn-flat">Profil</a>
                     </div>
                     <div class="pull-right">
                        <a href="{{ url('/logout') }}" class="btn btn-default btn-flat">Logout</a>
                     </div>
                  </li>
               </ul>
            </li>
            <li>
               <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
            </li>

         </ul>
      </div>
   </nav>
</header>
<!-- Left side column. contains the logo and sidebar -->
