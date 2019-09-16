<?php
	session_start();
	include "../config/database.php";
	include "../library/controller.php";

	$perintah = new oop();

	@$table = "tb_user";
	@$username = $_POST['username'];
	@$password = $_POST['password'];
	@$nama_form ="hal_admin.php?page=home";

	if (isset($_POST['login'])) {
		$perintah->login($koneksi, $table, $username, $password, $nama_form);
	}
	if (isset($_POST['batal'])) {
		echo "<script>document.location.href='../'</script>";
	}
 ?>

 <title>LOGIN</title>
 <head>

 	 <link rel="stylesheet" type="text/css" href="../assets/css/materialize.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/font-awesome.min.css">
  	<script type="text/javascript" src="../assets/js/jquery-2.2.3.min.js"></script>
  	<script type="text/javascript" src="../assets/js/materialize.js"></script>
<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  	<style type="text/css">
  	</style>
 </head>
 <body>

 <form  method="post"  >
 <div class="row" style="margin-top:100px; margin-left:35%; ">
        <div class="col s12 m6">

          <div class="card cyan darken-4 z-depth-5">
            <div class="card-content white-text">
            <center> <img src="../assets/img/logo.png" style="height:80px;"> </center>
              <center>  <span class="card-title">Sistem Informasi Management Gizi</span>
              <h6>Smk Wikrama Bogor<h6></center>


      <div class="row white-text" style="margin-top:30px;">
              <div class="row ">
                <div class="input-field col s12">
        <!-- <img class="responsive-img" src="../assets/img/back.jpg" style="width:10px;"> -->
                  <i class="material-icons prefix">person_pin</i>
                   <input id="first_name" type="text" name="username">
                 <label for="first_name">Username</label>

                </div>
                </div>
                <div class="row">
                  <div class="input-field col s12">
        <!-- <img class="responsive-img" src="../assets/img/back.jpg" style="width:10px;"> -->
                  <i class="material-icons prefix">lock</i>
                   <input id="first_name" type="password" name="password">
                 <label for="first_name">Password</label>

                </div>
                </div>

         </div>



            </div>
            <div class="card-action" style="margin-top:-20px;">
            <center>
            <input type="submit" name="login" class="btn btn-waves waves-effect waves-cyan" value="                              LOGIN                              " style="text-decoration: 10; padding-top: 9;">
           </center>

            </div>
          </div>
        </div>
      </div>
      </form>


 </body>
 <script type="text/javascript" src="./assets/js/jquery-2.2.3.min.js"></script>
