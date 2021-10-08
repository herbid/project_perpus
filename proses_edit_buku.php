<?php 	

include 'koneksi.php';
$id_buku = $_POST['id_buku'];
$nama_buku = $_POST['nama_buku'];
$kd_buku =$_POST['kd_buku'];
$tahun_terbit =$_POST['tahun_terbit'];

if (isset($_POST['edit'])) {

	extract($_POST);

	$nama_file = $_FILES['foto2']['name'];
	if(!empty($nama_file)){		
		
		$lokasi_file = $_FILES['foto2']['tmp_name'];
		$tipe_file = pathinfo($nama_file,PATHINFO_EXTENSION);
		$file_foto = $kd_buku.".".$tipe_file;

		//tempat upload
		$folder = "buku/$file_foto";
		@unlink("$folder");

		//suksess
		move_uploaded_file($lokasi_file,"$folder");
	}else
		$file_foto = $foto;

		 $sql="UPDATE `tbbuku` SET `kd_buku` = '$kd_buku', `nama_buku` = '$nama_buku', `tahun_terbit` = '$tahun_terbit', `gambar` = '$file_foto' WHERE `tbbuku`.`id_buku` = $id_buku;";
		
		 
		$hasil = mysqli_query($koneksi,$sql);

		//header("location:../data_anggota.php?p=anggota");

		if($hasil){
          		echo '<script>alert("Berhasil Mengubah Data Buku."); document.location="data_buku.php";</script>';
       		}else{
          	 echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";
        


	}
}


 ?>