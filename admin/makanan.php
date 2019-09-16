<?php
  error_reporting(0);
  $redirect ="hal_admin.php?page=makanan";
  $table ="tb_makanan";
  @$where = "Id = '$_GET[id]'";
  @$where1 = "Nama = '$_GET[nama]'";
  @$nama = $_POST['nama'];
  @$jenis = $_POST['jenis'];
  @$kadar = $_POST['kadar'];
  @$kadar = $_POST['kadar'];
  @$gram = $_POST['gram'];
  @$energi = $_POST['energi'];
  @$lemak = $_POST['lemak'];
  $field = "nama = '".$nama."', gram = '".$gram."', energi = '".$energi."', jenis = '".$jenis."', kadar = '".$kadar."', lemak = '".$lemak."'";

  if (isset($_POST['simpan'])) {
    // echo "<script>alert('selamat')</script>";
    $perintah->simpan($koneksi,$table,$field,$redirect);
  }

  if (isset($_GET['hapus'])) {
    $perintah->hapus($koneksi,$table,$where,$redirect);
  }

  if (isset($_GET['edit'])) {
    $modif = oop::edit($koneksi,$table,$where);
    $dis = "disabled";
  }else {
    $dos ="disabled";
  }

  if (isset($_POST['update'])) {
     // echo "<script>alert('selamat')</script>";

     oop::ubah($koneksi,$table, $field, $where, $redirect);
  }

  if(isset($_POST['cari'])){

  }

 ?>


<!DOCTYPE html>
<html>
  <style type="text/css">
    .table-boaedan{
      width: 100%;
    }
    .table-apa th,
    .table-apa td{
      font-size: 15px!important;
    }
    </style>
</head>


<form method="post">
<div class="row" style="margin-top:5%; ">
        <div class="col s5">
          <div class="card ">
            <div class="card-content black-text">
              <center><span class="card-title">Input makanan yang sehat</span></center>
              <div class="row">
        <div class="input-field col s5">
          <input id="first_name" type="text" class="validate" name="nama" value="<?php echo @$modif[1];?>">
          <label for="first_name">Nama makanan</label>
        </div>
        <div class="input-field col s3">
        <select name="jenis" >
            <?php
                      if ($_GET['id'] != "") {
                      if ($modif[4] == "Karbohidrat") {
                        $kas = "selected";
                      }elseif($modif[4] == "Protein"){
                        $man = "selected";
                      }
                      }else{
                        echo '<option value="" disabled selected>Pilih jenis</option>';
                      }
                    ?>

          <option value="Karbohidrat" <?php echo @$kas ?>>Karbohidrat</option>
          <option value="Protein"<?php echo @$man ?>>Protein</option>
        </select>
        </div>
        <div class="input-field col s4">
          <input id="last_name" type="number" class="validate" name="kadar" value="<?php echo @$modif[5];?>" required>
          <label for="last_name">Kadar</label>
        </div>
        <div class="input-field col s4">
          <input id="last_name" type="number" class="validate" name="gram" value="<?php echo @$modif[2];?>" required>
          <label for="last_name">Gram</label>
        </div>
        <div class="input-field col s4">
          <input id="last_name" type="number" class="validate" name="energi" value="<?php echo @$modif[3];?>" required>
          <label for="last_name">Energi</label>
        </div>
        <div class="input-field col s4">
          <input id="last_name" type="number" class="validate" name="lemak" value="<?php echo @$modif[6];?>" required>
          <label for="last_name">Lemak</label>
        </div>

         </div>
            </div>
            <div class="card-action">
            <div class="row">
              <div class="col s6">
                <button type="submit" class="waves-effect waves-light btn <?php echo $dis ?> right" name="simpan" style="width: 80%">Simpan</button>
              </div>
              <div class="col s6">
                <button type="submit" class="waves-effect waves-light btn <?php echo $dos ?> left" name="update" style="width: 80%">Update</button>
              </div>
              </div>
          </div>
          </div>

        </div>

        <div class="col s7">
          <div class="card-panel" style="overflow-x: auto;">
              <div class="row">
                <div class="col s12">
                  <table  id="data" class="table-apa ">
        <thead>
          <tr>
              <th >No</th>
              <th >Nama</th>
              <th >Jenis</th>
              <th >Gram</th>
              <th >Kadar</th>
              <th >Energi</th>
              <th >Lemak</th>
              <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $a = oop::tampil2($koneksi,$table);
            $no= 0;
            foreach ($a as $r) {
            $no++
           ?>

           <tr>
             <td><?php echo $no; ?></td>
             <td><?php echo $r[1] ?></td>
             <td><?php echo $r[4] ?></td>
             <td><?php echo $r[2] ?></td>
             <td><?php echo $r[5] ?></td>
             <td><?php echo $r[3] ?></td>
             <td><?php echo $r[6] ?></td>
             <td>
                <a href="hal_admin.php?page=makanan&hapus&id=<?php echo $r[0] ?>" onClick="return confirm('Hapus Menu <?php echo $r[1]; ?> ?')" class=" tooltipped" data-position="bottom" data-delay="50" data-tooltip="Hapus">
                <span class="material-icons" style="color: red;">delete_forever</span>
                </a>
                <a href="hal_admin.php?page=makanan&edit&id=<?php echo $r[0] ?>" class=" tooltipped" data-position="bottom" data-delay="50" data-tooltip="Edit"><span class="material-icons">edit</span></a>
             </td>
            </tr>
           <?php } ?>
      </table>
            <script type="text/javascript">
  $(document).ready(function() {
    $('select').material_select();
  });
  $(document).ready(function(){
    $('#data').DataTable();
  });


 </script>
                </div>
              </div>
            </div>

          </div>

        </div>
      </div>

      </form>


      </body>
</html>
