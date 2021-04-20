<?php
  include('koneksi.php'); //agar index terhubung dengan database, maka koneksi sebagai penghubung harus di include
  include ('header.php');
  $i=1;
?>



    <center><h2>Data SPP</h2><center>
    <center><a href="tambah_spp.php">+ &nbsp; Tambah SPP</a><center>
    <br/>
    <table>
      <thead>
        <tr>
          <th>No</th>
          <th>Tahun</th>
          <th>Nominal</th>
          
          <th>Action</th>
        </tr>
    </thead>
    <tbody>
      <?php
      // jalankan query untuk menampilkan semua data diurutkan berdasarkan id
      
      $query = "SELECT * FROM spp ORDER BY id_spp ASC";
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
          <td><?php echo $row['tahun']; ?></td>
          <td><?php echo substr($row['nominal'], 0, 20); ?></td>
          <td>
              <a href="edit_spp.php?id=<?php echo $row['id_spp']; ?>">Edit</a> |
              <a href="hapusspp.php?id=<?php echo $row['id_spp']; ?>" onClick="return confirm('Anda yakin akan menghapus data ini?')">Hapus</a>
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