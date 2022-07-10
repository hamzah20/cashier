
<div class="modal fade" id="addMenu" tabindex="-1" aria-labelledby="addMakanan" aria-hidden="true">
  <div class="in modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addMenu"><i class="align-middle me-2" data-feather="plus"></i> Menu</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="controller/master_p.php?role=TAMBAH_MENU" method="POST" enctype="multipart/form-data">
        <div class="modal-body">
        
        <div class="mb-3">
          <label class="form-label">Nama Menu</label>
          <input type="text" name="txt_menu" class="form-control" placeholder="Menu" >
        </div>
        <div class="mb-3">
          <label class="form-label">Harga</label>
          <input type="number" name="txt_harga" class="form-control" placeholder="Harga" >
        </div>

        <div class="mb-3">
          <label class="form-label">Isi Makanan</label>
          <textarea class="form-control" name='txt_deskripsi'></textarea>
        </div>

        <div class="mb-3">
          <label>Gambar</label>
          <input type="file"  class="form-control" required="" name="txt_image">
          <div class="invalid-feedback">
           Image Can't Empty!!
          </div>
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