<?php 
include 'koneksi.php';

 ?> 
 <!DOCTYPE html>
<html>
  <head>
    <title></title>
    <style type="text/css">
      * {
        font-family: "Trebuchet MS";
      }
      h1 {
        text-transform: uppercase;
        color: black;
      }
    h2 {
        text-transform: uppercase;
        color: black;
      }
    h3 {
        text-transform: uppercase;
        color: black;
      }
    h5 {
        text-transform: uppercase;
        color:#999999;
      }
    button {
          background-color: black;
          color: #fff;
          padding: 10px;
          text-decoration: none;
          font-size: 12px;
          border: 0px;
          margin-top: 20px;
    }
    label {
      margin-top: 10px;
      float: left;
      text-align: left;
      width: 100%;
    }
    input {
      padding: 6px;
      width: 100%;
      box-sizing: border-box;
      background: #f8f8f8;
      border: 2px solid #ccc;
      outline-color: grey;
    }
    div {
      width: 100%;
      height: auto;
    }
    .base {
      width: 400px;
      height: auto;
      padding: 20px;
      margin-left: auto;
      margin-right: auto;
      background: #ededed;
    }
    a {
          background-color: grey;
          color: #fff;
          padding: 10px;
          text-decoration: none;
          font-size: 12px;
    }
    </style>
  </head>
<body>
  <?php
  include ('header.php');
?>
          <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
            <center> <h5 class="title">Tambah Pembayaran</h5> </center>
              </div>
              <div class="card-body">
                 <form method="POST" action="proses_tambahpembayaran.php" enctype="multipart/form-data" >
                  <section class="base">
                  <div class="row">
                    <div class="col-md-12">
                    <div class="form-group">           
                      <label>Nama Petugas</label>
                      <div class="input-group">
                     <div class="col-lg-12 col-md-12">
                        <select  class="form-control" name="nama_petugas">
                       <option value="not_option">Silahkan Pilih Nama Petugas</option>
                    <?php
                        // jalankan query untuk menampilkan semua data diurutkan berdasarkan id
                        $query = "SELECT * FROM petugas ORDER BY nama_petugas ASC";
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
                   <option class="bg-dark" value="<?php echo $row['id_petugas']; ?>"><?php echo $row['nama_petugas']; ?></option>
                   <?php
                          $no++; //untuk nomor urut terus bertambah 1
                        }
                        ?>  
                   </select>
                   </div>
                   </div>
              </div>
                    <div class="form-group">           
                      <label>NISN</label>
                      <div class="input-group">
                     <div class="col-lg-12 col-md-12">
                        <select  class="form-control" name="nisn">
                       <option value="not_option">Silahkan Pilih NISN</option>
                    <?php
                        // jalankan query untuk menampilkan semua data diurutkan berdasarkan id
                        $query = "SELECT * FROM siswa ORDER BY nisn ASC";
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
                   <option class="bg-dark" value="<?php echo $row['nisn']; ?>"><?php echo $row['nisn']; ?></option>
                   <?php
                          $no++; //untuk nomor urut terus bertambah 1
                        }
                        ?>  
                   </select>
                   </div>
                   </div>
              </div>
                     <div class="form-group">
                        <label>Tanggal Bayar</label>
                        <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text"><i class="tim-icons icon-calendar-60"></i></div>
                      </div>
                        <input type="date" class="form-control" name="tanggal_bayar" autofocus="" required="" />
                      </div>
                    </div>
                    <div class="form-group">
                        <label>Bulan Dibayar</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <div class="input-group-text"><i class="fas fa-calendar"></i></div>
                            </div>
                            <input type="date" class="form-control" name="bulan_dibayar" autofocus="" required="" />
                          </div>
                      </div>
                      <div class="form-group">
                        <label>Tahun Dibayar</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <div class="input-group-text"><i class="fas fa-calendar"></i></div>
                            </div>
                            <input type="date" class="form-control" name="tahun_dibayar" autofocus="" required="" />
                          </div>
                    </div>
                 <div class="form-group">           
                      <label>SPP Perbulan</label>
                      <div class="input-group">
                     <div class="col-lg-12 col-md-12">            
                <select  class="form-control" name="spp">
               <option value="not_option">Silahkan Pilih SPP Perbulan</option>
            <?php
                // jalankan query untuk menampilkan semua data diurutkan berdasarkan id
                $query = "SELECT * FROM spp ORDER BY nominal ASC";
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
           <option class="bg-dark" value="<?php echo $row['id_spp']; ?>"><?php echo $row['nominal']; ?></option>
           <?php
                  $no++; //untuk nomor urut terus bertambah 1
                }
                ?>  
           </select>
           </div>
           </div>
      </div>
          <div class="form-group">
                        <label>Jumlah Bayar</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <div class="input-group-text"><i class="tim-icons icon-coins"></i></div>
                            </div>
                            <input type="text" class="form-control" name="jumlah_bayar" autofocus="" required="" />
                          </div>
                    </div>

                  </div>
            <div>
         <button type="submit">Simpan</button>
            </div>
             </section>
                </form>  

              </div>
            </div>
          </div>
                      <br><br>
   