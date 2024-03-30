<!DOCTYPE html>
<?php 
include ("../penduduk/penduduk.php");
$new = new Penduduk();

//read
//detail
if (isset($_GET['detail'])) {
    $fl = $new->get_file_all();
    $pdd = $new->get_penduduk_nik();
    $penduduk = mysqli_fetch_array($pdd);

}

if (isset($_POST['tambah_file'])) {
    $new->tambah_file();
}

if (isset($_POST['hapus_file'])) {
    $new->hapus_file();
}

$aktiv = $_SESSION['aktif'];
if ($aktiv == 'penduduk') {
    $_SESSION['aktif'] = 'penduduk';
}else{
    $_SESSION['aktif'] = 'kk';
};

$level = $_SESSION['level'];
if ($level == 'admin') {
    $menu = "../menu.php";
}else{
    $menu = "../menu_user.php";
}

$profil = "../profil.php";
$title = "PENDUDUK || JAVCO || DETAIL ";
 ?>
<!--[if IE 9]>         <html class="no-js lt-ie10" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
    <head>
<style>
.img4{
width:100px;
transition: all 1s;
-o-transition: all 1s;
-moz-transition: all 1s;
-webkit-transition: all 1s;
}
.img4:hover {
transition: all 1s;
-o-transition: all 1s;
-moz-transition: all 1s;
-webkit-transition: all 1s;
transform: scale(2.5);
-moz-transform: scale(2.5);
-o-transform: scale(2.5);
-webkit-transform: scale(2.5);
box-shadow: 2px 2px 6px rgba(0,0,0,1);
}
</style>
<script LANGUAGE="JavaScript">
 
    function embed(bookURL){
       window.open(bookURL,"status=no","toolbar=no","menubar=no","left=355");
    }
 
</script>
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
                    <div class="row">
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
                                            <li><a href="../penduduk">PENDUDUK</a></li>
                                            <li>DETAIL</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END Table Styles Header -->
                        <?php 
                            if (isset($_COOKIE['alert'])) {
                                echo $_COOKIE['alert'];
                            }else{
                                echo "";
                            }
                        ?>
                        <!-- Table Styles Block -->
                        <div class="col-sm-6">
                        <div class="block">
                            <!-- Table Styles Title -->
                            <div class="block-title clearfix">
                                <h2><i class="fa fa-user sidebar-nav-icon"></i>  DETAIL <?php echo $penduduk['nama'] ?></h2>
                            </div>
                            <!-- END Table Styles Title -->

                            <!-- Table Styles Content -->
                            <div class="table-responsive">
                                <!--
                                Available Table Classes:
                                    'table'             - basic table
                                    'table-bordered'    - table with full borders
                                    'table-borderless'  - table with no borders
                                    'table-striped'     - striped table
                                    'table-condensed'   - table with smaller top and bottom cell padding
                                    'table-hover'       - rows highlighted on mouse hover
                                    'table-vcenter'     - middle align content vertically
                                -->
                                <table id="general-table" class="table table-striped table-bordered table-vcenter table-hover">
                                    <tbody>
                                        <tr>
                                            <td colspan="2" align="center"><strong>FOTO</strong></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" align="center">
                                                <?php 
                                                    include ('../koneksi.php');
                                                    $id = $penduduk['nik'];
                                                    $gb = $_mysqli->query("SELECT foto FROM penduduk WHERE penduduk.nik = '$id'");
                                                    $gr = mysqli_fetch_array($gb);
                                                ?>
                                                <img src="<?php echo "../foto/".$gr['foto']; ?>" style="width: 150px;" class="img4"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>NIK</strong></td>
                                            <td><?php echo $penduduk['nik'] ?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>NAMA</strong></td>
                                            <td><?php echo $penduduk['nama'] ?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>TTL</strong></td>
                                            <td><?php echo $penduduk['tempat_lahir'].", ".$penduduk['tanggal_lahir'] ?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>JENIS KELAMIN</strong></td>
                                            <td><?php echo $penduduk['jk'] ?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>GOL. DARAH</strong></td>
                                            <td><?php echo $penduduk['golongan_darah'] ?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>PEKERJAAN</strong></td>
                                            <td><?php echo $penduduk['pekerjaan'] ?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>PENDIDIKAN</strong></td>
                                            <td><?php echo $penduduk['pendidikan'] ?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>STATUS PERKAWINAN</strong></td>
                                            <td><?php echo $penduduk['status_perkawinan'] ?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>AGAMA</strong></td>
                                            <td><?php echo $penduduk['nama_agama'] ?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>KLASIFIKASI</strong></td>
                                            <td><?php echo $penduduk['nama_klasifikasi'] ?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>NO. KK</strong></td>
                                            <td><?php echo $penduduk['no_kk'] ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- END Table Styles Content -->
                        </div>
                        </div>
                        <!-- END Table Styles Block -->

                        <!-- Table Styles Block -->
                        <div class="col-sm-6">
                        <div class="block">
                            <!-- Table Styles Title -->
                            <div class="block-title clearfix">
                                <h2><i class="fa fa-list sidebar-nav-icon"></i>  DOKUMEN <?php echo $penduduk['nama'] ?></h2>
                            </div>
                            <!-- END Table Styles Title -->

                            <!-- Table Styles Content -->
                            <div class="table-responsive">
                                <!--
                                Available Table Classes:
                                    'table'             - basic table
                                    'table-bordered'    - table with full borders
                                    'table-borderless'  - table with no borders
                                    'table-striped'     - striped table
                                    'table-condensed'   - table with smaller top and bottom cell padding
                                    'table-hover'       - rows highlighted on mouse hover
                                    'table-vcenter'     - middle align content vertically
                                -->
                                <table id="general-table" class="table table-striped table-bordered table-vcenter table-hover">
                                    <tbody>
                                    <?php foreach($fl as $row): ?>
                                        <tr>
                                            <td><strong><?php echo $row['nama_dokumen'] ?></strong></td>
                                            <td>
                                                <?php
                                                    $id_dokumen = $row['id_dokumen']; 
                                                    $dok = $new->get_file($id_dokumen);
                                                    $file = mysqli_num_rows($dok);
                                                    if ($file > 0) {
                                                        $j = mysqli_fetch_array($dok);
                                                        $files = $j['file'];
                                                        $embed = "return embed('embed.php?id=$files');";
                                                        $nama   = "Lihat ".$row['nama_dokumen'];
                                                        $idd    = $row['id_dokumen'];
                                                        $nik    = $penduduk['nik'];
                                                        $k1     = "<!--";
                                                        $k2     = "-->";
                                                        $k3     = "";
                                                        $k4     = "";
                                                        $submit = "return false;";
                                                    }else{
                                                        $idd    = $row['id_dokumen'];
                                                        $nik    = $penduduk['nik'];
                                                        $nama   = "Tambah ".$row['nama_dokumen'];
                                                        $k1     = "";
                                                        $k2     = "";
                                                        $k3     = "<!--";
                                                        $k4     = "-->";
                                                    }

                                                ?>
                                                <?php echo $k1; ?>
                                            <form action="detail.php" method="post" enctype="multipart/form-data">
                                                <input type="file" name="file" class="form-control" id="example-file-input" required="Pilih File Dulu">
                                                <br>
                                                <input type="hidden" name="id_dokumen" value="<?php echo $idd; ?>">
                                                <input type="hidden" name="nik" value="<?php echo $nik; ?>">

                                                <button type="submit" data-toggle="tooltip" title="<?php echo $nama; ?>" class="btn btn-effect-ripple btn-info" name="tambah_file"><i class="fa fa-plus"></i> <?php echo $nama; ?></button>
                                            </form> 
                                                <?php echo $k2; ?>
                                                <?php echo $k3; ?>
                                            <form action="detail.php" method="post">

                                                <input type="hidden" name="id_dokumen" value="<?php echo $idd; ?>">
                                                <input type="hidden" name="nik" value="<?php echo $nik; ?>">

                                                <a onclick="<?php echo $embed; ?>" data-toggle="tooltip" title="<?php echo $nama; ?>" class="btn btn-effect-ripple btn-warning"><i class="fa fa-search"></i> <?php echo $nama; ?></a>

                                                <button type="submit" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus <?php echo $row['nama_dokumen'] ?> ?');" href="detail.php" data-toggle="tooltip" title="Hapus <?php echo $row['nama_dokumen'] ?>" class="btn btn-effect-ripple btn-danger" name="hapus_file"><i class="fa fa-times"></i> Hapus <?php echo $row['nama_dokumen']; ?></button>
                                            </form>
                                                <?php echo $k4; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- END Table Styles Content -->
                        </div>
                        </div>
                        <!-- END Table Styles Block -->
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

    </body>
</html>