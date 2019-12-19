<?php 

include '../konek.php';
if (isset($_GET)) {

   $id_tanaman = $_GET['id_tanaman'];

   $query = "DELETE FROM tanaman WHERE id_tanaman = '$id_tanaman'";
   mysqli_query($dbkonek, $query);

   if (mysqli_affected_rows($dbkonek) > 0){
      echo "<script>
          alert('Data berhasil di hapus');
          window.location.assign('tanaman.php');
      </script>";
  };
}
?>