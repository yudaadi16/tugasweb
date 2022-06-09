<?php

//if(!isset($_SESSION)) 
//    { 
//        session_start(); 
//    } 

//if( !isset($_SESSION["login"]) ) {
//    header("Location: login.php");
//    exit;
//}


 
// error_reporting(E_ALL^(E_NOTICE | E_WARNING));
require 'function.php';
$iddosen = query("SELECT * FROM dosen ORDER BY id_dosen ASC");

// dibawah ini sintak pencarian data buku
if(isset($_POST["caridosen"]) ) {
  $iddosen = caridosen($_POST["keyword"]);
}

// sampai disini sintaks pencarian datanya
?>

<div class="panel panel-default">
  <div class="panel-heading">
   <h4 align="center">DATA DOSEN FAKULTAS HUKUM UNIVERSITAS ISLAM ATTAHIRIYAH</h4>
  </div>


 <div class="row">
   <div class="panel-body">

    <form action="" method="post">


      <input type="text" name="keyword" class="form-control" size="50" autofocus placeholder="masukkan keyword pencarian" autocomplete="off">

      <button  type="submit" name="caridosen">Cari</button>

      <a href="index.php?halaman=adddosen" class="btn btn-outline-primary">Tambah dosen</a>
      <a class="btn btn-outline-primary" href="index.php?halaman=showdosen" role="button">Refresh</a>


    </form>
    <br>

    <div class="table-responsive">
      <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
          <tr>
            <th  class="align-middle text-center">No</th>
            <th class="align-middle text-center">Id dosen</th>
            <th class="align-middle text-center">NIDN</th>
            <th class="align-middle text-center">Nama Dosen</th>
            <!-- <th>penerbit</th> -->
            <th class="align-middle text-center">Gelar</th>
            <!-- <th>isbn</th> -->
            <th class=" align-middle text-center">Jabatan</th>
            <th class=" align-middle text-center">Jabatan Fungsional</th>
            
            <!-- <th>tgl input</th> -->
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $i = 1; ?>
          <?php  foreach( $iddosen as $row) : ?>
            <tr>
              <td><?php echo $i; ?></td>
              <td><?php echo $row['id_dosen']; ?></td>
              <td><?php echo $row['nidn']; ?></td>
              <td><?php echo $row['nama_dosen']; ?></td>
              <td><?php echo $row['gelar']; ?></td>
              <td  class=" align-middle text-center"><?php echo $row['jabatan']; ?></td>
              <td><?php echo $row['jabatan_fungsional']; ?></td>
            

              <td>

                <a href="index.php?halaman=updatedosen&id_dosen=<?= $row["id_dosen"] ?>"><i class="fa fa-pencil"></i></a> | 
                
                <a href="index.php?halaman=deletedosen&id_dosen=<?= $row["id_dosen"]; ?>" onclick="return confirm('Anda yakin ingin menghapus data ini ???');"><i class="fa fa-trash-o"></i></a>

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