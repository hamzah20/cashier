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
						<div class="col mt-0">
							<h5 class="card-title">Earnings</h5>
						</div>

						<div class="col-auto">
							<div class="stat text-primary">
								<i class="align-middle" data-feather="dollar-sign"></i>
							</div>
						</div>
					</div>
					<h1 class="mt-1 mb-3">$21.300</h1>
					<div class="mb-0">
						<span class="text-success"> <i class="mdi mdi-arrow-bottom-right"></i> 6.65% </span>
						<span class="text-muted">Since last week</span>
					</div>
				</div>
			</div>
			<div class="card">
				<div class="card-body">
					<div class="row">
						<div class="col mt-0">
							<h5 class="card-title">Orders</h5>
						</div>

						<div class="col-auto">
							<div class="stat text-primary">
								<i class="align-middle" data-feather="shopping-cart"></i>
							</div>
						</div>
					</div>
					<h1 class="mt-1 mb-3">64</h1>
					<div class="mb-0">
						<span class="text-danger"> <i class="mdi mdi-arrow-bottom-right"></i> -2.25% </span>
						<span class="text-muted">Since last week</span>
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