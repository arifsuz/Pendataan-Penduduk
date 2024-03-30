<!DOCTYPE html>
<?php
session_start();
include('../koneksi.php');

$online = $_mysqli->query("SELECT * FROM penduduk WHERE status = '1'");
$offline = $_mysqli->query("SELECT * FROM penduduk WHERE status = '0'");

$_SESSION['aktif'] = 'chat';
$level = $_SESSION['level'];
if ($level == 'admin') {
    $menu = "../menu.php";
}else{
    $menu = "../menu_user.php";
}

$profil = "../profil.php";
$title = "CHAT || JAVCO";
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

        <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
        <link href="bootstrap/css/bootstrap-responsive.css" rel="stylesheet">
        <link href="style_sesudah.css" rel="stylesheet">
        <script src="bootstrap/js/jQuery.js"></script>
        <script src="ajaxku.js"></script>

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
                    <div id="page-content" class="inner-sidebar-right">
                        <!-- Table Styles Header -->
                        <div class="content-header">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="header-section">
                                        <h1><?php echo $title; ?></h1>
                                    </div>
                                </div>
                                <div class="col-sm-6 hidden-xs">
                                    <div class="header-section">
                                        <ul class="breadcrumb breadcrumb-top">
                                            <li><a href="../dashboard">JAVCO</a></li>
                                            <li>Chat Room</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END Table Styles Header -->
                        <!-- Inner Sidebar -->
                        <div id="page-content-sidebar">
                            <!-- Collapsible People List -->
                            <a href="javascript:void(0)" class="btn btn-block btn-effect-ripple btn-primary visible-xs" data-toggle="collapse" data-target="#people-nav">People</a>
                            <div id="people-nav" class="collapse navbar-collapse remove-padding">
                                <div class="block-section">
                                    <h4 class="inner-sidebar-header">
                                        Online
                                    </h4>
                                    <ul class="nav-users nav-users-online">
                                        <?php foreach ($online as $row):?>
                                            <?php 
                                                $nom = $row['nik'];
                                                $gb = $_mysqli->query("SELECT * FROM penduduk WHERE penduduk.nik = '$nom'");

                                                $gbr = mysqli_fetch_array($gb);
                                             ?>
                                        <li>
                                            <a href="javascript:void(0)">
                                                <img src="../foto/<?php echo $gbr['foto']; ?>" alt="image" class="nav-users-avatar">
                                                <span class="nav-users-heading"><?php echo $row['nama'] ?></span>
                                                <span class="text-muted"><?php if ($row['jk'] == "L") {echo "Laki - Laki";}else{echo "Perempuan";} ?></span>
                                            </a>
                                        </li>
                                    <?php endforeach; ?>
                                    </ul>
                                </div>
                                <div class="block-section">
                                    <h4 class="inner-sidebar-header">
                                        Offline
                                    </h4>
                                    <ul class="nav-users nav-users-offline">
                                        <?php foreach ($offline as $rows):?>
                                            <?php 
                                                $nomm = $rows['nik'];
                                                $gbb = $_mysqli->query("SELECT * FROM penduduk WHERE penduduk.nik = '$nomm'");

                                                $gbrr = mysqli_fetch_array($gbb);
                                             ?>
                                        <li>
                                            <a href="javascript:void(0)">
                                                <img src="../foto/<?php echo $gbrr['foto']; ?>" alt="image" class="nav-users-avatar">
                                                <span class="nav-users-heading"><?php echo $rows['nama'] ?></span>
                                                <span class="text-muted"><?php if ($rows['jk'] == "L") {echo "Laki - Laki";}else{echo "Perempuan";} ?></span>
                                            </a>
                                        </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            </div>
                            <!-- END Collapsible People List -->
                        </div>
                        <!-- END Inner Sidebar -->

<!-- Social Net Content -->
    <div class="header-section">
        <div class="row">
            <div class="col-sm-12">
                    <div id="boxpesan" style="height: 400px;">
                    </div>
            </div>
        </div>
        </br>
        <div class="row">
            <div class="col-sm-10">
                <form method="post" action="" id="formpesan" class="form-inline">
                <textarea class="input-xlarge" style="width: 550px; height: 37px;" name="pesan" placeholder="Ketik Pesan kemudian Kirim !" required x-moz-errormessage="Masukkan Pesan !" autofocus></textarea>
                <input type='submit' value='Kirim' class='btn btn-info pull-right' id='pencet'>
                </form>
            <audio controls id="suara">
            <source src="chat.mp3" type="audio/mpeg">
            Your browser does not support the audio element.
            </audio>
            </div>
            <div class="col-sm-2">
                <a href="#" class="btn btn-info emot" data-toggle="popover"  id="emott" type="button" data-placement="top" title="Emoticons (klik)">
                <i class="icon-eye-open icon-white"></i> Emoticons </a>
            </div>
        </div>
    </div>
<!-- END Social Net Content -->

                    </div>
                    <!-- END Page Content -->

                </div>
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

        <!-- Google Maps API Key (you will have to obtain a Google Maps API key to use Google Maps) -->
        <!-- For more info please have a look at https://developers.google.com/maps/documentation/javascript/get-api-key#key -->
        <script src="//maps.googleapis.com/maps/api/js?key="></script>
        <script src="../assets/js/plugins/gmaps.min.js"></script>

        <!-- Load and execute javascript code used only in this page -->
        <script src="../assets/js/pages/appSocial.js"></script>
        <script>$(function(){ AppSocial.init(); });</script>
        

    </body>
</html>