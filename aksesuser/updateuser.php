<?php

require 'function.php';

$conn = mysqli_connect("localhost", "root", "", "fakultashukumuniat");

// ambil data url id anggota 
$iduser = $_GET["id_user"];

// query data suswa berdsarkan id anggota
$iduser = query( "SELECT * FROM user WHERE id_user = $iduser")[0];

if(isset($_POST["submit"]) ){
    
    $iduser = $_POST['id_user'];
    $nama = htmlspecialchars($_POST['nama']);
    $telpon = htmlspecialchars($_POST['telpon']);
    $status = htmlspecialchars($_POST['status']);
    $password = md5($_POST['password']);

    // update user data
    $result = mysqli_query($conn, "UPDATE user SET nama='$nama',telpon='$telpon',status='$status',password='$password' WHERE id_user=$iduser");

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
    <label for="id_user">Id User</label>
    <input type="text" class="form-control" name="id_user" id="id_user" value="<?= $iduser["id_user"];?>" readonly>  
  </div>

  <div class="form-group">
    <label for="nama">Nama User</label>
    <input type="text" class="form-control" name="nama" id="nama" autofocus="" maxlength="50" autocomplete="off" value="<?= $iduser["nama"];?>">
  </div>

<div class="form-group">
    <label for="telpon">Telpon</label>
    <input type="Telpon" class="form-control" name="telpon" id="telpon" placeholder="masukkan nomor telpon" autocomplete="off" maxlength="13" value="<?= $iduser["telpon"];?>">
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
    <input type="password" class="form-control" name="password" id="password" placeholder="masukkan nomor password" autocomplete="off" maxlength="13" value="<?= $iduser["password"];?>">
</div>

<!--  -->
  <br>
  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>