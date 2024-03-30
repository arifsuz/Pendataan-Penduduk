<?php 
session_start();
class Chat
{
    public function online(){
        include ("../koneksi.php");
        $online = $_mysqli->query("SELECT * FROM penduduk WHERE status = '1'");
        return $online;
    }

    public function offline(){
        include ("../koneksi.php");
        $offline = $_mysqli->query("SELECT * FROM penduduk WHERE status = '0'");
        return $offline;
    }

    public function pesan(){
        include ("../koneksi.php");
        $pesan = $_mysqli->query("SELECT * FROM pesan, penduduk WHERE pesan.nik = penduduk.nik");
        return $pesan;
    }

}

 ?>