<?php
require 'function.php';
// ambil data url id anggota 
$id = $_GET["id_dosen"];
// query data suswa berdsarkan id anggota
$idberita = query( "SELECT * FROM dosen WHERE id_dosen = $id")[0];

if(isset($_POST["submit"]) ){

	if( updateberita($_POST) > 0 ){
		echo "
				<script>
				alert('data berhasil diubah');
				document.location.href = 'index.php?halaman=showberita';
				</script>
		";
	} else {
		echo "
				<script>
				alert('data gagal diubah');
				document.location.href = 'index.php?halaman=showberita';
				</script>

		";
	}

}

?>


<form action="" method="post" enctype="multipart/form-data">

  <input type="hidden" name="gambarLama" value="<?= $idberita["gambar"]; ?>">

  <div class="form-group">
    <label for="id_dosen">Id Berita</label>
    <input type="text" class="form-control" name="id_dosen" id="id_dosen" value="<?= $idberita["id_dosen"];?>" readonly>  
  </div>

  <div class="form-group">
    <label for="tanggal">Tanggal</label>
    <input type="date" class="form-control" name="tanggal" id="tanggal" value="<?= $idberita["tanggal"];?>" >
  </div>

<div class="form-group">
    <label for="judul">Judul Berita</label>
    <input type="text" class="form-control" name="judul" id="judul" autocomplete="off" maxlength="100" value="<?= $idberita["judul"];?>">
</div>

  

  <div class="form-group">
    <label for="isi">Isi Berita</label>
    <textarea class="form-control" id="isi" name="isi" rows="10"> <?= $idberita["isi"];?></textarea>
  </div>


  <div class="form-group">
    <label for="gambar">Gambar Berita</label> <br>
    <input type="file" name="gambar" id="gambar"> <br>
    <img src="../imgberita/<?=$idberita['gambar']; ?>" width="100"> <br>
  </div>


  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>