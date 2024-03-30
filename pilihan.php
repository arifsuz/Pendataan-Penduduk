<?php 
if ($_GET['menu'] == 404) {
    include('login/login.php');
    $a = new Login();
    $a->logout();
}

elseif ($_GET['menu'] == "") {
    header("location:dashboard/index.php");
}elseif($_GET['menu'] == 1){
    header("location:agama/index.php?menu=1");
}elseif($_GET['menu'] == 2){
    header("location:dokumen/index.php?menu=2");
}elseif($_GET['menu'] == 3){ 
    header("location:klasifikasi/index.php?menu=3");
}elseif($_GET['menu'] == 4){ 
    header("location:kk/index.php?menu=4");
}elseif($_GET['menu'] == 5){
    header("location:penduduk/index.php?menu=5");
}elseif($_GET['menu'] == 6){
    header("location:chat/index.php?menu=6");
}elseif($_GET['menu'] == 7){
    header("location:admin/index.php?menu=7");
}elseif($_GET['menu'] == 8){
    header("location:laporan/index.php?menu=8");
}
?>