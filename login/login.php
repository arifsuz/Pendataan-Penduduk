<?php
	class Login
	{	
		public function login_proses($u, $p){
			include ('koneksi.php');
			$pass = base64_encode($p);
			$_mysqli->query("START TRANSACTION;");
			$cek_login = $_mysqli->query("SELECT * FROM penduduk, hak_akses, hak_akses_user 
							WHERE penduduk.nik = hak_akses_user.nik 
							AND hak_akses.id_akses = hak_akses_user.id_akses
							AND penduduk.username = '$u'
							AND penduduk.password = '$pass'");
			$cek = mysqli_num_rows($cek_login);
			$sesi = mysqli_fetch_array($cek_login);
			if ($cek > 1) {
				session_start();
				$_SESSION['userdata'] = $sesi['nik'];
				$nik = $sesi['nik'];
				date_default_timezone_set('Asia/Jakarta');
    			$waktu = date("d-m-Y  H:i");
				$_mysqli->query("INSERT INTO online (nik, waktu) VALUES ('$nik', '$waktu')");
				$_mysqli->query("UPDATE penduduk SET status = 1 WHERE nik = '$nik'");
				$res = $_mysqli->query("COMMIT");
				if ($res) {
					header('location:validasi.php');
					return TRUE;
				}
			}elseif($cek > 0){
				session_start();
				$nik = $sesi['nik'];
				date_default_timezone_set('Asia/Jakarta');
    			$waktu = date("d-m-Y  H:i");
				$_SESSION['userdata'] = $sesi['nik'];
				$_SESSION['level'] = $sesi['nama_akses'];
				$_mysqli->query("INSERT INTO online (nik, waktu) VALUES ('$nik', '$waktu')");
				$_mysqli->query("UPDATE penduduk SET status = 1 WHERE nik = '$nik'");
				$res = $_mysqli->query("COMMIT");
				if ($res) {
					header('location:pilihan.php');
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
                <h4><strong>Login Gagal</strong></h4>
                <p>Maaf, username dan password tidak cocok !</p>
            </div>
            <!-- END Danger Alert -->
HEREDOCS;
				setcookie("alert", $nilai, time()+2);
				header('location:index.php');
				return TRUE;
			}
		}

		public function validasi_user(){
			session_start();
			$_SESSION['level'] = $_POST['nama_akses'];
			header('location:pilihan.php');
			return TRUE;
		}

		public function get_profil(){
	        include ("../koneksi.php");
	        $aa = $_SESSION['userdata'];
	        $u = $_mysqli->query("SELECT * FROM penduduk, hak_akses, hak_akses_user 
	                                WHERE penduduk.nik = hak_akses_user.nik 
	                                AND hak_akses.id_akses = hak_akses_user.id_akses
	                                AND penduduk.nik = '$aa'");
	        $sesi = mysqli_fetch_array($u);
	        return $sesi;
	    }

	    public function get_validasi(){
	        include ("koneksi.php");
	    	session_start();
	        $aa = $_SESSION['userdata'];
	        $sesi = $_mysqli->query("SELECT * FROM penduduk, hak_akses, hak_akses_user 
	                                WHERE penduduk.nik = hak_akses_user.nik 
	                                AND hak_akses.id_akses = hak_akses_user.id_akses
	                                AND penduduk.nik = '$aa'");
	        return $sesi;
	    }

	    public function daftar(){
			include ('koneksi.php');
				$username = $_POST['val-username'];
				$password = base64_encode($_POST['val-password']);
				$nik 	  = $_POST['val-number'];
	            $cek = $_mysqli->query("SELECT nama FROM penduduk WHERE nik = '$nik'");
	            $cek1 = mysqli_num_rows($cek);
	            $cekakses = $_mysqli->query("SELECT * FROM hak_akses_user WHERE id_akses='akses04' AND nik = '$nik'");
	            $cek2 = mysqli_num_rows($cekakses);
	            if ($cek2 > 0) {
	            	$nilai =
<<<HEREDOCS
			<!-- Danger Alert -->
            <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><strong>Pendaftaran Gagal</strong></h4>
                <p>NIK <strong>$nik</strong> sudah terdaftar !</p>
            </div>
            <!-- END Danger Alert -->
HEREDOCS;
				setcookie("alert", $nilai, time()+2);
				header('location:index.php');
				return TRUE;
	            }else{
	            	$_mysqli->query("TRANSACTION START;");
	            	if ($cek1 > 0) {
						$_mysqli->query("INSERT INTO hak_akses_user VALUES('$nik', 'akses04')");
		            	$_mysqli->query("UPDATE penduduk SET username = '$username' , password = '$password' WHERE nik = '$nik'");
		            	$res = $_mysqli->query("COMMIT");
		            	if ($res) {
		            		$nilai =
<<<HEREDOCS
						<!-- Danger Alert -->
			            <div class="alert alert-success alert-dismissable">
			                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			                <h4><strong>Pendaftaran Berhasil</strong></h4>
			                <p>SIlahkan Login!</p>
			            </div>
			            <!-- END Danger Alert -->
HEREDOCS;
						setcookie("alert", $nilai, time()+2);
						header('location:index.php');
						return TRUE;
	            		}else{
	            			$res = $_mysqli->query("ROLLBACK");
	            			var_dump($res);

	            			$nilai =
<<<HEREDOCS
						<!-- Danger Alert -->
			            <div class="alert alert-danger alert-dismissable">
			                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			                <h4><strong>Pendaftaran Gagal</strong></h4>
			                <p>Maaf, NIK anda salah !</p>
			            </div>
			            <!-- END Danger Alert -->
HEREDOCS;
						setcookie("alert", $nilai, time()+2);
			            header('location:index.php');
			            return TRUE;
		            	}
		            }
	            }
		}

		public function logout(){
			include ('koneksi.php');
			if ($_GET['menu'] == 404) {
				session_start();
				$cc = $_SESSION['userdata'];
				$_mysqli->query("TRANSACTION START;");
	            $_mysqli->query("UPDATE penduduk SET status = '0' WHERE nik = '$cc'");
	            $_mysqli->query("DELETE FROM online WHERE nik = '$cc'");
	            $res = $_mysqli->query("COMMIT");
	            if ($res) {
		            session_destroy();
		            header('location:index.php');
	            }else{
	            	$res = $_mysqli->query("ROLLBACK");
	            	var_dump($res);
	            }
        	}
		}
	}
 ?>