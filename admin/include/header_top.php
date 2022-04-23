			<nav class="navbar navbar-expand navbar-light navbar-bg">
				<a class="sidebar-toggle js-sidebar-toggle">
          			<i class="hamburger align-self-center"></i>
        		</a>

				<div class="navbar-collapse collapse">
					<ul class="navbar-nav navbar-align">
						<!-- Button for mobile menu --> 
						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
		                		<i class="align-middle" data-feather="settings"></i>
		              		</a> 
				            <!-- Profile image for header -->
							<a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
				                <img src="../boostrap/img/avatars/avatar.jpg" class="avatar img-fluid rounded me-1" alt="Charles Hall" /> <span class="text-dark"><?php echo $_SESSION['nama_user']?></span>
				            </a>
				            <!-- List menu ini toggle header menu -->
							<div class="dropdown-menu dropdown-menu-end">
								<?php 
									if($_SESSION['user_group'] == 'Kader Posyandu'){
								?>
										<a class="dropdown-item"  onclick="edit_kader('<?php echo $_SESSION['user_id'];?>')"><i class="align-middle me-1" data-feather="user"></i> Edit Kader Posyandu</a>  
								<?php
									} elseif($_SESSION['user_group'] == 'Bidan Posyandu'){
								?>
										<a class="dropdown-item" href="edit_bidan.php?id=<?php echo $_SESSION['user_id']; ?>"><i class="align-middle me-1" data-feather="user"></i> Edit Bidan Posyandu</a> 
								<?php
									} elseif($_SESSION['user_group'] == 'Pasien'){
								?>
									<a class="dropdown-item" href="profile.php?id=<?php echo $_SESSION['user_id']; ?>"><i class="align-middle me-1" data-feather="user"></i> Edit Bidan Posyandu</a> 
								<?php
									}
								?>
								
								<div class="dropdown-divider"></div> 
								<a class="dropdown-item" href="controller/login_p.php?role=LOGOUT">Log out</a>
							</div>
						</li>
					</ul>
				</div>
			</nav>
			<main class="content">
				<div class="container-fluid p-0"> 

					<div class="row">
						<div class="col-xl-12 col-xxl-12 d-flex">
							<div class="w-100">
								<div class="row"> 
									<div class="col-sm-12">