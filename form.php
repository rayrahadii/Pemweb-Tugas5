<?php 
  //memanggil file conn.php yang berisi koneski ke database
  //dengan include, semua kode dalam file conn.php dapat digunakan pada file index.php
  include ('conn.php'); 

  $status = '';
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
      $query = "INSERT INTO isi_biodata (isi_id, isi_profile, hobby, sertifikat, sd, smp, sma, universitas) VALUES('$isi_id','$isi_profile','$hobby','$sertifikat','$sd','$smp','$sma','$universitas')"; 

      //eksekusi query
      $result = mysqli_query(connection(),$query);
      if ($result) {
        $status = 'ok';
      }
      else{
        $status = 'err';
      }
  }

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
    width: 100%;
    background-color: #d6d5c9;
    color: black;
    padding: 14px 20px;
    margin: 8px 0;
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
          
          <?php 
              if ($status=='ok') {
                echo '<br><br><div class="alert alert-success" role="alert">Data Mahasiswa berhasil disimpan</div>';
              }
              elseif($status=='err'){
                echo '<br><br><div class="alert alert-danger" role="alert">Data Mahasiswa gagal disimpan</div>';
              }
           ?>

          <h2 style="margin: 30px 0 30px 0;">Form Data Webiste</h2>
          <form action="form.php" method="POST">
            
            <div class="form-group">
              <input type="hidden" class="form-control" name="isi_id">
            </div>
            <div class="form-group">
              <label>Isi Profile</label>
              <textarea class="form-control" placeholder="Isi Profile" name="isi_profile" required="required"></textarea>
            </div>
            <div class="form-group">
              <label>Hobby</label>
              <textarea class="form-control" placeholder="Hobby" name="hobby" required="required"></textarea>
            </div>
            <div class="form-group">
              <label>Sertifikat</label>
              <textarea class="form-control" placeholder="sertifikat" name="sertifikat" required="required"></textarea>
            </div>
            <div class="form-group">
              <label>Riwayat SD</label>
              <input type="text" class="form-control" placeholder="Masukkan Riwayat" name="sd" required="required">
            </div>
            <div class="form-group">
              <label>Riwayat SMP</label>
              <input type="text" class="form-control" placeholder="Masukkan Riwayat" name="smp" required="required">
            </div>
            <div class="form-group">
              <label>Riwayat SMA</label>
              <input type="text" class="form-control" placeholder="Masukkan Riwayat" name="sma" required="required">
            </div>
            <div class="form-group">
              <label>Riwayat Universitas</label>
              <input type="text" class="form-control" placeholder="Masukkan Riwayat" name="universitas" required="required">
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