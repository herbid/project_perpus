<?php
include 'koneksi.php';
// $tgl=$date('Y-m-d');
session_start();
if (isset($_SESSION['sesi'])) {
    

?>
<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Tables - SB Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="css/bootstrap.min.css"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
    </head>

    <?php 
  $id_anggota = $_GET['id_anggota'];

$query = "SELECT * FROM tbanggota WHERE id_anggota='$id_anggota'";
  $data = mysqli_query($koneksi, $query);


   while($i=mysqli_fetch_array($data)){
              $id_anggota = $i['id_anggota'];
              $kd_anggota = $i['kd_anggota'];
              $nama = $i['nama'];
              $alamat = $i['alamat'];
              $jenis_kelamin = $i['jenis_kelamin'];

              if (empty($i['gambar']) OR ($i['gambar']=='-')) {
              	$foto = "img/avatar.png";
              }else{
              	$foto = $i['gambar'];
              }
     }

 ?>
    <body class="sb-nav-fixed">
        <?php require ('navbar.php');?>
        <div id="layoutSidenav">


                <?php require ('sidebare.php');?>
                <div id="layoutSidenav_content">
                <div class="container-fluid px-4">
                        <h1 class="mt-4">Edit Anggota</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Edit Anggota</li>
                        </ol>
                     
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Edit Anggota
                                
                            </div>
                            
                            <div class="card-body">
                            <!-- index.php?p= -->
                                    <div class="alert alert-none" role="alert">
                                        <form action="proses_edit_anggota.php" method="post" enctype="multipart/form-data">
                                                <div class="form-row">
                                                <input type="hidden" class="form-control" id="foto" name="foto" value="<?=$foto?>" placeholder="Masukan Gambar Anda" >

                                                    <div class="form-group col-md-6">
                                                    <label for="id_anggota">ID Anggota </label>
                                                    <input type="hidden" name="id_anggota" id="id_anggota" value="<?=$id_anggota?>">
                                                    <input type="text" class="form-control" id="kd_anggota" value="<?=$kd_anggota?>" name="kd_anggota" placeholder="Masukan Kode Anggota " required readonly>
                                                    </div>
                                                    <div class="form-group col-md-6">   
                                                    <label for="umur">Nama</label>
                                                    <input type="text" class="form-control" id="nama"  value="<?=$nama?>" name="nama" placeholder="Masukan Nama " required readonly>
                                                    </div>
                                                </div>
                                            
                                                <div class="form-row">
                                                    
                                                    <div class="form-group col-md-6">
                                                    <label>Gender</label>
                                                        <select  name='jenis_kelamin' class="form-control select2bs4" required>
                                                            <option value="">Pilih</option>
                                                            <option value="L" <?=$jenis_kelamin == 'L'?'selected':''?>>Laki - Laki</option>
                                                            <option value="P" <?=$jenis_kelamin == 'P'?'selected':''?>>Perempuan</option>
                                                            </select>
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                    <label for="foto2">Foto</label>
                                                    <input type="file" class="form-control"  id="foto2" name="foto2" placeholder="Masukan Gambar Anda" >
                                                </div>
                                                        </div>
                                                <div class="form-row">          
                                                <div class="form-group col-md-6">
                                                    <label for="alamat">Alamat</label>
                                                <textarea class="form-control" id="alamat" name="alamat" required> <?=$alamat?></textarea>

                                                </div>
                                                <br><br>
                                                <img src="gambar/<?=$foto?>" width="190px" hight="70px" class="rounded mx-auto d-block"> 

                                                </div>
                                                <button type="submit" name="edit" value="cek" class="btn btn-success">Simpan</button>
                                                <a href="anggota.php" type="button" class="btn btn-warning">Kembali</a>
                                        </form>
                                    </div>
                            </div>
                        </div>
    </div>
                 </div>
    </div>
            </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>


<?php
}
else{
    echo "<script>
            alert('Anda Harus Login Terlebih Dahulu');
            </script>";
            header('location:login.php'); 
}
?>        
