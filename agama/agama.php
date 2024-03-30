<?php
session_start();
class Agama
{

    //menampilkan
    public function get_agama(){
        include ('../koneksi.php');
        $agama = $_mysqli->query("SELECT * FROM agama");
        return array($agama);
    }

    //menampilkan id
    public function get_id(){
        include ('../koneksi.php');
        $aga = $_mysqli->query("SELECT MAX(RIGHT(id_agama,1)) + 1 as id_new FROM agama");
        $id_agama = mysqli_fetch_array($aga);
        return($id_agama);
    }
 
    //tambah agama
    public function tambah(){
        $id = $_POST['id_agama'];
        $nama = $_POST['nama_agama'];
        include ('../koneksi.php');
        $_mysqli->query("START TRANSACTION;");
        $tambah = $_mysqli->query("INSERT INTO `agama` (`id_agama`, `nama_agama`, `status`) VALUES ('$id', '$nama', 1)");
        if ($tambah) {
            $res = $_mysqli->query("COMMIT");
            if ($res){
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
                header('location:../pilihan.php?menu=1');
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
                header('location:../pilihan.php?menu=1');
                return TRUE;
            }
        }
    }

    //hapus agama
    public function hapus(){
        $id = $_GET['hapus'];
        include ('../koneksi.php');
        $nama   = $_mysqli->query("SELECT nama_agama FROM `agama` WHERE `id_agama` = '$id'");
        $nm = mysqli_fetch_array($nama);
        $nw = $nm['nama_agama'];
        $_mysqli->query("START TRANSACTION;");
        $hapus = $_mysqli->query("DELETE FROM `agama` WHERE `id_agama` = '$id'");
        if ($hapus) {
            $res = $_mysqli->query("COMMIT");
            if ($res){
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
                header('location:../pilihan.php?menu=1');
                return TRUE;
            }
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
                header('location:../pilihan.php?menu=1');
                return TRUE;
        }
    }

    //edit agama
    public function edit(){
        include ('../koneksi.php');
        $id_agama = $_GET['edit'];
        $ag = $_mysqli->query("SELECT * FROM agama WHERE id_agama = '$id_agama'");
        $agama = mysqli_fetch_array($ag);
        return $agama;
    }

    //edit proses
    public function edit_proses(){
        include ('../koneksi.php');
        $id_agama = $_POST['id_agama'];  
        $nama_agama = $_POST['nama_agama'];
        $_mysqli->query("STRAT TRANSACTION;");
        $edit = $_mysqli->query("UPDATE `agama` SET `nama_agama`= '$nama_agama' WHERE `id_agama` = '$id_agama'");
        if ($edit) {
            $res = $_mysqli->query("COMMIT");
            if ($res) {
$nilai = 
<<<HEREDOCS
            <!-- Danger Alert -->
            <div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><strong>Sukses</strong></h4>
                <p>Data <strong>$nama_agama</strong> Berhasil diedit !</p>
            </div>
            <!-- END Danger Alert -->
HEREDOCS;
                setcookie("alert", $nilai, time()+2);
                header('location:../pilihan.php?menu=1');
                return TRUE;
            }
        }else{
            $res = $_mysqli->query("ROLLBACK");
            var_dump($res);
$nilai = 
<<<HEREDOCS
            <!-- Danger Alert -->
            <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><strong>Error</strong></h4>
                <p>Data <strong>$nama_agama</strong> gagal diedit !</p>
            </div>
            <!-- END Danger Alert -->
HEREDOCS;
                setcookie("alert", $nilai, time()+2);
                header('location:../pilihan.php?menu=1');
                return TRUE;
        }
    }


}
 ?>