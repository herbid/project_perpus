
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Kartu Anggota</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="css/bootstrap.min.css"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
    </head>
    <?php 
  // session_start();
  include 'koneksi.php';

  $id_anggota = $_GET['id_anggota'];

$query = "SELECT * FROM tbanggota WHERE id_anggota='$id_anggota'";
  $data = mysqli_query($koneksi, $query);


   while($i=mysqli_fetch_array($data)){
              $id_anggota = $i['id_anggota'];
              $nama = $i['nama'];
              $alamat = $i['alamat'];
              $jenis_kelamin = $i['jenis_kelamin'];

              if (empty($i['gambar']) OR ($i['gambar']=='-')) {
              	$foto = "../login/img/avatar.png";
              }else{
              	$foto = $i['gambar'];
              }
     }

 ?>
 <br><br>
    <body class="sb-nav-fixed">
                    <div class="container-fluid px-4">
                     
                     
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Kartu Anggota
                                
                            </div>
                            
                            <div class="card-body">
                            <!-- index.php?p= -->
                            <div class="alert alert-none" role="alert">
                  	<div class="form-row">
                      <div class="form-group col-md-6">
                       
                        <input type="hidden" class="form-control" id="foto" name="foto" value="<?=$foto?>" placeholder="Masukan Gambar Anda" required>
                      </div>
                    </div>
                    <div class="form-row">
                      
                      <div class="form-group col-md-12">
                        <label for="id_anggota">ID Anggota </label>
                        <input type="hidden" name="id" id="id" value="<?=$id?>">
                        <input type="text" class="form-control" id="id_anggota" name="id_anggota" value="<?=$id_anggota?>" placeholder="Masukan Id Anggota Anda" required readonly>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-12">
                        <label for="umur">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama"   value="<?=$nama?>" placeholder="Masukan Nama Anda" required readonly>
                      </div>
                      <div class="form-group col-md-12">
                         <label>Gender</label>
                         <?php 
                         if ($jenis_kelamin == "L") {
                         	echo '<input type="text" class="form-control" id="nama" name="nama"   value="Laki - Laki"readonly>';
                         }elseif ($jenis_kelamin == "P") {
                         	echo '<input type="text" class="form-control" id="nama" name="nama"   value="Perempuan"readonly>';
                         }

                         ?>
                            
                              </div>
                            </div>
                  <div class="form-row">          
                    <div class="form-group col-md-12">
                      <label for="alamat">Alamat</label>
                    <textarea class="form-control" id="alamat" name="alamat" required readonly> <?=$alamat?> </textarea>
                    </div>
                  </div>
                    </div>

                                
                            </div>
                        </div>
                    </div>
     
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
        <script type="text/javascript">
	
	window.print();
</script>
    </body>
</html>