<!DOCTYPE html>
<?php
session_start();
if (isset($_SESSION['userdata'])) {
    header('location:pilihan.php');
}

if (isset($_POST['val-username']) and isset($_POST['val-password'])) {
    include('login/login.php');
    $user = new Login();
    $u = $_POST['val-username'];
    $p = $_POST['val-password'];
    $user->login_proses($u, $p);
}
?>
<!--[if IE 9]>         <html class="no-js lt-ie10" lang="en"> <![endif]-->
<!--[if gt IE 9]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8">

    <title>LOGIN PENGGUNA</title>

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
    <!-- Login Container -->
    <div id="login-container">
        <!-- Login Header -->
        <h1 class="h2 text-light text-center push-top-bottom animation-slideDown">
            <i class="fa fa-users"></i> <br> <br> <strong>SELAMAT DATANG DI <br> JAVCO PENDATAAN WARGA</strong>
        </h1>
        <!-- END Login Header -->
 
        <!-- Login Block -->
        <div class="block animation-fadeInQuickInv">
            <!-- Login Title -->
            <div class="block-title">
                <div class="block-options pull-right">
                    <a href="daftar.php" class="btn btn-effect-ripple btn-primary" data-toggle="tooltip" data-placement="left" title="Buat akun baru"><i class="fa fa-plus"></i></a>
                </div>
                <h2>Silahkan Login</h2>
            </div>
            <!-- END Login Title -->

            <?php
            if (isset($_COOKIE['alert'])) {
                echo $_COOKIE['alert'];
            } else {
                echo "";
            }
            ?>

            <!-- Login Form -->
            <form id="form-validation" action="index.php" method="post" class="form-horizontal">
                <div class="form-group">
                    <div class="col-xs-12">
                        <input type="text" id="val-username" name="val-username" class="form-control" placeholder="Masukkan Username ..." autofocus autocomplete="off">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        <input type="password" id="val-password" name="val-password" class="form-control" placeholder="Masukkan Password ..." autocomplete="off">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4"></div>
                    <div class="col-sm-4 text-right">
                        <button type="submit" class="btn btn-effect-ripple btn-sm btn-primary"><i class="fa fa-lock"></i> Login</button>
                    </div>
                    <div class="col-sm-4"></div>
                </div>
            </form>
            <!-- END Login Form -->

        </div>
        <!-- END Login Block -->

        <!-- Footer -->
        <footer class="text-muted text-center animation-pullUp">
            <small><span>2023</span> &copy; <a href="https://fasilkom.mercubuana.ac.id/" target="_blank">FASILKOM.UMB</a> | Repost by <a href="https://linktr.ee/jav.co" title="JAV.CO" target="_blank">JAV.CO</a></small>
        </footer>
        <!-- END Footer -->
    </div>
    <!-- END Login Container -->

    <!-- jQuery, Bootstrap, jQuery plugins and Custom JS code -->
    <script src="assets/js/vendor/jquery-2.2.4.min.js"></script>
    <script src="assets/js/vendor/bootstrap.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/app.js"></script>

    <!-- Load and execute javascript code used only in this page -->
    <script src="assets/js/pages/formsValidation.js"></script>
    <script>
        $(function() {
            FormsValidation.init();
        });
    </script>


</body>

</html>