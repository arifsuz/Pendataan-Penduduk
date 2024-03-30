<!DOCTYPE html>
<?php
    
include ('kk.php');
$new = new KK();

//raad
$kk = $new->get_kk();
$id_new = $new->get_id();

//delete
if (isset($_GET['hapus'])) {
    $new->hapus();
}

//create
if (isset($_POST['tambah'])){
    $new->tambah();
}

//tambah penduduk
if (isset($_POST['tambah_anggota'])) {
    $new->tambah_anggota();
}

$_SESSION['aktif'] = 'kk';
$level = $_SESSION['level'];
if ($level == 'admin') {
    $menu = "../menu.php";
}else{
    $menu = "../menu_user.php";
}

$profil = "../profil.php";
$title = "KARTU KELUARGA || JAVCO";
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

        <!-- The following Icons can be replaced with your own, they are used by desktop and mobile browsers -->
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
                                            <li>KARTU KELUARGA</li>
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
                                <h2><i class="fa fa-cubes sidebar-nav-icon"></i> KARTU KELUARGA</h2>
                            </div>
                            <a href="#modal-fade" title="Tambah kk" class="btn btn-effect-ripple btn-info" data-toggle="modal"><i class="fa fa-plus"></i> Tambah KK</a>
                            <br>
                            <br>
                            <div class="table-responsive">
                                <table id="example-datatable" class="table table-striped table-bordered table-vcenter">
                                    <thead>
                                        <tr>
                                            <th class="text-center" style="width: 50px;">No</th>
                                            <th>Nomor KK</th>
                                            <th>Nama Kepala Keluarga</th>
                                            <th>RT / RW</th>
                                            <th>Jumlah Keluarga</th>
                                            <th class="text-center" style="width: 200px;"><i class="fa fa-flash"></i> Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $no=0; foreach ($kk as $row): $no++?>
                                        <tr>
                                            <td class="text-center"><?php echo $no; ?></td>
                                            <td><?php echo $row['no_kk'];?></td>
                                            <td>
                                                <?php 
                                                    include('../koneksi.php');
                                                    $id = $row['no_kk'];
                                                    $nm = $_mysqli->query("SELECT * FROM penduduk, kk 
                                                                            WHERE penduduk.no_kk = kk.no_kk
                                                                            AND kk.no_kk = '$id'");
                                                    $jumlah = mysqli_num_rows($nm);
                                                    $nama   = mysqli_fetch_array($nm);
                                                    $nik    = $nama['kepala_keluarga'];

                                                    $kkk = $_mysqli->query("SELECT nama FROM penduduk 
                                                                            WHERE nik = '$nik'");
                                                    $namak   = mysqli_fetch_array($kkk);
                                                
                                                        if ($jumlah < 1) {
                                                            echo "<i>KK Belum di Update</i>";
                                                        }else{
                                                            echo "<strong>".$namak['nama']."</strong>";
                                                        }
                                                ?>
                                                
                                            </td>
                                            <td><?php echo $row['rt'];?> / <?php echo $row['rw'];?></td>
                                            <td><span class="label label-warning"><?php echo $jumlah." Orang"; ?></span></td>
                                            <td class="text-center">
                                                <a href="detail.php?detail=<?php echo $row['no_kk']; ?>" data-toggle="tooltip" title="Detail <?php echo $row['no_kk']?>" class="btn btn-effect-ripple btn-warning"><i class="fa fa-search"></i></a>
                                                <a href="edit.php?edit=<?php echo $row['no_kk']; ?>" data-toggle="tooltip" title="Edit <?php echo $row['no_kk']?>" class="btn btn-effect-ripple btn-success"><i class="fa fa-pencil"></i></a>
                                                <a onclick="return confirm('Apakah Anda Yakin Ingin Menghapus <?php echo $row['no_kk'] ?> ? , DATA PENDUDUK DALAM KK <?php echo $row['no_kk'] ?> JUGA AKAN TERHAPUS');" href="?hapus=<?php echo $row['no_kk']; ?>" data-toggle="tooltip" title="Hapus <?php echo $row['no_kk']?>" class="btn btn-effect-ripple btn-danger"><i class="fa fa-times"></i></a>
                                            </td>
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

        <!-- Regular Fade -->
        <div id="modal-fade" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h3 class="modal-title"><strong><i class="fa fa-plus"></i> Tambah kk</strong></h3>
                    </div>
                    <div class="modal-body">
                        <form action="index.php" method="post" class="form-bordered">
                            <div class="form-group">
                                <label>ID KK</label>
                                <input type="text" name="id_kk" class="form-control" value="<?php echo $id_new['id_new']; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label>No KK</label>
                                <input type="text" name="no_kk" class="form-control" placeholder="Masukkan No KK" required>
                            </div>
                            <div class="form-group">
                                <label>RT</label>
                                <input type="text" name="rt" class="form-control" placeholder="Masukkan RT" required>
                            </div>
                            <div class="form-group">
                                <label>RW</label>
                                <input type="text" name="rw" class="form-control" placeholder="Masukkan RW" required>
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                <input type="text" name="alamat" class="form-control" placeholder="Masukkan Alamat" required>
                            </div>
                            <div class="form-group">
                                <label>Kelurahan</label>
                                <input type="text" name="desa" class="form-control" placeholder="Masukkan Desa" required>
                            </div>
                            <div class="form-group">
                                <label>Kecamatan</label>
                                <input type="text" name="kecamatan" class="form-control" placeholder="Masukkan Kecamatan" required>
                            </div>
                            <div class="form-group">
                                <label>Kota</label>
                                <input type="text" name="kabupaten" class="form-control" placeholder="Masukkan Kabupaten" required>
                            </div>
                            <div class="form-group">
                                <label>Kode Pos</label>
                                <input type="text" name="kode_pos" class="form-control" placeholder="Masukkan Kode Pos" required>
                            </div>
                            <div class="form-group">
                                <label>Provinsi</label>
                                <input type="text" name="provinsi" class="form-control" placeholder="Masukkan Provinsi" required>
                            </div>
                            <div class="form-group form-actions">
                                <button type="submit" class="btn btn-effect-ripple btn-primary" name="tambah">Tambah</button>
                                <button type="reset" class="btn btn-effect-ripple btn-danger">Reset</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- END Regular Fade -->

        <!-- jQuery, Bootstrap, jQuery plugins and Custom JS code -->
        <script src="../assets/js/vendor/jquery-2.2.4.min.js"></script>
        <script src="../assets/js/vendor/bootstrap.min.js"></script>
        <script src="../assets/js/plugins.js"></script>
        <script src="../assets/js/app.js"></script>

        <!-- Load and execute javascript code used only in this page -->
        <script src="../assets/js/pages/uiTables.js"></script>
        <script>$(function () {UiTables.init();});</script>
        
        <!-- ckeditor.js, load it only in the page you would like to use CKEditor (it's a heavy plugin to include it with the others!) -->
        <script src="../assets/js/plugins/ckeditor/ckeditor.js"></script>

        <!-- Load and execute javascript code used only in this page -->
        <script src="../assets/js/pages/formsComponents.js"></script>
        <script>$(function(){ FormsComponents.init(); });</script>

         <!-- Load and execute javascript code used only in this page -->
        <script src="../assets/js/pages/uiProgress.js"></script>
        <script>$(function () { UiProgress.init(); });</script>
        

    </body>
</html>