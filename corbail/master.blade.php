
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Absense 3 | Starter</title>
    <link rel="stylesheet" href="/css/app.css">
    <style>
        .nom{
            color: white;
            background-color: #574b90;
        }
    </style>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper" id="app">

  <!-- Navbar -->
  <!-- <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/home" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">about app </a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

     SEARCH FORM
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>



  </nav>
 -->
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/dashboard" class="brand-link">
      <img src="./img/AdminLTELogo.png" alt="Absense Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Absense APP</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional)-->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="./img/user2.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <router-link to="/profile" class="nom">{{Auth::user()->name}}</router-link>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

               @can('isadmin')



               <li class="nav-item">
                <router-link to="/Professeurs" class="nav-link">
                  <i class="nav-icon fas fa-chalkboard-teacher"></i>
                  <p>
                    Gestion des Professeurs

                  </p>
                </router-link>
              </li>


              <li class="nav-item">
                <router-link to="/etudiant" class="nav-link">
                  <i class="nav-icon fas fa-user-graduate"></i>
                  <p>
                    Gestion des Etudiants

                  </p>
                </router-link>

              </li>


              <li class="nav-item">
                <router-link to="/filiere" class="nav-link">
                  <i class="nav-icon fas fa-book"></i>
                  <p>
                    Gestion des filière

                  </p>
                </router-link>
              </li>




              <li class="nav-item">
                <router-link to="/matiere" class="nav-link">
                  <i class="nav-icon fas fa-user-graduate"></i>
                  <p>
                    Gestion des matiere

                  </p>
                </router-link>

              </li>

            <li class="nav-item has-treeview">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Gestion d'Emploie
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <router-link to="/emploie" class="nav-link">
                  <i class="far fas fa-circle nav-icon"></i>
                  <p>Ajouter emploie</p>
                </router-link>
              </li>

              <li class="nav-item">
                <router-link to="/affichemploie" class="nav-link">
                  <i class="far fas fa-circle nav-icon"></i>
                  <p>Afficher emploie</p>
                </router-link>
              </li>
            </ul>
          </li>

          @endcan

          @can('isteacher')
          <li class="nav-item">
                <router-link to="/absense" class="nav-link">
                  <i class="nav-icon fas fa-user-graduate"></i>
                  <p>
                    Marqué absent

                  </p>
                </router-link>

              </li>

              @endcan

          </li>







          <li class="nav-item">

            <a class="nav-link" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
                          <i class="nav-icon fas fa-calendar-alt"></i>
             {{ __('Log out') }}
         </a>

         <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
             @csrf
         </form>


          </li>





        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          </div><!-- /.col -->
          <div class="col-sm-6">

          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">

        <router-view></router-view>
        <vue-progress-bar></vue-progress-bar>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer
  <footer class="main-footer">
    <div class="float-right d-none d-sm-inline">
      Est sidi bernnour
    </div>
    <strong>this beta version </strong> deve mode .
  </footer>
-->
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<script src="/js/app.js"></script>
</body>
</html>
