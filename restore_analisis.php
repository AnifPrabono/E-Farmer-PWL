<?php
session_start();
error_reporting(0); 
  include_once 'konek.php';
//include_once 'analis.php';


//   $analisis = analisis($_POST);

//     foreach ($analisis as $key) {
//           $var[] = $key;
//     }

    $id_his=$_GET['req'];
    

        $get_his=$dbkonek->query("select * from history where id_history='$id_his'");

            $res=mysqli_fetch_array($get_his); 

            $lat11 =  $res['lat'];
            $long11 =  $res['lng'];
            $suhu =  $res['suhu'];
            $hujan =  $res['hujan'];
            $tanah =  $res['tanah'];
            $tinggi =  $res['tinggi'];
        
    ?>


<!DOCTYPE html>
<html>
<head>
	<title>hasil Analisi</title>
	<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="vendor/fontawesome-free/css/regular.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

    <!-- Plugin CSS -->
    <link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/creative.min.css" rel="stylesheet">


    <!-- Plugin CSS -->
    <link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/creative.min.css" rel="stylesheet">
            <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
                <meta charset="utf-8">
                    <style>
                        /* Always set the map height explicitly to define the size of the div
                         * element that contains the map. */
                        #map {
                            height: 100%;
                      }
                      /* Optional: Makes the sample page fill the window. */
      html, body {
                            height: 100%;
                        margin: 0;
                        padding: 0;
                      }
    </style>
</head>
<body>
    <body id="page-top">
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="index.php">E-Farmer</a>
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
    
    <!--   goolemap -->
    <body>
               <div id="map"></div>
               <?php
            //  echo $id_his;
           ?>
          
    <script>

      
      var marker;

        var lat= document.getElementById('lat');
        var long= document.getElementById('long');
      function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 13,
          center: {lat:<?php echo $lat11 ?>, lng: <?php echo $long11 ?>}
        });

        marker = new google.maps.Marker({
          map: map,
          draggable: true,
          animation: google.maps.Animation.DROP,
          animation: google.maps.Animation.BOUNCE,
          position: {lat:<?php echo $lat11 ?>, lng: <?php echo $long11 ?>}
        });
        marker.addListener('click', toggleBounce);
      }

      function toggleBounce() {
        if (marker.getAnimation() !== null) {
          marker.setAnimation(null);
        } else {
          marker.setAnimation(google.maps.Animation.BOUNCE);
        }
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh4WWa-MZawNwklwyl4qzFqrwEQjLk0sw&callback=initMap">
    </script>

    <?php

//$name = $_GET['name'];
//$address = $_GET['address'];
$lat = $lat11 ;
$lng = $long11;
            

//$type = $_GET['type'];


$curl = curl_init();
// Set some options - we are passing in a useragent too here
curl_setopt_array($curl, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => "http://api.openweathermap.org/data/2.5/weather?lat=". "$lat" . "&lon=". "$lng" ."&APPID=ef0c283df46a9766e641b18d08993c21",
    CURLOPT_USERAGENT => 'Codular Sample cURL Request'
));
// Send the request & save response to $resp
$resp = curl_exec($curl);
// Close request to clear up some resources
curl_close($curl);

$resultJson = json_decode($resp, true);
// print_r($resultJson);

$curl2 = curl_init();
// Set some options - we are passing in a useragent too here
curl_setopt_array($curl2, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => 'https://maps.googleapis.com/maps/api/elevation/json?locations=39.7391536,-104.9847034&key=AIzaSyDSZ_O-KuVF-HeqVTMMQ32cbon_yxRc4Xk',
    CURLOPT_USERAGENT => 'Codular Sample cURL Request'
));
// Send the request & save response to $resp
$resp2 = curl_exec($curl2);
// Close request to clear up some resources
curl_close($curl2);

$resultJson2 = json_decode($resp2, true);
echo "<br><br>";
// print_r($resultJson2);

echo "<br><br>";
// echo "hasil evaluasi google =" .$resultJson2["results"][0]["elevation"];
$suhu=round( $resultJson["main"]["temp"]-273.15,2) ;
$ketinggian=round( $resultJson2["results"][0]["elevation"]/10,2) ;
 // satuan suhu kelvin
if (!$suhu==-273.15) {
    header("location:input.php");
}
    $hujan=$dbkonek->query("select * from curah_hujan where id_hujan='$hujan' ");
    $tanah=$dbkonek->query("select * from tanah where id_tanah='$tanah'");
?>
               
              <?php
             

                 
                
                // // print_r($var);
                // // echo $var[0];
                // var_dump($_SESSION["id_user"]);
                // var_dump($_SESSION["user"]);
            
              ?>
               <section id="services" style="padding-top: 0px;">
                      <div class="container">
                        <div class="row">
                          <div class="col-lg-12 text-center">
                            <h2 class="section-heading">Hasil Analisis Kami Pada Lokasi Anda </h2>
                            <hr class="my-4">
                          </div>
                        </div>
                      </div>
                      <div class="container">
                        <div class="row">
                          <div class="col-lg-3 col-md-6 text-center">
                            <div class="service-box mt-5 mx-auto">
                              <i class="fas fa-4x fa-thermometer-three-quarters text-primary mb-3 sr-icon-1"></i>
                              <h3 class="mb-3">Suhu Lokasi Anda</h3>
                                      <h2 class="text-muted mb-0">
                                      <?php echo $suhu?>&deg;C
                                     </h2>
                            </div>
                          </div>

                          <div class="col-lg-3 col-md-6 text-center">
                            <div class="service-box mt-5 mx-auto">
                              <i class="fas fa-4x fa-map-marked-alt text-primary mb-3  sr-icon-2"></i>
                              <h3 class="mb-3">Ketinggian Anda</h3>
                                <h2  class="text-muted mb-0"><?php echo $ketinggian ."Mdpl"?></h2>
                            </div>
                          </div>
                          <div class="col-lg-3 col-md-6 text-center">
                            <div class="service-box mt-5 mx-auto">
                              <i class="fas fa-4x fa-cloud-showers-heavy text-primary mb-3 sr-icon-3"></i>
                              <h3 class="mb-3">Curah Hujan</h3>
                              <p class="text-muted mb-0">
                                                                  
                                    <?php while ($data=mysqli_fetch_array($hujan)) {
                                   ?>
                                    <h2  class="text-muted mb-0"><?php echo$data['kategori'] ?></h2>
                                    <?php
                                    } 
                                    ?>
                              </p>
                            </div>
                          </div>
                          <div class="col-lg-3 col-md-6 text-center">
                            <div class="service-box mt-5 mx-auto">
                              <i class="fas fa-4x fa-microscope text-primary mb-3 sr-icon-4"></i>
                              <h3 class="mb-3">Ph tanah</h3>
                              <p class="text-muted mb-0">
                                  
                                    <?php
                                    while ($data_h=mysqli_fetch_array($tanah)) {
                                        ?>
                                         <h2  class="text-muted mb-0"><?php echo $data_h['kategori']; ?></h2>
                                    <?php
                                    }
                                    ?>
                                      
                                  
                              </p>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="container">
                        <div class="row">
                            <div class="col-lg-2 col-md-6" >
                            
                            </div>
                            
                            <div class="col-lg-3 col-md-6 text-center">
                              <div class="service-box mt-5 mx-auto">
                              <img src="img/latitude.png" alt="nama" >
                                <h3 class="mb-3 text-center">Latitude (Lintang)</h3>
                                <h2 class="text-muted mb-0 text-center"> <?php echo $lat?> </h2>
                              </div>
                            </div>
                            <div class="col-lg-2 col-md-6" >
                            
                            </div>
                            <div class="col-lg-3 col-md-6 text-center">
                              <div class="service-box mt-5 mx-auto">
                              <img src="img/longitude.png" alt="nama" >
                                <h3 class="mb-3 text-center">Longitude (Bujur)</h3>
                                  <h2 class="text-muted mb-0 text-center"><?php echo $lng?></h2>
                              </div>
                            </div>

                            <div class="col-lg-2 col-md-6" >
                            
                            </div>
                        </div>
                      </div>
                    </section>

      <section id="services" style="padding-top: 0px;">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading">Tanaman Yang Potensial di Daerah ini !</h2>
            <hr class="my-4">
          </div>
        </div>
      </div>



      <div class="container">
        <div class="row">


<!-- hasil analisi farward chaining  -->
 <?php 
 
                  $tanaman=$dbkonek->query("select * from tanaman WHERE  ketinggian = '$res[5]' AND jenis_tanah = '$res[4]' AND suhu = '$res[3]' OR curah_hujan = '$res[2]'");
                  $d_row=mysqli_num_rows($tanaman);  
                                              
                  if ($d_row != 0) {
                        while ($data=mysqli_fetch_array($tanaman)){       
                          ?>

                            <div class="col-lg-3 col-md-6 text-center">
                              <div class="service-box mt-5 mx-auto">
                              <img  width="240" height="240" class="fas fa-4x text-primary mb-3 sr-icon-3" src="tanaman/<?php echo $data['gambar']; ?>"></img>
                                <h3 class="mb-3 font-weight-bold"><?php echo $data['nama']; ?></h3>
                                <p class="text-muted mb-0"><h5>Lama Panen <?php echo $data['waktu_panen']; ?> hari</h5></p>
                              </div>
                            </div>
                          <?php
                          }

                      }else{

                        ?>
                              <div class="col-lg-12 text-center">
                                  <h2 class="section-heading">Maaf Sistem Kami tidak menemukan kecocokan pada lokasi anda</h2>
                                  
                              </div>
                        
                     <?php
                     }
                    
                      ?>

                     
          </div>
                </div>
              </section>
      
      
<?php
include_once 'footer.php';
?>

</body>
</html>