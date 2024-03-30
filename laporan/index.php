<!DOCTYPE html>
<?php 
include ('laporan.php');
$new = new Laporan();

$agama = $new->get_agama();
$klasifikasi = $new->get_klasifikasi();
$kk = $new->get_kk();

if (isset($_POST['ekspor'])) {
    $_SESSION['kk'] = $_POST['kk'];
    $_SESSION['agama'] = $_POST['agama'];
    $_SESSION['klasifikasi'] = $_POST['klasifikasi'];
    header('location:eks.php');
}

$_SESSION['aktif'] = 'laporan';
$menu = "../menu.php";
$profil = "../profil.php";
$title = "LAPORAN || JAVCO";
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
                        <ul class="nav navbar-nav-custom pull-right">

                            <!-- User Dropdown -->
                            <?php include $profil; ?>
                            <!-- END User Dropdown -->
                        </ul>
                        <!-- END Right Header Navigation -->
                    </header>
                    <!-- END Header -->

                    <!-- Page content -->
                    <div id="page-content">
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
                                            <li>LAPORAN</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END Table Styles Header -->
                        <div class="row">
                        <!-- Input States Block -->
                        <div class="col-md-12">
                        <div class="block">
                            <!-- Input States Title -->
                            <div class="block-title">
                                <div class="block-options pull-right">
                                    <a href="javascript:void(0)" class="btn btn-effect-ripple btn-default toggle-bordered enable-tooltip" data-toggle="button" title="Toggles .form-bordered class">Borderless</a>
                                </div>
                                <h2>Laporan</h2>
                            </div>
                            <!-- END Input States Title -->

                            <!-- Input States Content -->
                            
                            
                            <form action="index.php" method="post" class="form-horizontal form-bordered">
                                <div class="form-group">
                                    <label class="col-md-3">KK</label>
                                    <div class="col-md-8">
                                        <select name="kk" id="example-chosen" class="select-chosen">
                                            <option value="">--Pilih KK--</option>
                                            <?php foreach ($kk as $row): ?>
                                            <option value="<?php echo $row['no_kk'] ?>"><?php echo $row['no_kk']."--".$row['nama'] ?></option>
                                        <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3">Agama</label>
                                    <div class="col-md-8">
                                        <select name="agama" id="example-chosen" class="select-chosen">
                                            <option value="">--Pilih Agama--</option>
                                            <?php foreach ($agama as $row): ?>
                                            <option value="<?php echo $row['id_agama'] ?>"><?php echo $row['nama_agama'] ?></option>
                                        <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3">Klasifikasi</label>
                                    <div class="col-md-8">
                                        <select name="klasifikasi" id="example-chosen" class="select-chosen">
                                            <option value="">--Pilih Klasifikasi--</option>
                                            <?php foreach ($klasifikasi as $row): ?>
                                            <option value="<?php echo $row['id_klasifikasi'] ?>"><?php echo $row['nama_klasifikasi'] ?></option>
                                        <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="form-group form-actions">
                                    <div class="col-md-12">
                                        <button type="submit" name="ekspor" class="btn btn-effect-ripple btn-primary center">Export</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                            <!-- END Input States Content -->
                        </div>
                        <!-- END Input States Block -->
                        </div>

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

        <!-- Load and execute javascript code used only in this page -->
        <script src="../assets/js/pages/uiTables.js"></script>
        <script>$(function () {UiTables.init();});</script>

        <!-- Load and execute javascript code used only in this page -->
        <script src="../assets/js/pages/formsComponents.js"></script>
        <script>$(function(){ FormsComponents.init(); });</script>
        

    </body>
</html>