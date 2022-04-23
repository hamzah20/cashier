<?php include('include/header.php'); ?>

<body>
	<div class="wrapper">
		<!-- Sidebar in posyandu/include -->
		<?php include('include/sidebar.php'); ?>

		<div class="main">
			<!-- Header top in posyandu/include -->
			<?php include('include/header_top.php'); ?>
			<?php session_start(); ?>
			<div class="card">
				<div class="card-body">
					<div class="row">
						<span class=" text-uppercase fs-1"><?php echo $_SESSION['nama_user'];?></span>
						<span class=" text-uppercase fs-4"><?php echo $_SESSION['user_id'] ." / ".$_SESSION['group'];?></span> 
					</div> 
					<div class="row ml-1">
						<a type="button" href="edit_ibu_hamil.php?id=<?php echo $_SESSION['user_id']; ?>" class="mt-2">Edit Profile</a>
					</div>
				</div>
			</div> 	

			<div class="card">
				<div class="card-body">
					<div class="row">
						<h2> <span class="badge bg-success mb-3">LAPORAN</span></h2> 
						<table class="table" id="scheduleTable">
							<thead>
								<tr>
									<th>No</th>
									<th>Tanggal</th>
									<th>Tempat</th>
									<th>Bidan</th>  
									<th class="text-center">Aksi</th>
								</tr>
							</thead>
							<tbody> 
								<tr>
									<td>1</td>
									<td>2022-04-1</td>
									<td>Puskesmas Bakti Jaya</td>
									<td>Bidan Salsabillah Anjani</td> 
									<td class="text-center">  
										<button class="btn btn-sm btn-primary">Detail</button> 
										<button class="btn btn-sm btn-success">Download</button>
									</td>
								</tr> 
								<tr>
									<td>2</td>
									<td>2022-03-1</td>
									<td>Puskesmas Pamulang</td>
									<td>Bidan Balqis Syifa Azahra</td> 
									<td class="text-center">  
										<button class="btn btn-sm btn-primary">Detail</button> 
										<button class="btn btn-sm btn-success">Download</button>
									</td>
								</tr> 
								<tr>
									<td>3</td>
									<td>2022-02-1</td>
									<td>Puskesmas Benda Baru</td>
									<td>Bidan Sherina Larasati</td> 
									<td class="text-center">  
										<button class="btn btn-sm btn-primary">Detail</button> 
										<button class="btn btn-sm btn-success">Download</button>
									</td>
								</tr> 
							</tbody>
						</table>
					</div> 
				</div>
			</div> 	

			<?php include('modal/add_kader.php'); ?>	
			<?php include('modal/edit_kader.php'); ?>		
			<?php include('include/footer.php'); ?>
		</div>

	</div>
	<!-- Source of javascript for this role -->
	<?php include('include/javascript.php'); ?>

</body>

</html>