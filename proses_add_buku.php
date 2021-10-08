<?php 	

include 'koneksi.php';

$nama_buku = $_POST['nama_buku'];
$kd_buku =$_POST['kd_buku'];
$tahun_terbit =$_POST['tahun_terbit'];


if (isset($_POST['add'])) {
	extract($_POST);
	$nama_file = $_FILES['foto']['name'];
	if(!empty($nama_file)){
		
		$lokasi_file = $_FILES['foto']['tmp_name'];
		$tipe_file = pathinfo($nama_file,PATHINFO_EXTENSION);
		$file_foto = $kd_buku.".".$tipe_file;

		//tempat upload
		$folder = "buku/$file_foto";

		//suksess
		move_uploaded_file($lokasi_file,"$folder");
	}else
		$file_foto = "-";

		$sql = "INSERT INTO `tbbuku` (`id_buku`, `kd_buku`, `nama_buku`, `tahun_terbit`, `gambar`) VALUES (NULL, '$kd_buku', '$nama_buku', '$tahun_terbit', '$file_foto');";
		$hasil = mysqli_query($koneksi,$sql);

		//header("location:../data_anggota.php?p=anggota");

		if($hasil){
          		echo '<script>alert("Berhasil menambahkan data."); document.location="data_buku.php";</script>';
       		}else{
          	 echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";
        


	}

}



 ?>