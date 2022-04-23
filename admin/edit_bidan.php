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
							$DataBidan 		= "SELECT * FROM bidan where id_bidan='".$_GET['id']."'";
							$queryDataBidan	= mysqli_query($conn,$DataBidan);
							while($RSDataBidan = mysqli_fetch_array($queryDataBidan)){
						?>
						<form action="controller/profile_p.php?role=PROSES_EDIT_BIDAN" method="POST">
						<div class="row"> 
							<div class="col-6">
								<label class="form-label">ID Bian</label>
								<input type="text" name="txt_id" class="form-control mb-3" value="<?php echo $RSDataBidan['id_bidan']; ?>" readonly> 
								<label class="form-label">Nama Lengkap</label>
          						<input type="text" name="txt_nama" class="form-control mb-3" placeholder="Nama Lengkap" value="<?php echo $RSDataBidan['nama_bidan']; ?>" >
          						<label class="form-label">Tempat Lahir</label>
          						<input type="text" name="txt_tempat" class="form-control mb-3" placeholder="Tempat Lahir" value="<?php echo $RSDataBidan['tempat_lahir_bidan']; ?>"> 
          						<label class="form-label">No Telpon</label>
          						<input type="text" name="txt_telp" class="form-control mb-3" placeholder="No Telpon"  value="<?php echo $RSDataBidan['no_telp_bidan']; ?>">
							</div>
							<div class="col-6">
								<label class="form-label">Nomor Induk Pegawai</label>
          						<input type="text" name="txt_nip" class="form-control mb-3" placeholder="Nomor Induk Pegawai" value="<?php echo $RSDataBidan['nip_bidan']; ?>"> 
          						<label class="form-label">Tanggal Lahir</label>
          						<input type="date" name="txt_tanggal" class="form-control mb-3" value="<?php echo $RSDataBidan['tanggal_lahir_bidan']; ?>">  
          						<label class="form-label">Agama</label>
          						<input type="text" name="txt_agama" class="form-control mb-3" placeholder="Agama" value="<?php echo $RSDataBidan['agama_bidan']; ?>"> 
          						<label class="form-label">Pendidikan</label>
          						<input type="text" name="txt_pendidikan" class="form-control mb-3" placeholder="Pendidikan" value="<?php echo $RSDataBidan['pendidikan_bidan']; ?>">  
          						
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