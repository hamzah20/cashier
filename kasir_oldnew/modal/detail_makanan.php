
<div class="modal fade" id="detailMakanan" tabindex="-1" aria-labelledby="detailMakanan" aria-hidden="true">
  <div class="in modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="detailMakanan">Detail Makanan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="controller/master_p.php?role=DETAIL_MAKANAN" method="POST" enctype="multipart/form-data">
        <div class="modal-body modalDetailMakanan">
          <!-- <div class="mb-3">
            <label class="form-label">Judul Informasi</label>
            <input type="text" name="txt_judul" class="form-control" placeholder="Judul" >
          </div>
       
          <div class="mb-3">
            <label class="form-label">Tanggal Informasi</label>
            <input type="date" name="txt_tgl" class="form-control" placeholder="Tanggal" >
          </div>
      
          <div class="mb-3">
            <label class="form-label">Deskripsi</label>
            <textarea class="form-control" name='txt_deskripsi'></textarea>
          </div>

          <div class="mb-3">
            <label>Gambar</label>
            <input type="file"  class="form-control" required="" name="txt_image">
            <div class="invalid-feedback">
             Image Can't Empty!!
            </div>
          </div> -->

        </div>

      
      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary"></button> -->
      </div>
      </form>
    </div>
  </div>
</div>