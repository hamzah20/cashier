		<nav id="sidebar" class="sidebar js-sidebar ">
			<div class="sidebar-content js-simplebar bg-sidebar" style="background-color: #2F4F4F;">
				<a class="sidebar-brand  py-1" href="index.html">
          			<!-- <span class="align-middle">Eposyandu</span> -->
          			<img src="../boostrap/img/images/dashboard-kemenkes.png" alt="Charles Hall" class="img-fluidr" width="130" />
        		</a>

				<ul class="sidebar-nav bg-sidebar">
					<li class="sidebar-header  bg-sidebar" style="background-color: #2F4F4F;"></li>
					<li class="sidebar-item active  bg-sidebar">
						<a class="sidebar-link bg-sidebar" style="background-color: #2F4F4F;" href="dashboard.php">
             				<i class="align-middle" data-feather="sliders"></i> 
             			 	<span class="align-middle">Dashboard</span>
            			</a>
					</li> 
					<?php if($_SESSION['user_group'] == 'Admin'){ ?>
						<li class="sidebar-item bg-sidebar" style="background-color: #2F4F4F;">
							<a class="sidebar-link bg-sidebar" style="background-color: #2F4F4F;" href="perhitungan.php">
	              				<i class="align-middle" data-feather="book"></i> <span class="align-middle">Master Dokumen</span>
	            			</a>
						</li> 
						<li class="sidebar-item  bg-sidebar" style="background-color: #2F4F4F;">
							<a class="sidebar-link  bg-sidebar" style="background-color: #2F4F4F;" href="jadwal.php">
	              				<i class="align-middle" data-feather="book"></i> <span class="align-middle">Master Proyek</span>
	            			</a>
						</li>
						<li class="sidebar-item  bg-sidebar" style="background-color: #2F4F4F;">
							<a class="sidebar-link  bg-sidebar" style="background-color: #2F4F4F;" href="jadwal.php">
	              				<i class="align-middle" data-feather="book"></i> <span class="align-middle">Master RAK</span>
	            			</a>
						</li>
						<li class="sidebar-item  bg-sidebar" style="background-color: #2F4F4F;">
							<a class="sidebar-link  bg-sidebar" style="background-color: #2F4F4F;" href="jadwal.php">
	              				<i class="align-middle" data-feather="book"></i> <span class="align-middle">Master Map</span>
	            			</a>
						</li>
					<?php }  ?>
					<?php if($_SESSION['user_group'] == 'Admin' OR $_SESSION['user_group'] == 'Super Admin'){ ?>
						<li class="sidebar-item  bg-sidebar" style="background-color: #2F4F4F;">
							<a class="sidebar-link  bg-sidebar" style="background-color: #2F4F4F;" href="informasi.php">
	              				<i class="align-middle" data-feather="book"></i> <span class="align-middle">Berkas</span>
	            			</a>
						</li>
					<?php } ?>
					<?php if($_SESSION['user_group'] == 'Admin'){ ?>
						<li class="sidebar-item  bg-sidebar" style="background-color: #2F4F4F;">
							<a class="sidebar-link  bg-sidebar" style="background-color: #2F4F4F;" href="informasi.php">
	              				<i class="align-middle" data-feather="book"></i> <span class="align-middle">Catatan</span>
	            			</a>
						</li>
						<li class="sidebar-item  bg-sidebar" style="background-color: #2F4F4F;">
							<a class="sidebar-link  bg-sidebar" style="background-color: #2F4F4F;" href="informasi.php">
	              				<i class="align-middle" data-feather="book"></i> <span class="align-middle">Surat</span>
	            			</a>
						</li>
					<?php } ?>  
					<?php if($_SESSION['user_group'] == 'Super Admin'){ ?>
						<li class="sidebar-item  bg-sidebar" style="background-color: #2F4F4F;">
							<a class="sidebar-link  bg-sidebar" style="background-color: #2F4F4F;" href="informasi.php">
	              				<i class="align-middle" data-feather="book"></i> <span class="align-middle">User</span>
	            			</a>
						</li>
					<?php } ?>
						<li class="sidebar-item bg-sidebar" style="background-color: #2F4F4F;"> 
							<a class="sidebar-link bg-sidebar" style="background-color: #2F4F4F;" href="pages-sign-in.html">
	              				<i class="align-middle" data-feather="log-out"></i> 
	              				<span class="align-middle">Sign Out</span>
	            			</a>
					</li>  
				</ul>
			</div>
		</nav>