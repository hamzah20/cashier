
<div class="modal fade" id="addInformasi" tabindex="-1" aria-labelledby="addInformasi" aria-hidden="true">
  <div class="in modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addInformasi"><i class="align-middle me-2" data-feather="plus"></i> Informasi</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="controller/master_p.php?role=TAMBAH_INFORMASI" method="POST" enctype="multipart/form-data">
        <div class="modal-body">
        <div class="mb-3">
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