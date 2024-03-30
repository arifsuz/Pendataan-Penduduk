<?php 
session_start();
class Dashboard
{

    public function __construct(){
        
    }

    public function tampil(){
        include('../koneksi.php');
        $jumlah = $_mysqli->query("SELECT * FROM penduduk");
        $a = $_mysqli->query("SELECT id_klasifikasi FROM penduduk WHERE id_klasifikasi = 'K1'");
        $b = $_mysqli->query("SELECT id_klasifikasi FROM penduduk WHERE id_klasifikasi = 'K2'");
        $c = $_mysqli->query("SELECT id_klasifikasi FROM penduduk WHERE id_klasifikasi = 'K3'");
        $d = $_mysqli->query("SELECT id_klasifikasi FROM penduduk WHERE id_klasifikasi = 'K4'");
        $l = $_mysqli->query("SELECT jk FROM penduduk WHERE jk = 'L'");
        $p = $_mysqli->query("SELECT jk FROM penduduk WHERE jk = 'P'");

        return array($jumlah, $a, $b, $c, $d, $l, $p); 
    }
}
?>

    