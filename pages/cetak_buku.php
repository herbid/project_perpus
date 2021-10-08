
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Laporan Anggota</title>
  <link rel="stylesheet" href="">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <style>
    table {
      padding-right: 45px; 
			border-collapse:collapse;
			/* table-layout:fixed;width: 630px; */
      box-align:center;
      font-family: "Times New Roman", Times, serif;
      font-size: 13px;
      page-break-inside: avoid;
      page-break-after: auto;
		}
		table td {
      padding: 1px;

		}joko{
      box-align:center;
      
    } body{
        font-size:11px;   
    }
    .tandatangan{
        text-align:center; width:325px;float:left;
    }
    .tandatangan2{
        text-align:center; width:125px; margin-left:545px;
    } joko1{
      color: red;
    }p{
      font-family: "Times New Roman", Times, serif;
      font-size: 14px;
      letter-spacing: -0.2px;
      word-spacing: 2px;
      color: #000000;
      font-weight: 400;
      text-decoration: none solid rgb(68, 68, 68);
      font-style: normal;
      font-variant: normal;
      text-transform: capitalize;
    }h2{
      font-family: "Times New Roman", Times, serif;
      font-size: 26px;
      letter-spacing: -0.6px;
      word-spacing: 2px;
      color: #000000;
      font-weight: 700;
      text-decoration: none solid rgb(68, 68, 68);
      font-style: normal;
      font-variant: normal;
      text-transform: capitalize;
    }hr{
      
                margin-top: 5px;
                margin-bottom:10px;
                padding-bottom: 5px;
                border-bottom: 4px solid;
            
    }
  </style>
</head>
<?php 
  session_start();
  include '../koneksi.php';



$query = "SELECT * FROM tbbuku";
  $data = mysqli_query($koneksi, $query);


  while($i=mysqli_fetch_array($data)){
    $id_buku = $i['id_buku'];
    $kd_buku = $i['kd_buku'];
    $nama_buku = $i['nama_buku'];
    $tahun_terbit = $i['tahun_terbit'];

    if (empty($i['gambar']) OR ($i['gambar']=='-')) {
        $foto = "img/avatar.png";
    }else{
        $foto = $i['gambar'];

              }
     }

 ?>
<body>
  <p align="right" style="color: black; font-size: 11px;">*Laporan Data Buku Perpustakan pada tanggal ( <?php echo (new \DateTime())->format('d-F-Y');?> )</Laporan></p><br><br>
  <h2 align="center" style="color: black;"><b>DIGITALENT</b></h2>
			<h3 align="center" style="color: black; font-size: 17px;">Daftar Data Buku Perpustakaan DIGITAL TALENT 2021</h3>
		
  <hr>
    <p>Daftar Buku Perpustakaan </p>
   
  <div class="joko">
            <table border="1"width="100%" align="center" >
                 
                      
                      <tr>
                          <th style="text-align:center; width:25px;">No</th>
                          <th style="text-align:center; width:190px;">Kode Buku</th>
                          <th style="text-align:center; width:200px;">Nama Buku </th>
                          <th style="text-align:center; width:200px;">Tahun Terbit </th>

                          <th style="text-align:center; width:200px;">foto </th>
                      </tr>
                            
                  <tbody>
              
                    
                        <tr>
    			<?php 
     			 	$no = 1;
      				$data=mysqli_query($koneksi,"SELECT * FROM tbbuku ORDER BY id_buku ASC");
      			   		while($i=mysqli_fetch_array($data)){?>

                        <td style="text-align:center; width:10px;"><?=$no++?></td>
                        <td style="text-align:center; width:190px;"><?=$i['kd_buku']?></td>
                        <td style="text-align:center; width:200px;"><?=$i['nama_buku']?></td>
                        <td style="text-align:center; width:200px;"><?=$i['tahun_terbit']?></td>
                        
                        <td style="text-align:center; width:200px;"><img src="../buku/<?=$i['gambar']?>"width="70px" hight="70px"></td>
                      </tr>

                      <?php
 						
                       }?>
                    
                 
                 <tr>
                   
                 
                  </tr>
                  </tbody>
                  
              </table>

              
        </div>
        <script type="text/javascript">
        	
        	window.print();
        </script>
</body>
</html>


