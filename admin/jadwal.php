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
						<h2> <span class="badge bg-success mb-3">JADWAL POSYANDU</span></h2>
						<div class="row">
							<div class="col- mb-3">
								<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addJadwal"><i class="align-middle me-2" data-feather="plus"></i>
							  Input Jadwal
							</button> 
							</div>
						</div> 
						<table class="table" id="scheduleTable">
							<thead>
								<tr>
									<th>No</th>
									<th>Kode</th>
									<th>Tanggal</th>
									<th>Tempat</th>
									<th class="d-none d-xl-table-cell">Status</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php
									$i=1;
									$sql="SELECT * FROM jadwal";
									$r=mysqli_query($conn,$sql);
									while($rs=mysqli_fetch_array($r)){
										?>
										<tr>
											<td><?php echo $i?></td>
											<td><?php echo $rs['kode_jadwal']?></td>

											<td><?php echo $rs['tanggal_jadwal']." ".$rs['waktu_jadwal']?></td>
											<td><?php echo $rs['tempat_jadwal']?></td>
											<td class="d-none d-xl-table-cell"><span class="badge bg-success">Akan Dilaksanakan</span></td>
											<td>  
													<button class="btn btn-sm btn-warning"  onclick="edit_jadwal(<?php echo $rs['rec_id']?>)"><i class="align-middle me-2" data-feather="edit-2"></i></button>

													<button class="btn btn-sm btn-danger"  onclick="delete_jadwal(<?php echo $rs['rec_id']?>)"><i class="align-middle me-2" data-feather="trash"></i></button>
											</td>
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
									
			<?php include('modal/add_jadwal.php'); ?>		
			<?php include('modal/edit_jadwal.php'); ?>		
			<?php include('include/footer.php'); ?>
		</div>
	</div>
	<!-- Source of javascript for this role -->
	<?php include('include/javascript.php'); ?>

</body>

</html>