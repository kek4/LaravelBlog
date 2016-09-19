<header class="main-header">
   <!-- Logo -->
   <a href="index2.html" class="logo">
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
      {{-- <div class="dropdown pull-right">
        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"><i class="fa fa-heart" aria-hidden="true"></i></button>
        <ul class="dropdown-menu">
           @if(count(Session::get('like')))
             @foreach(Session::get('like') as $id)
                   <li><a href="{{ route('artvoir', ['page' => App\Article::position($id), 'id' => $id]) }}">{{Article::where('id', $id)->select('titre')}}</a></li>
             @endforeach
          @else
             <li><a href="#">Aucun article en favoris</a></li>
          @endif
          </ul>

      </div> --}}

   </nav>
</header>
<!-- Left side column. contains the logo and sidebar -->
