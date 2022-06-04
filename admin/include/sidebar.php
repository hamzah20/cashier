		<nav id="sidebar" class="sidebar js-sidebar ">
			<div class="sidebar-content js-simplebar bg-sidebar" style="background-color: #5e5f60;">
				<a class="sidebar-brand  py-1" href="index.php">
          			<!-- <span class="align-middle">Eposyandu</span> -->
          			<img src="../boostrap/img/images/logo-coffee.png" alt="Charles Hall" class="img-fluid mx-auto d-block"/>
        		</a>
        		
				<ul class="sidebar-nav bg-sidebar">
					<li class="sidebar-header  bg-sidebar" style="background-color: #5e5f60;"></li>
					<li class="sidebar-item active  bg-sidebar">
						<a class="sidebar-link bg-sidebar" style="background-color: #5e5f60;" href="dashboard.php">
             				<i class="align-middle" data-feather="sliders"></i> 
             			 	<span class="align-middle">Dashboard</span>
            			</a>
					</li> 
					<?php if($_SESSION['user_group'] == 'Admin'){ ?>
						<li class="sidebar-item bg-sidebar" style="background-color: #5e5f60;">
							<a class="sidebar-link bg-sidebar" style="background-color: #5e5f60;" href="produk.php">
	              				<i class="align-middle" data-feather="book"></i> <span class="align-middle">Master Product</span>
	            			</a>
						</li> 
						<li class="sidebar-item bg-sidebar" style="background-color: #5e5f60;">
							<a class="sidebar-link bg-sidebar" style="background-color: #5e5f60;" href="menu.php">
	              				<i class="align-middle" data-feather="book"></i> <span class="align-middle">Master Menu</span>
	            			</a>
						</li> 
						<li class="sidebar-item  bg-sidebar" style="background-color: #5e5f60;">
							<a class="sidebar-link  bg-sidebar" style="background-color: #5e5f60;" href="stock.php">
	              				<i class="align-middle" data-feather="book"></i> <span class="align-middle">Adjustment Stock +/-</span>
	            			</a>
						</li>
						
					<?php }  ?>
					
					<?php if($_SESSION['user_group'] == 'Owner' || $_SESSION['user_group'] == 'Admin' ){ ?>
						<li class="sidebar-item  bg-sidebar" style="background-color: #5e5f60;">
							<a class="sidebar-link  bg-sidebar" style="background-color: #5e5f60;" href="informasi.php">
	              				<i class="align-middle" data-feather="book"></i> <span class="align-middle">User</span>
	            			</a>
						</li>
					<?php } ?>
						<li class="sidebar-item bg-sidebar" style="background-color: #5e5f60;"> 
							<a class="sidebar-link bg-sidebar" style="background-color: #5e5f60;" href="pages-sign-in.html">
	              				<i class="align-middle" data-feather="log-out"></i> 
	              				<span class="align-middle">Sign Out</span>
	            			</a>
					</li>  
				</ul>
			</div>
		</nav>