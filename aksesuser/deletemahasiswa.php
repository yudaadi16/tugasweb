<?php
	require 'function.php';

	$id = $_GET["nim"];
	
	
$conn = mysqli_connect("localhost", "root", "", "fakultashukumuniat");
	
	
	// Delete user row from table based on given id
    $result = mysqli_query($conn, "DELETE FROM mahasiswa WHERE nim=$id");

	echo "

 			<script>
 				alert('data berhasil dihapus');
 				document.location.href = 'index.php?halaman=showmahasiswa';
 			</script>

 		";
	
?>