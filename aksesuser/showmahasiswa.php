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
$idmahasiswa = query("SELECT * FROM mahasiswa ORDER BY nim ASC");

// dibawah ini sintak pencarian data buku
if(isset($_POST["carimahasiswa"]) ) {
  $idmahasiswa = carimahasiswa($_POST["keyword"]);
}

// sampai disini sintaks pencarian datanya
?>

<div class="panel panel-default">
  <div class="panel-heading">
   <h4 align="center">DATA MAHASISWA FAKULTAS HUKUM UNIVERSITAS ISLAM ATTAHIRIYAH</h4>
  </div>


 <div class="row">
   <div class="panel-body">

    <form action="" method="post">


      <input type="text" name="keyword" class="form-control" size="50" autofocus placeholder="masukkan keyword pencarian" autocomplete="off">

      <button  type="submit" name="caridosen">Cari</button>

      <a href="index.php?halaman=addmahasiswa" class="btn btn-outline-primary">Tambah Mahasiswa</a>
      <a class="btn btn-outline-primary" href="index.php?halaman=showdosen" role="button">Refresh</a>


    </form>
    <br>

    <div class="table-responsive">
      <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
          <tr>
            <th  class="align-middle text-center">No</th>
            <th class="align-middle text-center">Nomor Induk Mahasiswa</th>
            <th class="align-middle text-center">Nama Mahasiswa</th>
            <th class="align-middle text-center">Tanggal Lahir</th>
            <!-- <th>penerbit</th> -->
            <th class="align-middle text-center">Alamat</th>
            <!-- <th>isbn</th> -->
            <th class=" align-middle text-center">No. Telp</th>
            
            
            <!-- <th>tgl input</th> -->
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $i = 1; ?>
          <?php  foreach( $idmahasiswa as $row) : ?>
            <tr>
              <td><?php echo $i; ?></td>
              <td><?php echo $row['nim']; ?></td>
              <td><?php echo $row['nama_mahasiswa']; ?></td>
              <td><?php echo $row['tgl_lahir']; ?></td>
              <td><?php echo $row['alamat']; ?></td>
             
              <td><?php echo $row['no_tlpn']; ?></td>
            

              <td>

                <a href="index.php?halaman=updatemahasiswa&nim=<?= $row["nim"] ?>"><i class="fa fa-pencil"></i></a> | 
                
                <a href="index.php?halaman=deletemahasiswa&nim=<?= $row["nim"]; ?>" onclick="return confirm('Anda yakin ingin menghapus data ini ???');"><i class="fa fa-trash-o"></i></a>

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