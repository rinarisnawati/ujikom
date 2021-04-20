<?php
  include('koneksi.php'); //agar index terhubung dengan database, maka koneksi sebagai penghubung harus di include
  
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
        color: salmon;
      }
	  h2 {
        text-transform: uppercase;
        color: salmon;
      }
	  h3 {
        text-transform: uppercase;
        color: salmon;
      }
	  h5 {
        text-transform: uppercase;
        color:#999999;
      }
    button {
          background-color: salmon;
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
      outline-color: salmon;
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
          background-color: salmon;
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



      <center>
        <h2>Tambah Petugas</h2>
      <center>
      <form method="POST" action="proses_tambahpetugas.php" enctype="multipart/form-data" >
      <section class="base">

        </div>
        <div>
          <label>Username</label>
         <input type="text" name="username" required=""/>
        </div>
        <div>
          <label>Password</label>
         <input type="text" name="password" required=""/>
        </div>

     <div>
         <label>Nama Petugas</label>
           <input type="text" name="nama_petugas" required=""/></div>
           </select>
      <div>
         <label>Level</label>
          <select name="level">
           <option value="not_option"> Silahkan Pilih Level</option>
            <?php
                $levelygdipilih=$data['level']; 
                $query = "SELECT * FROM petugas ORDER BY level ASC";
                $result = mysqli_query($koneksi, $query);
                if(!$result){
                  die ("Query Error: ".mysqli_errno($koneksi).
                     " - ".mysqli_error($koneksi));
                }
                $no = 1; 
                while($row = mysqli_fetch_assoc($result))
                {
                ?>
           <option value="<?php echo $row['level']; ?>" <?php if($row['level']=="$levelygdipilih"){?> selected="selected" <?php } ?>><?php echo $row['level']; ?></option>
           <?php
                  $no++; 
                }
                ?>
  
           </select>
          
      </div>
        
        <div>
         <button type="submit">Simpan Petugas</button>
        </div>
        </section>
      </form>
</body>
</html>
