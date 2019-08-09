<?php 
class oop{

		

		function simpan2($table,$field, $redirect){
			$sql = "INSERT INTO $table SET $field";
			$jalan = mysql_query($sql);
			if($jalan){
				// echo "<script>alert('berhasil');document.location.href='$redirect'</script>";
			} else {
				echo mysql_error();
			}
		}
		function simpan($table,$field, $redirect){
			$sql = "INSERT INTO $table SET $field";
			$jalan = mysql_query($sql);
			if($jalan){
				echo "<script>alert('berhasil');document.location.href='$redirect'</script>";
			} else {
				echo mysql_error();
			}
		}

		function tampil($table,$where){
			$sql = "SELECT * FROM $table WHERE $where";
			$tampil = mysql_query($sql);
			while($data = mysql_fetch_array($tampil))
				$isi[] = $data;
			return $isi;
		}
		function tampil2($table){
			$sql = "SELECT * FROM $table";
			$tampil = mysql_query($sql);
			while($data = mysql_fetch_array($tampil))
				$isi[] = $data;
			return $isi;
		}

		function hapus($table, $where, $redirect){
			$sql = "DELETE FROM $table WHERE $where";
			$jalan = mysql_query($sql);
			if($jalan){
				echo "<script>alert('Berhasil');document.location.href='$redirect'</script>";
			}else{
				echo mysql_error();
			}
		}

		function edit($table, $where){
			$sql = "SELECT * FROM $table WHERE $where";
			$jalan = mysql_fetch_array(mysql_query($sql));
			return $jalan;
		}

		function ubah($table,$field, $where, $redirect){
		$sql = "UPDATE $table SET $field";
		$sql.="WHERE $where";
		$jalan = mysql_query($sql);
		if($jalan){
			echo "<script>alert('Berhasil');document.location.href='$redirect'</script>";
		}else{
			echo mysql_error();
		}
		}
		
		function login($table, $username, $password, $nama_form){
			@session_start();
			$sql = "SELECT * FROM $table WHERE username = '$username' and password = '$password'";
			$jalan = mysql_query($sql);
			$tampil = mysql_fetch_array($jalan);
			$cek = mysql_num_rows($jalan);
			if ($cek > 0) {
				$_SESSION['username'] = $username;
				echo "<script>alert('Berhasil login');document.location.href='$nama_form'</script>";
			}else{
				echo "<script>alert('Gagal login');</script>";

			}

		}
		function logins($table, $nis,$jk, $nama_form, $nama_form1){
			@session_start();
			$sql = "SELECT * FROM $table WHERE NIS = '$nis'";
			$jalan = mysql_query($sql);
			$tampil = mysql_fetch_array($jalan);
			$cek = mysql_num_rows($jalan);
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
		$filter = mysql_real_escape_string(stripcslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
		return $filter;
	}



		}
?>