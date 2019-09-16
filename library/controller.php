<?php
class oop{


		function simpan2($koneksi,$table,$field, $redirect){
			$sql = "INSERT INTO $table SET $field";
			$jalan = mysqli_query($koneksi, $sql);
			if($jalan){
				// echo "<script>alert('berhasil');document.location.href='$redirect'</script>";
			} else {
				echo mysqli_error();
			}
		}
		function simpan($koneksi,$table,$field, $redirect){
			$sql = "INSERT INTO $table SET $field";
			$jalan = mysqli_query($koneksi, $sql);
			if($jalan){
				echo "<script>alert('berhasil');document.location.href='$redirect'</script>";
			} else {
				echo mysqli_error();
			}
		}

		function tampil($koneksi,$table,$where){
			$sql = "SELECT * FROM $table WHERE $where";
			$tampil = mysqli_query($koneksi, $sql);
			while($data = mysqli_fetch_array($tampil))
				$isi[] = $data;
			return $isi;
		}
		function tampil2($koneksi,$table){
			$sql = "SELECT * FROM $table";
			$tampil = mysqli_query($koneksi, $sql);
			while($data = mysqli_fetch_array($tampil))
				$isi[] = $data;
			return $isi;
		}

		function hapus($koneksi,$table, $where, $redirect){
			$sql = "DELETE FROM $table WHERE $where";
			$jalan = mysqli_query($koneksi, $sql);
			if($jalan){
				echo "<script>alert('Berhasil');document.location.href='$redirect'</script>";
			}else{
				echo mysqli_error();
			}
		}

		function edit($koneksi,$table, $where){
			$sql = "SELECT * FROM $table WHERE $where";
			$jalan = mysqli_fetch_array(mysqli_query($koneksi, $sql));
			return $jalan;
		}

		function ubah($koneksi,$table,$field, $where, $redirect){
		$sql = "UPDATE $table SET $field";
		$sql.="WHERE $where";
		$jalan = mysqli_query($koneksi, $sql);
		if($jalan){
			echo "<script>alert('Berhasil');document.location.href='$redirect'</script>";
		}else{
			echo mysqli_error();
		}
		}

		function login($koneksi,$table, $username, $password, $nama_form){
			@session_start();
			$sql = "SELECT * FROM $table WHERE username = '$username' and password = '$password'";
			$jalan = mysqli_query($koneksi, $sql);
			$tampil = mysqli_fetch_array($jalan);
			$cek = mysqli_num_rows($jalan);
			if ($cek > 0) {
				$_SESSION['username'] = $username;
				echo "<script>alert('Berhasil login');document.location.href='$nama_form'</script>";
			}else{
				echo "<script>alert('Gagal login');</script>";

			}

		}
		function logins($koneksi,$table, $nis,$jk, $nama_form, $nama_form1){
			@session_start();
			$sql = "SELECT * FROM $table WHERE NIS = '$nis'";
			$jalan = mysqli_query($koneksi, $sql);
			$tampil = mysqli_fetch_array($jalan);
			$cek = mysqli_num_rows($jalan);
			if ($cek > 0) {
				$_SESSION['nis'] = $nis;
				if ($jk['JK']=="L") {

						echo "<script>alert('Berhasil masuk');document.location.href='$nama_form'</script>";

      				}else{
						echo "<script>alert('Berhasil masuk');document.location.href='$nama_form1'</script>";

					}
			}else{
				echo "<script>alert('Gagal login');</script>";

			}

		}

		function antiInject($data){
		$filter = mysqli_real_escape_string(stripcslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
		return $filter;
	}



		}
?>
