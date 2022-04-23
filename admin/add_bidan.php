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
								<a href="bidan.php"><button type="button" class="btn btn-primary"> Data Bidan </button> </a>
							</div>
						</div> 
						<form action="controller/profile_p.php?role=TAMBAH_BIDAN" method="POST">
						<div class="row"> 
							<div class="col-6">
								<label class="form-label">Nama Lengkap</label>
          						<input type="text" name="txt_nama" class="form-control mb-3" placeholder="Nama Lengkap" >
          						<label class="form-label">Tempat Lahir</label>
          						<input type="text" name="txt_tempat" class="form-control mb-3" placeholder="Tempat Lahir" > 
          						<label class="form-label">Agama</label>
          						<input type="text" name="txt_agama" class="form-control mb-3" placeholder="Agama" > 
          						<label class="form-label">No Telpon</label>
          						<input type="text" name="txt_telp" class="form-control mb-3" placeholder="No Telpon" >
							</div>
							<div class="col-6">
								<label class="form-label">Nomor Induk Pegawai</label>
          						<input type="text" name="txt_nip" class="form-control mb-3" placeholder="Nomor Induk Pegawai" > 
          						<label class="form-label">Tanggal Lahir</label>
          						<input type="date" name="txt_tanggal" class="form-control mb-3" >  
          						<label class="form-label">Pendidikan</label>
          						<input type="text" name="txt_pendidikan" class="form-control mb-3" placeholder="Pendidikan">  
          						
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