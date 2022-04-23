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
						<h2> <span class="badge bg-success mb-3">KADER POSYANDU</span></h2>
						<div class="row">
							<div class="col- mb-3">
								<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addKader"><i class="align-middle me-2" data-feather="plus"></i> Input Kader </button> 
							</div>  
						</div> 
						<table class="table" id="scheduleTable">
							<thead>
								<tr>
									<th>No</th>
									<th>ID</th>
									<th>Nama</th>
									<th>No Telp</th>  
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
							<!-- Menampilkan semua data kader -->
							<?php  
								$no 			= 1;
								$DataKader 		= "SELECT * FROM kader_posyandu";
								$queryDataKader	= mysqli_query($conn,$DataKader);
								while($RSDataKader = mysqli_fetch_array($queryDataKader)){
							?>
								<tr>
									<td><?php echo $no; ?></td>
									<td><?php echo $RSDataKader['id_kader']; ?></td>
									<td><?php echo $RSDataKader['nama_kader']; ?></td>
									<td><?php echo $RSDataKader['no_telp_kader']; ?></td> 
									<td>  
										<button class="btn btn-sm btn-warning"  onclick="edit_kader('<?php echo $RSDataKader['id_kader']?>')"><i class="align-middle" data-feather="edit"></i></button> 
										<button class="btn btn-sm btn-danger"  onclick="delete_kader('<?php echo $RSDataKader['id_kader']?>')"><i class="align-middle text-center" data-feather="trash-2"></i></button>
									</td>
								</tr>
							<?php  
								$no++;
								}
							?> 
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