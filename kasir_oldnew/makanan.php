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
						<h2> <span class="badge bg-success mb-3">MENU MAKANAN</span></h2>
						<div class="row">
							<div class="col- mb-3">
								<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addMakanan"><i class="align-middle me-2" data-feather="plus"></i>
							  Input Makanan
							</button> 
							</div>
						</div> 
						<table class="table" id="scheduleTable">
							<thead>
								<tr>
									<th>No</th>
									<th>Kode</th>
									<th>Judul</th>
									<th>Tanggal</th> 
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php
									$i=1;
									$sql="SELECT * FROM menu_makanan";
									$r=mysqli_query($conn,$sql);
									while($rs=mysqli_fetch_array($r)){
										?>
										<tr>
											<td><?php echo $i?></td>
											<td><?php echo $rs['kode_makanan']?></td>
											<td><?php echo $rs['nama_makanan']?></td>
											<td><?php echo $rs['tanggal_makanan']?></td>
											<td> 
												<button class="btn btn-sm btn-primary"  onclick="detail_makanan(<?php echo $rs['rec_id']?>)"><i class="align-middle me-2" data-feather="eye"></i></button>
												
													<!-- <a class="btn btn-sm btn-warning" title="Edit" href="#"><i class="align-middle" data-feather="book"></i></a> -->
													<button class="btn btn-sm btn-warning"  onclick="edit_makanan(<?php echo $rs['rec_id']?>)"><i class="align-middle me-2" data-feather="edit-2"></i></button>

												<button class="btn btn-sm btn-danger"  onclick="delete_makanan(<?php echo $rs['rec_id']?>)"><i class="align-middle me-2" data-feather="trash"></i></button>
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
			<?php include('modal/detail_makanan.php'); ?>	
			<?php include('modal/add_makanan.php'); ?>
			<?php include('modal/edit_makanan.php'); ?>
			<?php include('include/footer.php'); ?>
		</div>
	</div>
	<!-- Source of javascript for this role -->
	<?php include('include/javascript.php'); ?>

</body>

</html>