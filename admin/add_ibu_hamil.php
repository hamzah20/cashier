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
								<a href="ibu_hamil.php"><button type="button" class="btn btn-primary"><i class="align-middle me-2" data-feather="plus"></i> Data Pasien </button> </a>
							</div>
						</div> 
						<form action="controller/profile_p.php?role=TAMBAH_PASIEN" method="POST">
						<div class="row"> 
							<div class="col-6">
								<label class="form-label">Nama Lengkap</label>
          						<input type="text" name="txt_nama" class="form-control mb-3" placeholder="Nama Lengkap" >
          						<label class="form-label">Tempat Lahir</label>
          						<input type="text" name="txt_tempat" class="form-control mb-3" placeholder="Tempat Lahir" >
          						<label class="form-label">Pekerjaan</label>
          						<input type="text" name="txt_pekerjaan" class="form-control mb-3" placeholder="Pekerjaan" >
          						<label class="form-label">No Telpon</label>
          						<input type="text" name="txt_telp" class="form-control mb-3" placeholder="No Telpon" >
          						<label class="form-label">Alamat</label>
          						<input type="text" name="txt_alamat" class="form-control mb-3 py-3" placeholder="Alamat" >
							</div>
							<div class="col-6">
								<label class="form-label">Golongan Darah</label>
          						<input type="text" name="txt_darah" class="form-control mb-3" placeholder="Golongan Darah" >
          						<label class="form-label">Tanggal Lahir</label>
          						<input type="date" name="txt_tanggal" class="form-control mb-3" >
          						<label class="form-label">Kehamilan</label>
          						<input type="text" name="txt_kehamilan" class="form-control mb-3" placeholder="Kehamilan" >
          						<label class="form-label">Nama Suami</label>
          						<input type="text" name="txt_suami" class="form-control mb-3" placeholder="Nama Suami" >
							</div>
						</div> 
						<div class="row">
							<div class="col-6">
								<label class="form-label">Username</label>
          						<input type="text" name="txt_username" class="form-control mb-3" placeholder="Username" >
							</div>
							<div class="col-6">
								<label class="form-label">Password</label>
          						<input type="text" name="txt_password" class="form-control mb-3" placeholder="Password" >
							</div>
						</div><hr>
						<div class="row">
							<div class="col-">
								<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> 
        						<input type="submit" class="btn btn-primary" value="Save Changes">
							</div> 
						</div>
						</form>
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