<?php

ob_start();
	$content = "
	<style>
	.tableku{
		border-collapse:collapse;
		padding-right: 45px; 
		border-collapse:collapse;
		
		box-align:center;
		font-size: 13px;
		page-break-inside: avoid;
		page-break-after: auto;
	}
	.tableku th{
		border-collapse: 70px 5px;
		background-color: #f60;
		color: #fff;
	}
	img{
		width:70px;
	}
	</style>

	";
	$content .="
	<page>
		<div style='padding 4mm;border:1px solid;'' align='center'>
			<span style='font-size:25px'>
				Laporan Data Buku Perpustakaan
				<br>
				<small>DIGITAL TALENT</small>
			</span>
		</div>
		<div style='padding:20px 0 10; font-size: 15px;'>
			 Berikut Data Buku
		</div>
		<table border='1px'width='100%' align='center' >
		<tr>
			<th style='text-align:center; width:25px;'>NO</th>
			<th style='text-align:center; width:50px;'>Kode Buku</th>
			<th style='text-align:center; width:100px;'>Nama Buku</th>
			<th style='text-align:center; width:100px;'>Foto</th>

			<th style='text-align:center; width:100px;'>Tahun Terbit</th>

		</tr>";
	$no = 1;
	include 'koneksi.php';
      $data=mysqli_query($koneksi,'SELECT * FROM tbbuku ORDER BY id_buku ASC');
         while($i=mysqli_fetch_array($data)){
         	$content.="
			<tr>
				<td style='text-align:center; width:10px;'>".$no++."</td>
				<td style='text-align:center; width:100px;'>".$i['kd_buku']."</td>
				<td style='text-align:center; width:100px;'>".$i['nama_buku']."</td>
				<td style='text-align:center; width:200px;'><img src='buku/".$i['gambar']."'></td>
				<td style='text-align:center; width:25px;'>".$i['tahun_terbit']."</td>
				
				
			</tr>

         	";
         }
	$content .="


		</table>
	</page>
	"
	;

	$html = ob_get_contents();
	ob_end_clean();
	require __DIR__.'/vendor/autoload.php';
	use Spipu\Html2Pdf\Html2Pdf;
	$html2pdf = new Html2Pdf('P','A4','fr', true, 'UTF-8', array(15, 15, 15, 15), false); 
	$html2pdf->writeHTML($content);
	$html2pdf->output();
?>
 <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
