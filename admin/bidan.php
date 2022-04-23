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
						<h2> <span class="badge bg-success mb-3">BIDAN POSYANDU</span></h2>
						<div class="row">
							<div class="col- mb-3">
								<a href="add_bidan.php"><button type="button" class="btn btn-primary"><i class="align-middle me-2" data-feather="plus"></i> Input Bidan </button> </a>
							</div>  
						</div> 
						<table class="table" id="scheduleTable">
							<thead>
								<tr>
									<th>No</th>
									<th>Data Bidan</th>
									<th>Tempat Tanggal Lahir</th> 
									<th>Pendidikan</th> 
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
							<!-- Menampilkan semua data kader -->
							<?php  
								$no 			= 1;
								$DataBidan 		= "SELECT * FROM bidan";
								$queryDataBidan	= mysqli_query($conn,$DataBidan);
								while($RSDataBidan = mysqli_fetch_array($queryDataBidan)){
							?>
								<tr>
									<td><?php echo $no; ?></td>
									<td>
										<strong>ID :</strong> <?php echo $RSDataBidan['id_bidan']; ?> <br>
										<strong>Nama :</strong> <?php echo $RSDataBidan['nama_bidan']; ?> <br>
										<strong>NIP :</strong> <?php echo $RSDataBidan['nip_bidan']; ?> <br>
										<strong>Agama :</strong> <?php echo $RSDataBidan['agama_bidan']; ?> <br> 
										<strong>No Telp :</strong> <?php echo $RSDataBidan['no_telp_bidan']; ?>
									</td>
									<td>
										<?php 
											echo $RSDataBidan['tempat_lahir_bidan'].", "; 
											echo $RSDataBidan['tanggal_lahir_bidan']; 
										?>
									</td>
									<td class="text-uppercase">
										<?php echo $RSDataBidan['pendidikan_bidan']; ?>
									</td>
									<td>  
											<a class="btn btn-sm btn-warning" title="Edit" href="edit_bidan.php?id=<?= $RSDataBidan['id_bidan']; ?>"><i class="align-middle" data-feather="edit"></i></a> 
											<a class="btn btn-sm btn-danger"  onclick="delete_bidan('<?php echo $RSDataBidan['id_bidan']?>')"><i class="align-middle" data-feather="trash-2"></i></a>
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
			<?php include('include/footer.php'); ?>
		</div>
	</div>
	<!-- Source of javascript for this role -->
	<?php include('include/javascript.php'); ?>

</body>

</html>