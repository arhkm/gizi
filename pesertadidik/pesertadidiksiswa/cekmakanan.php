<?php 
    @$table = "temporari";
    @$nama = $_POST['nama'];
    @$tanggal = date("Y-m-d");
    @$nama1 = @$user[0];
    @$jenis = $_POST['jenis'];
    @$kadar = $_POST['kadar'];
    @$where = "id = '$_GET[id]'";
    @$where1 = "nis = '$nama1'";
    $redirect = "hal_pesertadidiks.php?page=hasil";
    $redirectt = "hal_pesertadidiks.php?page=cekmakanan";

    if (isset($_POST['karbohidrat'])) {
        $ka = mysql_fetch_array(mysql_query("SELECT * FROM tb_makanan WHERE id = '$_POST[karbohidrat]'"));
         mysql_query("INSERT INTO $table VALUES('','$ka[nama]','$ka[jenis]','$ka[kadar]','$ka[gram]','$ka[energi]','$ka[lemak]','".$nama1."')");

    }
    

     if (isset($_POST['protein'])) {
        $ka = mysql_fetch_array(mysql_query("SELECT * FROM tb_makanan WHERE id = '$_POST[protein]'"));
         mysql_query("INSERT INTO $table VALUES('','$ka[nama]','$ka[jenis]','$ka[kadar]','$ka[gram]','$ka[energi]','$ka[lemak]','".$nama1."')");
    }

    if (isset($_POST['serat'])) {
        $ka = mysql_fetch_array(mysql_query("SELECT * FROM tb_makanan WHERE id = '$_POST[serat]'"));
        mysql_query("INSERT INTO $table VALUES('','$ka[Nama]','$ka[Jenis]','$ka[Kadar]','".$nama1."')");
    }

    if (isset($_POST['batalin'])) {
        $perintah->hapus($table,$where1,$redirectt);
      // echo "<script>alert('bisa');</script>";
    }

    if (isset($_GET['hapus'])) {
        $perintah->hapus($table,$where,$redirectt);
    }

    if (isset($_POST['cek'])) {
        // $temporari =mysql_query("SELECT * FROM temporari WHERE nis ='$nama1' AND tanggal = '$tanggal'");
        $sql =mysql_query("SELECT * FROM hasil_makanan WHERE nis ='$nama1' AND tanggal = '$tanggal'");
        $ceks =mysql_num_rows($sql);
          if($ceks == 0){
              $k = mysql_fetch_array(mysql_query("SELECT SUM(kadar) as kdr FROM temporari WHERE jenis = 'karbohidrat' AND nis = '".$nama1."'"));
              $p = mysql_fetch_array(mysql_query("SELECT SUM(kadar) as pr FROM temporari WHERE jenis = 'protein' AND nis = '".$nama1."'"));
              $l = mysql_fetch_array(mysql_query("SELECT SUM(lemak) as lm FROM temporari WHERE nis = '".$nama1."'"));
              @$karbonya = $k['kdr'];
              @$proteinnya= $p['pr'];
              @$lemaknya= $l['lm'];
              @$table1 = "hasil_makanan";
              @$tanggal = date("Y-m-d");
              @$field = "id_hmakanan ='',tanggal='".$tanggal."',nis='".$nama1."',hkarbohidrat='".$karbonya."',hprotein='".$proteinnya."',hlemak='".$lemaknya."'";
              $perintah->simpan($table1,$field,$redirect);
              $perintah->hapus($table,$where1,$redirect);

        }else{
             echo "<script>alert('anda sudah mengecek makanan anda!')</script>";
              $hapus = mysql_query("DELETE FROM temporari where nis = '".$nama1."'");
             echo "<script>alert('Dalam 1 hari hanya bisa satukali cek makanan !');document.location.href='".$redirect."'</script>";

             

        }
  }
 ?>
<form method="post">
<div class="row" style="margin-top:4%;">
        <div class="col s6 m6">
          <div class="card white ">
            <div class="card-content black-text">
              <span class="card-title">Makanan apa saja yang sudah anda makan ?</span>

            </div>
            <div class="row">
            <div class="col m6">
            <select name="karbohidrat" onchange="submit()">
                <option disabled selected>Karbohidrat</option>
                <?php  
                    $karbo = mysql_query("SELECT * FROM tb_makanan WHERE jenis='karbohidrat'");
                     while ($kar = mysql_fetch_array($karbo)) { ?>
                       <option value="<?php echo $kar['id']; ?>"><?php echo $kar['nama'];?></option>";
                <?php  } ?>
            </select>
            </div>  

            <div class="col m6">
            <select name="protein" onchange="submit()">
                <option disabled selected> Protein</option>
                <?php  
                    $pro = mysql_query("SELECT * FROM tb_makanan WHERE jenis='protein'");
                     while ($pr = mysql_fetch_array($pro)) { ?>
                       <option value="<?php echo $pr['id']; ?>"><?php echo $pr['nama'];?></option>";
                <?php  } ?>
            </select>
            </div> 
            </div>
          </div>
        </div>
      


        <div class="col s6 m6">
          <div class="card teal darken-3">
            <div class="card-content white-text">
              <table>
        <thead>
          <tr>
              <th>Nama</th>
              <th>Jenis</th>
              <th>Gram</th>
              <th>Kadar</th>
              <th>Energi</th>
              <th>Lemak</th>
          </tr>
        </thead>

       <?php 
            @$a = oop::tampil($table,$where1);
            if (empty($a)) {
                echo "<tr><td colspan='6' align ='center'>data tidak ada</td></tr>";
            }else{


            foreach ($a as $r) {

           ?>

           <tr>
             <!-- <td><?php echo $r[0] ?></td> -->
             <td><?php echo $r[1] ?></td>
             <td><?php echo $r[2] ?></td>
             <td><?php echo $r[4] ?></td>
             <td><?php echo $r[3] ?></td>
             <td><?php echo $r[5] ?></td>
             <td><?php echo $r[6] ?></td>
             <td >
                <a href="hal_pesertadidiks.php?page=cekmakanan&hapus&id=<?php echo $r[0] ?>" onClick="return confirm('Hapus Menu <?php echo $r[1]; ?> ?')" class=" tooltipped" data-position="bottom" data-delay="50" data-tooltip="Hapus">
                <span class="fa fa-minus-square-o" style="color: red;"></span>
                </a>
             </td>
            </tr>
           <?php 
            }
            }
           ?>
      </table>
            </div>
            <div class="card-action">
              
              <button name="cek">Selesai</button>
              <button name="batalin">Kosongkan</button>
            </div>
            </div>
          </div>
        </div>
      </form>