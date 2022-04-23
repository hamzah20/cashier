
<div class="modal fade" id="addJadwal" tabindex="-1" aria-labelledby="addJadwal" aria-hidden="true">
  <div class="in modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addJadwal"><i class="align-middle me-2" data-feather="plus"></i> Jadwal</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="controller/master_p.php?role=TAMBAH_JADWAL" method="POST">
        <div class="modal-body">
        <div class="mb-3">
          <label class="form-label">Tanggal</label>
          <input type="date" name="txt_tanggal" class="form-control" placeholder="Tanggal" >
        </div>
     
        <div class="mb-3">
          <label class="form-label">Jam</label>
          <input type="time" name="txt_jam" class="form-control" placeholder="Jam" >
        </div>
    
        <div class="mb-3">
          <label class="form-label">Tempat</label>
          <input type="text" name="txt_tempat" class="form-control" placeholder="Tempat" >
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