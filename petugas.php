
<?php
  include('koneksi.php'); //agar index terhubung dengan database, maka koneksi sebagai penghubung harus di include
  include ('header.php');
  $i=1;
?>


    <center><h2>Data Admin dan Petugas</h2><center>
    <center><a href="tambah_petugas.php">+ &nbsp; Tambah Petugas</a><center>
    <br/>
    <table>
      <thead>
        <tr>
          <th>No</th>
          <th>ID</th>
          <th>Username</th>
          <th>Password</th>
          <th>Nama Petugas</th>
          <th>Level</th>
          <th>Action</th>
        </tr>
    </thead>
    <tbody>
      <?php
      // jalankan query untuk menampilkan semua data diurutkan berdasarkan id
      $query = "SELECT * FROM petugas ORDER BY id_petugas ASC";
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
          <td><?php echo $no;['id_petugas'] ?></td>
          <td><?php echo $row['username']; ?></td>
          <td><?php echo $row['password']; ?></td>
          <td><?php echo $row['nama_petugas']; ?></td>
          <td><?php echo substr($row['level'], 0, 20); ?></td>
          <td>
              <a href="edit_petugas.php?id=<?php echo $row['id_petugas']; ?>">Edit</a> |
              <a href="proses_hapuspetugas.php?id=<?php echo $row['id_petugas']; ?>" onClick="return confirm('Anda yakin akan menghapus data ini?')">Hapus</a>
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