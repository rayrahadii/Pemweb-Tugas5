<?php 
  //memanggil file conn.php yang berisi koneski ke database
  //dengan include, semua kode dalam file conn.php dapat digunakan pada file index.php
  include ('conn.php'); 

  $status = '';
  $result = '';
  $isi_id = "";
  $isi_profile = "";
  $hobby = "";
  $sertifikat = "";
  $sd = "";
  $smp = "";
  $sma = "";
  $universitas = "";
  //melakukan pengecekan apakah ada variable GET yang dikirim
  if ($_SERVER['REQUEST_METHOD'] === 'GET') {
      if (isset($_GET['isi_id'])) {
          //query SQL
          $isi_id_upd = $_GET['isi_id'];
          $query = "SELECT * FROM isi_biodata WHERE isi_id = '$isi_id_upd'"; 

          //eksekusi query
          $result = mysqli_query(connection(),$query);
          $data = mysqli_fetch_array($result);
          $isi_id = $data['isi_id'];
          $isi_profile = $data['isi_profile'];
          $hobby = $data['hobby'];
          $sertifikat = $data['sertifikat'];
          $sd = $data['sd'];
          $smp = $data['smp'];
          $sma = $data['sma'];
          $universitas = $data['universitas'];
          }  
  }

  //melakukan pengecekan apakah ada form yang dipost
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $isi_id = $_POST['isi_id'];
      $isi_profile = $_POST['isi_profile'];
      $hobby = $_POST['hobby'];
      $sertifikat = $_POST['sertifikat'];
      $sd = $_POST['sd'];
      $smp = $_POST['smp'];
      $sma = $_POST['sma'];
      $universitas = $_POST['universitas'];
      //query SQL
      $sql = "UPDATE isi_biodata SET isi_profile='$isi_profile' WHERE isi_id='$isi_id'";

      //eksekusi query
      $result = mysqli_query(connection(),$sql);
      if ($result) {
        $status = 'ok';
      }
      else{
        $status = 'err';
      }

      //redirect ke halaman lain
      header('Location: index.php?status='.$status);
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
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Pemrograman Web</a>
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
          

          <h2 style="margin: 30px 0 30px 0;">Update Data Mahasiswa</h2>
          <form action="update.php" method="POST">
            <div class="form-group">
              <label>Isi Profile</label>
              <input type="text" class="form-control" name="isi_profile" value="<?php echo $isi_profile;  ?>" required="required">
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </form>
        </main>
      </div>
    </div>

    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.js"></script>
  </body>
</html>