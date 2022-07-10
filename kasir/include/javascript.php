<script src="../boostrap/js/jquery-3.3.1.min.js" ></script>

<script src="../boostrap/js/sweetalert.min.js"></script>
<script src="../boostrap/js/app.js"></script>
<script src="../boostrap/js/tinymce.min.js" referrerpolicy="origin"></script>

<script src="../boostrap/js/app.js"></script>
<script>
    $(document).ready(function(){


        $('#barang_nama').change(function(){
            var barang = $(this).val();
            $.ajax({
                type:"POST",
                url :'ajaxTransaksi.php',
                data:{'selectData' : barang},
                success: function(data){
                    $("#harba").val(data);
                    $("#jumjum").val();
                    var jum   = $("#jumjum").val();
                    var kali  = data * jum;
                    $("#totals").val(kali);
                }
            })
        });


        $('#jumjum').keyup(function(){
            var jumlah  = $(this).val();
            var harba   = $('#harba').val();
            var kali    = harba * jumlah;
            $("#totals").val(kali);
        });

        $('#bayar').keyup(function(){
            var bayar = $(this).val();
            var total = $('#tot').val();
            var kembalian = bayar - total;
            $('#kem').val(kembalian);
        })
    })
    function delete_keranjang(id){
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
	              url: 'controller/transaksi.php?role=DELETE_KERANJANG',
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
</script>
