<?php 


/*if(!isset($_SESSION)) 
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
$showberita = query("SELECT * FROM berita ORDER BY id_berita ASC");

// dibawah ini sintak pencarian data buku
if(isset($_POST["cariberita"]) ) {
  $showberita = cariberita($_POST["keyword"]);
}

// sampai disini sintaks pencarian datanya
?>

<div class="panel panel-default">
  <div class="panel-heading">
   <h5 align="center">INFORMASI BERITA FAKULTAS HUKUM UNIVERSITAS ISLAM ATTAHIRIYAH</h5>
  </div>


 <div class="row">
   <div class="panel-body">

    <form action="" method="post">


      <input type="text" name="keyword" class="form-control" size="50" autofocus placeholder="masukkan keyword pencarian" autocomplete="off">

      <button  type="submit" name="cariberita">Cari</button>

      <a href="index.php?halaman=addberita" class="btn btn-outline-primary">Tambah Berita</a>
      <a class="btn btn-outline-primary" href="index.php?halaman=showberita" role="button">Refresh</a>


    </form>
    <br>

    <div class="table-responsive">
      <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
          <tr>
          	<th  class="align-middle text-center">No</th>
            <th  class="align-middle text-center">Id Berita</th>
            <th class="align-middle text-center">Tanggal</th>
            <th class="align-middle text-center">Judul</th>
            <th class="align-middle text-center">Isi Berita</th>
            <!-- <th>penerbit</th> -->
            <th class="align-middle text-center">Gambar</th>
            <!-- <th>isbn</th> -->
            <th class=" align-middle text-center">Id User</th>
            
            <!-- <th>tgl input</th> -->
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $i = 1; ?>
          <?php  foreach( $showberita as $row) : ?>
            <tr>
              <td><?php echo $i; ?></td>
              <td><?php echo $row['id_berita']; ?></td>
              <td><?php echo $row['tanggal']; ?></td>
              <td><?php echo $row['judul']; ?></td>
              <td><?php echo $row['isi']; ?></td>
              <td  class=" align-middle text-center"><?php echo $row['gambar']; ?></td>
              <td><?php echo $row['id_user']; ?></td>
            

              <td>

                <a href="index.php?halaman=updateberita&id_berita=<?= $row["id_berita"] ?>"><i class="fa fa-pencil"></i></a> | 
                
                <a href="index.php?halaman=deleteberita&id_berita=<?= $row["id_berita"]; ?>" onclick="return confirm('Anda yakin ingin menghapus data ini ???');"><i class="fa fa-trash-o"></i></a>

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