<?php 
include 'koneksi.php';
include 'header.php';

 ?> 
                  <center>  <h1 class="h3 mb-2 text-gray-800">DATA PEMBAYARAN</h1> 
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 bg-danger">
                            <h6 class="m-0 font-weight-bold text-primary"><a href="tambah_pembayaran.php">+ &nbsp;Tambah Pembayaran </a></h6></center>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>                         
                                         <th>No</th>
                                          <th>Nama Petugas</th>
                                          <th>NISN</th>
                                          <th>Tanggal Bayar</th>
                                          <th>Bulan Dibayar</th>
                                          <th>Tahun Dibayar</th>
                                          <th>Spp Per Bulan</th>
                                          <th>Jumlah Dibayar</th>
                                          <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                          <?php
                         
                          // jalankan query untuk menampilkan semua data diurutkan berdasarkan id

                            if (isset($_POST['kata_kunci'])) {
                                $kata_kunci=trim($_POST['kata_kunci']);
                                $query="select * from pembayaran,petugas,spp where id_pembayaran like '%".$kata_kunci."%' or bulan_dibayar like '%".$kata_kunci."%' or tahun_dibayar like '%".$kata_kunci."%' order by bulan_dibayar asc";

                            }else {
                            $query="select * from pembayaran,petugas,spp where pembayaran.id_petugas=petugas.id_petugas and pembayaran.id_spp=spp.id_spp order by id_pembayaran asc";
                            }

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
                         <tr class="text-center">
                            <td><?php echo $no; ?></td>
                            <td><?php echo $row['nama_petugas']; ?></td>
                            <td><?php echo $row['nisn']; ?></td>
                            <td><?php echo $row['tgl_bayar']; ?></td>
                            <td><?php echo $row['bulan_dibayar']; ?></td>
                            <td><?php echo $row['tahun_dibayar']; ?></td>
                            <td><?php echo substr($row['nominal'], 0, 20); ?></td>
                            <td><?php echo $row['jumlah_bayar']; ?></td>
                            <td>
                                              <a href="edit_pembayaran.php?id=<?php echo $row['id_pembayaran']; ?>">Edit</a> |
                                              <a href="proses_hapuspembayaran.php?id=<?php echo $row['id_pembayaran']; ?>" onClick="return confirm('Anda yakin akan menghapus data ini?')">Hapus</a>
                                                </td>
                                            </tr>
                                               
                                            <?php
                                              $no++; //untuk nomor urut terus bertambah 1
                                            }
                                            ?>
                                    
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                      </tr>
                    </thead>
                    <tbody>
                     
                  
   