<aside class="main-sidebar">
   <!-- sidebar: style can be found in sidebar.less -->
   <section class="sidebar">
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
         <div class="input-group">
            <input type="text" name="q" class="form-control" placeholder="Search...">
            <span class="input-group-btn">
               <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
               </button>
            </span>
         </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
         <li class="treeview">
            <a href="#">
               <i class="fa fa-pie-chart"></i>
               <span>Gestions</span>
               <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
               </span>
            </a>
            <ul class="treeview-menu">
               <li><a href="{{route('list')}}"><i class="fa fa-user"></i> Utilisateurs</a></li>
               <li><a href="{{route('artlist')}}"><i class="fa fa-font"></i> Articles</a></li>
               <li><a href="{{route('comlist')}}"><i class="fa fa-commenting-o"></i> Commentaires</a></li>
            </ul>
         </li>
         <li class="treeview">
            <a href="#">
               <i class="fa fa-plus"></i>
               <span>Création</span>
               <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
               </span>
            </a>
            <ul class="treeview-menu">
               <li><a href="pages/UI/general.html"><i class="fa fa-user-plus"></i> Utilisateurs</a></li>
               <li><a href="pages/UI/icons.html"><i class="fa fa-font"></i> Articles</a></li>
               <li><a href="pages/UI/icons.html"><i class="fa fa-commenting-o"></i> Commentaires</a></li>
            </ul>
         </li>
      </ul>
   </section>
   <!-- /.sidebar -->
</aside>
