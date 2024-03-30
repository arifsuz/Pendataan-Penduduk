<!DOCTYPE html>
<?php
include('dashboard.php');

if ($_SESSION['level'] == "") {
    header('location:../index.php');
}

$tam = new Dashboard();
$tampil = $tam->tampil();
$jumlah = mysqli_num_rows($tampil['0']);
$a = mysqli_num_rows($tampil['1']);
$b = mysqli_num_rows($tampil['2']);
$c = mysqli_num_rows($tampil['3']);
$d = mysqli_num_rows($tampil['4']);
$l = mysqli_num_rows($tampil['5']);
$p = mysqli_num_rows($tampil['6']);

$_SESSION['aktif'] = 'dashboard';
$level = $_SESSION['level'];
if ($level == 'admin') {
    $menu = "../menu.php";
}else{
    $menu = "../menu_user.php";
}

$profil = "../profil.php";
$title = "JAVCO";

 ?>
<!--[if IE 9]>         <html class="no-js lt-ie10" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">

        <title><?php echo $title; ?></title>

        <meta name="description" content="AppUI is a Web App Bootstrap Admin Template created by pixelcave and published on Themeforest">
        <meta name="author" content="pixelcave">
        <meta name="robots" content="noindex, nofollow">

        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

        <!-- Icons -->
        <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
        <link rel="icon" type="image/png" href="../assets/img/logo.png">
        <!-- END Icons -->

        <!-- Stylesheets -->
        <!-- Bootstrap is included in its original form, unaltered -->
        <link rel="stylesheet" href="../assets/css/bootstrap.min.css">

        <!-- Related styles of various icon packs and plugins -->
        <link rel="stylesheet" href="../assets/css/plugins.css">

        <!-- The main stylesheet of this template. All Bootstrap overwrites are defined in here -->
        <link rel="stylesheet" href="../assets/css/main.css">

        <!-- Include a specific file here from ../assets/css/themes/ folder to alter the default theme of the template -->

        <!-- The themes stylesheet of this template (for using specific theme color in individual elements - must included last) -->
        <link rel="stylesheet" href="../assets/css/themes.css">
        <!-- END Stylesheets -->

        <!-- Modernizr (browser feature detection library) -->
        <script src="../assets/js/vendor/modernizr-3.3.1.min.js"></script>
    </head>
    <body>
        <!-- Page Wrapper -->
        <!-- In the PHP version you can set the following options from inc/config file -->
        <!--
            Available classes:

            'page-loading'      enables page preloader
        -->
        <div id="page-wrapper" class="page-loading">
            <!-- Preloader -->
            <!-- Preloader functionality (initialized in ../assets/js/app.js) - pageLoading() -->
            <!-- Used only if page preloader enabled from inc/config (PHP version) or the class 'page-loading' is added in #page-wrapper element (HTML version) -->
            <div class="preloader">
                <div class="inner">
                    <!-- Animation spinner for all modern browsers -->
                    <div class="preloader-spinner themed-background hidden-lt-ie10"></div>

                    <!-- Text for IE9 -->
                    <h3 class="text-primary visible-lt-ie10"><strong>Loading..</strong></h3>
                </div>
            </div>
            <!-- END Preloader -->

            <!-- Page Container -->
            <!-- In the PHP version you can set the following options from inc/config file -->
            <!--
                Available #page-container classes:

                'sidebar-light'                                 for a light main sidebar (You can add it along with any other class)

                'sidebar-visible-lg-mini'                       main sidebar condensed - Mini Navigation (> 991px)
                'sidebar-visible-lg-full'                       main sidebar full - Full Navigation (> 991px)

                'sidebar-alt-visible-lg'                        alternative sidebar visible by default (> 991px) (You can add it along with any other class)

                'header-fixed-top'                              has to be added only if the class 'navbar-fixed-top' was added on header.navbar
                'header-fixed-bottom'                           has to be added only if the class 'navbar-fixed-bottom' was added on header.navbar

                'fixed-width'                                   for a fixed width layout (can only be used with a static header/main sidebar layout)

                'enable-cookies'                                enables cookies for remembering active color theme when changed from the sidebar links (You can add it along with any other class)
            -->
            <div id="page-container" class="header-fixed-top sidebar-visible-lg-full">

                <!-- Main Sidebar -->
                <?php include $menu; ?>
                <!-- END Main Sidebar -->

                <!-- Main Container -->
                <div id="main-container">
                    <!-- Header -->
                    <!-- In the PHP version you can set the following options from inc/config file -->
                    <!--
                        Available header.navbar classes:

                        'navbar-default'            for the default light header
                        'navbar-inverse'            for an alternative dark header

                        'navbar-fixed-top'          for a top fixed header (fixed main sidebar with scroll will be auto initialized, functionality can be found in ../assets/js/app.js - handleSidebar())
                            'header-fixed-top'      has to be added on #page-container only if the class 'navbar-fixed-top' was added

                        'navbar-fixed-bottom'       for a bottom fixed header (fixed main sidebar with scroll will be auto initialized, functionality can be found in ../assets/js/app.js - handleSidebar()))
                            'header-fixed-bottom'   has to be added on #page-container only if the class 'navbar-fixed-bottom' was added
                    -->
                    <header class="navbar navbar-inverse navbar-fixed-top">
                        <!-- Left Header Navigation -->
                        <ul class="nav navbar-nav-custom">
                            <!-- Main Sidebar Toggle Button -->
                            <li>
                                <a href="javascript:void(0)" onclick="App.sidebar('toggle-sidebar');this.blur();">
                                    <i class="fa fa-ellipsis-v fa-fw animation-fadeInRight" id="sidebar-toggle-mini"></i>
                                    <i class="fa fa-bars fa-fw animation-fadeInRight" id="sidebar-toggle-full"></i>
                                </a>
                            </li>
                            <!-- END Main Sidebar Toggle Button -->

                            <!-- Header Link -->
                            <li class="hidden-xs animation-fadeInQuick">
                                <a href="../pilihan.php"><strong>SELAMAT DATANG DI JAVCO PENDATAAN WARGA</strong></a>
                            </li>
                            <!-- END Header Link -->
                        </ul>
                        <!-- END Left Header Navigation -->

                        <!-- Right Header Navigation -->
                            <?php include $profil; ?>
                        <!-- END Right Header Navigation -->
                    </header>
                    <!-- END Header -->

<!-- Page content -->
                    <div id="page-content">

                        <!-- First Row -->
                            <div class="row">
                            <!-- User Widgets -->
                            <div class="col-lg-6">
                                <div class="widget">
                                    <div class="widget-content themed-background-flat text-center">
                                        <h3 class="widget-heading text-light">JUMLAH WARGA<br>BERDASARKAN KLASIFIKASI</h3>
                                    </div>
                                    <div class="widget-content themed-background-muted text-center">
                                        <div class="btn-group">
                                            <a href="javascript:void(0)" class="btn btn-effect-ripple btn-default"><strong>JUMLAH TOTAL <?php echo $jumlah; ?> JIWA</strong></a>
                                        </div>
                                    </div>
                                    <div class="widget-content">
                                        <div class="row text-center">
                                            <div class="col-xs-3">
                                                <h2><i class="fa fa-child"></i></h2><h4 class="widget-heading"><small> ANAK - ANAK</small><br><a href="javascript:void(0)" class="themed-color-flat"><?php echo "$a"; ?></a></h4>
                                            </div>
                                            <div class="col-xs-3">
                                                <h2><i class="fa fa-street-view"></i></h2><h4 class="widget-heading"><small> REMAJA</small><br><a href="javascript:void(0)" class="themed-color-flat"><?php echo "$b"; ?></a></h4>
                                            </div>
                                            <div class="col-xs-3">
                                                <h2><i class="fa fa-user"></i></h2><h4 class="widget-heading"><small> DEWASA</small><br><a href="javascript:void(0)" class="themed-color-flat"><?php echo "$c"; ?></a></h4>
                                            </div>
                                            <div class="col-xs-3">
                                                <h2><i class="fa fa-user-plus"></i></h2><h4 class="widget-heading"><small> LANSIA</small><br><a href="javascript:void(0)" class="themed-color-flat"><?php echo "$d"; ?></a></h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="widget">
                                    <div class="widget-content themed-background-creme text-center">
                                        <h3 class="widget-heading text-light">JUMLAH WARGA<br>BERDASARKAN JENIS KELAMIN</h3>
                                    </div>
                                    <div class="widget-content themed-background-muted text-center">
                                        <div class="btn-group">
                                            <a href="javascript:void(0)" class="btn btn-effect-ripple btn-default"><strong>JUMLAH TOTAL <?php echo $jumlah; ?> JIWA</strong></a>
                                        </div>
                                    </div>
                                    <div class="widget-content">
                                        <div class="row text-center">
                                            <div class="col-xs-6">
                                                <h2><i class="fa fa-male"></i></h2><h4 class="widget-heading"><small> LAKI - LAKI</small><br><a href="javascript:void(0)" class="themed-color-flat"><?php echo "$l"; ?></a></h4>
                                            </div>
                                            <div class="col-xs-6">
                                                <h2><i class="fa fa-female"></i></h2><h4 class="widget-heading"><small> PEREMPUAN</small><br><a href="javascript:void(0)" class="themed-color-flat"><?php echo "$p"; ?></a></h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END User Widgets -->
                        </div>

                </div>
<!-- END Page Content -->
                <!-- END Main Container -->
            </div>
            <!-- END Page Container -->
        </div>
        <!-- END Page Wrapper -->

        <!-- jQuery, Bootstrap, jQuery plugins and Custom JS code -->
        <script src="../assets/js/vendor/jquery-2.2.4.min.js"></script>
        <script src="../assets/js/vendor/bootstrap.min.js"></script>
        <script src="../assets/js/plugins.js"></script>
        <script src="../assets/js/app.js"></script>
        
        <!-- Load and execute javascript code used only in this page -->
        <script src="../assets/js/pages/uiWidgets.js"></script>
        <script>$(function () { UiWidgets.init(); });</script>

        <!-- Load and execute javascript code used only in this page -->
        <script src="../assets/js/pages/readyDashboard.js"></script>
        <script>$(function(){ ReadyDashboard.init(); });</script>


    </body>
</html>