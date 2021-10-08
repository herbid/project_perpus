<?php 	

include 'koneksi.php';

$kd_anggota =$_POST['kd_anggota'];
$nama =$_POST['nama'];
$jenis_kelamin =$_POST['jenis_kelamin'];
$alamat =$_POST['alamat'];
$status = "Tidak Meminjam";

if (isset($_POST['add'])) {
	extract($_POST);
	$nama_file = $_FILES['foto']['name'];
	if(!empty($nama_file)){
		
		$lokasi_file = $_FILES['foto']['tmp_name'];
		$tipe_file = pathinfo($nama_file,PATHINFO_EXTENSION);
		$file_foto = $kd_anggota.".".$tipe_file;

		//tempat upload
		// $folder = "/gambar"$file_foto;

		$folder = "gambar/$file_foto";

		//suksess
		move_uploaded_file($lokasi_file,"$folder");
		}else
		$file_foto = "-";

		// $sql = "INSERT INTO tbanggota VALUES ('$id_anggota','$nama','$jenis_kelamin','$alamat','$status','$file_foto')";
		$sql = "INSERT INTO `tbanggota`(`id_anggota`,`kd_anggota`, `nama`, `jenis_kelamin`, `alamat`, `status`, `gambar`) VALUES (null,'$kd_anggota','$nama ','$jenis_kelamin','$alamat','$status','$file_foto')";
		$hasil = mysqli_query($koneksi,$sql);

		//header("location:../data_anggota.php?p=anggota");

		if($hasil){
          		echo '<script>alert("Berhasil menambahkan data."); document.location="anggota.php";</script>';
       		}else{
          	 echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";
        


	}
}


 ?>