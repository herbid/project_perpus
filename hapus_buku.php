<?php 
session_start();
include 'koneksi.php'; 

 	$id_buku = $_GET['id_buku'];
 	
	$pilih = "SELECT * FROM tbbuku WHERE id_buku = '$id_buku'";
	$slc = mysqli_query($koneksi,$pilih) or die(mysql_error());
	$data = mysqli_fetch_array($slc);

	$sql="DELETE FROM tbbuku WHERE id_buku='$id_buku'";
	// $slc2 = mysqli_query($koneksi,$sql) or die(mysqli_error());

	$petch = "buku/".$data['gambar'];


 	 
 	$hasil=mysqli_query($koneksi,$sql);
           if($hasil){
           		if (file_exists($petch)) {
					unlink($petch);
				}
           		echo '<script>alert("Data Berhasil Di Hapus"); document.location="data_buku.php";</script>';
        	}else{
       	   		echo '<script>alert("Data Gagal Di Hapus, Data Berelasi"); document.location="data_buku.php";</script>';
        }
 ?>