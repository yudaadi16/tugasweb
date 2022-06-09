<?php


require 'function.php';

$conn = mysqli_connect("localhost", "root", "", "fakultashukumuniat");


if(isset($_POST["submit"]) ){
    
    $iddosen            = $_POST['id_dosen'];
    $nidn               = htmlspecialchars($_POST['nidn']);
    $namadosen          = htmlspecialchars($_POST['nama_dosen']);
    $gelar              = htmlspecialchars($_POST['gelar']);
    $jabatan            = htmlspecialchars($_POST['jabatan']);
    $jabatanfungsional  = htmlspecialchars($_POST['jabatan_fungsional']);
    $iduser             = htmlspecialchars($_POST['id_user']);
        
        // include database connection file
    include_once("function.php");

        // Insert user data into table
    $result = mysqli_query($conn, "INSERT INTO dosen(id_dosen,nidn,nama_dosen,gelar,jabatan,jabatan_fungsional,id_user) VALUES('$iddosen','$nidn','$namadosen','$gelar','$jabatan','$jabatanfungsional','$iduser')");

        // Show message when user added
    echo "
    <script>
    alert('Data berhasil ditambahkan !!!!!')
    document.location.href = 'index.php?halaman=showdosen';
    </script>
    ";

}



$tglinput= date("Y/m/d");
$conn = mysqli_connect("localhost", "root", "", "fakultashukumuniat");
$kode = "430";
$today= date("Ymd");
$query= "SELECT max(id_dosen) AS last FROM dosen WHERE id_dosen LIKE '$kode%'AND'$today%'";
$hasil = mysqli_query($conn,$query);
$data = mysqli_fetch_array($hasil);
$lastNoTransaksi = $data['last'];
$lastNourut = substr($lastNoTransaksi, 11, 4);
$nextNoUrut = $lastNourut + 1;
$nextNoUrut = $lastNourut + 1;

$nextNoTransaksi =$kode.$today.sprintf('%04s', $nextNoUrut);

?>


<form action="" method="post">
  <div class="form-group">
    <label for="id_dosen">Id Dosen</label>
    <input type="text" class="form-control" name="id_dosen" id="id_dosen" value="<?php echo $nextNoTransaksi ?>" readonly>  
  </div>

  <div class="form-group">
    <label for="nidn">NIDN</label>
    <input type="text" class="form-control" name="nidn" id="nidn" autofocus="" maxlength="10" autocomplete="off">
  </div>

<div class="form-group">
    <label for="nama_dosen">Nama Dosen</label>
    <input type="text" class="form-control" name="nama_dosen" id="nama_dosen" placeholder="masukkan nama dosen" autocomplete="off" maxlength="100">
</div>

  <div class="form-group">
    <label for="gelar">Gelar</label>
    <input type="text" class="form-control" name="gelar" id="gelar" placeholder="masukkan gelar dosen" autocomplete="off" maxlength="20">
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
    <input type="text" class="form-control" name="jabatan_fungsional" id="jabatan_fungsional" placeholder="masukkan jabatan fungsional" autocomplete="off" maxlength="50">   
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