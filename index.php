<!DOCTYPE html>
<html>
<head>
		<link rel="stylesheet" type="text/css" href="assets/css/materialize.css">
	<link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
  	<script type="text/javascript" src="assets/js/jquery-2.2.3.min.js"></script>
  	<script type="text/javascript" src="assets/js/materialize.js"></script>
  	<style type="text/css">
  	body{
  		/*background-image: url(assets/img/back2.jpg);*/

  	}
  	.bawahin{
  		margin-top: 40px;
  	}
  	/*h2{
  		margin-top: 150px;
  		margin-left: 36%;
  		color: black;
  	}*/
  	</style>
	<title>SIM GIZI</title>
</head>
<body>
<center>
<br>
	<h2>Selamat datang</h2>
	<!-- <h5>Aplikasi kesehatan cek gizi SMK WIKRAMA</h5> -->
</center>
<div class="bawahin">
		<div class="carousel">
	    <a class="carousel-item" href="admin/index.php"><img src="assets/img/back.jpg">admin</a>
	    <a class="carousel-item" href="pesertadidik/index.php"><img src="assets/img/back1.jpg">Siswa</a>
	  </div>
</div>
</body>
<script type="text/javascript">
	$(document).ready(function(){
	      $('.carousel').carousel();
	 });
		// Next slide
	$('.carousel').carousel('next');
	$('.carousel').carousel('next', 3); // Move next n times.
	// Previous slide
	$('.carousel').carousel('prev');
	$('.carousel').carousel('prev', 4); // Move prev n times.
	// Set to nth slide
	$('.carousel').carousel('set', 4);
</script>
</html>