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
  $id_pinjam = $_GET['id_pinjam'];

  
$query = "SELECT tbpinjaman.*, tbanggota.id_anggota as id_anggota, tbanggota.kd_anggota as kd_anggota ,tbanggota.nama as nama_anggota,tbbuku.gambar as gambar_buku,
tbbuku.nama_buku as nama_buku FROM tbpinjaman INNER JOIN tbbuku ON tbpinjaman.id_buku = tbbuku.id_buku INNER JOIN tbanggota
 ON tbpinjaman.id_anggota = tbanggota.id_anggota WHERE id_pinjam='$id_pinjam'";
  $data = mysqli_query($koneksi, $query);


   while($i=mysqli_fetch_array($data)){
              $id_anggota = $i['id_anggota'];
              $kd_anggota = $i['kd_anggota'];

              $nama = $i['nama_anggota'];
              $tgl_kembalian = $i['tgl_kembalian'];
              $keterangan = $i['keterangan'];

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
                <h1 class="mt-4">Tambah Anggota</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Tambah Anggota</li>
                        </ol>
                     
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Tambah Anggota
                                
                            </div>
                            
                            <div class="card-body">
                            <!-- index.php?p= -->
                            <div class="alert alert-none" role="alert">
                            <form action="proses_edit_kembalian.php" method="post" enctype="multipart/form-data">
                            <div class="form-row">
                                
                                <div class="form-group col-md-6">
                                <label for="id_anggota">ID Anggota </label>
                                <input type="hidden" name="id_pinjam" id="id_pinjam" value="<?=$id_pinjam?>">                   

                                <input type="hidden" name="id_anggota" id="id_anggota" value="<?=$id_anggota?>">
                                 <input type="text" class="form-control" id="kd_anggota" value="<?=$kd_anggota?>" name="kd_anggota" placeholder="Masukan Kode Anggota " required readonly>
                                </div>
                                <div class="form-group col-md-6">
                                <label for="umur">Nama</label>
                                <input type="text" class="form-control" id="nama" name="nama"value="<?=$nama?>" placeholder="Masukan Nama Anda" required readonly>
                                </div>
                            </div>
                            
                            <div class="form-row">
                                
                                <div class="form-group col-md-6">
                                <label for="tgl_pinjam">Tanggal Kembalian</label>
                                 <input type="date" class="form-control" id="tgl_kembalian" name="tgl_kembalian"  >
                                 </div>

                                <div class="form-group col-md-6">
                                <label>Keterangan</label>
                                <select  name="keterangan" id="keterangan" class="form-control" required>
                                <option value="dikembalikan">Kembalikan Buku</option>
                                  
                               </select>
                                 </div>
                                    </div>
                            <div class="form-row">          
                            <div class="form-group col-md-6">
                             </div>
                            
                            </div>
                            <button type="submit" name="edit" value="cek" class="btn btn-success">Daftar</button>
                            <a href="anggota.php" type="button" class="btn btn-warning">Kembali</a>
                        </form>
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
 <!--
                    $pages_dir = 'pages';
                    if(!empty($_GET['p'])){
                        $pages = scandir($pages_dir, 0);
                        unset($pages[0], $pages[1]);

                        $p = $_GET['p'];
                        if(in_array($p.'.php', $pages)){
                        include($pages_dir.'/'.$p.'.php');
                        } else {
                        echo 'Halaman tidak ditemukan! :(';
                        }
                    } else {
                         include($pages_dir.'/home.php');
                    
                ?> -->