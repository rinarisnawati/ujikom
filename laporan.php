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
 <?php include 'header.php'; ?>
<style >
  .btn{
    margin-top: 10px;
  }
  .panel-heading{
    margin-top: 80px;
  }
</style>
    <div class="col-md-12">
            <div class="card">
              <div class="card-header">
               <center><h5 class="title">Laporan Transaksi</h5></center>
              </div>
              <div class="card-body">
                 <form method="POST" action="ekspor.php" enctype="multipart/form-data" >
                  <section class="base">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Dari Tanggal</label>
                        <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-calendar"></i></div>
                      </div>
                        <input type="date" class="form-control" name="daritanggal" autofocus=""  />
                      </div>
                    </div>
                       <div class="form-group">
                        <label>Sampai Tanggal</label>
                        <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-calendar"></i></div>
                      </div>
                        <input type="date" class="form-control" name="sampaitanggal" autofocus="" />
                      </div>
                    </div>
                  </div>
                    <div class="card-footer">
         <button type="submit">Simpan</button>
                    </div>
                  </selection>
                </form>
              </div>
            </div>
          </div>
                     
                     
