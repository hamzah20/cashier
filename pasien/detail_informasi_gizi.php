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
                  <h1 class="title2">Artikel</h1>
                </div>
                <div class="layer3">
                  <h2 class="title3">Informasi Gizi</h2>
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
	              $sql_ig   = "SELECT * FROM informasi_gizi WHERE kode_informasi = '.$_GET['id'].'";
	              $r_ig    	= mysqli_query($conn,$sql_ig);
	              while($rs_ig = mysqli_fetch_array($r_ig)){
	          ?>
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="single-blog">
                  <div class="single-blog-img">
                    <a href="detail_informasi_gizi.php?id=<?php echo $rs_ig['kode_informasi']; ?>">
                      <img src="../<?php echo $rs_ig['gambar_infomasi']; ?>" alt="">
                    </a>
                  </div>
                  <div class="blog-meta"> 
                    <span class="date-type">
                      <i class="bi bi-calendar"></i><?php echo $rs_ig['tanggal_informasi']; ?>
                    </span>
                  </div>
                  <div class="blog-text">
                    <h4>
                      <a href="detail_informasi_gizi.php?id=<?php echo $rs_ig['kode_informasi']; ?>"><?php echo $rs_ig['judul_informasi']; ?></a>
                    </h4> 
                    <p style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                    	<?php echo $rs_ig['deskripsi_informasi']; ?>
                    </p>
                  </div>
                  <span>
                    <a href="detail_informasi_gizi.php?id=<?php echo $rs_ig['kode_informasi']; ?>" class="ready-btn">Read more</a>
                  </span>
                </div>
              </div>
              <?php 
              	}
              ?>
              <!-- End single blog -->   
            </div>
          </div>
        </div>
      </div>
    </div><!-- End Blog Page -->

  </main><!-- End #main -->

  <?php include('include/footer.php'); ?>

  

</body>

</html>