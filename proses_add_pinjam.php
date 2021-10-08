<?php 	

include 'koneksi.php';

$id_anggota =$_POST['id_anggota'];
$id_buku =$_POST['id_buku'];
$tgl_peminjaman =$_POST['tgl_peminjaman'];
$tgl_kembalian =null;
$keterangan = "meminjam";


if (isset($_POST['add'])) {

		$sql = "INSERT INTO `tbpinjaman` (`id_pinjam`, `id_anggota`, `id_buku`, `tgl_peminjaman`, `tgl_kembalian`, `keterangan`) VALUES (NULL, '$id_anggota', '$id_buku', '$tgl_peminjaman', '$tgl_kembalian', '$keterangan');";
		 
		$hasil = mysqli_query($koneksi,$sql);

		//header("location:../data_anggota.php?p=anggota");

		if($hasil){
          		echo '<script>alert("Berhasil menambahkan data."); document.location="data_pinjamn.php";</script>';
       		}else{
          	 echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";
        

}
}



 ?>