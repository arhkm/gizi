<?php 	
		
	include "../../config/database.php";
	include "../../library/controller.php";
	@$tanggal = date("Y-m-d");
	$sql = mysql_fetch_array(mysql_query(" SELECT * FROM qw_laporan WHERE NIS ='$_GET[nis]' AND tanggal = '$tanggal'"));
	$nis = $sql['NIS'];
	$nama = $sql['Nama'];
	$rombel = $sql['Rombel'];
	$ket1 = $sql[17];
	$ketp = $sql[18];
	$ket3 = $sql[19];
	$bbi = $sql[16];
	$energi = $sql[12];

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>	</title>
	<style type="text/css">
	.jdepan{
		font-size: 19px;
	}
	</style>
</head>
<center>	
<body onload="window.print()">
		<img src="../../assets/img/logo.png" width="125" height="120">
		<section style="font-size:20px">	
				<i>Jl. Raya Wangun Bogor selatan KM 5 No. 123, Ciawi, Bogor 16720, Jawabarat, Indonesia </i>
		</section>
		<section style="font-size:15px">	
				<i style="margin-left:230">Telp (0857) 70013171 (Hunting)</i>
				<br>
				<i style="margin-left:270">Fax (0813) 1234567</i>

		</section>

		<hr style="border:solid black 0.7px;">
		</center>

		<div class="row">
			<div class="col s12">
				<table >
					<tr>
						<td>Nis</td>
						<td>:</td>
						<td><?php echo "$nis"; ?></td>
					</tr>
					<tr>
						<td>Nama</td>
						<td>:</td>
						<td><?php echo "$nama"; ?></td>
					</tr>
					<tr>
						<td>Rombel</td>
						<td>:</td>
						<td><?php echo "$rombel"; ?></td>
					</tr>
					<tr>
						<td>Hal</td>
						<td>:</td>
						<td><?php echo "Laporan hasil cek kebutuhan energi/gizi tubuh"; ?></td>
					</tr>
				</table><br>
					Berdasarkan hasil cek kebutuhan energi/gizi tubuh yang sudah dilakukan pada <?php echo "$tanggal"; ?>,terdapat beberapa hal yang harus diketahui,dikarenakan ini <b>PENTING</b> bagi kesehatan tubuh. Berikut beberapa hal yang sudah diketahi hasil dari cek energi/gizi tubuh yang sudah dilakukan :
					  


			</div>
		</div><br>

		<div class="row">
		<div class="col m2">
		<center>
		<table border="1" cellpadding="3" cellspacing="3">

		<thead>
		<tr>
			<th>IMT</th>
			<th>BBI</th>
			<th>Kebutuhan karbohidrat</th>
			<th>Kebutuhan protein</th>
			<th>Kebutuhan lemak</th>
			<th>Karbohidrat di dalam tubuh</th>
			<th>Protein di dalam tubuh</th>
			<th>Lemak di dalam tubuh</th>
		</tr>
		</thead>
	 	<tbody>
		<?php 
			$table = "qw_laporan";
			$where = "NIS ='$nis' AND tanggal ='$tanggal'";
			@$a = oop::tampil($table,$where);
			foreach ($a as $r) {
				
			
		 $kkarbo = $r[6];
		 $skarbo = $r[7];
		 $kprot = $r[8];			
		 $kprot1 = $r[9];			
		 $klem = $r[10];			
		 $klem1 = $r[11];
		 $bulan = substr($r[19], 5,2);
		 
		 
		 ?>
		 	<tr>
		 		<td><?php echo $r[4]; ?></td>
		 		<td><?php echo $r[5]; ?></td>
		 		<td><?php echo "$kkarbo - $skarbo /h"?></td>
		 		<td><?php echo "$kprot - $kprot1 /h" ?></td>
		 		<td><?php echo "$klem - $klem1 /h" ?></td>
		 		<td><?php echo "$r[13]g"; ?></td>
		 		<td><?php echo "$r[14]g"; ?></td>
		 		<td><?php echo "$r[15]g"; ?></td>
		 	</tr>
		 	<?php 	} ?>
		 	</tbody>


	</table>
	</center>
	</div>
	</div>

<br>
	<div class="row">
			<div class="col m6 s6">
				<table>
					<tr>
						<td>Keterangan Energi</td>
						<td>:</td>
						<td><?php echo "<b>Kebutuhan energi tubuh $energi/h</b>"; ?></td>
					</tr>
					<tr>
						<td>Keterangan BBI</td>
						<td>:</td>
						<td><?php echo "<b>Kriteria tubuh anda $bbi</b>"; ?></td>
					</tr>
					<tr>
						<td>Keterangan Karbohidrat</td>
						<td>:</td>
						<td><?php echo "<b>$ket1</b>"; ?></td>
					</tr>
					<tr>
						<td>Keterangan Protein</td>
						<td>:</td>
						<td><?php echo "<b>$ketp</b>"; ?></td>
					</tr>
					<tr>
						<td>Keterangan Lemak</td>
						<td>:</td>
						<td><?php echo "<b>$ket3</b>"; ?></td>
					</tr>
				</table>
				<tr><br>
				<section><i><b>catatan:</b></i></section>
				<a>tubuh anda sangat memerlukan energi yang cukup,ayo segera perbaiki pola makan anda agar dapat memperoleh energi yang cukup untuk tubuh agar terhindar dari kekurangan gizi atau gizi buruk !</a>
			</div>
			<div class="col m6 s6"></div>
		</div>

		</form>
</body>
</html>