<?php include('include/header.php'); ?>

<body>
  <div class="wrapper">
  
    <div class="main">
      <!-- Header top in posyandu/include -->
      <?php include('include/header_top.php'); ?>
      
      <div class="card">
      <div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                    <div class="card-header">
                        <h3>Pilih Barang</h3>
                    </div>
                    <div class="card-body">
                        <form method="post">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="">Kode Transaksi</label>
                                    <input style="font-weight: bold; color: red;" type="text" class="form-control" value="<?= $transkode; ?>" readonly name="kd_transaksi">
                                </div>
                                <div class="col-md-6">
                                    <label for="">Kode Antrian</label>
                                    <input style="font-weight: bold; color: red;" type="text" class="form-control" value="<?= $antrian; ?>" readonly name="kd_pretransaksi" id="antrian">
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="kd_barang" readonly placeholder="Kode barang" value="<?php echo @$dataR['kd_barang'] ?>">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                           <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addStock"><i class="align-middle me-2" data-feather="plus"></i>
                ADJUST STOCK +/-
              </button> 
                                            </div>
                                        </div>
                                        <div class="col-sm-4"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Nama Barang</label>
                                        <input type="text" class="form-control" name="nama_barang" value="<?php echo @$dataR['nama_barang']; ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Harga Barang</label>
                                        <input type="text" class="form-control" max="100" name="harba" value="<?php echo @$dataR['harga_barang']; ?>" id="harba" readonly="">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Jumlah</label>
                                        <input type="number" class="form-control" name="jumlah" value="" id="jumjum" min="0" autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Total</label>
                                        <input type="text" class="form-control" max="100" name="total" readonly id="totals">
                                    </div>
                                    <button class="btn btn-primary" name="btnAdd"><i class="fa fa-cart-plus"></i> Tambahkan ke Antrian</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h3>Antrian Barang</h3>
                        </div>
                        <div class="card-body">
                            <?php if ($assoc2['count'] > 0 || isset($_POST['btnAdd'])): ?>  
                                <a class="btn btn-success" id="pembayaran" href="?page=kasirPembayaran">Lanjutkan ke pembayaran <i class="fa fa-cart-arrow-down"></i></a>
                            <?php endif ?>
                            <br><br>
                          
                                <table class="table table-striped table-bordered">
                                    <tr>
                                        <th>Kode Antrian</th>
                                        <th>Nama Barang</th>
                                        <th>Jumlah</th>
                                        <th>Sub Total</th>
                                        <td>Batal beli</td>
                                    </tr>
                                    
                                        <td colspan="5" class="text-center">Tidak ada antrian</td>
                                    
                                </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

      </div> 
                
      <?php include('modal/add_stock.php'); ?>
      <?php include('modal/view_stock.php'); ?>     
    
      <?php include('include/footer.php'); ?>
    </div>
  </div>
  <!-- Source of javascript for this role -->
  <?php include('include/javascript.php'); ?>

</body>

</html>