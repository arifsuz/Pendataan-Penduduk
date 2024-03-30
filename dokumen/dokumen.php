<?php 
session_start();
class Dokumen
{
    //menampilkan
    public function get_dokumen(){
        include ('../koneksi.php');
        $dokumen = $_mysqli->query("SELECT * FROM dokumen");
        return $dokumen;
    }

    //menampilkan id
    public function get_id(){
        include ('../koneksi.php');
        $dok = $_mysqli->query("SELECT MAX(RIGHT(id_dokumen,1)) + 1 as id_new FROM dokumen");
        $id_dokumen = mysqli_fetch_array($dok);
        return $id_dokumen;
    }
 
    //tambah dokumen
    public function tambah(){
        $id = $_POST['id_dokumen'];
        $nama = $_POST['nama_dokumen'];
        include ('../koneksi.php');
        $_mysqli->query("START TRANSACTION;");
        $tambah = $_mysqli->query("INSERT INTO dokumen (id_dokumen, nama_dokumen, status) VALUES ('$id', '$nama', 1)");
        if ($tambah) {
            $res = $_mysqli->query("COMMIT");
            if($res){
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
                header('location:../pilihan.php?menu=2');
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
                header('location:../pilihan.php?menu=2');
                return TRUE;
            }
        }
    }

    //hapus dokumen
    public function hapus(){
        $id = $_GET['hapus'];
        include ('../koneksi.php');
        $nama   = $_mysqli->query("SELECT nama_dokumen FROM dokumen WHERE id_dokumen = '$id'");
        $nma = mysqli_fetch_array($nama);
        $nm = $nma['nama_dokumen'];
        $_mysqli->query("START TRANSACTION;");
        $hapus = $_mysqli->query("DELETE FROM dokumen WHERE id_dokumen = '$id'");
        $select2 = $_mysqli->query("SELECT * FROM file WHERE id_dokumen = '$id'");
        $hapus3 = $_mysqli->query("DELETE FROM klasifikasi_dokumen WHERE id_dokumen = '$id'");

        foreach ($select2 as $key):
            $dir = "../files/";
            $files = $key['file'];
            unlink($dir.$files);
            $_mysqli->query("DELETE FROM file WHERE id_dokumen = '$id'");
        endforeach;
        
        if ($hapus && $select2 && $hapus3) {
            $res = $_mysqli->query("COMMIT");
            if($res){
$nilai = 
<<<HEREDOCS
            <!-- Danger Alert -->
            <div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><strong>Sukses</strong></h4>
                <p>Data <strong>$nm</strong> Berhasil dihapus !</p>
            </div>
            <!-- END Danger Alert -->
HEREDOCS;
                setcookie("alert", $nilai, time()+2);
                header('location:../pilihan.php?menu=2');
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
                <p>Data <strong>$nm</strong> gagal dihapus !</p>
            </div>
            <!-- END Danger Alert -->
HEREDOCS;
                setcookie("alert", $nilai, time()+2);
                header('location:../pilihan.php?menu=2');
                return TRUE;
            }
        }
    }

    //edit dokumen
    public function edit(){
        include ('../koneksi.php');
        $id_dokumen = $_GET['edit'];
        $ag = $_mysqli->query("SELECT * FROM dokumen WHERE id_dokumen = '$id_dokumen'");
        $dokumen = mysqli_fetch_array($ag);
        return $dokumen;
    }

    //edit proses
    public function edit_proses(){
        include ('../koneksi.php');
        $id_dokumen = $_POST['id_dokumen'];  
        $nama_dokumen = $_POST['nama_dokumen'];
        $_mysqli->query("START TRANSACTION;");
        $edit = $_mysqli->query("UPDATE dokumen SET nama_dokumen= '$nama_dokumen' WHERE id_dokumen = '$id_dokumen'");
        if ($edit) {
            $res = $_mysqli->query("COMMIT");
            if($res){
$nilai = 
<<<HEREDOCS
            <!-- Danger Alert -->
            <div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><strong>Sukses</strong></h4>
                <p>Data <strong>$nama_dokumen</strong> Berhasil diedit !</p>
            </div>
            <!-- END Danger Alert -->
HEREDOCS;
                setcookie("alert", $nilai, time()+2);
                header('location:../pilihan.php?menu=2');
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
                <p>Data <strong>$nama_dokumen</strong> gagal diedit !</p>
            </div>
            <!-- END Danger Alert -->
HEREDOCS;
                setcookie("alert", $nilai, time()+2);
                header('location:../pilihan.php?menu=2');
                return TRUE;
            }
        }
    }


}
 ?>