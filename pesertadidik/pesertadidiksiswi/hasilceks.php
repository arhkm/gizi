
<?php 
  @$nis = @$user[0]; 
  @$tanggal = date("Y-m-d");
  $data = mysql_fetch_array(mysql_query("SELECT * FROM hasil_tubuh WHERE nis ='$nis' and tanggal = '$tanggal' "));
  //data untuk kebutuhan tubuh
  $idtubuh = $data['id_htubuh'];
  $imtnya = $data['imt'];
  $bbinya = $data['bbi'];
  $karbohidratnya = $data['kkarbohidrat'];
  $skarbohidratnya = $data['skarbohidrat'];
  $kproteinnya = $data['kprotein'];
  $sproteinnya = $data['sprotein'];
  $klemaknya= $data['klemak'];
  $slemaknya= $data['slemak'];

  if ($imtnya > 27 ) {
    $foto = "back.jpg";
    $status = "OBESITAS";
  }else if( $imtnya >25){
    $foto = "back.jpg";
    $status = "GEMUK";
  }else if( $imtnya <18){
    $foto = "back.jpg";
    $status = "KURUS";
  }else{
    $foto = "back.jpg";
    $status = "NORMAL";
  }

  //data untuk kandungan dalam tubuh
  $data2 = mysql_fetch_array(mysql_query("SELECT * FROM hasil_makanan WHERE nis ='$nis' and tanggal = '$tanggal' "));
  $idmakanan = $data2['id_hmakanan'];
  $hkarbohidratnya = $data2['hkarbohidrat'];
  $hproteinnya = $data2['hprotein'];
  $hlemaknya = $data2['hlemak'];

  //perbandingan karbohidrat
  if ($hkarbohidratnya < $karbohidratnya) {
      $k1 ="<p style='color:red'> tubuh anda kekurangan karbohidrat </p>"; 
      $kk1 ="tubuh anda kekurangan karbohidrat"; 
  }elseif ($hkarbohidratnya > $skarbohidratnya) {
      $k1 ="<p style='color:green'> Karbohidrat dalam tubuh anda melebihi yang dibutuhkan tubuh </p>";
      $kk1 ="Karbohidrat dalam tubuh anda melebihi yang dibutuhkan tubuh";
  }else{
     $k1 ="<p style='color:yellow'> Karbohidrat dalam tubuh anda tercukupi </p>";
     $kk1 ="Karbohidrat dalam tubuh anda tercukupi";
  }

  //perbandingan protein
  if ($hproteinnya < $kproteinnya) {
      $p1 ="<p style='color:red'> tubuh anda kekurangan protein</p>"; 
      $pp1 ="tubuh anda kekurangan protein"; 
  }elseif ($hproteinnya > $sproteinnya) {
      $p1 ="<p style='color:green'> Protein dalam tubuh anda melebihi yang dibutuhkan tubuh </p>";
      $pp1 ="Protein dalam tubuh anda melebihi yang dibutuhkan tubuh";
  }else{
     $p1 ="<p style='color:yellow'> Protein dalam tubuh anda tercukupi</p>";
     $pp1 ="Protein dalam tubuh anda tercukupi";
  }

  //perbandingan lemak
  if ($hlemaknya < $klemaknya) {
      $l1 ="<p style='color:red'> tubuh anda kekurangan lemak </p>"; 
      $ll1 ="tubuh anda kekurangan lemak"; 
  }elseif ($hlemaknya > $slemaknya) {
      $l1 ="<p style='color:green'> lemak dalam tubuh anda melebihi yang dibutuhkan tubuh </p>";
      $ll1 ="lemak dalam tubuh anda melebihi yang dibutuhkan tubuh";
  }else{
     $l1 ="<p style='color:yellow'> lemak dalam tubuh anda tercukupi </p>";
     $ll1 ="lemak dalam tubuh anda tercukupi";
  }

  if (isset($_POST['coba'])) {
    $sql = mysql_query("SELECT * FROM hasil_cek WHERE nis = '$nis' AND tanggal = '$tanggal'");
    $ceks = mysql_num_rows($sql);
    if ($ceks == 0) {
      @$redirect = "hal_pesertadidik.php?page=home";
      @$table = "hasil_cek";
      @$field = "id_htubuh='".$idtubuh."',id_hmakanan='".$idmakanan."',nis='".$nis."',tanggal = '".$tanggal."',Keterangan_tubuh='".$status."',Keterangan_kar ='".$kk1."',Keterangan_prot ='".$pp1."',Keterangan_lem='".$ll1."'";
      $perintah->simpan2($table,$field,$redirect);
      echo "<script>document.location.href='hal_pesertadidik.php?page=home';window.open('print.php?nis=$nis')</script>";
      }else{
            echo "<script>alert('anda sudah Menyimpan hasil cek anda !');document.location.href='hal_pesertadidik.php?page=home'</script>";
          }
    }

 ?>
 <style type="text/css">
 .wjudul1{
  color: yellow;
 }
 .wjudul2{
  color: green;
 }
 .wjudul3{
  color: yellow;
 }
 a{
  color: white;
 }
 d{
  color: yellow;
 }
 li{
  color: white;
 }

 </style>
 <form method="post" >

<div class="row" style="margin-top:50px;">
        <div class="col s6 m5 " style="border:2px;">
          <div class="card  teal darken-3 ">
            <div class="card-content white-text">
              <span class="card-title wjudul1"><center>Kategori tubuh anda</center></span>
              <div class="row">
              <div class=" col s6 m6">
              <br><br>
              <ul>
                <li>
                  <a>IMT : <d><?php echo "$imtnya"; ?></d></a><br><br>
                  <a>BBI : <d><?php echo "$bbinya"; ?></d></a><br><br>
                  <a>Keterangan : <d><?php echo "$status"; ?></d></a><br><br>
                  
                </li>
              </ul>
              </div>
              <div class="col s6 m6">
              <br><br>
                <img src="../../assets/img/<?php echo $foto; ?>" width="145" height="100">
              </div>
              </div>
              
            </div>
          </div>
        </div>
        <div class="col s12 m7">
          <div class="card teal darken-3">
          <div class="row">
            <div class="col s5 m6">
            <div class="card-content white-text">
              <span class="card-title wjudul2 " >Kebutuhan tubuh</span>
              <ul>
                <li><a>karbohidrat :</a> <?php echo "$karbohidratnya - $skarbohidratnya gram/Harinya"; ?> </li>
                <li><a>Protein     :</a> <?php echo "$kproteinnya - $sproteinnya gram/Hari"; ?></li>
                <li><a>Lemak       :</a> <?php echo "$klemaknya - $slemaknya gram/Harinya"; ?></li>
              </ul>
            </div>
            </div>

            <div class="col s7 m6">
            <div class="card-content white-text">
              <span class="card-title ">Yang terkandung ditubuh</span>
              <ul>
                <li><a>karbohidrat :</a> <?php echo "$hkarbohidratnya gram Saat ini"; ?> </li>
                <li><a>Protein     :</a> <?php echo "$hproteinnya gram Saat ini"; ?></li>
                <li><a>Lemak       :</a> <?php echo "$hlemaknya gram Saat ini"; ?></li>
              </ul>
            </div>
            </div>
            </div>
            <div class="row">
              <div class="col s12 m12">
                  <div class="card-content ">
                <span class="card-title"><center>Keterangan</center></span>
                  <div class="col s12 m12">
                  <table style="background-color:white;">
                  <tr>
                    <th>Karbohidrat</th>
                    <th>Protein</th>
                    <th>Lemak</th>
                  </tr>
                  <tr>
                    <td><?php echo "$k1"; ?></td>
                    <td><?php echo "$p1"; ?></td>
                    <td><?php echo "$l1"; ?></td>
                  </tr>
                  </table>
                  </div>
                  </div>
               </div>
            </div>
            <div class="card-action">
            <input type="submit" name="coba" class="btn btn-waves waves-effect red" value="SELESAI" style="text-decoration: 10;width:128px;">
              
            </div>
          
          </div>
        </div>
      </div>
  </form>