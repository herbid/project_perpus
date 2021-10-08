<?php 	

include 'koneksi.php';
$id_pinjam = $_POST['id_pinjam'];
$keterangan = $_POST['keterangan'];
$tgl_kembalian =$_POST['tgl_kembalian'];

if (isset($_POST['edit'])) {

	
		// $sql = "INSERT INTO `tb_pengembaliani` (`id_pengembalian`, `status`, `id_pinjam`) VALUES (NULL, '$status', '$id_pinjam');";

		$sql1 = "UPDATE `tbpinjaman` SET `tgl_kembalian` = '$tgl_kembalian',`keterangan` = '$keterangan' WHERE `tbpinjaman`.`id_pinjam` = $id_pinjam;";

		//$hasil = mysqli_query($koneksi,$sql);
		$hasil = mysqli_query($koneksi,$sql1);
		//header("location:../data_anggota.php?p=anggota");

		if($hasil){
          		echo '<script>alert("Berhasil Mengubah Data Buku."); document.location="data_pengembalian.php";</script>';
       		}else{
          	 echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";
        

}
	
}


 ?>