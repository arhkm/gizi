<?php 
session_start();

	include "../../config/database.php";
	include "../../library/controller.php";

	$perintah = new oop();
	@$perintah->tampil("tb_siswa WHERE NIS = '$_SESSION[nis]'");
  @$user = mysql_fetch_array(mysql_query("SELECT * FROM tb_siswa WHERE NIS = '$_SESSION[nis]'"));
	if (empty($_SESSION['nis'])) {
		echo "<script>alert('Masukan nis dan jenis kelamin !!');document.location.href='../index.php'</script>";
	}

 ?>	
 <!DOCTYPE html>
 <html>
 <head>
 	<link rel="stylesheet" type="text/css" href="../../assets/css/materialize.css">
	<link rel="stylesheet" type="text/css" href="../../assets/css/font-awesome.min.css">
  	<script type="text/javascript" src="../../assets/js/jquery-2.2.3.min.js"></script>
  	<script type="text/javascript" src="../../assets/js/materialize.js"></script>
  	<style type="text/css">
  	 body{
    background-image: url(../../assets/img/cektubuhb.jpeg);
    background-size: 100%;
  }
    </style>
 	<title>SIM GIZI</title>
 </head>
 <body>

 	<nav>
    <div class="nav-wrapper  cyan darken-4">
      <a href="#" class=" left">SIM_GIZI</a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        
       <!--  <li><a href="hal_pesertadidik.php?page=cekkebutuhantubuh">Cek Kebutuhan tubuh</a></li>
        <li><a href="hal_pesertadidik.php?page=cekmakanan">Cek makanan</a></li>
        <li><a href="hal_pesertadidik.php?page=hasil">Hasil</a></li>
        <li><a href="../logout.php">keluar</i></a></li> -->
      </ul>
    </div>
 </nav>
 <div class="row">
  	<div class="col s12">
  		<?php  
  			switch (@$_GET['page']) {
          case 'home':include 'home.php';break;
  				case 'cekkebutuhantubuh':include 'cekgizip.php';break;
  				case 'hasil':include 'hasilceks.php';break;
          case 'cekmakanan': include 'cekmakanan.php';break;
            # code...
            break;
  			}
  		?>
  	</div>
  </div>
 </body>
 <script type="text/javascript">
 $(document).ready(function() {
    $('select').material_select();
  });
 </script>
 </html>
