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
        <title>Dashboard - SB Adminn</title>
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
                        <h1 class="mt-4">Data anggota</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Tables</li>
                        </ol>
                     
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Data anggota
                                <div class="float-right"> 
                  <a href="add_anggota.php" type="button" class="btn btn-primary btn-sm"><i class="fa fa-plus" aria-hidden="true"></i> Tambah Data Anggota</a>   
                  <a href="http://localhost/project_perpus/pages/cetak_anggota.php" target="_blank" class="btn btn-warning btn-sm">Print</a>   
                  <a href="export_anggota_pdf.php" target="_blank" class="btn btn-success btn-sm"><i class="fas fa-file-pdf"></i>  </i>Export PDF</a> 

                </div>
                            </div>
                            
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                        <th>NO</th>
                                        <th>Kode Anggota</th>
                                        <th>Nama</th>
                                        <th>Foto</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Status</th>
                                        <th>Alamat</th>
                                        <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                  <tr>
                    <?php 
                        $no = 1;
                        $data=mysqli_query($koneksi,"SELECT * FROM tbanggota ORDER BY id_anggota ASC");
                            while($i=mysqli_fetch_array($data)){?>

                                    <td><?=$no++?></td>
                                    <td><?=$i['kd_anggota']?></td>
                                    <td><?=ucfirst($i['nama'])?></td>
                                    <td><img src="gambar/<?=$i['gambar']?>"width="70px" hight="70px"></td>
                                    <td><?php  if($i['jenis_kelamin']=='L'){
                                                    echo "Laki-Laki";
                                            }elseif ($i['jenis_kelamin']=='P') {
                                                echo "Perempuan";
                                            }
                                                ?>
                                    </td>
                                    <td><?=$i['status']?></td>
                                    <td><?=$i['alamat']?></td>
                                    <td>
                                        
                                    <a href="print_anggota.php?id_anggota=<?= $i['id_anggota']?>" target="_blank" type="button" class="btn btn-warning btn-sm">Print</a>
                                    <a href="edit_anggota.php?id_anggota=<?= $i['id_anggota']?>" type="button" class="btn btn-success btn-sm">edit</a>
                                    <a href="hapus_anggota.php?id_anggota=<?= $i['id_anggota']?>"  onclick="return confirm('yakin Ingin Menghapus?')" type="button" class="btn btn-danger btn-sm">Hapus</a>
                                    </td>
                                </tr>
                                <?php }?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>NO</th>
                                    <th>ID Anggota</th>
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