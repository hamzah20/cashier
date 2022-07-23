<?php include('include/header.php'); 
	$year=date('Y');
	$month=date('m');
	$sql_count="select sum(TOTAL) as TOTAL_AMOUNT from g_transaksi where YEAR(TRANS_DATE)='".$year."' and MONTH(TRANS_DATE)='".$month."' ";
	$r_count=mysqli_query($conn,$sql_count);	
	$rs_count=mysqli_fetch_array($r_count);
?>

<body>
	<div class="wrapper">
		<!-- Sidebar in posyandu/include -->
		<?php include('include/sidebar.php'); ?>

		<div class="main">
			<!-- Header top in posyandu/include -->
			<?php include('include/header_top.php'); ?>

			<div class="card">
				<div class="card-body">
					<div class="row">
						
						<div class="row">
							<div class="col-md-6">
								<h2 style="float: left;"> <span class="badge bg-success mb-3">INFORMASI TRANSAKSI</span></h2>
							</div>
							<div class="col-md-6">
						<h2 style="float: left;"> <span class="badge bg-warning mb-3">TOTAL PENDAPATAN : <?php echo number_format($rs_count['TOTAL_AMOUNT'],0)?></span></h2>
								
							</div>
						</div> 
						<div class="row">
							<div class="col-md-2">
						<a href="Controller/master_p.php?role=EXPORT_TRANSAKSI" class="btn btn-success" ><span style="font-size: 12pt;" class="iconify" data-icon="fe:file-excel"></span></a>
								
							</div>
						</div>
						<table class="table" id="scheduleTable">
							<thead>
								<tr>
									<th>No</th>
									<th>Kode Transaksi</th>
									<th>Tanggal</th>
									<th>User Id</th>
									<th>Status</th>
									<th>Total</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php
									$i=1;
									$sql="select * from g_transaksi where YEAR(TRANS_DATE)='".$year."' and MONTH(TRANS_DATE)='".$month."' order by TRANS_DATE DESC";
									$r=mysqli_query($conn,$sql);
									while($rs=mysqli_fetch_array($r)){
										?>
										<tr>
											<td><?php echo $i?></td>
											<td><?php echo $rs['TRANS_NO']?></td>
											<td><?php echo $rs['TRANS_DATE']?></td>
											<td><?php echo $rs['USER_ID']?></td>
											<td><?php echo $rs['STATUS']?></td>
											<td><?php echo $rs['TOTAL']?></td>
											<td><button class="btn btn-sm btn-warning"  onclick="view_detail_trans('<?php echo $rs['TRANS_NO']?>')"><i class="align-middle me-2" data-feather="eye"></i></button></td>
										</tr>
										<?php
										$i++;
									}
								?>
							</tbody>
						</table>
					</div> 
				</div>
			</div> 
			<?php include('modal/detail_transaksi.php'); ?>	
			<?php include('include/footer.php'); ?>

		</div>
	</div>
	<!-- Source of javascript for this role -->
	<?php include('include/javascript.php'); ?>


</body>

</html>