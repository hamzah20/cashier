<?php include('include/header.php'); ?>

<body>
	<div class="wrapper">
		<!-- Sidebar in posyandu/include -->
		<?php include('include/sidebar.php'); ?>

		<div class="main">
			<!-- Header top in posyandu/include -->
			
			<?php include('include/header_top.php'); ?>
			<div class="row">
				<?php
 				$sql="SELECT * FROM menu";
 				$r=mysqli_query($conn,$sql);
 				while($rs=mysqli_fetch_array($r)){
 					?>

 					<div class="col-lg-4 col-md-4 col-sm-4">
		              <div class="card card-statistic-2">
		                <div class="card-chart">
		                  <canvas id="sales-chart" height="80"></canvas>
		                </div>
		                <div class="card-wrap">
		                  <div class="card-header">
		                    <h4><?php echo $rs['nama_menu']?></h4>
		                  </div>
		                  <div class="card-body">
		                  	<?php
		                  	$month=date('m');
		                  	 $sql_count="SELECT sum(a.TOTAL) as total  FROM `g_transaksi_detail` AS a
										left outer join g_transaksi as b 
										on a.TRANS_NO=b.TRANS_NO 
										WHERE a.KODE_MENU='".$rs['kode_menu']."' and month(b.TRANS_DATE)=".$month."";
							$r_count=mysqli_query($conn,$sql_count);
							$rs_count=mysqli_fetch_array($r_count);
		                  	?>
		                  <h1> <?php echo number_format($rs_count['total'],0);?></h1>
		                  </div>
		                </div>
		              </div>
		            </div>
 					<?php
 				}
 			?>
			</div>
 			
			

			<?php include('include/footer.php'); ?>
		</div>
	</div>
	<!-- Source of javascript for this role -->
	<?php include('include/javascript.php'); ?>

</body>

</html>