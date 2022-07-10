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
						<h2> <span class="badge bg-success mb-3">MASTER PRODUK</span></h2>
						<div class="row">
							<div class="col-mb-3">
								<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addJadwal"><i class="align-middle me-2" data-feather="plus"></i>
							  Input Produk
							</button> 
							</div>
						</div> 
						<table class="table" id="scheduleTable">
							<thead>
								<tr>
									<th>NO</th>
									<th>INFORMASI PRODUK</th>
									<th>AKSI</th>
								</tr>
							</thead>
							<tbody>
								<?php
									$i=1;
									$sql="SELECT * FROM produk";
									$r=mysqli_query($conn,$sql);
									while($rs=mysqli_fetch_array($r)){
										?>
										<tr>
											<td><?php echo $i?></td>
											<td>
												<div class="row">
													<div class="col-sm-3" style="font-weight: bolder;">Kode Produk</div>
													<div class="col-sm-1" style="font-weight: bolder;">:</div>
													<div class="col-sm-8" style="font-weight: bolder; color: green;"><?php echo $rs['id_produk']?></div>
												</div>
												<div class="row">
													<div class="col-sm-3" style="font-weight: bolder;">Nama Produk</div>
													<div class="col-sm-1" style="font-weight: bolder;">:</div>
													<div class="col-sm-8" style="font-weight: bolder;"><?php echo $rs['nama_produk']?></div>
												</div>
												<div class="row">
													<div class="col-sm-3" style="font-weight: bolder;">Kategori </div>
													<div class="col-sm-1" style="font-weight: bolder;">:</div>
													<div class="col-sm-8"><?php echo $rs['kategori']?></div>
												</div>
												<div class="row">
													<div class="col-sm-3" style="font-weight: bolder;">Satuan </div>
													<div class="col-sm-1" style="font-weight: bolder;">:</div>
													<div class="col-sm-8"><?php echo $rs['satuan_produk']?></div>
												</div>
												<div class="row">
													<div class="col-sm-3" style="font-weight: bolder;">Stock Sekarang </div>
													<div class="col-sm-1" style="font-weight: bolder;">:</div>
													<div class="col-sm-8">
															<?php 
																 $sql_stock="SELECT * FROM v_current_stock where PRODUCT_ID='".$rs['id_produk']."'";
																$r_stock=mysqli_query($conn,$sql_stock);
																$rs_stock=mysqli_fetch_array($r_stock);
																echo $rs_stock['QTY_CURRENT']." KG";
															?>
													</div>
												</div>
												<div class="row">
													<div class="col-sm-12">
														<span class="badge bg-success"><?php echo $rs['status_produk']?></span>
													</div>
													
												</div>
												<hr>
												<div class="row">
													<div class="col-sm-12">
														Deskripsi
													</div>
													
												</div>
												<div class="row">
													<div class="col-sm-12 lead" style="font-size: 11px;">
														
													<?php echo $rs['deskripsi_produk']?>
												
													</div>
													
												</div>
											</td>
											
											
											<td>  
													<button class="btn btn-sm btn-warning"  onclick="edit_produk(<?php echo $rs['rec_id']?>)"><i class="align-middle me-2" data-feather="edit-2"></i></button>

													<button class="btn btn-sm btn-danger"  onclick="delete_produk(<?php echo $rs['rec_id']?>)"><i class="align-middle me-2" data-feather="trash"></i></button>
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
								
			<?php include('modal/add_produk.php'); ?>
			<?php include('modal/edit_produk.php'); ?>			
		
			<?php include('include/footer.php'); ?>
		</div>
	</div>
	<!-- Source of javascript for this role -->
	<?php include('include/javascript.php'); ?>

</body>

</html>