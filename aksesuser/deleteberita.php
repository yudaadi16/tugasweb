<?php
	require 'function.php';

	$id = $_GET["id_berita"];
	
	
$conn = mysqli_connect("localhost", "root", "", "fakultashukumuniat");
	
	
	// Delete user row from table based on given id
    $result = mysqli_query($conn, "DELETE FROM berita WHERE id_berita=$id");

	echo "

 			<script>
 				alert('data berhasil dihapus');
 				document.location.href = 'index.php?halaman=showberita';
 			</script>

 		";
	
?>