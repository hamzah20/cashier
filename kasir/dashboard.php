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
                <div class="col-md-6">
                    <div class="card">
                    <div class="card-header">
                        <h3>Pilih Menu</h3>
                    </div>
                    <div class="card-body">
                        <form method="post" action="controller/transaksi.php?role=TRANSAKSI">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="">Kode Transaksi</label>
                                    <input style="font-weight: bold; color: red;" type="text" class="form-control" value="<?= $doc_no; ?>" readonly name="kd_transaksi">
                                </div>
                                
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="kd_barang" readonly placeholder="Kode barang" value="<?php echo @$_SESSION['kode_menu'] ?>">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#fajarmodal">Menu
                                      </button> 
                                            </div>
                                        </div>
                                        <div class="col-sm-4"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Nama Barang</label>
                                        <input type="text" class="form-control" name="nama_barang" value="<?php echo @$_SESSION['nama_menu']; ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Harga Barang</label>
                                        <input type="text" class="form-control" max="100" name="harga" value="<?php echo @$_SESSION['harga']; ?>" id="harba" readonly="">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Jumlah</label>
                                        <input type="number" class="form-control" name="jumlah" value="" id="jumjum" min="0" autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Total</label>
                                        <input type="text" class="form-control" max="100" name="total" readonly id="totals">
                                    </div>
                                    <button class="btn btn-primary" name="btnAdd"><i class="fa fa-cart-plus"></i> Tambahkan ke Keranjang</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h3>Antrian Menu</h3>
                        </div>
                        <div class="card-body">
                          <?php
                            $sql_count="SELECT count(*) as TOTAL,sum(TOTAL*HARGA) AS TOTAL_HARGA FROM g_keranjang where TRANS_NO='".$doc_no."'";
                            $r_count=mysqli_query($conn,$sql_count);
                            $rs_count=mysqli_fetch_array($r_count);
                          ?>
                           <!--  <?php if ( $rs_count['TOTAL'] > 0 ): ?>  
                                <a class="btn btn-success" id="pembayaran" href="?page=kasirPembayaran">Lanjutkan ke pembayaran <i class="fa fa-cart-arrow-down"></i></a>
                            <?php endif ?> -->
                            
                            <form action="controller/transaksi.php?role=INSERT_TRANSAKSI" method="POST">
                              <div class="row">
                                <div class="col-sm-12">
                                    <input type="hidden" name="kd_transaksi" value="<?php echo $doc_no;?>">
                                    <div class="form-group">
                                        <label for="">Total Bayar</label>
                                        <input type="text" class="form-control" name="total_bayar" value="<?php echo @$rs_count['TOTAL_HARGA']; ?>" readonly id="tot">
                                    </div>
                                   
                                    <div class="form-group">
                                        <label for="">Bayar</label>
                                        <input type="number" class="form-control" name="bayar"  id="bayar" min="0" autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Total Kembali</label>
                                        <input type="text" class="form-control" max="100" name="total_kembali" readonly id="kem">
                                    </div>
                                    <div class="form-group">
                                       <input type="submit" name="bayar_t" value="Bayar" class="btn btn-success">
                                    </div>

                                   
                                </div>
                            </div>
                            </form>
                            <br><br>
                          <hr>
                          <h2>Detail</h2>
                                <table class="table table-striped table-bordered">
                                    <tr>
                                        <th>Kode Transaksi</th>
                                        <th>Nama Barang</th>
                                        <th>Jumlah</th>
                                        <th>Sub Total</th>
                                        <td>Batal beli</td>
                                    </tr>
                                    <?php
                                      $sql_keranjang="SELECT g_keranjang.*,menu.nama_menu FROM g_keranjang left outer join menu on g_keranjang.KODE_MENU=menu.kode_menu where TRANS_NO='".$doc_no."'";
                                      $r_keranjang=mysqli_query($conn,$sql_keranjang);
                                      while ($rs_keranjang=mysqli_fetch_array($r_keranjang)) {
                                        ?>
                                        <tr>
                                          <td><?php echo $rs_keranjang['TRANS_NO'];?></td>
                                          <td><?php echo $rs_keranjang['nama_menu'];?></td>
                                          <td><?php echo $rs_keranjang['TOTAL'];?></td>
                                          <td><?php echo $rs_keranjang['TOTAL']*$rs_keranjang['HARGA'];?></td>
                                          <td class="text-center">
                                               <button class="btn btn-sm btn-danger"  onclick="delete_keranjang(<?php echo $rs_keranjang['REC_ID']?>)"><i class="align-middle me-2" data-feather="trash"></i></button>
                                            </td>
                                        </tr>

                                        <?php
                                      }
                                    ?>
                                </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="fajarmodal" tabindex="-1" aria-labelledby="addMakanan" aria-hidden="true">
  <div class="in modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" >Daftar Menu</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
     
        <div class="modal-body">
          <div class="row">
             <?php 
                $sql="SELECT * FROM menu";
                $r=mysqli_query($conn,$sql);
                while($rs=mysqli_fetch_array($r)){
                  ?>
                    <div class="col-lg-3">
                      <div class="card">
                        <img
                          src="../<?php echo $rs['gambar_menu']?>"
                          class="card-img-top"
                          alt="Waterfall"
                        />
                        <div class="card-body">
                          <h5 class="card-title"><?php echo $rs['nama_menu'] ?></h5>
                          <p class="card-text">
                           <?php echo number_format($rs['harga'],0) ?>
                          </p>
                          <!-- <a href="#!" class="btn btn-primary">Button</a> -->
                          <a class="btn btn-primary" href="controller/transaksi.php?role=GET_MENU&id=<?php echo $rs['kode_menu'] ?>">Buy</a>
                        </div>
                      </div>
                    </div>

                  <?php
                }
            ?>
            

          </div>
       <!-- <table class="table table-hover table-bordered" id="sampleTable">
          <thead>
              <tr>
                  <td>Kode Menu</td>
                  <td>Nama Menu</td>
                  <td>Harga</td>
              </tr>
          </thead>
          <tbody>

              <?php 
                $sql="SELECT * FROM menu";
                $r=mysqli_query($conn,$sql);
                while($rs=mysqli_fetch_array($r)){
                   ?>

              <tr>
                  <td><a href="controller/transaksi.php?role=GET_MENU&id=<?php echo $rs['kode_menu'] ?>"><?php echo $rs['kode_menu'] ?></a></td>
                  <td><?php echo $rs['nama_menu'] ?></td>
                  <td><?php echo $rs['harga'] ?></td>
              </tr>
              <?php 
                }
              ?>
          </tbody>
      </table> -->
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