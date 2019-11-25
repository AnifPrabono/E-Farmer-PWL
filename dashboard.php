<?php 

session_start();
include 'konek.php';
// include 'functions.php';

error_reporting(0);


if ($_SESSION["user"] == null){
    
//                             //var_dump($_GET); 
                        
                            $_SESSION["ref"] = 'dashboard.php';
                            echo "<script>
                                alert('anda belum login!');
                                window.location.href = 'signin.php';
                            </script>";
                        }else {
                        
                        

                    
//                         $lat  =    $_GET["lat"];
//                         $long =   $_GET["long"];
//                         $suhu =   $_GET["suhu"];
//                         $hujan =  $_GET["hujan"];
//                         $tanah =  $_GET["tanah"];
//                         $tinggi = $_GET["tinggi"];
                        
                    
//                         //   $lat = $_SESSION["latitude"];
//                         //   $long = $_SESSION["longtitude"];
//                         //   $suhu = $_SESSION["suhu"];
//                         //   $hujan = $_SESSION["hujan"];
//                         //   $tanah = $_SESSION["tanah"];
//                         //   $tinggi = $_SESSION["tinggi"];
//                         $id_user = $_SESSION["id_user"];

                    
//                     $time_tmp=$dbkonek->query("select now() as waktu");
                        
//                     while ($rs=mysqli_fetch_array($time_tmp)) {
//                         $time=$rs['waktu'];
//                     }

//                     //    $cek = mysqli_query($dbkonek, "SELECT right (id_history, 1) as last FROM history ORDER BY id_history DESC LIMIT 1");
//                     //    $tmp_id = 0;
//                     //    while ($id = mysqli_fetch_array($cek)) {
//                     //       $tmp_id = $id["last"];
//                     //    }

//                     $tmp_id =uniqid();
//                     $new_id = "H" . strval($tmp_id);

//                     if ($_SESSION['url']!= null ) {
//                      $query =$dbkonek->query("INSERT INTO history VALUES ('$new_id', '$id_user', '$hujan', '$suhu', '$tanah', '$tinggi', '$lat', '$long','$time')");
//                     }
                        

//                     ?>

                    <!DOCTYPE html>
                    <html>
                    <head>
                        <meta charset="utf-8" />
                        <meta http-equiv="X-UA-Compatible" content="IE=edge">
                        <title>Dashboard</title>
                        <meta name="viewport" content="width=device-width, initial-scale=1">
                    
                        <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
                        <link rel="stylesheet" type="text/css" href="css/dashboard.css">
                        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
                        
                    </head>
                    <body >
                    <!-- Navigation -->

                        <nav class="navbar navbar-expand-lg navbar-light fixed-top " id="mainNav">
                        <div class="container">
                            <a class="navbar-brand js-scroll-trigger" href="index.php">E-Farmer </a>
                            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarResponsive">
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item">
                                <a class="nav-link js-scroll-trigger" href="#about">ketentuan</a>
                                </li>
                                <li class="nav-item">
                                <a class="nav-link js-scroll-trigger" href="#services">Fitur</a>
                                </li>
                                <li class="nav-item">
                                <a class="nav-link js-scroll-trigger" href="#portfolio">Galleri</a>
                                </li>
                                <li class="nav-item">
                                <a class="nav-link js-scroll-trigger" href="#contact">Tentang</a>
                                </li>
                            </ul>
                            </div>
                        </div>
                        </nav>
                        
                    

<section style="background-image: linear-gradient(to right, #0000cc, #0000ff, #0000cc)">


                    
                    <div class="container emp-profile" style="margin-top:4rem; ">
                                <form method="post">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="profile-img">
                                                <img src="user.jpg" alt=""/>
                                                <?php
                                                $user_n=$_SESSION['user'];
                                                $get=$dbkonek->query("select * from user where username='$user_n'");
                                                    while ($data=mysqli_fetch_array($get)) {

                                                        $new_id_user=$data['id_user'];

                                                        ?>

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="profile-head">
                                                        <h1>
                                                            <?php 
                                                                echo $data['username'];
                                                            ?>
                                                        </h1>
                                                        <h6>
                                                            <?php 
                                                                echo $data['email'];
                                                    }
                                                            ?>
                                                        </h6>

                                                        <?php
                                                        

                                                        $get=$dbkonek->query("select * from history where id_user='$new_id_user'");
                                                                                                                        
                                                        $all_id=mysqli_num_rows($get);
                                                                                            
                                                            ?>
                                                            
                                                        <h3 class="proile-rating">JUMLAH RIWAYAT  ANDA : <span><?php echo $all_id ?></span></h3>
                                                            
                                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                                    <li class="nav-item">
                                                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Riwayat Hasil Analisa :</a>
                                                    </li>
                                                    
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                                    <form action=" " method="POST">
                                                        <input style="background-color:red" type="submit" class="profile-edit-btn text-white" name="keluar" value="Keluar"></input>
                                                    </form>
                                                    <?php

                                                        if(isset($_POST['keluar'])){

                                                            session_destroy();
                                                        
                                                            echo"<script>window.location.href='signin.php'</script>";
                                                            
                                                        }

                                                    ?>
                                                    
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                        
                                        </div>
                                        <div class="col-md-8">
                                            <div class="tab-content profile-tab" id="myTabContent">
                                                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                                    <div class="row">
                                                        <div class="col-md-9">
                                                                <ul class="list-group list-group-flush">
                                                                    <ul class="list-group">
                                                                        <?php
                                                                            while ($dat=mysqli_fetch_array($get)) {
                                                                        ?>
                                                                        <li class="list-group-item">
                                                                        <div class="card text-center">
                                                                                        <div class="card-header bg-dark text-white">
                                                                                        Hasil Analisa
                                                                                        </div>
                                                                                        <div class="card-body">
                                                                                            <h5 class="card-title">Lokasi Analisa :</h5>
                                                                                            <p class="card-text"><?php echo "Latitude : ".round($dat['lat'],3), " Lotitude : ".round($dat['lng'],4) ?></p>
                                                                                            <a href="restore_analisis.php?req=<?php echo $dat['id_history']?> " class="btn btn-primary ">BUKA</a>
                                                                                            <a href="hapus_history.php?@xq%=<?php echo $dat['id_history'] ?>" onclick="return confirm('History Akan di Hapus..?');" return class="btn text-white" style="background-color:red;">HAPUS</a>
                                                                                        </div>
                                                                                        <div class="card-footer text-black fab fa-twitter ">
                                                                                            <?php
                                                                                                echo "Dilakukan Pada Tanggal : ".date("d-m-Y", strtotime($dat['time']));
                                                                                            ?>
                                                                                        </div>
                                                                                </div>
                                                                            </li> 
                                                                        <?php
                                                                                }
                                                                                ?>
                                                                    </ul>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                </div>                                       
                                </form>
                                
                            </div>
                            </div>
                            </div>
                            </div>
                    
                            </section>




    <section class="bg-dark text-white">
      <div class="container text-center">
        <h2 class="mb-4">Kritik dan Saran </h2>
        <h6 class="mb-4">Saran dari anda sangat membantu kami dalam pengembangan aplikasi in juga sebagai bahan evaluasi dari kami untuk kebaikan kedepanya. Kami harap saran yang anda berikan merupakan saran yang membangun dan berkualitas </h6>
        <button class="btn btn-light btn-xl sr-button"  data-toggle="modal" data-target="#pesan" data-whatever="@getbootstrap" >Tulis Saran</button>
      </div>
        <div class="modal fade" id="pesan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel" style="color:black">Tulis pesan Anda di sini</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form>
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label" style="color:black">Recipient:</label>
                  <input type="text" class="form-control" id="recipient-name">
                </div>
                <div class="form-group">
                  <label for="message-text" class="col-form-label" style="color:black">Message:</label>
                  <textarea class="form-control" id="message-text"></textarea>
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal" style="background-color:red">Tutup</button>
              <button type="button" class="btn btn-primary">Kirim Pesan</button>
            </div>
          </div>
        </div>
      </div>

      <script>
            $('#exampleModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var recipient = button.data('whatever') // Extract info from data-* attributes
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var modal = $(this)
            modal.find('.modal-title').text('New message to ' + recipient)
            modal.find('.modal-body input').val(recipient) })
      </script>
        </section>







                    <?php
                    include_once'footer.php';
                    ?>



                        
                        
                    </body>
<?php
}
?>
                    </html>

