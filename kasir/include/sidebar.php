<div class="col-lg-4 col-md-4">
            <div class="page-head-blog">
              <div class="single-blog-page"> 
              </div>
              <div class="single-blog-page">
                <!-- recent start -->
                <div class="left-blog">
                  <h4>ARTIKEL TERKINI</h4>
                  <div class="recent-post">
                  	<?php   
		              $sql_mm   = "SELECT * FROM menu_makanan ORDER BY tanggal_makanan DESC LIMIT 2";
		              $r_mm    	= mysqli_query($conn,$sql_mm);
		              while($rs_mm = mysqli_fetch_array($r_mm)){
		             ?>
                    <!-- start single post -->
                    <div class="recent-single-post">
                      <div class="post-img">
                        <a href="#">
                          <img src="../<?php echo $rs_mm['gambar_makanan']; ?>" alt="">
                        </a>
                      </div>
                      <div class="pst-content">
                        <p><a href="detail_makanan.php?id=<?php echo $rs_mm['kode_makanan']; ?>"> <?php echo $rs_mm['nama_makanan']; ?></a></p>
                      </div>
                    </div>
                    <?php 
                    	}
                    ?> 

                    <?php   
		              $sql_ig   = "SELECT * FROM informasi_gizi ORDER BY tanggal_informasi DESC LIMIT 2";
		              $r_ig    	= mysqli_query($conn,$sql_ig);
		              while($rs_ig = mysqli_fetch_array($r_ig)){
		             ?>
                    <!-- start single post -->
                    <div class="recent-single-post">
                      <div class="post-img">
                        <a href="#">
                          <img src="assets/img/blog/1.jpg" alt="">
                        </a>
                      </div>
                      <div class="pst-content">
                        <p><a ref="detail_informasi.php?id=<?php echo $rs_ig['kode_informasi']; ?>"> <?php echo $rs_ig['judul_informasi']; ?></a></p>
                      </div>
                    </div>
                    <?php 
                    	}
                    ?> 
                    <!-- End single post -->
                  </div>
                </div>
                <!-- recent end -->
              </div>   
            </div>
          </div>