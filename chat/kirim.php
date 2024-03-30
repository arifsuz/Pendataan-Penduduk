<?php 
session_start();
include('../koneksi.php');
if (isset($_POST['pesan'])) {
	$nik = $_SESSION['userdata'];
	$pesan = $_POST['pesan'];
	date_default_timezone_set('Asia/Jakarta');
    $waktu = date("d-m-Y  H:i");

	$kirim = $_mysqli->query("INSERT INTO `pesan` (`nik`, `pesan`, `waktu`) VALUES ('$nik', '$pesan', '$waktu')");

	if ($kirim) {
		print "terkirim";
	}else{
		print "gagal";
	}
}

 ?>