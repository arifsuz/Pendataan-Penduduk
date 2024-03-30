<?php
session_start();
class Klasifikasi
{
    //atribut gaes
    var $id_klasifikasi;
    var $nama_klasifikasi;
    var $status;

    //menampilkan
    public function get_klasifikasi(){
        include ('../koneksi.php');
        $klasifikasi = $_mysqli->query("SELECT * FROM klasifikasi");
        return $klasifikasi;
    }

    //menampilkan id
    public function get_id(){
        include ('../koneksi.php');
        $aga = $_mysqli->query("SELECT MAX(RIGHT(id_klasifikasi,1)) + 1 as id_new FROM klasifikasi");
        $id_klasifikasi = mysqli_fetch_array($aga);
        return($id_klasifikasi);
    }
 
    //tambah klasifikasi
    public function tambah(){
        $id = $_POST['id_klasifikasi'];
        $nama = $_POST['nama_klasifikasi'];
        include ('../koneksi.php');
        $_mysqli->query("START TRANSACTION;");
        $tambah = $_mysqli->query("INSERT INTO klasifikasi (id_klasifikasi, nama_klasifikasi, status) VALUES ('$id', '$nama', 1)");
        if ($tambah) {
            $res = $_mysqli->query("COMMIT");
            if ($res) {
$nilai = 
<<<HEREDOCS
            <!-- Danger Alert -->
            <div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><strong>Sukses</strong></h4>
                <p>Data <strong>$nama</strong> Berhasil ditambahkan !</p>
            </div>
            <!-- END Danger Alert -->
HEREDOCS;
                setcookie("alert", $nilai, time()+2);
                header('location:../pilihan.php?menu=3');
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
                <p>Data <strong>$nama</strong> gagal ditambahkan !</p>
            </div>
            <!-- END Danger Alert -->
HEREDOCS;
                setcookie("alert", $nilai, time()+2);
                header('location:../pilihan.php?menu=3');
                return TRUE;
            }
        }
    }

    //hapus klasifikasi
    public function hapus(){
        $id = $_GET['hapus'];
        include ('../koneksi.php');
        $nama   = $_mysqli->query("SELECT nama_klasifikasi FROM klasifikasi WHERE id_klasifikasi = '$id'");
        $nm = mysqli_fetch_array($nama);
        $nw = $nm['nama_klasifikasi'];
        $_mysqli->query("START TRANSACTION;");
        $hapus = $_mysqli->query("DELETE FROM klasifikasi WHERE id_klasifikasi = '$id'");
        $hapusdok = $_mysqli->query("DELETE FROM klasifikasi_dokumen WHERE id_klasifikasi = '$id'");
        if ($hapus && $hapusdok) {
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
                header('location:../pilihan.php?menu=3');
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
                <p>Data <strong>$nw</strong> gagal dihapus !</p>
            </div>
            <!-- END Danger Alert -->
HEREDOCS;
                setcookie("alert", $nilai, time()+2);
                header('location:../pilihan.php?menu=3');
                return TRUE;
            }
        }
    }

    //edit klasifikasi
    public function edit(){
        include ('../koneksi.php');
        $id_klasifikasi = $_GET['edit'];
        $ag = $_mysqli->query("SELECT * FROM klasifikasi WHERE id_klasifikasi = '$id_klasifikasi'");
        $klasifikasi = mysqli_fetch_array($ag);
        return $klasifikasi;
    }

    //edit proses
    public function edit_proses(){
        include ('../koneksi.php');
        $id_klasifikasi = $_POST['id_klasifikasi'];  
        $nama_klasifikasi = $_POST['nama_klasifikasi'];
        $_mysqli->query("START TRANSACTION;");
        $edit = $_mysqli->query("UPDATE klasifikasi SET nama_klasifikasi= '$nama_klasifikasi' WHERE id_klasifikasi = '$id_klasifikasi'");
        if ($edit) {
            $res = $_mysqli->query("COMMIT");
            if($res){
$nilai = 
<<<HEREDOCS
            <!-- Danger Alert -->
            <div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><strong>Sukses</strong></h4>
                <p>Data <strong>$nama_klasifikasi</strong> Berhasil diedit !</p>
            </div>
            <!-- END Danger Alert -->
HEREDOCS;
                setcookie("alert", $nilai, time()+2);
                header('location:../pilihan.php?menu=3');
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
                <p>Data <strong>$nama_klasifikasi</strong> gagal diedit !</p>
            </div>
            <!-- END Danger Alert -->
HEREDOCS;
                setcookie("alert", $nilai, time()+2);
                header('location:../pilihan.php?menu=3');
                return TRUE;
            }
        }
    }

    //detail 
    public function detail_klasifikasi(){
        include ('../koneksi.php');
        $id_klasifikasi = $_GET['detail'];
        $klasifikasi = $_mysqli->query("SELECT * FROM klasifikasi , dokumen, klasifikasi_dokumen
                                        WHERE klasifikasi.id_klasifikasi = klasifikasi_dokumen.id_klasifikasi
                                        AND dokumen.id_dokumen = klasifikasi_dokumen.id_dokumen
                                        AND klasifikasi.id_klasifikasi = '$id_klasifikasi'");
        return $klasifikasi;

    }

    //judul
    public function get_judul(){
        include ('../koneksi.php');
        $id_klasifikasi = $_GET['detail'];
        $j = $_mysqli->query("SELECT nama_klasifikasi FROM klasifikasi
                                        WHERE id_klasifikasi = '$id_klasifikasi'");
        $judul = mysqli_fetch_array($j);
        return $judul;

    }

    //dokumen
    public function get_dokumen(){
        include ('../koneksi.php');
        $dokumen = $_mysqli->query("SELECT * FROM dokumen");
        return $dokumen;
    }

    //tambah dokumen
    public function tambah_dokumen(){
        $id_dokumen = $_POST['id_dokumen'];
        $id_klasifikasi = $_POST['id_klasifikasi'];
        include ('../koneksi.php');
        $_mysqli->query("START TRANSACTION;");
        $cek = $_mysqli->query("SELECT * FROM klasifikasi_dokumen  WHERE id_klasifikasi = '$id_klasifikasi' AND id_dokumen =  '$id_dokumen'");
        $cekk = mysqli_num_rows($cek);
        if ($cekk > 0) {
            $nilai = 
<<<HEREDOCS
            <!-- Danger Alert -->
            <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><strong>Error</strong></h4>
                <p>Data Sudah Ada !</p>
            </div>
            <!-- END Danger Alert -->
HEREDOCS;
                setcookie("alert", $nilai, time()+2);
                header('location:detail.php?detail='.$id_klasifikasi);
                return TRUE;
        }
        $tambah = $_mysqli->query("INSERT INTO klasifikasi_dokumen (id_klasifikasi, id_dokumen) VALUES ('$id_klasifikasi', '$id_dokumen')");
        if ($tambah) {
            $res = $_mysqli->query("COMMIT");
            if($res){
$nilai = 
<<<HEREDOCS
            <!-- Danger Alert -->
            <div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><strong>Sukses</strong></h4>
                <p>Data Berhasil ditambahkan !</p>
            </div>
            <!-- END Danger Alert -->
HEREDOCS;
                setcookie("alert", $nilai, time()+2);
                header('location:detail.php?detail='.$id_klasifikasi);
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
                <p>Data gagal ditambahkan !</p>
            </div>
            <!-- END Danger Alert -->
HEREDOCS;
                setcookie("alert", $nilai, time()+2);
                header('location:detail.php?detail='.$id_klasifikasi);
                return TRUE;
            }
        }
    }

    //hapus dokumen
    public function hapus_dokumen($id_klass){
        $id_dokumen = $_GET['hapus_dokumen'];
        $id_klasifikasi = $_POST['id_klasifikasi'];
        include ('../koneksi.php');
        $nama   = $_mysqli->query("SELECT nama_dokumen FROM dokumen WHERE id_dokumen = '$id'");
        $nm = mysqli_fetch_array($nama);
        $nw = $nm['nama_dokumen'];
        $_mysqli->query("START TRANSACTION;");
        $hapus = $_mysqli->query("DELETE FROM klasifikasi_dokumen WHERE id_dokumen = '$id_dokumen' AND id_klasifikasi = '$id_klasifikasi'");
        if ($hapus) {
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
                header('location:detail.php?detail='.$id_klasifikasi);
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
                <p>Data <strong>$nw</strong> gagal dihapus !</p>
            </div>
            <!-- END Danger Alert -->
HEREDOCS;
                setcookie("alert", $nilai, time()+2);
                header('location:detail.php?detail='.$id_klasifikasi);
                return TRUE;
            }
        }
    }
}
 ?>