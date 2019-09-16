<!DOCTYPE html>
<html>
   <style type="text/css">
    .table-boaedan{
    	width: 100%;
    }
    .table-apa th,
    .table-apa td{
    	font-size: 11px!important;
    }
    </style>
<body>
<div class="row">
<div class="col s12">
<!-- <a target='_blank' href="print.php" class="wavest-effect wavest-light btn blue">Print</a> -->
<div class="card-panel" style="overflow-x: auto;">
<form>
	<table id="data" class="table-apa ">
		<thead>
		<tr>
			<th>Nis</th>
			<th>Nama</th>
			<th>Jk</th>
			<th>Rombel</th>
			<th>BBI</th>
			<th>Keterangan BBI</th>
			<th>Kebutuhan energi</th>
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
			@$a = oop::tampil2($koneksi,$table);
			foreach ($a as $r) {


		 $kkarbo = $r[6];
		 $skarbo = $r[7];
		 $kprot = $r[8];
		 $kprot1 = $r[9];
		 $klem = $r[10];
		 $klem1 = $r[11];
		 $bulan = substr($r[20], 5,2);
		 switch ($bulan) {
		 	case "01":$bln = "januari";
		 		break;
		 	case "02":$bln = "Februari";
		 		break;
		 	case "03":$bln = "Maret";
		 		break;
		 	case "04":$bln = "April";
		 		break;
		 	case "05":$bln = "Mei";
		 		break;
		 	case "06":$bln = "Juni";
		 		break;
		 	case "07":$bln = "Juli";
		 		break;
		 	case "08":$bln = "Agustus";
		 		break;
		 	case "09":$bln = "September";
		 		break;
		 	case "10":$bln = "Oktober";
		 		break;
		 	case "11":$bln = "November";
		 		break;
		 	case "12":$bln = "Desember";
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
		 		<td><?php echo $r[16]; ?></td>
		 		<td><?php echo $r[12]; ?></td>
		 		<td><?php echo "$kkarbo - $skarbo /h"?></td>
		 		<td><?php echo "$kprot - $kprot1 /h" ?></td>
		 		<td><?php echo "$klem - $klem1 /h" ?></td>
		 		<td><?php echo $r[13]; ?></td>
		 		<td><?php echo $r[14]; ?></td>
		 		<td><?php echo $r[15]; ?></td>
		 		<td><?php echo $r[17]; ?></td>
		 		<td><?php echo $r[18]; ?></td>
		 		<td><?php echo $r[19]; ?></td>
		 		<td><?php echo substr($r[20], 8,2);echo " ".$bln;echo " ".substr($r[20], 0,4); ?></td>
		 	</tr>
		 	<?php 	} ?>
		 	</tbody>


	</table>
</form>
</div>
</div>
</div>
<script type="text/javascript">
	 $(document).ready(function(){
    $('#data').DataTable();
  });
</script>

</body>
</html>
