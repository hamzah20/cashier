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
						<h2> <span class="badge bg-success mb-3">MASTER MENU</span></h2>
						<div class="row">
							<div class="col-mb-3">
								<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addMenu"><i class="align-middle me-2" data-feather="plus"></i>
							  Input Menu
							</button> 
							</div>
						</div> 
						<table class="table" id="scheduleTable">
							<thead>
								<tr>
									<th>NO</th>
									<th>KODE MENU</th>
									<th>MENU</th>
									<th>HARGA</th>
									<th>STATUS</th>
									<th>DESKRIPSI</th>
									<th>AKSI</th>
								</tr>
							</thead>
							<tbody>
								<?php
									$i=1;
									$sql="SELECT * FROM menu";
									$r=mysqli_query($conn,$sql);
									while($rs=mysqli_fetch_array($r)){
										?>
										<tr>
											<td><?php echo $i;?></td>
											<td><?php echo $rs['kode_menu'];?></td>
											<td><?php echo $rs['nama_menu'];?></td>
											<td><?php echo number_format($rs['harga']);?></td>
											<td><?php echo $rs['status_menu'];?></td>
											<td><?php echo $rs['deskripsi'];?></td>
											<td>  
													<button class="btn btn-sm btn-warning"  onclick="edit_menu(<?php echo $rs['rec_id']?>)"><i class="align-middle me-2" data-feather="edit-2"></i></button>

													<button class="btn btn-sm btn-danger"  onclick="delete_menu(<?php echo $rs['rec_id']?>)"><i class="align-middle me-2" data-feather="trash"></i></button>
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
								
			<?php include('modal/add_menu.php'); ?>
			<?php include('modal/edit_menu.php'); ?>			
		
			<?php include('include/footer.php'); ?>
		</div>
	</div>
	<!-- Source of javascript for this role -->
	<?php include('include/javascript.php'); ?>

</body>

</html>