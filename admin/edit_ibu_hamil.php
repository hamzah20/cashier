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
						<?php  
							$no 			= 1;
							$DataPasien 		= "SELECT * FROM ibu_hamil where id_ibu_hamil='".$_GET['id']."'";
							$queryDataPasien	= mysqli_query($conn,$DataPasien);
							while($RSDataPasien = mysqli_fetch_array($queryDataPasien)){
						?>
						<form action="controller/profile_p.php?role=PROSES_EDIT_PASIEN" method="POST">
						<div class="row"> 
							<div class="col-6">
								<label class="form-label">ID Pasien</label>
          						<input type="text" name="txt_id" class="form-control mb-3" placeholder="Nama Lengkap" value="<?php echo $RSDataPasien['id_ibu_hamil']; ?>" readonly>
								<label class="form-label">Nama Lengkap</label>
          						<input type="text" name="txt_nama" class="form-control mb-3" placeholder="Nama Lengkap" value="<?php echo $RSDataPasien['nama_ibu_hamil']; ?>">
          						<label class="form-label">Tempat Lahir</label>
          						<input type="text" name="txt_tempat" class="form-control mb-3" placeholder="Tempat Lahir" value="<?php echo $RSDataPasien['tempat_lahir_ibu_hamil']; ?>">
          						<label class="form-label">Pekerjaan</label>
          						<input type="text" name="txt_pekerjaan" class="form-control mb-3" placeholder="Pekerjaan" value="<?php echo $RSDataPasien['pekerjaan_ibu_hamil']; ?>">
          						<label class="form-label">Alamat</label>
          						<input type="text" name="txt_alamat" class="form-control mb-3 py-3" placeholder="Alamat" value="<?php echo $RSDataPasien['alamat_ibu_hamil']; ?>">
							</div>
							<div class="col-6">
								<label class="form-label">Golongan Darah</label>
          						<input type="text" name="txt_darah" class="form-control mb-3" placeholder="Golongan Darah" value="<?php echo $RSDataPasien['gol_darah_ibu_hamil']; ?>">
          						<label class="form-label">Tanggal Lahir</label>
          						<input type="date" name="txt_tanggal" class="form-control mb-3" value="<?php echo $RSDataPasien['tanggal_lahir_ibu_hamil']; ?>">
          						<label class="form-label">Kehamilan</label>
          						<input type="text" name="txt_kehamilan" class="form-control mb-3" placeholder="Kehamilan" value="<?php echo $RSDataPasien['kehamilan']; ?>">
          						<label class="form-label">Nama Suami</label>
          						<input type="text" name="txt_suami" class="form-control mb-3" placeholder="Nama Suami" value="<?php echo $RSDataPasien['nama_suami']; ?>">
          						<label class="form-label">No Telpon</label>
          						<input type="text" name="txt_telp" class="form-control mb-3" placeholder="No Telpon" value="<?php echo $RSDataPasien['no_telp_ibu_hamil']; ?>">
							</div>
						</div>  
						<div class="row">
							<div class="col-">
								<a type="button" class="btn btn-secondary" href="javascript:window.history.go(-1);">Close</a> 
        						<input type="submit" class="btn btn-primary" value="Save Changes">
							</div> 
						</div>
						</form>
						<?php  
							$no++;
							}
						?> 
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