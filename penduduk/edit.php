<!DOCTYPE html>
<?php 
include ('penduduk.php');
$new = new Penduduk();

//untuk select option
$agama = $new->get_agama();
$klasifikasi = $new->get_klasifikasi();
$kk = $new->get_kk();

//update
if (isset($_GET['edit'])) {
    $edit = $new->edit();
}

//edit proses

if (isset($_POST['edit_proses'])) {
    $new->edit_proses();
}

$aktiv = $_SESSION['aktif'];
if ($aktiv == 'penduduk') {
    $_SESSION['aktif'] = 'penduduk';
}else{
    $_SESSION['aktif'] = 'kk';
};

$menu = "../menu.php";
$profil = "../profil.php";
$title = "EDIT || PENDUDUK || JAVCO";
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

        <!--file upload-->
        <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap-fileupload.min.css" />
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
                                            <li><a href="../pilihan.php?menu=3">PENDUDUK</a></li>
                                            <li>EDIT</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END Table Styles Header -->
                        <div class="row">
                        <!-- Input States Block -->
                        <div class="col-md-8">
                        <div class="block">
                            <!-- Input States Title -->
                            <div class="block-title">
                                <div class="block-options pull-right">
                                    <a href="javascript:void(0)" class="btn btn-effect-ripple btn-default toggle-bordered enable-tooltip" data-toggle="button" title="Toggles .form-bordered class">Borderless</a>
                                </div>
                                <h2>Edit Penduduk</h2>
                            </div>
                            <!-- END Input States Title -->

                            <!-- Input States Content -->
                            <form action="edit.php?id<?php echo $edit['nik']; ?>" method="post" class="form-horizontal form-bordered" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label class="col-md-3">NIK</label>
                                    <div class="col-md-8">
                                        <input type="text" name="nik" class="form-control" value="<?php echo $edit['nik'] ?>" readonly>
                                        <input type="hidden" name="kk" value="<?php echo $edit['no_kk'] ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3">Nama</label>
                                    <div class="col-md-8">
                                        <input type="text" name="nama" class="form-control" value="<?php echo $edit['nama']; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3">Tempat Lahir</label>
                                    <div class="col-md-8">
                                        <input type="text" name="tempat_lahir" class="form-control" value="<?php echo $edit['tempat_lahir'] ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3">Tanggal Lahir</label>
                                    <div class="col-md-8">
                                        <input id="example-datepicker3" type="text" name="tanggal_lahir" class="form-control input-datepicker" data-date-format="dd-mm-yyyy" value="<?php echo $edit['tanggal_lahir'] ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3">Jenis Kelamin</label>
                                    <div class="col-md-8">
                                        <select name="jk" id="example-chosen" class="select-chosen">
                                            <option value="">--Pilih Jenis Kelamin--</option>
                                            <option value="L" <?php if($edit['jk'] == "L"){echo "selected";} ?>>Laki-Laki</option>
                                            <option value="P" <?php if($edit['jk'] == "P"){echo "selected";} ?>>Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3">Golongan Darah</label>
                                    <div class="col-md-8">
                                        <select name="golongan_darah" id="example-chosen" class="select-chosen" required>
                                            <option value="">--Pilih Golongan Darah--</option>
                                            <option value="A" <?php if($edit['golongan_darah'] == "A"){echo "selected";} ?>>A</option>
                                            <option value="B" <?php if($edit['golongan_darah'] == "B"){echo "selected";} ?>>B</option>
                                            <option value="AB" <?php if($edit['golongan_darah'] == "AB"){echo "selected";} ?>>AB</option>
                                            <option value="O" <?php if($edit['golongan_darah'] == "O"){echo "selected";} ?>>O</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3">Pendidikan</label>
                                    <div class="col-md-8">
                                        <select name="pendidikan" id="example-chosen" class="select-chosen" required>
                                            <option value="">--Pilih Pendidikan--</option>
                                            <option value="SD" <?php if($edit['pendidikan'] == "SD"){echo "selected";} ?>>SD Sederajat</option>
                                            <option value="SMP" <?php if($edit['pendidikan'] == "SMP"){echo "selected";} ?>>SMP Sederajat</option>
                                            <option value="SMA" <?php if($edit['pendidikan'] == "SMA"){echo "selected";} ?>>SMP Sederajat</option>
                                            <option value="D1" <?php if($edit['pendidikan'] == "D1"){echo "selected";} ?>>D1</option>
                                            <option value="D2" <?php if($edit['pendidikan'] == "D2"){echo "selected";} ?>>D2</option>
                                            <option value="D3" <?php if($edit['pendidikan'] == "D3"){echo "selected";} ?>>D3</option>
                                            <option value="D4/S1" <?php if($edit['pendidikan'] == "D4/S1"){echo "selected";} ?>>D4 / S1</option>
                                            <option value="S2" <?php if($edit['pendidikan'] == "S2"){echo "selected";} ?>>S2</option>
                                            <option value="S3" <?php if($edit['pendidikan'] == "S3"){echo "selected";} ?>>S3</option>
                                            <option value="Lainnya" <?php if($edit['pendidikan'] == "Lainnya"){echo "selected";} ?>>Lainnya</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3">Pekerjaan</label>
                                    <div class="col-md-8">
                                        <select name="pekerjaan" id="example-chosen" class="select-chosen" required>
                                            <option value="">--Pilih Pekerjaan--</option>
                                            <option value="KARYAWAN SWASTA" <?php if($edit['pekerjaan'] == "KARYAWAN SWASTA"){echo "selected";} ?>>KARYAWAN SWASTA</option>
                                            <option value="PNS" <?php if($edit['pekerjaan'] == "PNS"){echo "selected";}?>>PNS</option>
                                            <option value="PELAJAR/MAHASISWA" <?php if($edit['pekerjaan'] == "PELAJAR/MAHASISWA"){echo "selected";} ?>>PELAJAR/MAHASISWA</option>
                                            <option value="PETANI" <?php if($edit['pekerjaan'] == "PETANI"){echo "selected";} ?>>PETANi</option>
                                            <option value="WIRAUSAHA" <?php if($edit['pekerjaan'] == "WIRAUSAHA"){echo "selected";} ?>>WIRAUSAHA</option>
                                            <option value="TIDAK BEKERJA" <?php if($edit['pekerjaan'] == "TIDAK BEKERJA"){echo "selected";} ?>>TIDAK BEKERJA</option>
                                            <option value="Lainnya" <?php if($edit['pekerjaan'] == "Lainnya"){echo "selected";} ?>>WIRAUSAHA</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3">Status Perkawinan</label>
                                    <div class="col-md-8">
                                        <select name="status_perkawinan" id="example-chosen" class="select-chosen" required>
                                            <option value="">--Status Perkawinan--</option>
                                            <option value="KAWIN" <?php if($edit['status_perkawinan'] == "KAWIN"){echo "selected";} ?>>Kawin</option>
                                            <option value="BELUM KAWIN" <?php if($edit['status_perkawinan'] == "BELUM KAWIN"){echo "selected";} ?>>Belum Kawin</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3">Kewarganegaraan</label>
                                    <div class="col-md-8">
                                        <select name="kewarganegaraan" id="example-chosen" class="select-chosen" required>
                                            <option value="">--Kewarganegaraan--</option>
                                            <option value="WNI" <?php if($edit['kewarganegaraan'] == "WNI"){echo "selected";} ?>>WNI</option>
                                            <option value="WNA" <?php if($edit['kewarganegaraan'] == "WNA"){echo "selected";} ?>>WNA</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3">Agama</label>
                                    <div class="col-md-8">
                                        <select name="id_agama" id="example-chosen" class="select-chosen" required>
                                            <option value="">--Pilih Agama--</option>
                                            <?php foreach($agama as $row): ?>
                                            <option value="<?php echo $row['id_agama'] ?>" <?php if($row['id_agama'] == $edit['id_agama']){echo "selected";} ?>><?php echo $row['nama_agama'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3">Klasifikasi</label>
                                    <div class="col-md-8">
                                        <?php 
                                            //tahun_sekarang
                                            date_default_timezone_set('Asia/Jakarta');
                                            $sekarang = date("Y");
                                        ?>
                                        <select name="id_klasifikasi" id="example-chosen" class="select-chosen" required>
                                            <option value="">--Klasifikasi Penduduk--</option>
                                        <?php foreach($klasifikasi as $rows): ?>
                                            <option value="<?php echo $rows['id_klasifikasi'] ?>" <?php if($rows['id_klasifikasi'] == $edit['id_klasifikasi']){echo "selected";} ?>><?php echo $rows['nama_klasifikasi'] ?></option>
                                        <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <?php 
                                    $k = $edit['no_kk'];
                                    $nk = $edit['nik'];
                                    include('../koneksi.php');
                                    $ro = $_mysqli->query("SELECT * FROM kk WHERE no_kk = '$k' AND kepala_keluarga = '$nk'");
                                    $cek = mysqli_num_rows($ro);
                                    if ($cek > 0) {
                                         $komen = "<!--";
                                         $komen2 = "-->";
                                     }else{
                                        $komen = "";
                                         $komen2 = "";
                                     }
                                ?>
                                <?php echo $komen; ?>
                                <div class="form-group">
                                    <label class="col-md-3">Kartu Keluarga</label>
                                    <div class="col-md-8">
                                        <select name="no_kk" id="example-chosen" class="select-chosen" required>
                                            <option value="">--Pilih Kartu Keluarga--</option>
                                        <?php foreach($kk as $roww): ?>
                                            <option value="<?php echo $roww['no_kk'] ?>" <?php if($edit['no_kk'] == $roww['no_kk']){echo "selected";} ?>><?php echo $roww['no_kk'] ?> KK A.N. <?php echo $roww['nama'] ?></option>
                                        <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <?php echo $komen2; ?>
                                <div class="form-group">
                                    <label class="col-md-3">Foto</label>
                                    <div class="col-md-8">
                                        <div class="fileupload fileupload-new" data-provides="fileupload">
                                            <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                                <img src="../foto/<?php echo $edit['foto'] ?>" alt=""/>
                                            </div>
                                            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                            <div>
                                                   <span class="btn btn-default btn-file">
                                                   <span class="fileupload-new"><i class="fa fa-camera"></i> Edit Foto</span>
                                                   <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                                   <input type="file" class="default" name="foto"/>
                                                   <input type="hidden" value="<?php echo $edit['foto'] ?>" name="foto_lawas"/>
                                                   </span>
                                                <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i> Remove</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-group form-actions">
                                    <div class="col-md-12">
                                        <button type="submit" name="edit_proses" class="btn btn-effect-ripple btn-primary">Edit</button>
                                        <button type="reset" class="btn btn-effect-ripple btn-danger">Reset</button>
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


        <!--file upload-->
        <script type="text/javascript" src="../assets/js/bootstrap-fileupload.min.js"></script>
        

    </body>
</html>