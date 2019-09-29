<?php 

  include ('conn.php'); 

  $status = '';
  $result = '';
  //melakukan pengecekan apakah ada form yang dipost
  if ($_SERVER['REQUEST_METHOD'] === 'GET') {
      if (isset($_GET['id_identitas'])) {
          //query SQL
          $id_identitas_upd = $_GET['id_identitas'];
          $query = "DELETE FROM identitas WHERE id_identitas = '$id_identitas_upd'"; 

          //eksekusi query
          $result = mysqli_query(connection(),$query);

          if ($result) {
            $status = 'ok';
          }
          else{
            $status = 'err';
          }

          //redirect ke halaman lain
          header('Location: databdt.php?status='.$status);
      }  
  }