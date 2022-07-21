<?php include('include/header.php'); ?>

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
						<h2> <span class="badge bg-success mb-3">INFORMASI TRANSAKSI</span></h2>
						<div class="row">
							
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
									<th>Total bayar</th>
									
									
								</tr>
							</thead>
							<tbody>
								<?php
									$i=1;
									$sql="select * from g_transaksi";
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
											<td><?php echo $rs['TOTAL_BAYAR']?></td>
											
											
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
			<?php include('modal/add_informasi.php'); ?>	
			<?php include('modal/edit_informasi.php'); ?>	
			<?php include('include/footer.php'); ?>

		</div>
	</div>
	<!-- Source of javascript for this role -->
	<?php include('include/javascript.php'); ?>

</body>

</html>