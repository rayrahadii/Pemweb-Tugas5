<?php 
  //memanggil file conn.php yang berisi koneski ke database
  //dengan include, semua kode dalam file conn.php dapat digunakan pada file index.php
  include ('conn.php'); 

  $status = '';
  $result = '';
  //melakukan pengecekan apakah ada variable GET yang dikirim
  if ($_SERVER['REQUEST_METHOD'] === 'GET') {
      if (isset($_GET['id_identitas'])) {
          //query SQL
          $id_identitas_upd = $_GET['id_identitas'];
          $query = "SELECT * FROM identitas WHERE id_identitas = '$id_identitas_upd'"; 

          //eksekusi query
          $result = mysqli_query(connection(),$query);
      }  
  }

  //melakukan pengecekan apakah ada form yang dipost
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_identitas = $_POST['id_identitas'];
    $nama = $_POST['nama'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $berat = $_POST['berat'];
    $tinggi = $_POST['tinggi'];
    $alamat = $_POST['alamat'];
      //query SQL
      $sql = "UPDATE identitas SET nama='$nama', tanggal_lahir='$tanggal_lahir', berat='$berat', tinggi='$tinggi', alamat='$alamat' WHERE id_identitas='$id_identitas'";

      //eksekusi query
      $result = mysqli_query(connection(),$sql);
      if ($result) {
        $status = 'ok';
      }
      else{
        $status = 'err';
      }

      //redirect ke halaman lain
      header('Location: databdt.php?status='.$status);
  }
  

?>


<!DOCTYPE html>
<html>
  <head>
    <title>Example</title>
    <!-- load css boostrap -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/dashboard.css" rel="stylesheet">
  </head>

  <body>
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Data Biodata</a>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column" style="margin-top:100px;">
            <li class="nav-item">
                <a class="nav-link" href="<?php echo "index.php"; ?>">Data</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="<?php echo "databdt.php"; ?>">Data Biodata</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo "form.php"; ?>">Tambah Data</a>
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
          

          <h2 style="margin: 30px 0 30px 0;">Update Data Biodata</h2>
          <form action="updatebdt.php" method="POST">
            <?php while($data = mysqli_fetch_array($result)): ?>
            <div class="form-group">
              <label>Nama</label>
              <input type="text" class="form-control" name="nama" value="<?php echo $data['nama'];  ?>" required="required">
            </div>
            <div class="form-group">
              <label>Tanggal_lahir</label>
              <input type="text" class="form-control" placeholder="Masukkan Tanggal Lahir" name="tanggal_lahir" value="<?php echo $data['tanggal_lahir'];  ?>" required="required">
            </div>
            <div class="form-group">
              <label>Berat</label>
              <input type="text" class="form-control" placeholder="Masukkan Berat" name="berat" value="<?php echo $data['berat'];  ?>" required="required">
            </div>
            <div class="form-group">
              <label>Tinggi</label>
              <input type="text" class="form-control" placeholder="Masukkan Tinggi" name="tinggi" value="<?php echo $data['tinggi'];  ?>" required="required">
            </div>
            <div class="form-group">
              <label>Alamat</label>
              <input type="text" class="form-control" placeholder="Masukkan Alamat" name="alamat" value="<?php echo $data['alamat'];  ?>" required="required">
            </div>
            <?php endwhile; ?>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </form>
        </main>
      </div>
    </div>

    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.js"></script>
  </body>
</html>