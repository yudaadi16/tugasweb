<?php


	require 'function.php';

	$iddosen = $_GET["id_dosen"];
	
	
$conn = mysqli_connect("localhost", "root", "", "fakultashukumuniat");
	
	
	// Delete user row from table based on given id
    $result = mysqli_query($conn, "DELETE FROM dosen WHERE id_dosen=$iddosen");

	echo "

 			<script>
 				alert('data berhasil dihapus');
 				document.location.href = 'index.php?halaman=showdosen';
 			</script>

 		";
	


?>