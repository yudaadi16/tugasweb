<?php 

/*
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

if( !isset($_SESSION["login"]) ) {
    header("Location: login.php");
    exit;
}
*/


// error_reporting(E_ALL^(E_NOTICE | E_WARNING));
require 'function.php';
$iduser = query("SELECT * FROM user ORDER BY id_user ASC");

// dibawah ini sintak pencarian data buku
if(isset($_POST["cariuser"]) ) {
  $iduser = cariuser($_POST["keyword"]);
}

// sampai disini sintaks pencarian datanya
?>

<div class="panel panel-default">
  <div class="panel-heading">
   <h4 align="center">USER</h4>
  </div>


 <div class="row">
   <div class="panel-body">

    <form action="" method="post">


      <input type="text" name="keyword" class="form-control" size="50" autofocus placeholder="masukkan keyword pencarian" autocomplete="off">

      <button  type="submit" name="cariuser">Cari</button>

      <a href="index.php?halaman=adduser" class="btn btn-outline-primary">Tambah User</a>
      <a class="btn btn-outline-primary" href="index.php?halaman=showuser" role="button">Refresh</a>


    </form>
    <br>

    <div class="table-responsive">
      <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
          <tr>
            <th  class="align-middle text-center">No</th>
            <th class="align-middle text-center">Id User</th>
            <th class="align-middle text-center">Nama</th>
            <th class="align-middle text-center">Telpon</th>
            <!-- <th>penerbit</th> -->
            <th class="align-middle text-center">Status</th>
            <th class="align-middle text-center">Password</th>
            <!-- <th>isbn</th> -->           
            <!-- <th>tgl input</th> -->
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $i = 1; ?>
          <?php  foreach( $iduser as $row) : ?>
            <tr>
              <td align="center"><?php echo $i; ?></td>
              <td><?php echo $row['id_user']; ?></td>
              <td><?php echo $row['nama']; ?></td>
              <td align="center"><?php echo $row['telpon']; ?></td>
              <td><?php echo $row['status']; ?></td>
              <td><?php echo $row['password']; ?></td>

              <td>

                <a href="index.php?halaman=updateuser&id_user=<?= $row["id_user"] ?>"><i class="fa fa-pencil"></i></a> | 
                
                <a href="index.php?halaman=deleteuser&id_user=<?= $row["id_user"]; ?>" onclick="return confirm('Anda yakin ingin menghapus data ini ???');"><i class="fa fa-trash-o"></i></a>

              </td>


            </tr>
            <?php $i++; ?>
          <?php endforeach; ?>
        </tbody>
      </table>
      
    </div>
  </div>
</div>
</div>