
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



$query = "SELECT * FROM tbanggota";
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
<body>
  <p align="right" style="color: black; font-size: 11px;">*Laporan Anggota Perpustakan pada tanggal ( <?php echo (new \DateTime())->format('d-F-Y');?> )</Laporan></p><br><br>
  <h2 align="center" style="color: black;"><b>Junior Web Developer</b></h2>
			<h3 align="center" style="color: black; font-size: 17px;">Daftar Anggota Perpustakaan 2021</h3>
		
  <hr>
    <p>Anggota Perpustakaan  </p>
   
  <div class="joko">
            <table border="1"width="100%" align="center" >
                 
                      
                      <tr>
                          <th style="text-align:center; width:25px;">No</th>
                          <th style="text-align:center; width:190px;">ID Anggota</th>
                          <th style="text-align:center; width:200px;">Nama </th>
                          <th style="text-align:center; width:200px;">Gender </th>
                          <th style="text-align:center; width:200px;">Gambar </th>
                          <th style="text-align:center; width:90;">Alamat</th>
                      </tr>
                            
                  <tbody>
              
                    
                        <tr>
    			<?php 
     			 	$no = 1;
      				$data=mysqli_query($koneksi,"SELECT * FROM tbanggota ORDER BY id_anggota ASC");
      			   		while($i=mysqli_fetch_array($data)){?>

                        <td style="text-align:center; width:10px;"><?=$no++?></td>
                        <td style="text-align:center; width:190px;"><?=$i['id_anggota']?></td>
                        <td style="text-align:center; width:200px;"><?=$i['nama']?></td>
                        <td style="text-align:center; width:200px;">
                        	<?php  if($i['jenis_kelamin']=='L'){
                               		 echo "Laki-Laki";
                         		 }elseif ($i['jenis_kelamin']=='P') {
                           			 echo "Perempuan";
                          		} ?>
                        </td>
                        <td style="text-align:center; width:200px;"><img src="../gambar/<?=$i['gambar']?>"width="70px" hight="70px"></td>
                        <td style="text-align:center; width:200px;"> <?=$i['alamat']?></td>
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


