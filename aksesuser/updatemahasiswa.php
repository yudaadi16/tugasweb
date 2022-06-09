<?php
require 'function.php';
$conn = mysqli_connect("localhost", "root", "", "fakultashukumuniat");

//ambil data id mahasiswa
$nim = $_GET["nim"];

//query data berdasarkan nim
$nim = query("SELECT * FROM mahasiswa WHERE nim = $nim")[0];


if(isset($_POST["submit"]) ){
    
    $nim = $_POST['nim'];
    $nama_mahasiswa = htmlspecialchars($_POST['nama_mahasiswa']);
    $tgl_lahir = htmlspecialchars($_POST['tgl_lahir']);
    $alamat = htmlspecialchars($_POST['alamat']);
    $no_tlpn = htmlspecialchars($_POST['no_tlpn']);
        $iduser = htmlspecialchars($_POST['id_user']);


    // update user data
    $result = mysqli_query($conn, "UPDATE user SET nama_mahasiswa='$nama_mahasiswa',tgl_lahir='$tgl_lahir',alamat='$alamat',no_tlpn='$no_tlpn',id_user='$iduser'  WHERE nim=$nim");

    // Redirect to homepage to display updated user in list
    // header("Location: index.php");
    
    echo "
 				<script>
 				alert('data berhasil diubah');
 				document.location.href = 'index.php?halaman=showuser';
 				</script>
 		";


}
?>
<form action="" method="post">
  <div class="form-group">
    <label for="nim">Nomer Induk Mahasiswa</label>
    <input type="text" class="form-control" name="nim" id="nim" value="<?= $nim["nim"];?>" readonly>  
  </div>

  <div class="form-group">
    <label for="nama_mahasiswa">Nama Mahasiswa</label>
    <input type="text" class="form-control" name="nama_mahasiswa" id="nama_mahasiswa" autofocus="" maxlength="10" autocomplete="off" value="<?= $nim["nama_mahasiswa"];?>">
  </div>

<div class="form-group">
    <label for="tgl_lahir">Tanggal Lahir</label>
    <input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir" placeholder="masukkan nama dosen" autocomplete="off" maxlength="100" value="<?= $nim["tgl_lahir"];?>">
</div>

  <div class="form-group">
    <label for="alamat">Alamat</label>
    <input type="text" class="form-control" name="alamat" id="alamat" placeholder="masukkan alamat dosen" autocomplete="off" maxlength="20" value="<?= $nim["alamat"];?>">
  </div>

  <div class="form-group">
    <label for="no_tlpn">No Telepon</label>
    <input type="text" class="form-control" name="no_tlpn" id="no_tlpn" placeholder="masukkan no telepon" autocomplete="off" maxlength="20" value="<?= $nim["no_tlpn"];?>">
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