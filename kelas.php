<?php
  include('koneksi.php'); //agar index terhubung dengan database, maka koneksi sebagai penghubung harus di include
  include ('header.php');
?>


    <center><h2>Data Kelas</h2><center>
    <center><a href="tambah_kelas.php">+ &nbsp; Tambah Kelas</a><center>
    <br/>
    <table>
      <thead>
        <tr>
          <th>No</th>
          <th>ID Kelas</th>
          <th>Nama kelas</th>
          <th>Kompetensi keahlian</th>
          
          <th>Action</th>
        </tr>
    </thead>
    <tbody>
      <?php
      // jalankan query untuk menampilkan semua data diurutkan berdasarkan id
      $query = "SELECT * FROM kelas ORDER BY id_kelas ASC";
      $result = mysqli_query($koneksi, $query);
      //mengecek apakah ada error ketika menjalankan query
      if(!$result){
        die ("Query Error: ".mysqli_errno($koneksi).
           " - ".mysqli_error($koneksi));
      }

      //buat perulangan untuk element tabel dari data mahasiswa
      $no = 1; //variabel untuk membuat nomor urut
      // hasil query akan disimpan dalam variabel $data dalam bentuk array
      // kemudian dicetak dengan perulangan while
      while($row = mysqli_fetch_assoc($result))
      {
      ?>
       <tr>
          <td><?php echo $no; ?></td>
          <td><?php echo $no;['id_kelas'] ?></td>
          <td><?php echo $row['nama_kelas']; ?></td>
          <td><?php echo substr($row['kompetensi_keahlian'], 0, 20); ?></td>
          <td>
              <a href="edit_kelas.php?id=<?php echo $row['id_kelas']; ?>">Edit</a> |
              <a href="proses_hapuskelas.php?id=<?php echo $row['id_kelas']; ?>" onClick="return confirm('Anda yakin akan menghapus data ini?')">Hapus</a>
          </td>
      </tr>
         
      <?php
        $no++; //untuk nomor urut terus bertambah 1
      }
      ?>
    </tbody>
    </table>
</body>
</html>