<?php 
session_start();
if(isset($_SESSION['cek_login']) ) {
	include 'koneksi.php';
	if($_GET['act']=='bayar') {
		$id_pembayaran = $_GET['id'];
		$nisn   = $_GET['nisn'];

		// bulan
		$today =date("ymd");
		$query =mysqli_query($koneksi , "SELECT max(nobayar) AS last FROM pembayaran WHERE nobayar LIKE '$today%'");
		$data = mysqli_fetch_assoc($query);
		$lastNobayar = $data['last'];
		$lastNoUrut  = substr($lastNobayar, 6 ,4);
		$nextNoUrut  = $lastNoUrut + 1;
		$nextNobayar = $today.sprintf('%04s' , $nextNoUrut);

		// tanggal bayar
		$tgl_bayar = date('Y-m-d');

		// id petugas
		$id_petugas= $_SESSION['id'];

		$byr = mysqli_query($koneksi ,"UPDATE pembayaran SET 
			nobayar = '$nextNobayar',
			tgl_bayar = '$tgl_bayar',
			ket = 'LUNAS',
			id_petugas = '$id_petugas' 
			WHERE id_pembayaran = '$id_pembayaran'");

		if ($byr) {

					header('location: transaksi.php?nisn='.$nisn);
		}else {
			echo "
			<script>
			alert('gagal')
			</script>
			";

		}
		
	}
	else if($_GET['act']=='batal'){
	    $id_pembayaran = $_GET['id_pembayaran'];
		$nisn   = $_GET['nisn'];

		$batal = mysqli_query($koneksi ,"UPDATE pembayaran SET 
			nobayar = null,
			tgl_bayar = null,
			ket = null,
			id_petugas = null 
			WHERE id_pembayaran = '$id_pembayaran'");

			if ($batal) {
				header('location: transaksi.php?nisn='.$nisn);
		}
	}
}
 ?>