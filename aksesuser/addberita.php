<?php

$conn = mysqli_connect("localhost", "root", "", "fakultashukumuniat");

            // Check If form submitted, insert form data into users table.
if(isset($_POST['submit'])) {
  $idberita = $_POST['id_berita'];
  $tanggal = htmlspecialchars($_POST['tanggal']);
  $judul = htmlspecialchars($_POST['judul']);
  $isi = htmlspecialchars($_POST['isi']);
  $a=$_FILES['gambar']['name'];
  $iduser = htmlspecialchars($_POST["id_user"]);

  mysqli_query($conn, "INSERT INTO berita(id_berita,tanggal,judul,isi,gambar,id_user) VALUES('$idberita','$tanggal','$judul','$isi','$a','$iduser')");
  echo "<script>window.alert('Foto berhasil diupload')
  window.location='index.php?halaman=showberita'</script>";

//upload foto
  if (strlen($a)>0) {

    if (is_uploaded_file($_FILES['gambar']['tmp_name'])) {
      move_uploaded_file($_FILES['gambar']['tmp_name'], "../gambarberita/".$a);
    }
  }

  $iduser = htmlspecialchars($_POST["id_user"]);


        // include database connection file
$conn = mysqli_connect("localhost", "root", "", "fakultashukumuniat");

        // Insert user data into table
  $result = mysqli_query($conn, "INSERT INTO berita(id_berita,tanggal,judul,isi,gambar,id_user) VALUES('$idberita','$tanggal','$judul','$isi','$a','$iduser')");

        // Show message when user added
  echo "
  <script>
  alert('Data berhasil ditambahkan !!!!!')
  document.location.href = 'index.php?halaman=showberita';
  </script>
  ";

}

$tglinput= date("Y/m/d");
$conn = mysqli_connect("localhost", "root", "", "fakultashukumuniat");
$today= date("Ymd");
$query= "SELECT max(id_berita) AS last FROM berita WHERE id_berita LIKE '$today%'";
$hasil = mysqli_query($conn,$query);
$data = mysqli_fetch_array($hasil);
$lastNoTransaksi = $data['last'];
$lastNourut = substr($lastNoTransaksi, 8, 4);
$nextNoUrut = $lastNourut + 1;
// $nextNoUrut = $lastNourut + 1;

$nextNoTransaksi = $today.sprintf('%04s', $nextNoUrut);

?>


<form action="" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label for="id_berita">Id Berita</label>
    <input type="text" class="form-control" name="id_berita" id="id_berita" value="<?php echo $nextNoTransaksi ?>" readonly>  
  </div>

  <div class="form-group">
    <label for="tanggal">Tanggal</label>
    <input type="date" class="form-control" name="tanggal" id="tanggal" autofocus="" maxlength="10" autocomplete="off">
  </div>

  <div class="form-group">
    <label for="judul">Judul Berita</label>
    <input type="text" class="form-control" name="judul" id="judul" autocomplete="off" maxlength="100" placeholder="masukkan judul berita">
  </div>

  

  <div class="form-group">
    <label for="isi">Isi Berita</label>
    <textarea class="form-control" id="isi" name="isi" rows="20" placeholder="masukkan isi berita"></textarea>
  </div>


  <div class="form-group">
    <label for="gambar">Gambar Berita</label>
    <input type="file" class="form-control" name="gambar" id="gambar" autocomplete="off" maxlength="20">
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