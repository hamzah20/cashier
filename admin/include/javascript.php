<script src="../boostrap/js/jquery-3.3.1.min.js" ></script>

<script src="../boostrap/js/sweetalert.min.js"></script>
<script src="../boostrap/js/app.js"></script>
<script src="../boostrap/js/tinymce.min.js" referrerpolicy="origin"></script>
<!-- <script src="../boostrap/js/app.js"></script> -->

	
	<!-- Data Tables -->
	<script type="text/javascript">
		$("#addRow").click(function () {
			var html = '';
			html +='<tr id="inputFormRow">';
				// html +='<td><input type="text" name="txt_product" class="form-control"></td>';
				html +='<td>';
					html +='<select class="form-control" name="slc_produk[]">';
						<?php
							$sql="SELECT * FROM produk";
							$r=mysqli_query($conn,$sql);
							while($rs=mysqli_fetch_array($r)){
								?>
								html +='<option value="<?php echo $rs['id_produk']?>">';
									html +='<?php echo $rs['nama_produk']?>';
									html+='</option>';
								<?php
							}
						?>
					html +='</select>';
				html +='</td>';
				html +='<td><input type="text" name="txt_quantity[]" class="form-control"></td>';
				html +='<td><button id="removeRow" type="button" class="btn btn-danger">Remove</button></td>';

			html +='</tr>';
        $('#newRow').append(html);
        return false;
	    });

	    // remove row
	    $(document).on('click', '#removeRow', function () {
	        $(this).closest('#inputFormRow').remove();
	    });

	</script>
	<script>
	tinymce.init({selector:'textarea'});
	  jQuery(document).ready(function($) {

	    "use strict";

	    $(function() {
	      $('[data-toggle="tooltip"]').tooltip()
	    })

	    $('#scheduleTable').DataTable(); 

	  });

		//------------------------------- produk 
		function delete_produk(id){
	       swal({
	        title: "Are you sure?",
	        text: "",
	        icon: "warning",
	        buttons: true,
	        dangerMode: true,
	        })
	        .then((willDelete) => {
	          if (willDelete) {
	              $.ajax({
	              type: 'post',
	              url: 'Controller/master_p.php?role=DELETE_PRODUK',
	              data: {idx:id},
	              success: function (data) {
	                  swal(
	                      'Deleted!',
	                      'Your Product has been deleted.',
	                      'success'
	                    ).then(function(){
	                      location.reload();
	                   });

	              }         
	              }); 
	          } else {
	            swal("Your Product file is safe!");
	          }
	        });
	    }
	    function delete_menu(id){
	       swal({
	        title: "Are you sure?",
	        text: "",
	        icon: "warning",
	        buttons: true,
	        dangerMode: true,
	        })
	        .then((willDelete) => {
	          if (willDelete) {
	              $.ajax({
	              type: 'post',
	              url: 'controller/master_p.php?role=DELETE_MENU',
	              data: {idx:id},
	              success: function (data) {
	                  swal(
	                      'Deleted!',
	                      'Your Menu has been deleted.',
	                      'success'
	                    ).then(function(){
	                      location.reload();
	                   });

	              }         
	              }); 
	          } else {
	            swal("Your Menu file is safe!");
	          }
	        });
	    }
	    function edit_produk(id){
	      $.ajax({
	          url: 'controller/master_p.php?role=EDIT_PRODUK',
	          type: 'post',
	          data: {id: id},
	          success: function(body_Edit){ 
	           
	            // Add response in Modal body
	            $('.modalEditProduks').html(body_Edit);
	            // Display Modal

	            $('#editProduks').modal('show');
	            tinymce.init({selector:'textarea'});

	          }
	        });
	    } 
	    function edit_menu(id){
	      $.ajax({
	          url: 'controller/master_p.php?role=EDIT_MENU',
	          type: 'post',
	          data: {id: id},
	          success: function(body_Edit){ 
	           
	            // Add response in Modal body
	            $('.modalEditMenu').html(body_Edit);
	            // Display Modal

	            $('#editmenu').modal('show');
	            tinymce.init({selector:'textarea'});

	          }
	        });
	    }
	    //------------------------------- END OF JADWAL 
	     function view_detail_stock(id){
	      $.ajax({
	          url: 'controller/master_p.php?role=VIEW_DETIAL',
	          type: 'post',
	          data: {id: id},
	          success: function(body_Edit){ 
	           
	            // Add response in Modal body
	            $('.modalViewstock').html(body_Edit);
	            // Display Modal

	            $('#viewStock').modal('show');
	            tinymce.init({selector:'textarea'});

	          }
	        });
	    }
	    function delete_stock(id){
	       swal({
	        title: "Are you sure?",
	        text: "",
	        icon: "warning",
	        buttons: true,
	        dangerMode: true,
	        })
	        .then((willDelete) => {
	          if (willDelete) {
	              $.ajax({
	              type: 'post',
	              url: 'Controller/master_p.php?role=DELETE_STOCK',
	              data: {idx:id},
	              success: function (data) {
	                  swal(
	                      'Deleted!',
	                      'Your Stock Adjustment has been deleted.',
	                      'success'
	                    ).then(function(){
	                      location.reload();
	                   });

	              }         
	              }); 
	          } else {
	            swal("Your Stock Adjustment file is safe!");
	          }
	        });
	    }
	    function delete_user(id){
	       swal({
	        title: "Are you sure?",
	        text: "",
	        icon: "warning",
	        buttons: true,
	        dangerMode: true,
	        })
	        .then((willDelete) => {
	          if (willDelete) {
	              $.ajax({
	              type: 'post',
	              url: 'Controller/master_p.php?role=DELETE_USER',
	              data: {idx:id},
	              success: function (data) {
	                  swal(
	                      'Deleted!',
	                      'Your User Adjustment has been deleted.',
	                      'success'
	                    ).then(function(){
	                      location.reload();
	                   });

	              }         
	              }); 
	          } else {
	            swal("Your User Adjustment file is safe!");
	          }
	        });
	    }


	</script>
	<!-- End Data Tables -->
	<script>
		document.addEventListener("DOMContentLoaded", function() {
			var ctx = document.getElementById("chartjs-dashboard-line").getContext("2d");
			var gradient = ctx.createLinearGradient(0, 0, 0, 225);
			gradient.addColorStop(0, "rgba(215, 227, 244, 1)");
			gradient.addColorStop(1, "rgba(215, 227, 244, 0)");
			// Line chart
			new Chart(document.getElementById("chartjs-dashboard-line"), {
				type: "line",
				data: {
					labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
					datasets: [{
						label: "Sales ($)",
						fill: true,
						backgroundColor: gradient,
						borderColor: window.theme.primary,
						data: [
							2115,
							1562,
							1584,
							1892,
							1587,
							1923,
							2566,
							2448,
							2805,
							3438,
							2917,
							3327
						]
					}]
				},
				options: {
					maintainAspectRatio: false,
					legend: {
						display: false
					},
					tooltips: {
						intersect: false
					},
					hover: {
						intersect: true
					},
					plugins: {
						filler: {
							propagate: false
						}
					},
					scales: {
						xAxes: [{
							reverse: true,
							gridLines: {
								color: "rgba(0,0,0,0.0)"
							}
						}],
						yAxes: [{
							ticks: {
								stepSize: 1000
							},
							display: true,
							borderDash: [3, 3],
							gridLines: {
								color: "rgba(0,0,0,0.0)"
							}
						}]
					}
				}
			});
		});
	</script>
	<script>
		document.addEventListener("DOMContentLoaded", function() {
			// Pie chart
			new Chart(document.getElementById("chartjs-dashboard-pie"), {
				type: "pie",
				data: {
					labels: ["Chrome", "Firefox", "IE"],
					datasets: [{
						data: [4306, 3801, 1689],
						backgroundColor: [
							window.theme.primary,
							window.theme.warning,
							window.theme.danger
						],
						borderWidth: 5
					}]
				},
				options: {
					responsive: !window.MSInputMethodContext,
					maintainAspectRatio: false,
					legend: {
						display: false
					},
					cutoutPercentage: 75
				}
			});
		});
	</script>
	<script>
		document.addEventListener("DOMContentLoaded", function() {
			// Bar chart
			new Chart(document.getElementById("chartjs-dashboard-bar"), {
				type: "bar",
				data: {
					labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
					datasets: [{
						label: "This year",
						backgroundColor: window.theme.primary,
						borderColor: window.theme.primary,
						hoverBackgroundColor: window.theme.primary,
						hoverBorderColor: window.theme.primary,
						data: [54, 67, 41, 55, 62, 45, 55, 73, 60, 76, 48, 79],
						barPercentage: .75,
						categoryPercentage: .5
					}]
				},
				options: {
					maintainAspectRatio: false,
					legend: {
						display: false
					},
					scales: {
						yAxes: [{
							gridLines: {
								display: false
							},
							stacked: false,
							ticks: {
								stepSize: 20
							}
						}],
						xAxes: [{
							stacked: false,
							gridLines: {
								color: "transparent"
							}
						}]
					}
				}
			});
		});
	</script>
	<script>
		document.addEventListener("DOMContentLoaded", function() {
			var markers = [{
					coords: [31.230391, 121.473701],
					name: "Shanghai"
				},
				{
					coords: [28.704060, 77.102493],
					name: "Delhi"
				},
				{
					coords: [6.524379, 3.379206],
					name: "Lagos"
				},
				{
					coords: [35.689487, 139.691711],
					name: "Tokyo"
				},
				{
					coords: [23.129110, 113.264381],
					name: "Guangzhou"
				},
				{
					coords: [40.7127837, -74.0059413],
					name: "New York"
				},
				{
					coords: [34.052235, -118.243683],
					name: "Los Angeles"
				},
				{
					coords: [41.878113, -87.629799],
					name: "Chicago"
				},
				{
					coords: [51.507351, -0.127758],
					name: "London"
				},
				{
					coords: [40.416775, -3.703790],
					name: "Madrid "
				}
			];
			var map = new jsVectorMap({
				map: "world",
				selector: "#world_map",
				zoomButtons: true,
				markers: markers,
				markerStyle: {
					initial: {
						r: 9,
						strokeWidth: 7,
						stokeOpacity: .4,
						fill: window.theme.primary
					},
					hover: {
						fill: window.theme.primary,
						stroke: window.theme.primary
					}
				},
				zoomOnScroll: false
			});
			window.addEventListener("resize", () => {
				map.updateSize();
			});
		});
	</script>
	<script>
		document.addEventListener("DOMContentLoaded", function() {
			var date = new Date(Date.now() - 5 * 24 * 60 * 60 * 1000);
			var defaultDate = date.getUTCFullYear() + "-" + (date.getUTCMonth() + 1) + "-" + date.getUTCDate();
			document.getElementById("datetimepicker-dashboard").flatpickr({
				inline: true,
				prevArrow: "<span title=\"Previous month\">&laquo;</span>",
				nextArrow: "<span title=\"Next month\">&raquo;</span>",
				defaultDate: defaultDate
			});
		});
	</script>