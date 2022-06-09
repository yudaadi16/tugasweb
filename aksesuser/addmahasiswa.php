<?php
$conn = mysqli_connect("localhost", "root", "", "fakultashukumuniat");

            // Check If form submitted, insert form data into users table.
if(isset($_POST['submit'])) {
  $nim = $_POST['nim'];
  $nama_mahasiswa = htmlspecialchars($_POST['nama_mahasiswa']);
  $tgl_lahir = htmlspecialchars($_POST['tgl_lahir']);
  $alamat = htmlspecialchars($_POST['alamat']);
 $no_telpon            = htmlspecialchars($_POST['no_tlpn']);
  $iduser = htmlspecialchars($_POST["id_user"]);

  mysqli_query($conn, "INSERT INTO mahasiswa(nim,nama_mahasiswa,tgl_lahir,alamat,no_tlpn,id_user) VALUES('$nim','$nama_mahasiswa','$tgl_lahir','$alamat','$no_telpon','$iduser')");
 

    // include database connection file
$conn = mysqli_connect("localhost", "root", "", "fakultashukumuniat");

        // Insert user data into table
   $result = mysqli_query($conn, "INSERT INTO mahasiswa(nim,nama_mahasiswa,tgl_lahir,alamat,no_tlpn,id_user) VALUES('$nim','$nama_mahasiswa','$tgl_lahir','$alamat','$no_telpon','$iduser')");
        // Show message when user added
  echo "
  <script>
  alert('Data berhasil ditambahkan !!!!!')
  document.location.href = 'index.php?halaman=showmahasiswa';
  </script>
  ";

}

$tglinput= date("Y/m/d");
$conn = mysqli_connect("localhost", "root", "", "fakultashukumuniat");
$today= date("Ymd");
$query= "SELECT max(nim) AS last FROM mahasiswa WHERE nim LIKE '$today%'";
$hasil = mysqli_query($conn,$query);
$data = mysqli_fetch_array($hasil);
$lastNoTransaksi = $data['last'];
$lastNourut = substr($lastNoTransaksi, 11, 4);
$nextNoUrut = $lastNourut + 1;
$nextNoUrut = $lastNourut + 1;

$nextNoTransaksi = $today.sprintf('%04s', $nextNoUrut);

?>


<form action="" method="post">
  <div class="form-group">
    <label for="nim">Nomer Induk Mahasiswa</label>
    <input type="text" class="form-control" name="nim" id="nim" value="<?php echo $nextNoTransaksi ?>" readonly>  
  </div>

  <div class="form-group">
    <label for="nama_mahasiswa">Nama Mahasiswa</label>
    <input type="text" class="form-control" name="nama_mahasiswa" id="nama_mahasiswa" autofocus="" maxlength="10" autocomplete="off">
  </div>



 <div class="form-group">
    <label for="tgl_lahir">tanggal lahir</label>
    <input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir" autofocus="" maxlength="10" autocomplete="off">
  </div>

  <div class="form-group">
    <label for="jabatan">alamat</label>
    <input type="text" class="form-control" name="alamat" id="alamat" autocomplete="off" placeholder="masukkan alamat lengkap"> 
  </div>

  <div class="form-group">
    <label for="no_tlpn">No. Telepon</label>
    <input type="text" class="form-control" name="no_tlpn" id="no_tlpn" placeholder="masukkan nomor telepon" autocomplete="off" maxlength="50">   
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