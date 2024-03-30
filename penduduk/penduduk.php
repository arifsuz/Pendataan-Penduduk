<?php 
session_start();
class Penduduk
{
    //menampilkan
    public function get_penduduk(){
        include ('../koneksi.php');
        $penduduk = $_mysqli->query("SELECT * FROM penduduk");
        return $penduduk;
    }

    //berdasarkan nik
    public function get_penduduk_nik(){
        $nik = $_GET['detail'];
        include ('../koneksi.php');
        $pdd = $_mysqli->query("SELECT * FROM penduduk, agama, klasifikasi where penduduk.nik='$nik' AND penduduk.id_agama=agama.id_agama AND penduduk.id_klasifikasi = klasifikasi.id_klasifikasi");
        return $pdd;
    }

    //semua file
    public function get_file_all(){
        $nik = $_GET['detail'];
        include ('../koneksi.php');
        $fl = $_mysqli->query("SELECT * FROM penduduk, dokumen, klasifikasi, klasifikasi_dokumen 
                                WHERE penduduk.id_klasifikasi = klasifikasi.id_klasifikasi
                                AND klasifikasi.id_klasifikasi = klasifikasi_dokumen.id_klasifikasi
                                AND dokumen.id_dokumen = klasifikasi_dokumen.id_dokumen
                                AND penduduk.nik = '$nik'");
        return $fl;
    }

    //berdasarkan nik dokumen
    public function get_file($id_dokumen){
        $nik = $_GET['detail'];
        include ('../koneksi.php');
        $dok = $_mysqli->query("SELECT * FROM penduduk, dokumen, file where 
                                penduduk.nik='$nik' 
                                AND penduduk.nik = file.nik 
                                AND dokumen.id_dokumen = file.id_dokumen
                                AND dokumen.id_dokumen = '$id_dokumen'");
        return $dok;
    }
 
    //tambah penduduk
    public function tambah_anggota(){
        include ('../koneksi.php');
        $nik                = $_POST['nik'];
        $nama               = $_POST['nama'];
        $tempat_lahir       = $_POST['tempat_lahir'];
        $tanggal_lahir      = $_POST['tanggal_lahir'];
        $jk                 = $_POST['jk'];
        $golongan_darah     = $_POST['golongan_darah'];
        $pendidikan         = $_POST['pendidikan'];
        $pekerjaan          = $_POST['pekerjaan'];
        $status_perkawinan  = $_POST['status_perkawinan'];
        $kewarganegaraan    = $_POST['kewarganegaraan'];
        $id_agama           = $_POST['id_agama'];
        $id_klasifikasi     = $_POST['id_klasifikasi'];
        $no_kk              = $_POST['no_kk'];

        //upload foto
        $filename   = $_FILES['foto']['name'];
        $dir        = "../foto/";
        $file       = 'foto';
        $new_name3  ='foto'.$nik.'.jpg'; //name pada input type file
        
        $file_name      = $_FILES[''.$file.'']["name"];
        $tmp_file       = $_FILES[''.$file.'']["tmp_name"];
        move_uploaded_file ($tmp_file, $dir.$file_name);
        rename($dir.$file_name, $dir.$new_name3);

        $fotoup = $new_name3;
        //upload foto
        $_mysqli->query("START TRANSACTION;");
        $tambah = $_mysqli->query("INSERT INTO penduduk (nik, nama, tempat_lahir, tanggal_lahir, jk, golongan_darah,  pekerjaan, 
                                    pendidikan, status_perkawinan, kewarganegaraan, id_agama, id_klasifikasi, no_kk, foto, status) VALUES ('$nik', 
                                    '$nama', '$tempat_lahir', '$tanggal_lahir', '$jk', '$golongan_darah', '$pekerjaan', '$pendidikan', 
                                        '$status_perkawinan', '$kewarganegaraan', '$id_agama', '$id_klasifikasi', '$no_kk', '$fotoup', 0)");
        if ($tambah) {
            $res = $_mysqli->query("COMMIT");
            if($res){
                $nilai = 
<<<HEREDOCS
            <!-- Danger Alert -->
            <div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><strong>Sukses</strong></h4>
                <p>Data <strong>$nik</strong> A.N <strong>$nama</strong> Berhasil ditambahkan !</p>
            </div>
            <!-- END Danger Alert -->
HEREDOCS;
                setcookie("alert", $nilai, time()+3);
                header('location:../kk/detail.php?detail='.$no_kk);
                return TRUE;
            }else{
                $nilai = 
<<<HEREDOCS
            <!-- Danger Alert -->
            <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><strong>Error</strong></h4>
                <p>Data <strong>$nik</strong> A.N <strong>$nama</strong> Gagal ditambahkan !</p>
            </div>
            <!-- END Danger Alert -->
HEREDOCS;
                setcookie("alert", $nilai, time()+3);
                header('location:../kk/detail.php?detail='.$no_kk);
                return TRUE;
            }
        }
    }

    //hapus penduduk
    public function hapus(){
        include ('../koneksi.php');
        $nik = $_GET['hapus'];
        $dt = $_mysqli->query("SELECT no_kk, nama FROM penduduk WHERE nik = '$nik'");
        $dt2 = mysqli_fetch_array($dt);
        $nama = $dt2['nama'];
        $_mysqli->query("START TRANSACTION;");
        $hapus = $_mysqli->query("DELETE FROM penduduk WHERE nik = '$nik'");
        if ($hapus) {
            $res = $_mysqli->query("COMMIT");
            if($res){
$nilai = 
<<<HEREDOCS
            <!-- Danger Alert -->
            <div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><strong>Sukses</strong></h4>
                <p>Data Berhasil <strong>$nama</strong> dihapus !</p>
            </div>
            <!-- END Danger Alert -->
HEREDOCS;
                setcookie("alert", $nilai, time()+3);
                $aktif = $_SESSION['aktif'];
                if ($aktif == 'kk') {
                    header('location:../kk/detail.php?detail='.$dt2['no_kk']);
                }else{
                    header('location:../pilihan.php?menu=5');
                }
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
                <p>Data <strong>$nama</strong> Gagal dihapus !</p>
            </div>
            <!-- END Danger Alert -->
HEREDOCS;
                setcookie("alert", $nilai, time()+3);
                $aktif = $_SESSION['aktif'];
                if ($aktif == 'kk') {
                    header('location:../kk/detail.php?detail='.$dt2['no_kk']);
                }else{
                    header('location:../pilihan.php?menu=5');
                }
                return TRUE;
            }
        }
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
    public function get_kk(){
        include ('../koneksi.php');
        $kk = $_mysqli->query("SELECT * FROM kk, penduduk WHERE kk.kepala_keluarga = penduduk.nik");
        return $kk;
    }

    //edit penduduk
    public function edit(){
        $nik = $_GET['edit'];
        include ('../koneksi.php');
        $ag = $_mysqli->query("SELECT * FROM penduduk WHERE nik = '$nik'");
        $penduduk = mysqli_fetch_array($ag);
        return $penduduk;
    }

    public function tambah_file(){
        include ('../koneksi.php');
        $nik = $_POST['nik'];
        $id_dokumen = $_POST['id_dokumen'];
        $dokumen=$_FILES['file']['name'];
        $dir="../file/"; //tempat upload foto
        $dirs="../files/"; //tempat upload foto
        $file='file'; //name pada input type file
        $new_name3='file'.$nik.'-'.$id_dokumen.'.pdf'; //name pada input type file
        $vdir_upload = $dir;
        $file_name=$_FILES[''.$file.'']["name"];
        $vfile_upload = $vdir_upload . $file;
        $tmp_name=$_FILES[''.$file.'']["tmp_name"];
        if (move_uploaded_file($tmp_name, $dirs.$file_name)) {
            rename($dirs.$file_name,$dirs.$new_name3);
        }else{
            $nilai = 
<<<HEREDOCS
            <!-- Danger Alert -->
            <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><strong>Gagal</strong></h4>
                <p>Data Gagal ditambahkan !</p>
            </div>
            <!-- END Danger Alert -->
HEREDOCS;
                $aktif = $_SESSION['aktif'];
                if ($aktif == 'kk') {
                    $_SESSION['aktif'] = 'kk';
                    setcookie("alert", $nilai, time()+3);
                    header('location:../penduduk/detail.php?detail='.$nik);
                }else{
                    $_SESSION['aktif'] = 'penduduk';
                    setcookie("alert", $nilai, time()+3);
                    header('location:../penduduk/detail.php?detail='.$nik);
                }
                return TRUE;
        }
            
        $_mysqli->query("START TRANSACTION;");
        $tambah = $_mysqli->query("INSERT INTO file (id_dokumen, nik, file, status) VALUES ('$id_dokumen', '$nik', '$new_name3', 1)");
        if ($tambah) {
            $res = $_mysqli->query("COMMIT");
            if ($res) {
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
                $aktif = $_SESSION['aktif'];
                if ($aktif == 'kk') {
                    $_SESSION['aktif'] = 'kk';
                    setcookie("alert", $nilai, time()+3);
                    header('location:../penduduk/detail.php?detail='.$nik);
                }else{
                    $_SESSION['aktif'] = 'penduduk';
                    setcookie("alert", $nilai, time()+3);
                    header('location:../penduduk/detail.php?detail='.$nik);
                }
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
                <p>Data Gagal ditambahkan !</p>
            </div>
            <!-- END Danger Alert -->
HEREDOCS;
                $aktif = $_SESSION['aktif'];
                if ($aktif == 'kk') {
                    $_SESSION['aktif'] = 'kk';
                    setcookie("alert", $nilai, time()+3);
                    header('location:../penduduk/detail.php?detail='.$nik);
                }else{
                    $_SESSION['aktif'] = 'penduduk';
                    setcookie("alert", $nilai, time()+3);
                    header('location:../penduduk/detail.php?detail='.$nik);
                }
                return TRUE;
            }
        }
    }

    public function hapus_file(){
        include ('../koneksi.php');
        $nik = $_POST['nik'];
        $id_dokumen = $_POST['id_dokumen'];
        $_mysqli->query("START TRANSACTION;");
        $select = $fi = $_mysqli->query("SELECT file FROM file WHERE nik = '$nik' AND id_dokumen = '$id_dokumen'");
        $file = mysqli_fetch_array($fi);
        $files = $file['file'];
        $dir = "../files/";
        unlink($dir.$files);
        $hapus = $_mysqli->query("DELETE FROM file WHERE nik = '$nik' AND id_dokumen = '$id_dokumen'");
        if ($hapus && $select) {
            $res = $_mysqli->query("COMMIT");
            if ($res) {
$nilai = 
<<<HEREDOCS
            <!-- Danger Alert -->
            <div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><strong>Sukses</strong></h4>
                <p>Data Berhasil dihapus !</p>
            </div>
            <!-- END Danger Alert -->
HEREDOCS;
                $aktif = $_SESSION['aktif'];
                if ($aktif == 'kk') {
                    $_SESSION['aktif'] = 'kk';
                    setcookie("alert", $nilai, time()+3);
                    header('location:../penduduk/detail.php?detail='.$nik);
                }else{
                    $_SESSION['aktif'] = 'penduduk';
                    setcookie("alert", $nilai, time()+3);
                    header('location:../penduduk/detail.php?detail='.$nik);
                }
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
                <p>Data Gagal dihapus !</p>
            </div>
            <!-- END Danger Alert -->
HEREDOCS;
                $aktif = $_SESSION['aktif'];
                if ($aktif == 'kk') {
                    $_SESSION['aktif'] = 'kk';
                    setcookie("alert", $nilai, time()+3);
                    header('location:../penduduk/detail.php?detail='.$nik);
                }else{
                    $_SESSION['aktif'] = 'penduduk';
                    setcookie("alert", $nilai, time()+3);
                    header('location:../penduduk/detail.php?detail='.$nik);
                }
                return TRUE;
            }
        }
    }

    //edit proses
    public function edit_proses(){
        include ('../koneksi.php');
        $nik                = $_POST['nik'];
        $nama               = $_POST['nama'];
        $tempat_lahir       = $_POST['tempat_lahir'];
        $tanggal_lahir      = $_POST['tanggal_lahir'];
        $jk                 = $_POST['jk'];
        $golongan_darah     = $_POST['golongan_darah'];
        $pendidikan         = $_POST['pendidikan'];
        $pekerjaan          = $_POST['pekerjaan'];
        $status_perkawinan  = $_POST['status_perkawinan'];
        $kewarganegaraan    = $_POST['kewarganegaraan'];
        $id_agama           = $_POST['id_agama'];
        $id_klasifikasi     = $_POST['id_klasifikasi'];
        if (isset($_POST['no_kk'])) {
            $no_kk          = $_POST['no_kk'];
        }else{
            $no_kk          = $_POST['kk'];
        }
        $ft_lw              = $_POST['foto_lawas'];

        //edit foto
        if ($_FILES['foto']['name'] == "") {
            $fotoup = $ft_lw;
        }else{
            $lawas = "../foto/".$ft_lw;
            unlink($lawas);
            $filename   = $_FILES['foto']['name'];
            $dir        = "../foto/";
            $file       = 'foto';
            $new_name3  = 'foto'.$nik.'.jpg'; //name pada input type file
            
            $file_name      = $_FILES[''.$file.'']["name"];
            $tmp_file       = $_FILES[''.$file.'']["tmp_name"];
            move_uploaded_file ($tmp_file, $dir.$file_name);
            rename($dir.$file_name, $dir.$new_name3);
            $fotoup = $new_name3;
        }
        //upload foto

        $_mysqli->query("START TRANSACTION;");
        $edit = $_mysqli->query("UPDATE penduduk SET nama = '$nama', tempat_lahir = '$tempat_lahir', tanggal_lahir = '$tanggal_lahir', jk = '$jk', golongan_darah = '$golongan_darah', pendidikan = '$pendidikan', pekerjaan = '$pekerjaan', status_perkawinan = '$status_perkawinan', kewarganegaraan = '$kewarganegaraan', id_agama = '$id_agama', id_klasifikasi = '$id_klasifikasi', no_kk = '$no_kk', foto = '$fotoup' WHERE nik = '$nik'");
        if ($edit) {
            $res = $_mysqli->query("COMMIT");
            if ($res) {
$nilai = 
<<<HEREDOCS
            <!-- Danger Alert -->
            <div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><strong>Sukses</strong></h4>
                <p>Data <strong>$nama</strong> Berhasil diedit !</p>
            </div>
            <!-- END Danger Alert -->
HEREDOCS;
                $aktif = $_SESSION['aktif'];
                if ($aktif == 'kk') {
                    setcookie("alert", $nilai, time()+3);
                    header('location:../kk/detail.php?detail='.$no_kk);
                }else{
                    setcookie("alert", $nilai, time()+3);
                    header('location:../pilihan.php?menu=5');
                }
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
                <p>Data <strong>$nama</strong> Gagal diedit !</p>
            </div>
            <!-- END Danger Alert -->
HEREDOCS;
                setcookie("alert", $nilai, time()+3);
                $aktif = $_SESSION['aktif'];
                if ($aktif == 'kk') {
                    header('location:../kk/detail.php?detail='.$no_kk);
                }else{
                    header('location:../pilihan.php?menu=5');
                }
                return TRUE;
            }
        }
    }


}
 ?>