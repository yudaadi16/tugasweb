<?php


	require 'function.php';

	$iduser = $_GET["id_user"];
	
	
$conn = mysqli_connect("localhost", "root", "", "fakultashukumuniat");
	
	
	// Delete user row from table based on given id
    $result = mysqli_query($conn, "DELETE FROM user WHERE id_user=$iduser");

	echo "

 			<script>
 				alert('data berhasil dihapus');
 				document.location.href = 'index.php?halaman=showuser';
 			</script>

 		";
	


?>