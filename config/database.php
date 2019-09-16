<?php
@$server ="127.0.0.1";
@$username = "root";
@$password ="";
@$database="gizi";

$koneksi = mysqli_connect($server,$username,$password,$database);

// Check connection
if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}
 ?>
