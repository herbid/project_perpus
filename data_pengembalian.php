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
        <title>Dashboard - SB Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <?php require ('navbar.php');?>
        <div id="layoutSidenav">


                <?php require ('sidebare.php');?>
                <div id="layoutSidenav_content">
                <div class="container-fluid px-4">
                        <h1 class="mt-4">Data Pengembalian</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Tables</li>
                        </ol>
                     
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                 Data Pengembalian
                                <div class="float-right"> 
                  <!-- <a href="form_pinjam.php" type="button" class="btn btn-primary btn-sm"><i class="fa fa-plus" aria-hidden="true"></i> Tambah Data Peminjam</a>    -->
                   

                </div>
                            </div>
                            
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                        <th>NO</th>
                                        <th>ID Anggota</th>
                                        <th>Nama Peminjaman</th>
                                        <th>Judul Buku</th>
                                        <th>Gambar Buku</th>
                                        <th>Tgl Pengembalian</th>
                               
                                        <th>Keterangan</th>
                                        
                                        </tr>
                                    </thead>
                                    <tbody>
                  <tr>
                    <?php 
                        $no = 1;
                        $data=mysqli_query($koneksi,"SELECT tbpinjaman.*, tbanggota.id_anggota as id_anggota, tbanggota.kd_anggota as kd_anggota ,tbanggota.nama as nama_anggota,tbbuku.gambar as gambar_buku,
                        tbbuku.nama_buku as nama_buku FROM tbpinjaman INNER JOIN tbbuku ON tbpinjaman.id_buku = tbbuku.id_buku INNER JOIN tbanggota
                         ON tbpinjaman.id_anggota = tbanggota.id_anggota;
                        ");
                            while($i=mysqli_fetch_array($data)){
                    if($i['keterangan']=="dikembalikan"){?>

                                    <td><?=$no++?></td>
                                    <td><?=$i['kd_anggota']?></td>
                                    <td><?=$i['nama_anggota']?></td>
                                    <td><?=ucfirst($i['nama_buku'])?></td>
                                    <td><img src="buku/<?=$i['gambar_buku']?>"width="70px" hight="70px"></td>
                                    <td><?=$i['tgl_kembalian']?></td>
                                    <td><?=$i['keterangan']?></td>
                                  
                                </tr>
                                <?php } }?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>NO</th>
                                    <th>ID Data Buku</th>
                                    <th>Nama</th>
                                    <th>Foto</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Status</th>
                                    <th>Alamat</th>
                                    <th>Opsi</th>
                                </tr>
                            </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>

                    <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2021</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
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