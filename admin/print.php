<?php 	
		
	include "../config/database.php";
	include "../library/controller.php";
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>	</title>
</head>
<center>	
<body onload="window.print()">
		<br>
		<img src="../assets/img/logo.png" width="130" height="120">
		<section style="font-size:20px">	
				<i>Jl. Raya Wangun Bogor selatan KM 5 No. 123, Ciawi, Bogor 16720, Jawabarat, Indonesia </i>
		</section>
		<section style="font-size:15px">	
				<i style="margin-left:230">Telp (0857) 70013171 (Hunting)</i>
				<br>
				<i style="margin-left:270">Fax (0813) 1234567</i>

		</section>

		<hr style="border:solid black 0.7px;">

		<table id="data" class="table-apa" border="1" cellpadding="3" cellspacing="3">

		<thead>
		<tr>
			<th>Nis</th>
			<th>Nama</th>
			<th>Jk</th>
			<th>Rombel</th>
			<th>IMT</th>
			<th>BBI</th>
			<th>Keterangan BBI</th>
			<th>Kebutuhan karbohidrat</th>
			<th>Kebutuhan protein</th>
			<th>Kebutuhan lemak</th>
			<th>Karbohidrat yang terkandung</th>
			<th>Protein yang terkandung</th>
			<th>Lemak yang terkandung</th>
			<th>Hasil cek1</th>
			<th>Hasil cek2</th>
			<th>Hasil cek3</th>
			<th>Tanggal</th>
		</tr>
		</thead>
	 	<tbody>
		<?php 
			$table = "qw_laporan";
			@$a = oop::tampil2($table);
			foreach ($a as $r) {
				
			
		 $kkarbo = $r[6];
		 $skarbo = $r[7];
		 $kprot = $r[8];			
		 $kprot1 = $r[9];			
		 $klem = $r[10];			
		 $klem1 = $r[11];
		 $bulan = substr($r[19], 5,2);
		 switch ($bulan) {
		 	case 01:$bln = "januari";
		 		break;
		 	case 02:$bln = "Februari";
		 		break;
		 	case 03:$bln = "Maret";
		 		break;
		 	case 04:$bln = "April";
		 		break;
		 	case 05:$bln = "Mei";
		 		break;
		 	case 06:$bln = "Juni";
		 		break;
		 	case 07:$bln = "Juli";
		 		break;
		 	case 08:$bln = "Agustus";
		 		break;
		 	case 09:$bln = "September";
		 		break;
		 	case 10:$bln = "Oktober";
		 		break;
		 	case 11:$bln = "November";
		 		break;
		 	case 12:$bln = "Desember";
		 		break;	
		 	default:
		 		# code...
		 		break;
		 
		 }
		 
		 ?>
		 	<tr>
		 		<td><?php echo $r[0]; ?></td>
		 		<td><?php echo $r[1]; ?></td>
		 		<td><?php echo $r[2]; ?></td>
		 		<td><?php echo $r[3]; ?></td>
		 		<td><?php echo $r[4]; ?></td>
		 		<td><?php echo $r[5]; ?></td>
		 		<td><?php echo $r[15]; ?></td>
		 		<td><?php echo "$kkarbo - $skarbo /h"?></td>
		 		<td><?php echo "$kprot - $kprot1 /h" ?></td>
		 		<td><?php echo "$klem - $klem1 /h" ?></td>
		 		<td><?php echo $r[12]; ?></td>
		 		<td><?php echo $r[13]; ?></td>
		 		<td><?php echo $r[14]; ?></td>
		 		<td><?php echo $r[16]; ?></td>
		 		<td><?php echo $r[17]; ?></td>
		 		<td><?php echo $r[18]; ?></td>
		 		<td><?php echo substr($r[19], 8,2);echo " ".$bln;echo " ".substr($r[19], 0,4); ?></td>
		 	</tr>
		 	<?php 	} ?>
		 	</tbody>


	</table>
		</form>
</body>
</center>
</html>