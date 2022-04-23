
<div class="modal fade" id="addKader" tabindex="-1" aria-labelledby="addKader" aria-hidden="true">
  <div class="in modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="titleKader"><i class="align-middle me-2" data-feather="plus"></i> Kader Posyandu</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="controller/profile_p.php?role=TAMBAH_KADER" method="POST">
      <div class="modal-body">
        <div class="mb-3">
          <label class="form-label">Nama Lengkap</label>
          <input type="text" name="txt_nama" class="form-control" placeholder="Nama Lengkap" >
        </div>
        <div class="mb-3">
          <label class="form-label">No Telp</label>
          <input type="text" name="txt_telp" class="form-control" placeholder="Nomor Telpon" >
        </div>
         <div class="mb-3">
          <label class="form-label">Username</label>
          <input type="text" name="txt_username" class="form-control" placeholder="Username" >
        </div>
         <div class="mb-3">
          <label class="form-label">Password</label>
          <input type="text" name="txt_password" class="form-control" placeholder="Password" >
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> 
        <input type="submit" class="btn btn-primary" value="Save Changes">
      </div>
     </form>
    </div>
  </div>
</div>