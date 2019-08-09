<?php 
	@$server ="localhost";
	@$username = "root";
	@$password ="";
	@$database="gizi";
	mysql_connect($server,$username,$password);
	mysql_select_db($database) or die("Database tidak ditemulkan");
 ?>