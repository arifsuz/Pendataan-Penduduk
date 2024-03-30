<!DOCTYPE html>
<?php 
include ("penduduk.php");
$new = new Penduduk();

//read
$penduduk = $new->get_penduduk();

$_SESSION['aktif'] = 'penduduk';
$level = $_SESSION['level'];
if ($level == 'admin') {
    $menu = "../menu.php";
    $komen = "";
    $komen2 = "";
}else{
    $menu = "../menu_user.php";
    $komen = "<!--";
    $komen2 = "-->";
}

//hapus anggota
if (isset($_GET['hapus'])) {
    $new->hapus();
    }

$profil = "../profil.php";
$title = "PENDUDUK || JAVCO";
 ?>
<!--[if IE 9]>         <html class="no-js lt-ie10" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
    <head>
<style>
.img4{
width:100px;
transition: all 0.5s;
-o-transition: all 0.5s;
-moz-transition: all 0.5s;
-webkit-transition: all 0.5s;
}
.img4:hover {
transition: all 0.3s;
-o-transition: all 0.3s;
-moz-transition: all 0.3s;
-webkit-transition: all 0.3s;
transform: scale(2.5);
-moz-transform: scale(2.5);
-o-transform: scale(2.5);
-webkit-transform: scale(2.5);
box-shadow: 2px 2px 6px rgba(0,0,0,0.5);
}
</style>
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
                                            <li>PENDUDUK</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END Table Styles Header -->

                        <!-- Datatables Block -->
                        <!-- Datatables is initialized in ../assets/js/pages/uiTables.js -->
                        <?php 
                            if (isset($_COOKIE['alert'])) {
                                echo $_COOKIE['alert'];
                            }else{
                                echo "";
                            }
                        ?>
                        <div class="block full">
                            <div class="block-title">
                                <h2><i class="fa fa-user sidebar-nav-icon"></i>  PENDUDUK</h2>
                            </div>
                            <div class="table-responsive">
                                <table id="example-datatable" class="table table-striped table-bordered table-vcenter">
                                    <thead>
                                        <tr>
                                            <th class="text-center" style="width: 50px;">No</th>
                                            <th>NIK</th>
                                            <th>Nama</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Tempat, Tanggal Lahir</th>
                                            <th>Status</th>
                                            <?php echo $komen; ?>
                                            <th class="text-center" style="width: 75px;"><i class="fa fa-flash"></i> Opsi</th>
                                            <?php echo $komen2; ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $no=0; foreach ($penduduk as $row): $no++?>
                                        <tr>
                                            <td class="text-center"><?php echo $no; ?></td>
                                            <td><strong><?php echo $row['nik'] ?></strong></td>
                                            <td><?php echo $row['nama'] ?></td>
                                            <td>
                                                <?php 
                                                    if ($row['jk'] == "L") {$tampil = "LAKI - LAKI";} 
                                                    else {$tampil = "PEREMPUAN";}
                                                ?>
                                                <?php echo "$tampil"; ?>
                                            </td>
                                            <td><?php echo $row['tempat_lahir'].", ".$row['tanggal_lahir'] ?></td>
                                            <td class="text-center">
                                                <?php 
                                                    if ($row['status'] == 1) {$klas = "label label-info"; $tampil = "ONLINE";} 
                                                    else {$klas = "label label-danger"; $tampil = "OFFLINE";}
                                                ?>
                                                <span class="<?php echo $klas; ?>">
                                                    <?php echo $tampil; ?>
                                                </span>
                                            </td>
                                            <?php echo $komen; ?>
                                            <td class="text-center" width="200px">
                                                <a href="detail.php?detail=<?php echo $row['nik'] ?>" data-toggle="tooltip" title="Detail <?php echo $row['nama'] ?>" class="btn btn-effect-ripple btn-warning"><i class="fa fa-search"></i></a>
                                                <a href="edit.php?edit=<?php echo $row['nik'] ?>" data-toggle="tooltip" title="Edit <?php echo $row['nama'] ?>" class="btn btn-effect-ripple btn-success"><i class="fa fa-pencil"></i></a>
                                                <a href="index.php?hapus=<?php echo $row['nik'] ?>" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus <?php echo $row['nama']?>');" data-toggle="tooltip" title="Hapus <?php echo $row['nama'] ?>" class="btn btn-effect-ripple btn-danger"><i class="fa fa-times"></i></a>
                                            </td>
                                            <?php echo $komen2; ?>
                                        </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- END Datatables Block -->
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

    </body>
</html>