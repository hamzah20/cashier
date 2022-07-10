<?php 
include('../conn.php');
include('include/header.php'); 
$sql="SELECT * FROM g_transaksi where TRANS_NO='".$_GET['kd_transaksi']."'";
$r=mysqli_query($conn,$sql);
$rs=mysqli_fetch_array($r);
 
?>

<body>

  <!-- ======= Header ======= -->
  <?php include('include/header_top.php'); ?>
  <!-- End Header -->

  <main id="main">
    <div class="header-bg page-area">
      <div class="container position-relative">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="slider-content text-center">
              <div class="header-bottom">
              
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </div><!-- End Blog Header -->

<div class="main-content">
<div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
              <div class="col-md-2"></div>
              <div class="col-md-8">
                <div class="card">
                  <div class="card-header">
                     <img src="../boostrap/img/images/logo-coffee.png" alt="" class="img-fluid" id="img_logo_print" style="width: 20%;">
                  </div>
                  <div class="card-body">
                    <div class="row">
                          <div class="col-sm-6">Kode Transaksi : <?php echo $rs['TRANS_NO'] ?></div>
                          <div class="col-sm-6">
                                <p class="text-right"><span><?php echo "Tanggal Cetak : ".date("Y-m-d"); ?></p>
                          </div>
                    </div>
                    <br>
                    <table class="table table-striped table-bordered" width="80%">
                <tr>
                  <td>Kode Antrian</td>
                  <td>Nama Barang</td>
                  <td>Harga Satuan</td>
                  <td>Jumlah</td>
                  <td>Sub Total</td>
                </tr>
                <?php 
                $total_jumlah=0;
                $total_bayar=0;
                  $sql_detail="SELECT g_transaksi_detail.*,menu.nama_menu FROM g_transaksi_detail 
                  left outer join menu on g_transaksi_detail.KODE_MENU=menu.kode_menu
                  where TRANS_NO='".$rs['TRANS_NO']."'";
                  $r_detail=mysqli_query($conn,$sql_detail);
                  while($rs_detail=mysqli_fetch_array($r_detail)){
                    ?>
                     <tr>
                      <td><?= $rs_detail['TRANS_NO'] ?></td>
                      <td><?= $rs_detail['nama_menu'] ?></td>
                      <td><?= $rs_detail['HARGA'] ?></td>
                      <td><?= $rs_detail['TOTAL'] ?></td>
                      <td><?= "Rp.".number_format($rs_detail['TOTAL_HARGA']).",-" ?></td>
                    </tr>
                    <?php
                    $total_jumlah+=$rs_detail['TOTAL'];
                    $total_bayar+=$rs_detail['TOTAL_HARGA'];
                  }

                  ?>
               
                
                <tr>
                          <td colspan="2"></td>
                          <td>Jumlah Pembelian Barang</td>
                          <td><?php echo $total_jumlah ?></td>
                          <td></td>
                      </tr>
                <tr>
                  <td colspan="2"></td>
                  <td colspan="2">Total</td>
                  <td><?php echo "Rp.".number_format($total_bayar).",-" ?></td>
                </tr>
                <tr>
                  <td colspan="2"></td>
                  <td colspan="2">Bayar</td>
                  <td><?php echo "Rp.".number_format($rs['TOTAL_BAYAR']).",-" ?></td>
                </tr> 
                <tr>
                  <td colspan="2"></td>
                  <td colspan="2">Kembali</td>
                  <td><?php echo "Rp.".number_format($rs['TOTAL_BAYAR']-$total_bayar).",-" ?></td>
                </tr>
              </table>
              <br>
                      <p>Tanggal Beli : <?php echo $rs['TRANS_DATE']; ?></p>
                <br>
                <a href="#" class="btn btn-info ds" onclick="window.print()"><i class="fa fa-print"></i> Cetak Struk</a>
                <a href="dashboard.php" class="btn btn-danger ds">Kembali</a>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div>
</div>




<script src="vendor/jquery-3.2.1.min.js"></script>
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
</script>
  </main><!-- End #main -->

  <?php include('include/footer.php'); ?>

  

</body>

</html>