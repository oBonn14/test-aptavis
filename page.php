<?php
include 'include/db.php';
function rupiah($angka)
{
  $hasil_rupiah = "Rp " . number_format($angka, 2, ',', '.');
  return $hasil_rupiah;
}

function tgl_indo($tanggal)
{
  $bulan = array(
    1 =>   'Januari',
    'Februari',
    'Maret',
    'April',
    'Mei',
    'Juni',
    'Juli',
    'Agustus',
    'September',
    'Oktober',
    'November',
    'Desember'
  );
  $pecahkan = explode('-', $tanggal);
  return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
}


// $iduser = $_SESSION['id'];
// $quser = mysqli_query($kon, "SELECT * FROM `petugas` WHERE `id_petugas` = '$iduser'");
// $duser = mysqli_fetch_array($quser);
// $foto = $duser['foto'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="Ujian Online Berbasis Android SMK Teknologi Mandiri" />
  <link rel="shortcut icon" sizes="196x196" href="len.png">
  <title>.:: <?php echo $title; ?> | Klasemen Bola ::.</title>

  <link rel="stylesheet" href="libs/bower/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="libs/bower/material-design-iconic-font/dist/css/material-design-iconic-font.css">
  <style type="text/css">
    #loading-div {
      position: fixed;
      top: 0;
      right: 0;
      bottom: 0;
      left: 0;
      opacity: 1;
      z-index: 9999;
      -webkit-transition: opacity 3s;
      transition: opacity 3s;
      background-color: #f3f3f3;
    }

    #loading-div img {
      display: block;
      position: absolute;
      top: calc(50% - 25px);
      left: calc(50% - 25px);
    }

    body.loading-done .wrapper {
      opacity: 1;
    }

    body.loading-done #loading-div {
      opacity: 0;
      visibility: hidden;
    }
  </style>
  <!-- build:css ../assets/css/app.min.css -->
  <link rel="stylesheet" href="libs/bower/animate.css/animate.min.css">
  <link rel="stylesheet" href="libs/bower/fullcalendar/dist/fullcalendar.min.css">
  <link rel="stylesheet" href="libs/bower/perfect-scrollbar/css/perfect-scrollbar.css">
  <link rel="stylesheet" href="assets/css/bootstrap.css">
  <link rel="stylesheet" href="assets/css/core.css">
  <link rel="stylesheet" href="assets/css/app.css">
  <!-- endbuild -->
  <link rel="stylesheet" href="assets/css/fonts.css">
  <script src="libs/bower/breakpoints.js/dist/breakpoints.min.js"></script>
  <script>
    Breakpoints();
  </script>
</head>

<body class="menubar-top  theme-primary menubar-light pace-done">
  <!--============= start main area -->

  <!-- APP NAVBAR ==========-->
  <nav id="app-navbar" class="navbar navbar-inverse navbar-fixed-top primary in">

    <!-- navbar header -->
    <div class="navbar-header">
      <button type="button" id="menubar-toggle-btn" class="navbar-toggle visible-xs-inline-block navbar-toggle-left hamburger hamburger--collapse js-hamburger">
        <span class="sr-only">Menu Navigasi</span>
        <span class="hamburger-box"><span class="hamburger-inner"></span></span>
      </button>
      <button type="button" class="navbar-toggle navbar-toggle-right collapsed" data-toggle="collapse" data-target="#navbar-search" aria-expanded="false">
        <span class="sr-only">Pencarian</span>
        <span class="zmdi zmdi-hc-lg zmdi-search"></span>
      </button>

      <a href="index.php" class="navbar-brand">
        <!-- <span class="brand-icon"><i class="fa fa-graduation-cap"></i></span> -->
        <span class="brand-name">Klasemen Bola</span>
      </a>
    </div><!-- .navbar-header -->

    <div class="navbar-container container-fluid">
      <div class="collapse navbar-collapse" id="app-navbar-collapse">
        <ul class="nav navbar-toolbar navbar-toolbar-left navbar-left">
          <li class="hidden-float hidden-menubar-top">
            <a href="javascript:void(0)" role="button" id="menubar-fold-btn" class="hamburger hamburger--inner is-active js-hamburger">
              <span class="hamburger-box"><span class="hamburger-inner"></span></span>
            </a>
          </li>
          <li>
            <h5 class="page-title hidden-menubar-top hidden-float"><?php echo $menu; ?></h5>
          </li>
        </ul>

        <ul class="nav navbar-toolbar navbar-toolbar-right navbar-right">
          <li class="nav-item dropdown hidden-float">
            <a href="javascript:void(0)" data-toggle="collapse" data-target="#navbar-search" aria-expanded="false">
              <i class="zmdi zmdi-hc-lg zmdi-search"></i>
            </a>
          </li>
        </ul>
      </div>
    </div><!-- navbar-container -->
  </nav>
  <!--========== END app navbar -->

  <!-- APP ASIDE ==========-->
  <aside id="menubar" class="menubar light">
    <div class="app-user">
      <div class="media">
        <div class="media-left">
          <div class="avatar avatar-md avatar-circle">
            <a href="javascript:void(0)"><img class="img-responsive" src="img/<?php echo $foto; ?>" alt="avatar" /></a>
          </div><!-- .avatar -->
        </div>
        <div class="media-body">
          <div class="foldable">
            <h5><a href="javascript:void(0)" class="username"></a></h5>
            <ul>
              <li class="dropdown">
                <a href="javascript:void(0)" class="dropdown-toggle usertitle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <!-- <small><?php echo $_SESSION['nama']; ?></small> -->
                  <span class="caret"></span>
                </a>
                <ul class="dropdown-menu animated flipInY">
                  <li>
                    <a class="text-color" href="?hal=main">
                      <span class="m-r-xs"><i class="fa fa-home"></i></span>
                      <span>Home</span>
                    </a>
                  </li>
                  <li>
                    <a class="text-color" href="?hal=profile">
                      <span class="m-r-xs"><i class="fa fa-user"></i></span>
                      <span>Profile</span>
                    </a>
                  </li>
                  <li role="separator" class="divider"></li>
                  <li>
                    <a class="text-color" href="?hal=logout">
                      <span class="m-r-xs"><i class="fa fa-power-off"></i></span>
                      <span>Keluar</span>
                    </a>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </div><!-- .media-body -->
      </div><!-- .media -->
    </div><!-- .app-user -->

    <div class="menubar-scroll">
      <div class="menubar-scroll-inner">

        <?php
        include 'include/menu.php';
        ?>
      </div><!-- .menubar-scroll-inner -->
    </div><!-- .menubar-scroll -->
  </aside>
  <!--========== END app aside -->

  <!-- navbar search -->
  <div id="navbar-search" class="navbar-search collapse">
    <div class="navbar-search-inner">
      <form action="#">
        <span class="search-icon"><i class="fa fa-search"></i></span>
        <input class="search-field" type="search" placeholder="search..." />
      </form>
      <button type="button" class="search-close" data-toggle="collapse" data-target="#navbar-search" aria-expanded="false">
        <i class="fa fa-close"></i>
      </button>
    </div>
    <div class="navbar-search-backdrop" data-toggle="collapse" data-target="#navbar-search" aria-expanded="false"></div>
  </div><!-- .navbar-search -->

  <!-- APP MAIN ==========-->
  <main id="app-main" class="app-main">
    <div class="wrap">
      <section class="app-content">

        <?php
        Bo('isi');
        ?>

      </section><!-- .app-content -->
    </div><!-- .wrap -->
    <!-- APP FOOTER -->
    <div class="wrap p-t-0">
      <footer class="app-footer">
        <div class="clearfix">
          <div class="copyright pull-left">Copyright 2020 &copy;</div>
        </div>
      </footer>
    </div>
    <!-- /#app-footer -->
  </main>
  <!--========== END app main -->

  <!-- APP CUSTOMIZER -->
  <div id="app-customizer" class="app-customizer">
    <a href="javascript:void(0)" class="app-customizer-toggle theme-color" data-toggle="class" data-class="open" data-active="false" data-target="#app-customizer">
      <i class="fa fa-gear"></i>
    </a>
    <div class="customizer-tabs">
      <!-- tabs list -->
      <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#menubar-customizer" aria-controls="menubar-customizer" role="tab" data-toggle="tab">Menubar</a></li>
        <li role="presentation"><a href="#navbar-customizer" aria-controls="navbar-customizer" role="tab" data-toggle="tab">Navbar</a></li>
      </ul><!-- .nav-tabs -->

      <div class="tab-content">
        <div role="tabpanel" class="tab-pane in active fade" id="menubar-customizer">
          <div class="hidden-menubar-top hidden-float">
            <div class="m-b-0">
              <label for="menubar-fold-switch">Fold Menubar</label>
              <div class="pull-right">
                <input id="menubar-fold-switch" type="checkbox" data-switchery data-size="small" />
              </div>
            </div>
            <hr class="m-h-md">
          </div>
          <div class="radio radio-default m-b-md">
            <input type="radio" id="menubar-light-theme" name="menubar-theme" data-toggle="menubar-theme" data-theme="light">
            <label for="menubar-light-theme">Light</label>
          </div>

          <div class="radio radio-inverse m-b-md">
            <input type="radio" id="menubar-dark-theme" name="menubar-theme" data-toggle="menubar-theme" data-theme="dark">
            <label for="menubar-dark-theme">Dark</label>
          </div>
        </div><!-- .tab-pane -->
        <div role="tabpanel" class="tab-pane fade" id="navbar-customizer">
          <!-- This Section is populated Automatically By javascript -->
        </div><!-- .tab-pane -->
      </div>
    </div><!-- .customizer-taps -->
    <hr class="m-0">
    <div class="customizer-reset">
      <button id="customizer-reset-btn" class="btn btn-block btn-outline btn-primary">Reset</button>
    </div>
  </div><!-- #app-customizer -->

  <div id="loading-div">
    <img src="assets/images/landing-page/puff.svg" width="50" alt="">
  </div>
  <!-- build:js ../assets/js/core.min.js -->
  <script src="libs/bower/jquery/dist/jquery.js"></script>
  <script src="libs/bower/jquery-ui/jquery-ui.min.js"></script>
  <script src="libs/bower/jQuery-Storage-API/jquery.storageapi.min.js"></script>
  <script src="libs/bower/bootstrap-sass/assets/javascripts/bootstrap.js"></script>
  <script src="libs/bower/jquery-slimscroll/jquery.slimscroll.js"></script>
  <script src="libs/bower/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
  <script src="libs/bower/PACE/pace.min.js"></script>
  <!-- endbuild -->

  <!-- build:js ../assets/js/app.min.js -->
  <script src="assets/js/library1.js"></script>
  <script src="assets/js/plugins.js"></script>
  <script src="assets/js/app.js"></script>
  <!-- endbuild -->
  <script src="libs/bower/moment/moment.js"></script>
  <script src="libs/bower/fullcalendar/dist/fullcalendar.min.js"></script>
  <script src="assets/js/fullcalendar.js"></script>

  <?php Bo('foot'); ?>

  <script>
    $(function() {
      $(window).on('load', function() {
        $(document.body).addClass('loading-done');
      });
    });
  </script>
</body>

</html>