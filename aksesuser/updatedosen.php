<?php

require 'function.php';

$conn = mysqli_connect("localhost", "root", "", "fakultashukumuniat");

    // ambil data url id anggota 
$iddosen = $_GET["id_dosen"];

    // query data suswa berdsarkan id anggota
$iddosen = query("SELECT * FROM dosen WHERE id_dosen = $iddosen" )[0];

if(isset($_POST["submit"]) ){
    
    $iddosen = ($_POST['id_dosen']);
    $nidn = htmlspecialchars($_POST['nidn']);
    $namadosen = htmlspecialchars($_POST['nama_dosen']);
    $gelar = htmlspecialchars($_POST['gelar']);
    $jabatan = htmlspecialchars($_POST['jabatan']);
    $jabatanfungsional = htmlspecialchars($_POST['jabatan_fungsional']);
    $iduser = htmlspecialchars($_POST['id_user']);
    

    // update user data
    $result = mysqli_query($conn, "UPDATE dosen SET nidn='$nidn',nama_dosen='$namadosen',gelar='$gelar',jabatan='$jabatan',jabatan_fungsional='$jabatanfungsional',id_user='$iduser' WHERE id_dosen=$iddosen");

    // Redirect to homepage to display updated user in list
    // header("Location: index.php");
    
    echo "
                <script>
                alert('data berhasil diubah');
                document.location.href = 'index.php?halaman=showdosen';
                </script>
        ";


}

?>


<form action="" method="post">
  <div class="form-group">
    <label for="id_dosen">Id Dosen</label>
    <input type="text" class="form-control" name="id_dosen" id="id_dosen" value="<?= $iddosen["id_dosen"];?>" readonly>  
  </div>

  <div class="form-group">
    <label for="nidn">NIDN</label>
    <input type="text" class="form-control" name="nidn" id="nidn" autofocus="" maxlength="10" autocomplete="off" value="<?= $iddosen["nidn"];?>">
  </div>

<div class="form-group">
    <label for="nama_dosen">Nama Dosen</label>
    <input type="text" class="form-control" name="nama_dosen" id="nama_dosen" placeholder="masukkan nama dosen" autocomplete="off" maxlength="100" value="<?= $iddosen["nama_dosen"];?>">
</div>

  <div class="form-group">
    <label for="gelar">Gelar</label>
    <input type="text" class="form-control" name="gelar" id="gelar" placeholder="masukkan gelar dosen" autocomplete="off" maxlength="20" value="<?= $iddosen["gelar"];?>">
  </div>

  <div class="form-group">
    <label for="jabatan">Jabatan</label>
    <select name="jabatan" class="form-control" id="jabatan">
        <option value="Tetap">Tetap</option>
        <option value="TidakTetap">Tidak Tetap</option>
    </select>
  </div>

  <div class="form-group">
    <label for="jabatan_fungsional">Jabatan Fungsional</label>
    <input type="text" class="form-control" name="jabatan_fungsional" id="jabatan_fungsional" placeholder="masukkan jabatan fungsional" autocomplete="off" maxlength="50" value="<?= $iddosen["jabatan_fungsional"];?>">   
  </div>
<!--  -->
   <div class="form-group">
    <label for="id_user" class="col-sm-2 col-form-label">Kode user</label>
    <select name="id_user" class="form-control" id="id_user">
        <?php
$conn = mysqli_connect("localhost", "root", "", "fakultashukumuniat");

          $result = mysqli_query($conn, "SELECT * FROM user ORDER BY id_user");
          while ($row = mysqli_fetch_assoc($result)) 
          {
            echo "<option>$row[id_user] $row[nama]</option>";
          }
        ?>
    </select>
  </div>
  <br>
  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>