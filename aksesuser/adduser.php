<?php
require 'function.php';
$conn = mysqli_connect("localhost", "root", "", "fakultashukumuniat");

// Check If form submitted, insert form data into users table.
    if(isset($_POST['submit'])) {
        $iduser = $_POST['id_user'];
        $nama = htmlspecialchars($_POST['nama']);
        $telpon = htmlspecialchars($_POST['telpon']);
        $status = htmlspecialchars($_POST['status']);
        $password = htmlspecialchars($_POST['password']);
        
        // include database connection file
        include_once("function.php");

        // Insert user data into table
        $result = mysqli_query($conn, "INSERT INTO user(id_user,nama,telpon,status,password) VALUES('$iduser','$nama','$telpon','$status','$password')");

        // Show message when user added
        echo "
         <script>
         alert('Data berhasil ditambahkan !!!!!')
         document.location.href = 'index.php?halaman=showuser';
         </script>
         ";
    }







$tglinput= date("Y/m/d");
$kode = "00";
$today= date("Ymd");
$query= "SELECT max(id_user) AS last FROM user WHERE id_user LIKE $kode AND'$today%'";
$hasil = mysqli_query($conn,$query);
$data = mysqli_fetch_array($hasil);
$lastNoTransaksi = $data['last'];
$lastNourut = substr($lastNoTransaksi, 11, 4);
$nextNoUrut = $lastNourut + 1;
// $nextNoUrut = $lastNourut + 1;

$nextNoTransaksi = $kode.$today.sprintf('%04s', $nextNoUrut);

?>


<form action="" method="post">
  <div class="form-group">
    <label for="id_user">Id User</label>
    <input type="text" class="form-control" name="id_user" id="id_user" value="<?php echo $nextNoTransaksi ?>" readonly>  
  </div>

  <div class="form-group">
    <label for="nama">Nama User</label>
    <input type="text" class="form-control" name="nama" id="nama" autofocus="" maxlength="50" autocomplete="off">
  </div>

<div class="form-group">
    <label for="telpon">Telpon</label>
    <input type="Telpon" class="form-control" name="telpon" id="telpon" placeholder="masukkan nomor telpon" autocomplete="off" maxlength="13">
</div>

  <div class="form-group">
    <label for="status">status</label>
    <select name="status" class="form-control" id="status">
        <option value="Admin">Admin</option>
        <option value="User">User</option>
    </select>
  </div>

  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" name="password" id="password" placeholder="masukkan password" autocomplete="off" maxlength="13">
</div>



<!--  -->
  <br>
  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>