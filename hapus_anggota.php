<?php 

include 'koneksi.php'; 

 $id_anggota = $_GET['id_anggota'];;


	$sql="DELETE FROM tbanggota WHERE id_anggota='$id_anggota'";
          
 	$hasil=mysqli_query($koneksi,$sql);
           if($hasil){
                echo '<script>alert("Data Berhasil Di Hapus."); document.location="anggota.php";</script>';

        	}else{
       	   		echo "<div class='alert alert-danger'> Data Gagal hapus.</div>";
        }
 ?>