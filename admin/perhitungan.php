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
						<h2> <span class="badge bg-success mb-3">PERHITUNGAN GIZI</span></h2>
						<div class="row">
							<div class="col- mb-3">
								<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addPerhitungan"><i class="align-middle me-2" data-feather="plus"></i>
							  Input Perhitungan
							</button> 
							</div>
						</div> 
						<table class="table" id="scheduleTable">
							<thead>
								<tr>
									<th>No</th>
									<th>ID Pasien</th>
									<th>Nama Pasien</th>
									<th>Kehamilan</th> 
									<th class="text-center">Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php
									$i=1;
									$sql="SELECT id_ibu_hamil,nama_ibu_hamil,kehamilan FROM v_laporan group by id_ibu_hamil,nama_ibu_hamil,kehamilan";
									$r=mysqli_query($conn,$sql);
									while($rs=mysqli_fetch_array($r)){
										?>
										<tr>
											<td><?php echo $i;?></td>
											<td><?php echo $rs['id_ibu_hamil'];?></td>
											<td><?php echo $rs['nama_ibu_hamil'];?></td>
											<td><?php echo $rs['kehamilan'];?></td>
											<td class="text-center">  
												<button class="btn btn-sm btn-success" title="Hitung" href="#" onclick="view_laporan('<?php echo $rs['id_ibu_hamil']?>')"><i data-feather="eye"></i></button> 
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
									
			<?php include('modal/add_perhitungan.php'); ?>
			<?php include('modal/view_perhitungan.php'); ?>
			<?php include('include/footer.php'); ?>
		</div>

	</div>
	
	<!-- Source of javascript for this role -->
	<?php include('include/javascript.php'); ?>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#txt_tb").keyup(function(){
			  //alert('test tb');
			  var tb = $('#txt_tb').val();
			  var bb = $('#txt_bb').val();
			  var usia = $('#txt_usia').val();

			  var bmr=655+(9.6*bb)+(1.8*tb)-(4.7*usia);

			  //alert(bmr);
			  $('#txt_bmr').val(bmr);
			});
			$("#txt_bb").keyup(function(){
			  //alert('test tb');
			  var tb = $('#txt_tb').val();
			  var bb = $('#txt_bb').val();
			  var usia = $('#txt_usia').val();

			  var bmr=655+(9.6*bb)+(1.8*tb)-(4.7*usia);

			  //alert(bmr);
			  $('#txt_bmr').val(bmr);
			});
			$("#txt_usia").keyup(function(){
			  //alert('test tb');
			  var tb = $('#txt_tb').val();
			  var bb = $('#txt_bb').val();
			  var usia = $('#txt_usia').val();

			  var bmr=655+(9.6*bb)+(1.8*tb)-(4.7*usia);

			  //alert(bmr);
			  $('#txt_bmr').val(bmr);
			});
		});
	</script>

	<!-- Source of modal add kader -->
	<?php include('modal/add_kader.php'); ?>
</body>

</html>