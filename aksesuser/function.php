<?php 
 // error_reporting(E_ALL^(E_NOTICE | E_WARNING));
//koneksi ke database
//$conn = mysqli_connect("localhost:3306", "fhuniata_web", "fakultashukumuniat", "fhuniata_fakultashukumuniat");


function query($query) {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $my_db = "fakultashukumuniat";
    
    // koneksi cpanel :
    // $servername = "107.167.80.227";
    // $username = "fhuniata_fh";
    // $password = "fakultashukum";
    // $my_db = "fhuniata_fakultashukumuniat";
    

    $conn = mysqli_connect($servername, $username, $password, $my_db);
    /*
    * Cuma Untuk cek koneksi 
    *if($conn){ echo"yes conn"; }else{ echo"no conn"; }
    */
	$result = mysqli_query($conn, $query);
	$rows = [];
	while( $row = mysqli_fetch_assoc($result)) {
		$rows[] = $row;
	}
	return $rows;
}

// Function Tambahdosen----------------------------------------
function tambahdosen($data) {
	global $conn;

	$iddosen = htmlspecialchars($data["id_dosen"]);
	$nidn = htmlspecialchars($data["nidn"]);
	$namadosen = htmlspecialchars($data["namadosen"]);
	$gelar = htmlspecialchars($data["gelar"]);
	$jabatan = htmlspecialchars($data["jabatan"]);
	$jabatanfungsional = htmlspecialchars($data["jabatan_fungsional"]);
	
	$iduser = htmlspecialchars($data["id_user"]);
	
//ini query insert data dibuat variable biar cepat manggilnya
	$query = "INSERT INTO dosen
				VALUES
				('$iddosen', '$nidn', '$namadosen', '$gelar', '$jabatan', '$jabatanfungsional', '$iduser')";

	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);

}


// function cari anggota
function caridosen($keyword) {

	$query = "SELECT * FROM dosen
				WHERE
				id_dosen LIKE '%$keyword%' OR
				nidn LIKE '%$keyword%' OR
				nama_dosen LIKE '%$keyword%' OR

				gelar LIKE '%$keyword%' OR
				jabatan LIKE '%$keyword%' OR
				jabatan_fungsional LIKE '%$keyword%'

			";
	return query($query);
}

function ubahdosen($data) {
	global $conn;
	$iddosen = $data["id_dosen"];
	$nidn = htmlspecialchars($data["nidn"]);
	$namadosen = htmlspecialchars($data["nama_dosen"]);
	$gelar = htmlspecialchars($data["gelar"]);
	$jabatan = htmlspecialchars($data["jabatan"]);
	$jabatanfungsional = htmlspecialchars($data["jabatan_fungsional"]);
	
	$iduser = htmlspecialchars($data["id_user"]);

	$query = "UPDATE dosen SET 
				nidn = '$nidn',
				nama_dosen = '$namadosen',
				gelar = '$gelar',
				jabatan = '$jabatan',
				jabatan_fungsional = '$jabatanfungsional',
				
				id_user = '$iduser'
				WHERE id_dosen = $iddosen


			";

			mysqli_query($conn, $query);
			return mysqli_affected_rows($conn);

}

function hapusdosen($iddosen) {
	global $conn;
	mysqli_query($conn, "DELETE FROM dosen WHERE id_dosen = '$iddosen'");

	return mysqli_affected_rows($conn);
}

// Function Berita

// Function Tambahdosen----------------------------------------
function tambahberita($data) {
	global $conn;

	$idberita = htmlspecialchars($data["id_berita"]);
	$tanggal = htmlspecialchars($data["tanggal"]);
	$judul = htmlspecialchars($data["judul"]);
	$isi = htmlspecialchars($data["isi"]);
	// Upload Gambar
	 $gambar = upload();
	 if( $gambar === false ) {
	 	return false;
	 }

	// $gambar = htmlspecialchars($data["gambar"]);
	// $jabatanfungsional = $data["jabatan_fungsional"];
	
	$iduser = htmlspecialchars($data["id_user"]);
//ini query insert data dibuat variable biar cepat manggilnya
	$query = "INSERT INTO berita
				VALUES
				('$idberita', '$tanggal', '$judul', '$isi', '$gambar', '$iduser')";

	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);

}


function Upload() {

	$namafile = $_FILES['gambar']['name'];
	$ukuranfile = $_FILES['gambar']['size'];
	$error = $_FILES['gambar']['error'];
	$tmpname	= $_FILES['gambar']['tmp_name'];

	// 
	if( $error === 4 ){
		echo " <script>
		alert('pilih gambar dahulu');
		</script>
		";
		return false;
	}

	$ektensigambarvalid = ['jpg', 'jpeg','png'];
	$ektensigambar = explode('.', $namafile);
	$ektensigambar = strtolower(end($ektensigambar));
	if( !in_array($ektensigambar, $ektensigambarvalid) ) {
		echo " <script>
		alert('file yang anda upload bukan gambar');
		</script>
		";
		return false;
	}

	// jika ukuran file gambar terlalu besar
	if ($ukuranfile > 1000000) {
		echo " <script>
		alert('ukuran gambar terlalu besar');
		</script>
		";
		return false;
	}

	// lolos pengecekan dan upload gambar

	$namaFileBaru =	uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ektensigambar;



	move_uploaded_file($tmpname, '../imgberita/'. $namaFileBaru);

	return $namaFileBaru;


}

function updateberita($data) {
	global $conn;
	$idberita = $data["id_berita"];
	$tanggal = htmlspecialchars($data["tanggal"]);
	$judul = htmlspecialchars($data["judul"]);
	$isi = htmlspecialchars($data["isi"]);

	$gambarLama = htmlspecialchars($data["gambarLama"]);

	// cek pilih gambar baru apa gak
	if( $_FILES['gambar']['error'] === 4 ) {
		$gambar = $gambarLama;
	} else {
		$gambar = Upload();
	}
	
	
	$query = "UPDATE berita SET 
				tanggal = '$tanggal',
				judul = '$judul',
				isi = '$isi',
				gambar = '$gambar'
				
				WHERE id_berita = $idberita


			";

			mysqli_query($conn, $query);
			return mysqli_affected_rows($conn);

}

// Cari berita
function cariberita($keyword) {

	$query = "SELECT * FROM berita
				WHERE
				id_berita LIKE '%$keyword%' OR
				tanggal LIKE '%$keyword%' OR
				judul LIKE '%$keyword%'

				-- jabatan_fungsional LIKE '%$keyword%' 
				
				
				-- no_telpon LIKE '%$keyword%'

			";
	return query($query);
}


// Add User
function adduser($data) {
	global $conn;

	$iduser = $data["id_user"];
	$nama = htmlspecialchars($data["nama"]);
	$telpon = htmlspecialchars($data["telpon"]);
	$status = htmlspecialchars($data["status"]);
// 	$password = mysqli_real_escape_string($conn,$data["password"]);
    $password = md5($conn,$data["password"]);

	// enkripsi password
	$password = password_hash($password, PASSWORD_DEFAULT);


	// cek username sudah ada atau belum
	$result = mysqli_query($conn, "SELECT nama FROM user WHERE nama = '$nama'");

	if ( mysqli_fetch_assoc($result) ){
		echo "<script>
				alert('nama sudah terdaftar, silahkan ganti nama lain')
				</script>";
		return false;
	}

	
//ini query insert data dibuat variable biar cepat manggilnya
	$query = "INSERT INTO user
				VALUES
				('$iduser', '$nama', '$telpon', '$status','$password')";

	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);

}

//cari user
function cariuser($keyword) {

	$query = "SELECT * FROM user
				WHERE
				id_user LIKE '%$keyword%' OR
				nama LIKE '%$keyword%' OR
				telpon LIKE '%$keyword%' OR
				status LIKE '%$keyword%'

				-- jabatan_fungsional LIKE '%$keyword%' 
				
				
				-- no_telpon LIKE '%$keyword%'

			";
	return query($query);
}


// update user
function updateuser($data) {
	global $conn;
	$iduser = $data["id_user"];
	$nama = htmlspecialchars($data["nama"]);
	$telpon = htmlspecialchars($data["telpon"]);
	$status = htmlspecialchars($data["status"]);
	$password = mysqli_real_escape_string($conn,$data["password"]);

	// enkripsi password
	$password = password_hash($password, PASSWORD_DEFAULT);


	// cek username sudah ada atau belum
	

	$query = "UPDATE user SET 
				nama = '$nama',
				telpon = '$telpon',
				status = '$status',
				password = '$password'
				
				WHERE id_user = $iduser


			";

			mysqli_query($conn, $query);
			return mysqli_affected_rows($conn);

}

// delete user
function deleteuser($iduser) {
	global $conn;
	mysqli_query($conn, "DELETE FROM user WHERE id_user = '$iduser'");

	return mysqli_affected_rows($conn);
}


// registrasi

// function registrasi($data) {
// 	global $conn;

// 	$username = strtolower(stripslashes($data["username"]));
// 	$password = mysqli_real_escape_string($conn,$data["password"]);
// 	$password2 = mysqli_real_escape_string($conn,$data["password2"]);

// 	// cek konfirmasi password
// 	if ( $password !== $password2) {
// 		echo "<script>
// 				alert('konfirmasi password tidak sesuai !!!');
// 				</script>";
// 		return false;		
// 	}

// 	// enkripsi password
// 	$password = password_hash($password, PASSWORD_DEFAULT);

// 	// tambahkan user baru ke database
// 	mysqli_query($conn, "INSERT INTO user VALUES('$iduser')")

// }



?>

