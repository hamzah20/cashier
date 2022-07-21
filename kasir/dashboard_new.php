<?php 
include('../conn.php');
include('include/header.php'); 

  $year=date("Y");
  $month=date("m");
  $day=date("d");
  

   $sql="select count(*) as TOTAL from g_transaksi where substring(TRANS_NO,3,4)='".$year."' and substring(TRANS_NO,7,2)='".$month."' and substring(TRANS_NO,9,2)='".$day."' ";
  $r=mysqli_query($conn,$sql);
  $rs=mysqli_fetch_array($r);
  if ($rs["TOTAL"]!=0)
  {
     $sql1 = "select substring(TRANS_NO,11,5) as LAST_NO from g_transaksi WHERE substring(TRANS_NO,3,4)='".$year."' and substring(TRANS_NO,7,2)='".$month."' and substring(TRANS_NO,9,2)='".$day."' order by substring(TRANS_NO,11,5) desc";
    $result= mysqli_query($conn,$sql1);
    $rs = mysqli_fetch_array($result);
    $run_no = str_pad(strval(intval($rs["LAST_NO"]) + 1), 5, "0", STR_PAD_LEFT);
  }else{
    $run_no = str_pad(strval(intval(1)), 5, "0", STR_PAD_LEFT);
  }
   $doc_no="T-".$year.$month.$day.$run_no;

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
                       <?php
        $sql="SELECT * FROM menu";
        $r=mysqli_query($conn,$sql);
        while($rs=mysqli_fetch_array($r)){
          ?>

          <div class="col-lg-4 col-md-4 col-sm-4">
                  <div class="card card-statistic-2">
                    <div class="card-chart">
                      <canvas id="sales-chart" height="80"></canvas>
                    </div>
                    <div class="card-wrap">
                      <div class="card-header">
                        <h4><?php echo $rs['nama_menu']?></h4>
                      </div>
                      <div class="card-body">
                        <?php
                        $month=date('m');
                         $sql_count="SELECT sum(a.TOTAL) as total  FROM `g_transaksi_detail` AS a
                    left outer join g_transaksi as b 
                    on a.TRANS_NO=b.TRANS_NO 
                    WHERE a.KODE_MENU='".$rs['kode_menu']."' and month(b.TRANS_DATE)=".$month."";
              $r_count=mysqli_query($conn,$sql_count);
              $rs_count=mysqli_fetch_array($r_count);
                        ?>
                      <h1> <?php echo number_format($rs_count['total'],0);?></h1>
                      </div>
                    </div>
                  </div>
                </div>
          <?php
        }
      ?>
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