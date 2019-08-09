<?php 
	session_start();
	include "../config/database.php";
	include "../library/controller.php";

	$perintah = new oop();

	@$table = "tb_siswa";
  @$nis = $_POST['nis'];
	// @$jk = $_POST['jk'];
  @$nama_form ="pesertadidiksiswa/hal_pesertadidiks.php?page=home";
	@$nama_form1 ="pesertadidiksiswi/hal_pesertadidik.php?page=home";

	if (isset($_POST['login'])) {
      $jk = mysql_fetch_array(mysql_query("SELECT * FROM tb_siswa WHERE NIS ='$_POST[nis]'"));
      if (empty($jk)) {
        echo "<script>alert('nis tidak terdaftar');</script>";
        
      }elseif ($jk['JK']=="L") {
        $perintah->logins($table, $nis,$jk, $nama_form, $nama_form);
        
      }else{
		$perintah->logins($table, $nis,$jk, $nama_form, $nama_form1);
	}
  }
	if (isset($_POST['batal'])) {
		echo "<script>document.location.href='../index.php'</script>";
	}
 ?>

 <title>LOGIN</title>
 <head>
<link href="../assets/fonts/materialicons.woff2" rel="stylesheet">
 	 <link rel="stylesheet" type="text/css" href="../assets/css/materialize.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/font-awesome.min.css">
  	<script type="text/javascript" src="../assets/js/jquery-2.2.3.min.js"></script>
  	<script type="text/javascript" src="../assets/js/materialize.js"></script>
  	<style type="text/css">
  	body{
  		/*background-image: url(../assets/img/back2.jpg);*/

  	}
  	</style>
 </head>
 <body>
 <form  method="post"  >
 <div class="row" style="margin-top:130px; margin-left:35%; ">
        <div class="col s6 m6  ">
        
          <div class="card cyan darken-4 z-depth-5">
            <div class="card-content white-text">
            <center> <img src="../assets/img/logo.png" style="height:80px;"> </center>
              <center>  <span class="card-title">Sistem Informasi Management Gizi</span>
              <h6>Smk Wikrama Bogor<h6></center>
              
              
      <div class="row white-text" style="margin-top:70px;">
              <div class="row ">
                <div class="input-field col s12">
        <!-- <img class="responsive-img" src="../assets/img/back.jpg" style="width:10px;"> -->
                  <!-- <i class="material-icons prefix">account_circle</i> -->
                   <input id="first_name" type="text" onkeypress="return event.charCode>=48&&event.charCode<=56" placeholder="Masukkan NIS" name="nis">
                 <label for="first_name">NIS</label>
                 
                </div>
                </div>
          
         </div>
 


            </div>
            <div class="card-action" style="margin-top:-20px;">
            <center>
            <input type="submit" name="login" class="btn btn-waves waves-effect waves-cyan" value="LOGIN" style="text-decoration: 10; padding-top: 9;">
           </center>
              
            </div>
          </div>
        </div>
      </div>
      </form>
      </body>
      </html>
            

 

 </body>
 <script type="text/javascript" src="./assets/js/jquery-2.2.3.min.js"></script>