<?php 
  //memanggil file conn.php yang berisi koneski ke database
  //dengan include, semua kode dalam file conn.php dapat digunakan pada file index.php
  include ('conn.php'); 
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Example</title>
    <!-- load css boostrap -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/dashboard.css" rel="stylesheet">
    <style>     
  button[href] {
    width: 7%;
    background-color: #d6d5c9;
    color: white;
    background: green;
    padding: 7px;
    margin-bottom: 10px; 
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-family: 'Century Gothic',sans-serif;
  }
  </style>
  </head>

  <body>
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Pemrograman Web</a>
    </nav>
    <?php 
                  //proses menampilkan data dari database:
                  //siapkan query SQL
                  $query = "SELECT * FROM identitas";
                  $result = mysqli_query(connection(),$query);
                 ?>
                 <?php while($data = mysqli_fetch_array($result)): ?>
    <div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column" style="margin-top:100px;">
              <li class="nav-item">
                <a class="nav-link" href="<?php echo "index.php"; ?>">Data</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo "databdt.php"; ?>">Data Biodata</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="<?php echo "form.php"; ?>">Tambah Data</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo "formbdt.php"; ?>">Tambah Biodata</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo "home.php"; ?>">Ke Website</a>
              </li>
            </ul>
          </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4"> 
          <h2 style="margin: 30px 0 30px 0;">Detail Data Biodata</h2>
          <form action="databdt.php" method="POST">
            <div class="form-group">
              <input type="hidden" class="form-control" name="isi_id">
            </div>
            <div class="form-group">
              <label>Nama</label>
              <input type="text" class="form-control" value="<?php echo $data['nama']; ?>" readonly>
            </div>
            <div class="form-group">
              <label>Tanggal Lahir</label>
              <input type="text" class="form-control" value="<?php echo $data['tanggal_lahir']; ?>" readonly>
            </div>
            <div class="form-group">
              <label>Berat</label>
              <input type="text" class="form-control" value="<?php echo $data['berat']; ?>" readonly>
            </div>
            <div class="form-group">
              <label>Tinggi</label>
              <input type="text" class="form-control" value="<?php echo $data['tinggi']; ?>" readonly>
            </div>
            <div class="form-group">
              <label>Alamat</label>
              <input type="text" class="form-control" value="<?php echo $data['alamat']; ?>" readonly>
            </div>
            
            <button href="databdt.php">Kembali</button>
          </form>
        </main>
      </div>
    </div>
    <?php endwhile ?>
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.js"></script>
    
  </body>
</html>