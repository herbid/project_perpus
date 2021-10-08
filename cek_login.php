<?php 
session_start();
$_SESSION['sesi'] = NULL;

include 'koneksi.php';
	if (isset($_POST['submit'])) {
		
		$username = isset($_POST['username']) ? $_POST['username'] : "";
		$password = isset($_POST['password']) ? $_POST['password'] : "";
		$querry   = mysqli_query($koneksi,"SELECT * FROM tbadmin WHERE username = '$username' AND password = '$password'");
		$sesi = mysqli_num_rows($querry);

		if ($sesi == 1) {
			
			$data_admin = mysqli_fetch_array($querry);
			$_SESSION['id_admin'] = $data_admin['id_admin'];
			$_SESSION['sesi'] = $data_admin['nama'];

			echo '<script>alert("Berhasil Login");</script>';
			echo "<meta http-equiv='refresh' content='0; url=index.php?username=$sesi'>";

		}else{

			echo "<meta http-equiv='refresh' content='0; url=login.php'>";
			echo '<script>alert("Gagal Login");</script>';
			
		}
	}else{
		include "../index.php";
	}

 ?>

