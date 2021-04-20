<?php 
/*Jangan lupa username, password dan nama database bisa disesuaikan dengan yang dibuat, 
saya menggunakan file database db_sppku */

$koneksi = mysqli_connect("localhost","root","","db_sppku");
 
// Pengecekan Koneksi ke MySQL
if (mysqli_connect_errno()) {
	echo "Koneksi ke database gagal : " . mysqli_connect_error(); }
 ?>