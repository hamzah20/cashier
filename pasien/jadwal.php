<?php include('include/header.php'); ?>
<body>

  <!-- ======= Header ======= -->
  <?php include('include/header_top.php'); ?>
  <!-- End Header -->

  <main id="main">

    <!-- ======= Blog Header ======= -->
    <div class="header-bg page-area">
      <div class="container position-relative">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="slider-content text-center">
              <div class="header-bottom">
                <div class="layer2">
                  <h1 class="title2">EPosyandu</h1>
                </div>
                <div class="layer3">
                  <h2 class="title3">Jadwal Posyandu</h2>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div><!-- End Blog Header -->

    <!-- ======= Blog Page ======= -->
    <div class="blog-page area-padding">
      <div class="container">
        <div class="row">
          <!-- ======= Header ======= -->
          <?php include('include/sidebar.php'); ?>
          <!-- End Header -->
          <!-- End left sidebar -->
          <!-- Start single blog -->
          <div class="col-md-8 col-sm-8 col-xs-12">
            <div class="row">  
             <?php  
              $today = date('Y-m-d');
              $sql  = "SELECT * FROM jadwal WHERE tanggal_jadwal <= ".$today." ";
              $r    = mysqli_query($conn,$sql);
              while($rs = mysqli_fetch_array($r)){
             ?>
             <div class="card" style="width: 15rem; margin-left: 10px; margin-bottom: 10px;">
              <img src="../boostrap/assets/img/background/card-schedule.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">JADWAL</h5>
                <p class="card-text">
                  <?php echo $rs['tanggal_jadwal']; ?> <br>
                  <?php echo $rs['waktu_jadwal']; ?> <br>
                  <?php echo $rs['tempat_jadwal']; ?>
                </p> 
              </div>
            </div>
            <?php 
              }
            ?>
            </div>
          </div>
        </div>
      </div>
    </div><!-- End Blog Page -->

  </main><!-- End #main -->

  <?php include('include/footer.php'); ?>

  

</body>

</html>