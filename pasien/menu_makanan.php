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
                  <h2 class="title3">Menu Makanan</h2>
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
	              $sql_mm   = "SELECT * FROM menu_makanan ORDER BY tanggal_makanan DESC";
	              $r_mm    	= mysqli_query($conn,$sql_mm);
	              while($rs_mm = mysqli_fetch_array($r_mm)){
	          ?>
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="single-blog">
                  <div class="single-blog-img">
                    <a href="detail_menu_makanan.php?id=<?php echo $rs_mm['kode_makanan']; ?>">
                      <img src="../<?php echo $rs_mm['gambar_makanan']; ?>" alt="">
                    </a>
                  </div>
                  <div class="blog-meta"> 
                    <span class="date-type">
                      <i class="bi bi-calendar"></i><?php echo $rs_mm['tanggal_makanan']; ?>
                    </span>
                  </div>
                  <div class="blog-text">
                    <h4>
                      <a href="detail_menu_makanan.php?id=<?php echo $rs_mm['kode_makanan']; ?>"><?php echo $rs_mm['nama_makanan']; ?></a>
                    </h4> 
                     <p style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                    	<?php echo $rs_mm['isi_makanan']; ?>
                    </p>
                  </div>
                  <span>
                    <a href="detail_menu_makanan.php?id=<?php echo $rs_mm['kode_makanan']; ?>" class="ready-btn">Read more</a>
                  </span>
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