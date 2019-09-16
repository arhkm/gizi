<?php
	session_start();

	include "../config/database.php";
	include "../library/controller.php";

	$perintah = new oop();
	@$perintah->tampil($koneksi, "tb_user WHERE username = '$_SESSION[username]'");

	if (empty($_SESSION['username'])) {
		echo "<script>alert('Login dulu bos !!');document.location.href='index.php'</script>";
	}



 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<link rel="stylesheet" type="text/css" href="../assets/css/materialize.min.css">
  <link rel="stylesheet" type="text/css" href="../assets/css/css.css">
  <link rel="stylesheet" type="text/css" href="../assets/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/dataTables.min.css">

    <script type="text/javascript" src="../assets/js/jquery-2.2.0.min.js"></script>
  	<script type="text/javascript" src="../assets/js/materialize.min.js"></script>
    <script type="text/javascript" src="../assets/js/dataTables.material.min.js"></script>
    <script type="text/javascript" src="../assets/js/jquery.dataTables.js"></script>
  	<style type="text/css">
  		body{
        background-image: url(../assets/img/cektubuhc.jpeg);
        background-attachment: fixed;
        background-size: cover;
    }

      .navi{
        /*position: fixed;*/

      }


  	</style>
 </head>
 <body style="margin:0;padding: 0;">
<nav class="navi">
    <div class="nav-wrapper  cyan darken-4 ">
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href="hal_admin.php?page=home">Home</a></li>
        <li><a href="hal_admin.php?page=makanan">Input makanan</a></li>
        <li><a href="hal_admin.php?page=datasiswa">Data siswa</a></li>
        <li><a href="logout.php">keluar</i></a></li>
      </ul>
    </div>
 </nav>

  <div class="row">
  	<div class="col s12">
  		<?php
  			switch (@$_GET['page']) {
  				case 'home':include 'home.php';break;
  				case 'makanan':include 'makanan.php';break;
          		case 'datasiswa':include 'datasiswa.php';break;
  			}
  		?>
  	</div>
  </div>
  <script type="text/javascript">
  $(document).ready(function() {
    $('select').material_select();
  });
  $(document).ready(function(){
    $('#data').DataTable();
  });


 </script>
 </body>

 </html>
