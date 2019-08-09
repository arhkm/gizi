<?php 
@$nis = @$user[1];
	if (isset($_POST['coba'])) {
		echo "<script>alert('silahkan');document.location.href='hal_pesertadidiks.php?page=cekkebutuhantubuh'</script>";
	}
	if (isset($_POST['logout'])) {
		echo "<script>document.location.href='../logout.php'</script>";
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
	h3{
		color: white;
	}
	</style>
</head>
<body>
<form method="post">
<br><br><br><br><br><br>
<center><h3>Selamat datang, <?php echo "$nis"; ?></h3>
<h5>Sistem Informasi Management Gizi</h5>
<h6>Smk Wikrama Bogor</h6> 
<input type="submit" name="coba" class="btn btn-waves waves-effect cyan darken-4" value="Mulai cek" style="text-decoration: 10;">
<input type="submit" name="logout" class="btn btn-waves waves-effect red" value="LOG OUT" style="text-decoration: 10;">


</center>


</form>
</body>
</html>