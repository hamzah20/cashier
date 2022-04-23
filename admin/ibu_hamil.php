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
						<h2> <span class="badge bg-success mb-3">PASIEN POSYANDU</span></h2>
						<div class="row">
							<div class="col- mb-3">
								<a href="add_ibu_hamil.php"><button type="button" class="btn btn-primary"><i class="align-middle me-2" data-feather="plus"></i> Input Pasien </button> </a>
							</div>
						</div> 
						<table class="table" id="scheduleTable">
							<thead>
								<tr>
									<th>No</th>
									<th>Detail Pasien</th>
									<th>Data Lainnya</th> 
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
							<!-- Menampilkan semua data kader -->
							<?php  
								$no 			= 1;
								$DataPasien 		= "SELECT * FROM ibu_hamil";
								$queryDataPasien	= mysqli_query($conn,$DataPasien);
								while($RSDataPasien = mysqli_fetch_array($queryDataPasien)){
							?>
								<tr>
									<td><?php echo $no; ?></td>
									<td>
										<strong>ID :</strong> <?php echo $RSDataPasien['id_ibu_hamil']; ?> <br>
										<strong>Nama :</strong> <?php echo $RSDataPasien['nama_ibu_hamil']; ?> <br>
										<strong>Tempat Lahir :</strong> <?php echo $RSDataPasien['tempat_lahir_ibu_hamil']; ?> <br>
										<strong>Tanggal Lahir :</strong> <?php echo $RSDataPasien['tanggal_lahir_ibu_hamil']; ?> <br>
										<strong>Alamat :</strong> <?php echo $RSDataPasien['alamat_ibu_hamil']; ?> <br>
										<strong>No Telp :</strong> <?php echo $RSDataPasien['no_telp_ibu_hamil']; ?>
									</td>
									<td>
										<strong>Gol Darah :</strong> <?php echo $RSDataPasien['gol_darah_ibu_hamil']; ?> <br>
										<strong>Pekerjaan :</strong> <?php echo $RSDataPasien['pekerjaan_ibu_hamil']; ?> <br>
										<strong>Kehamilan :</strong> <?php echo $RSDataPasien['kehamilan']; ?> <br>
										<strong>Suami :</strong> <?php echo $RSDataPasien['nama_suami']; ?> 
									</td>
									<td>  
											<a class="btn btn-sm btn-warning" title="Edit" href="edit_ibu_hamil.php?id=<?= $RSDataPasien['id_ibu_hamil']; ?>"><i class="align-middle" data-feather="edit"></i></a> 
											<a class="btn btn-sm btn-danger"  onclick="delete_pasien('<?php echo $RSDataPasien['id_ibu_hamil']?>')"><i class="align-middle text-center" data-feather="trash-2"></i></a>
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