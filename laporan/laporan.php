<?php
session_start();
class Laporan
{

    //menampilkan
    public function get_agama(){
        include ('../koneksi.php');
        $agama = $_mysqli->query("SELECT * FROM agama");
        return $agama;
    }

    //menampilkan klasifikasi
    public function get_klasifikasi(){
        include ('../koneksi.php');
        $klasifikasi = $_mysqli->query("SELECT * FROM klasifikasi");
        return $klasifikasi;
    }

    //menampilkan kk
    public function get_kk(){
        include ('../koneksi.php');
        $kk = $_mysqli->query("SELECT * FROM penduduk, kk where penduduk.nik = kk.kepala_keluarga");
        return $kk;
    }

    //menampilkan ekspor
    public function get_all($kk, $agama, $klasifikasi){
        include ('../koneksi.php');
        if($kk!=""){
		$and="AND kk.no_kk='$kk'";
		}else{
			$and="";
		}
		if($agama!=""){
			$and1="AND agama.id_agama='$agama'";
		}else{
			$and1="";
		}
		if($klasifikasi!=""){
			$and2="AND klasifikasi.id_klasifikasi='$klasifikasi'";
		}else{
			$and2="";
		}

        $all = $_mysqli->query("SELECT * FROM penduduk, agama, klasifikasi, kk 
        						WHERE penduduk.no_kk = kk.no_kk
        						AND penduduk.id_agama = agama.id_agama
        						AND penduduk.id_klasifikasi = klasifikasi.id_klasifikasi
        						".$and."
        						".$and1."
        						".$and2."
        						");
        return $all;
	}

}
 ?>