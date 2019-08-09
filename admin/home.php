<?php 
@$user = @$_SESSION['username']
 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
	h3,h5,h6{
		color: white;
	}
	</style>
</head>
<body class="#staggered-test">
<form method="post">
<br><br><br><br><br><br><br><br><br>
<center><h3>Selamat datang, <?php echo "$user"; ?></h3>
<h5>Sistem Informasi Management Gizi</h5>
<h6>Smk Wikrama Bogor</h6> 


</center>


</form>
</body>
</html>