<?php 	

include 'koneksi.php';
$id_anggota = $_POST['id_anggota'];
$kd_anggota = $_POST['kd_anggota'];
$nama =$_POST['nama'];
$jenis_kelamin =$_POST['jenis_kelamin'];
$alamat =$_POST['alamat']; 
// $foto = $_POST['foto'];


if (isset($_POST['edit'])) {

	extract($_POST);

	$nama_file = $_FILES['foto2']['name'];
	if(!empty($nama_file)){
		
		$lokasi_file = $_FILES['foto2']['tmp_name'];
		$tipe_file = pathinfo($nama_file,PATHINFO_EXTENSION);
		$file_foto = $kd_anggota.".".$tipe_file;

		//tempat upload
		$folder = "gambar/$file_foto";
		@unlink("$folder");

		//suksess
		move_uploaded_file($lokasi_file,"$folder");
	}else
		$file_foto = $foto;

		 $sql="UPDATE `tbanggota` SET `kd_anggota` = '$kd_anggota', `nama`='$nama', `jenis_kelamin` = '$jenis_kelamin', `alamat` = '$alamat', `gambar` = '$file_foto' WHERE `tbanggota`.`id_anggota` = $id_anggota;";
		//  UPDATE `` SET `id_anggota`='[value-1]',`jenis_kelamin`='[value-3]',`alamat`='[value-4]',`status`='[value-5]',`gambar`='[value-6]' WHERE 1
		$hasil = mysqli_query($koneksi,$sql);

		//header("location:../data_anggota.php?p=anggota");

		if($hasil){
          		echo '<script>alert("Berhasil Mengedit data."); document.location="anggota.php";</script>';
       		}else{
          	 echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";
        


	}
}


 ?>