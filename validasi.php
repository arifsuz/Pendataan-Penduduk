<!DOCTYPE html>
<?php
    session_start();
    if (isset($_SESSION['level'])) {
        header('location:pilihan.php');
    }

    include('login/login.php');
    $x = new Login();

    $sesi = $x->get_validasi();

    if (isset($_POST['validasi'])){
        $x->validasi_user();
    }

 ?>
<!--[if IE 9]>         <html class="no-js lt-ie10" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">

        <title>VALIDASI AKSES</title>

        <meta name="description" content="AppUI is a Web App Bootstrap Admin Template created by pixelcave and published on Themeforest">
        <meta name="author" content="pixelcave">
        <meta name="robots" content="noindex, nofollow">

        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

        <!-- Icons -->
        <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
        <link rel="icon" type="image/png" href="assets/img/logo.png">
        <!-- END Icons -->

        <!-- Stylesheets -->
        <!-- Bootstrap is included in its original form, unaltered -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">

        <!-- Related styles of various icon packs and plugins -->
        <link rel="stylesheet" href="assets/css/plugins.css">

        <!-- The main stylesheet of this template. All Bootstrap overwrites are defined in here -->
        <link rel="stylesheet" href="assets/css/main.css">

        <!-- Include a specific file here from assets/css/themes/ folder to alter the default theme of the template -->

        <!-- The themes stylesheet of this template (for using specific theme color in individual elements - must included last) -->
        <link rel="stylesheet" href="assets/css/themes.css">
        <!-- END Stylesheets -->

        <!-- Modernizr (browser feature detection library) -->
        <script src="assets/js/vendor/modernizr-3.3.1.min.js"></script>
    </head>
    <body>
        <!-- Full Background -->
        <!-- For best results use an image with a resolution of 1280x1280 pixels (prefer a blurred image for smaller file size) -->
        <img src="assets/img/placeholders/layout/lock_full_bg.jpg" alt="Full Background" class="full-bg full-bg-bottom animation-pulseSlow">
        <!-- END Full Background -->

        <!-- Login Container -->
        <div id="login-container">
            <!-- Lock Header -->
            <h1 class="text-center text-light push-top-bottom animation-fadeInQuick">
                <strong>Pilih Akses</strong><br>
            </h1>
            <!-- END Lock Header -->

            <!-- Lock Form -->
            <?php foreach ($sesi as $row): ?>
            <form action="validasi.php" method="post" class="form-horizontal push animation-fadeInQuick">
                <div class="form-group">
                    <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2">
                        <div class="input-group input-group-lg">
                            <div class="input-group-btn">
                                <input type="hidden" name="nama_akses" value="<?php echo $row['nama_akses'] ?>" >
                                <button type="submit" name="validasi" class="btn btn-effect-ripple btn-block btn-primary"><i class="fa fa-unlock-alt"></i>  <?php echo $row['nama_akses'] ?></button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <?php endforeach; ?>
            <!-- END Lock Form -->
        </div>
        <!-- END Login Container -->

        <!-- jQuery, Bootstrap, jQuery plugins and Custom JS code -->
        <script src="assets/js/vendor/jquery-2.2.4.min.js"></script>
        <script src="assets/js/vendor/bootstrap.min.js"></script>
        <script src="assets/js/plugins.js"></script>
        <script src="assets/js/app.js"></script>
    </body>
</html>