
<div class="modal fade" id="addJadwal" tabindex="-1" aria-labelledby="addJadwal" aria-hidden="true">
  <div class="in modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addJadwal"><i class="align-middle me-2" data-feather="plus"></i> Produk</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="controller/master_p.php?role=TAMBAH_PRODUK" method="POST">
        <div class="modal-body">
        <div class="mb-3">
          <label class="form-label">Nama Produk</label>
          <input type="text" name="txt_nama" class="form-control" placeholder="Nama Produk" >
        </div>
         <div class="mb-3">
          <label class="form-label">Kategori Produk</label>
          <input type="text" name="txt_kategori" class="form-control" placeholder="Kategori Produk" >
        </div>
         <div class="mb-3">
          <label class="form-label">Satuan Produk</label>
          <input type="text" name="txt_satuan" class="form-control" placeholder="Stuan Produk" >
        </div>
         <div class="mb-3">
          <label class="form-label">Deskripsi</label>
          <textarea  name="txt_deskripsi"></textarea>
        </div>
     
        
        </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary"></button> -->
        <input type="submit" class="btn btn-primary" value="Save changes">
      </div>
      </form>
    </div>
  </div>
</div>