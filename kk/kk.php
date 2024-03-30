<?php
session_start();
class KK
{

    //menampilkan
    public function get_kk(){
        include ('../koneksi.php');
        $kk = $_mysqli->query("SELECT * FROM kk");
        return $kk;
    }

    //menampilkan_penduduk
    public function get_penduduk_kk(){
        include ('../koneksi.php');
        $no_kk = $_GET['detail'];
        $penduduk_kk = $_mysqli->query("SELECT * FROM penduduk, kk
                                    WHERE penduduk.no_kk = kk.no_kk
                                    AND penduduk.no_kk = '$no_kk'");
        return $penduduk_kk;
    }

    //menampilkan_judul
    public function get_judul_kk(){
        include ('../koneksi.php');
        $no_kk = $_GET['detail'];
        $kk = $_mysqli->query("SELECT penduduk.nama FROM penduduk, kk
                                    WHERE penduduk.no_kk = kk.no_kk
                                    AND kk.kepala_keluarga = penduduk.nik
                                    AND penduduk.no_kk = '$no_kk'");
        $penduduk_kk = mysqli_fetch_array($kk);
        return $penduduk_kk;
    }

    //menampilkan id
    public function get_id(){
        include ('../koneksi.php');
        $dok = $_mysqli->query("SELECT MAX(id_kk) + 1 as id_new FROM kk");
        $id_kk = mysqli_fetch_array($dok);
        return $id_kk;
    }
 
    //tambah kk
    public function tambah(){
        $id_kk  = $_POST['id_kk'];
        $no_kk  = $_POST['no_kk'];
        $rt     = $_POST['rt'];
        $rw     = $_POST['rw'];
        $alamat = $_POST['alamat'];
        $desa   = $_POST['desa'];
        $kecamatan     = $_POST['kecamatan'];
        $kabupaten     = $_POST['kabupaten'];
        $kode_pos     = $_POST['kode_pos'];
        $provinsi     = $_POST['provinsi'];
        include ('../koneksi.php');
        $tambah = $_mysqli->query("INSERT INTO kk (id_kk, no_kk, rt, rw, alamat, desa, kecamatan, kabupaten, kode_pos, provinsi, status) 
                                    VALUES ('$id_kk', '$no_kk', '$rt', '$rw', '$alamat', '$desa', '$kecamatan', '$kabupaten', '$kode_pos', '$provinsi', 1)");
        if ($tambah) {
$nilai = 
<<<HEREDOCS
            <!-- Danger Alert -->
            <div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><strong>Sukses</strong></h4>
                <p>Data <strong>$no_kk</strong> Berhasil ditambahkan !</p>
            </div>
            <!-- END Danger Alert -->
HEREDOCS;
                setcookie("alert", $nilai, time()+2);
                header('location:../pilihan.php?menu=4');
                return TRUE;
        }else{
$nilai = 
<<<HEREDOCS
            <!-- Danger Alert -->
            <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><strong>Error</strong></h4>
                <p>Data <strong>$no_kk</strong> gagal ditambahkan !</p>
            </div>
            <!-- END Danger Alert -->
HEREDOCS;
                setcookie("alert", $nilai, time()+2);
                header('location:../pilihan.php?menu=4');
                return TRUE;
        }
    }

    //hapus kk
    public function hapus(){
        include ('../koneksi.php');
        $id = $_GET['hapus'];
        $nama   = $_mysqli->query("SELECT no_kk FROM kk WHERE no_kk = '$id'");
        $nm = mysqli_fetch_array($nama);
        $nw = $nm['no_kk'];
        $_mysqli->query("START TRANSACTION;");
        $hapus = $_mysqli->query("DELETE FROM kk WHERE no_kk = '$id'");
        $hapus_pend = $_mysqli->query("DELETE FROM penduduk WHERE no_kk = '$id'");
        if ($hapus && $hapus_pend) {
            $res = $_mysqli->query("COMMIT");
            if($res){
$nilai = 
<<<HEREDOCS
            <!-- Danger Alert -->
            <div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><strong>Sukses</strong></h4>
                <p>Data <strong>$nw</strong> Berhasil dihapus !</p>
            </div>
            <!-- END Danger Alert -->
HEREDOCS;
                setcookie("alert", $nilai, time()+2);
                header('location:../pilihan.php?menu=4');
                return TRUE;
            }else{
                $res = $res = $_mysqli->query("ROLLBACK");
                var_dump($res);
$nilai = 
<<<HEREDOCS
            <!-- Danger Alert -->
            <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><strong>Error</strong></h4>
                <p>Data <strong>$nw</strong> gagal dihapus !</p>
            </div>
            <!-- END Danger Alert -->
HEREDOCS;
                setcookie("alert", $nilai, time()+2);
                header('location:../pilihan.php?menu=4');
                return TRUE;
            }
        }
    }

    //edit kk
    public function edit(){
        include ('../koneksi.php');
        $id_kk = $_GET['edit'];
        $ag = $_mysqli->query("SELECT * FROM kk WHERE no_kk = '$id_kk'");
        $kk = mysqli_fetch_array($ag);
        return $kk;
    }

    //edit proses
    public function edit_proses(){
        include ('../koneksi.php');
        $kkk = $_POST['kkk'];
        $no_kk  = $_POST['no_kk'];
        $rt     = $_POST['rt'];
        $rw     = $_POST['rw'];
        $alamat = $_POST['alamat'];
        $desa   = $_POST['desa'];
        $kecamatan     = $_POST['kecamatan'];
        $kabupaten     = $_POST['kabupaten'];
        $kode_pos     = $_POST['kode_pos'];
        $provinsi     = $_POST['provinsi'];
        $_mysqli->query("START TRANSACTION;");
        $edit = $_mysqli->query("UPDATE kk SET no_kk= '$no_kk', rt = '$rt', rw = '$rw', alamat = '$alamat', desa = '$desa',
                                    kecamatan = '$kecamatan', kabupaten = '$kabupaten', kode_pos = '$kode_pos', provinsi = '$provinsi' WHERE no_kk = '$kkk'");
        $edit_pend = $_mysqli->query("UPDATE penduduk SET no_kk = '$no_kk' WHERE no_kk = '$kkk'");
        if ($edit && $edit_pend) {
            $res = $_mysqli->query("COMMIT");
            if($res){
$nilai = 
<<<HEREDOCS
            <!-- Danger Alert -->
            <div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><strong>Sukses</strong></h4>
                <p>Data <strong>$nama_kk</strong> Berhasil diedit !</p>
            </div>
            <!-- END Danger Alert -->
HEREDOCS;
                setcookie("alert", $nilai, time()+2);
                header('location:../pilihan.php?menu=4');
                return TRUE;
            }else{
                $res = $_mysqli->query("ROLLBACK");
                var_dump($res);
$nilai = 
<<<HEREDOCS
            <!-- Danger Alert -->
            <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><strong>Error</strong></h4>
                <p>Data <strong>$nama_kk</strong> gagal diedit !</p>
            </div>
            <!-- END Danger Alert -->
HEREDOCS;
                setcookie("alert", $nilai, time()+2);
                header('location:../pilihan.php?menu=4');
                return TRUE;
            }
        }
    }

    //detail 
    public function detail_kk(){
        include ('../koneksi.php');
        $id_kk = $_GET['detail'];
        $kk = $_mysqli->query("SELECT * FROM kk , dokumen, kk_dokumen
                                        WHERE kk.id_kk = kk_dokumen.id_kk
                                        AND dokumen.id_dokumen = kk_dokumen.id_dokumen
                                        AND kk.id_kk = '$id_kk'");
        return $kk;

    }

    //mengambil data untuk select 
    public function get_agama(){
        include ('../koneksi.php');
        $agama = $_mysqli->query("SELECT * FROM agama");
        return $agama;
    }
    public function get_klasifikasi(){
        include ('../koneksi.php');
        $klasifikasi = $_mysqli->query("SELECT * FROM klasifikasi");
        return $klasifikasi;
    }

    //judul
    public function get_judul(){
        include ('../koneksi.php');
        $id_kk = $_GET['detail'];
        $j = $_mysqli->query("SELECT nama_kk FROM kk
                                        WHERE id_kk = '$id_kk'");
        $judul = mysqli_fetch_array($j);
        return $judul;

    }

    //edit kk
    public function jadikan_kk(){
        include ('../koneksi.php');
        $no_kk = $_POST['no_kk'];  
        $nik = $_POST['nik']; 
        $nm = $_mysqli->query("SELECT nama FROM penduduk WHERE nik = '$nik'");
        $nama =  mysqli_fetch_array($nm);
        $nmk = $nama['nama'];
        $edit = $_mysqli->query("UPDATE kk SET kepala_keluarga= '$nik' WHERE no_kk = '$no_kk'");
        if ($edit) {
$nilai = 
<<<HEREDOCS
            <!-- Danger Alert -->
            <div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><strong>Sukses</strong></h4>
                <p><strong>$nmk</strong> Berhasil dijadikan Kepala Keluarga !</p>
            </div>
            <!-- END Danger Alert -->
HEREDOCS;
                setcookie("alert", $nilai, time()+2);
                header('location:detail.php?detail='.$no_kk);
                return TRUE;
        }else{
$nilai = 
<<<HEREDOCS
            <!-- Danger Alert -->
            <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><strong>Error</strong></h4>
                <p>Gagal saat menjadikanc <strong>$nmk</strong> sebagai Kepala Keluarga !</p>
            </div>
            <!-- END Danger Alert -->
HEREDOCS;
                setcookie("alert", $nilai, time()+2);
                header('location:detail.php?detail='.$no_kk);
                return TRUE;
        }
    }

}
 ?>