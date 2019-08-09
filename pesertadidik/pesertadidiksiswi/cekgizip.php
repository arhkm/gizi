<?php 
      // date_default_timezone_set("Asia/Jakarta");

      @$tanggal = date("Y-m-d");
      @$nama = @$user[0];
      $redirect ="hal_pesertadidik.php?page=cekmakanan";
    
    if (isset($_POST['kegiatannya'])) {
      if (empty($_POST['tinggi'] ) || empty($_POST['berat'] ) || empty($_POST['usia'] )) {
        echo "<script>alert('data tidak lengkap');</script>";     
      }else{
        $sql =mysql_query("SELECT * FROM hasil_tubuh WHERE nis ='$nama' AND tanggal = '$tanggal'");
        $ceks =mysql_num_rows($sql);
        // echo $ceks;
          if($ceks == 0){
            $nilainya = mysql_fetch_array(mysql_query("SELECT nilai as nil FROM kegiatanp WHERE id = '$_POST[kegiatannya]'"));
              // echo $nilainya['nil'];
            $nilai = $nilainya['nil'];
            $usia = $_POST['usia'];
            $tinngi = $_POST['tinggi'];
            $tinggim = $tinngi / 100;
            $pangkakt = 2;
            $htinggi = pow($tinggim, $pangkakt);
            $berat = $_POST['berat'];
            //hasilimt
            $imt = round($berat/$htinggi,2);
            //hasilbmi
            $tb = $tinngi - 100;
            $tingginya = $tb * 0.1;
            $bbi = $tb - $tingginya;
            //hasilamb  
            $amb = 655 + (9.6 * $bbi) + (1.8 *$tinngi)- (4.7 * $usia);
            //hasilkebenergi
            $k1 = $amb * 1.55;
            $ke = $amb * 1.55 * 0.1;
            $ke2 = $amb * $nilai;
            $ke3 = $amb * $nilai * 0.6 ;
            //protein
            $prot1 = $ke;
            $prot2 = $ke2 * 0.15;
            $hprot1 =round( $prot1/4,2);
            $hprot2 =round( $prot2/4,2);
            //lemak
            $lem1 = $ke;
            $lem2 = $ke2 * 0.25;
            $hlem1 = round($lem1/9,2);
            $hlem2 = round($lem2/9,2);
            //karbohidrat
            $kar1 = $ke3;
            $kar2 = $ke2 * 0.75;
            $hkar1 = round($kar1/4,2);
            $hkar2 = round($kar2/4,2);

            // echo "$hprot1 - $hprot2 gram -- $hlem1-$hlem2 -- $hkar1-$hkar2 -- $k1 -- $nilai";

            $table = "hasil_tubuh";
            $field = "id_htubuh = '',tanggal = '".$tanggal."',nis = '".$nama."',imt ='".$imt."',bbi ='".$bbi."',kkarbohidrat ='".$hkar1."',skarbohidrat ='".$hkar2."',kprotein ='".$hprot1."',sprotein ='".$hprot2."',klemak ='".$hlem1."',slemak ='".$hlem2."',kenergi ='".$k1."'";
            $perintah->simpan($table,$field,$redirect);   
          }else{
            echo "<script>alert('anda sudah sudah mengecek kategori tubuh anda');document.location.href='".$redirect."'</script>";
          }
      }
     
   }
    
     


 ?>
<!DOCTYPE html>
<html>
<head>
  <style type="text/css">
  .foto{
    background-image:url(../../assets/img/cektubuh.jpeg);
    background-size: 100% 100%;
    /*background-color: red;*/
  }
  .radius{
    border-radius: 90px;
  }
  </style>
</head>
<body>
<form method="post">
<div class="row" style="margin-left:35%; margin-top:100px; ">
<div class="col s8 m6">
     <div class="card z-depth-5">
    <div class="card sticky-action waves-block waves-light foto radius" style="height:350px; ">
    </div>
    <div class="card-content ">
      <center><span class="card-title activator grey-text text-darken-4 red-text" type="submit" name="cek" >Cek tubuh ideal anda</span></center>
      
    </div>
    <div class="card-reveal">
    <br>
      <center><span class="card-title activator grey-text text-darken-4 red-text" type="submit" name="cek" >Cek tubuh ideal anda</span></center>
      <hr>
    <br>
      <div class="input-field col s6">
      <input id="first_name" type="number" class="validate" name="tinggi">
          <label for="first_name">Tinggi badan</label>
    </div>
    
     

    <div class="input-field col s6">
      <input id="first_name" type="number" class="validate" name="berat">
          <label for="first_name">Berat badan</label>
    </div>
    <div class="input-field col s6">
      <input id="first_name" type="number" class="validate" name="usia">
          <label for="first_name">Usia</label>
    </div>

    <div class="col m6" style="margin-top:15px;">
            <select name="kegiatannya" onchange="submit()">
                <option disabled selected> Kegiatan</option>
                <?php  
                    $kegi = mysql_query("SELECT * FROM kegiatanl");
                     while ($kg = mysql_fetch_array($kegi)) { ?>
                       <option value="<?php echo $kg['id']; ?>"><?php echo $kg['jenis'];?></option>";
                <?php  } ?>
            </select>
    </div>
    

      
    </div>
  </div>
  </div>
  
</div>

      </form>
      </body>
      </html>