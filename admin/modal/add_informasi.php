
<div class="modal fade" id="addInformasi" tabindex="-1" aria-labelledby="addInformasi" aria-hidden="true">
  <div class="in modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addInformasi"><i class="align-middle me-2" data-feather="plus"></i> User</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="controller/master_p.php?role=TAMBAH_USER" method="POST" enctype="multipart/form-data">
        <div class="modal-body">
        <div class="mb-3">
          <label class="form-label">username</label>
          <input type="text" name="txt_username" class="form-control" placeholder="Username" >
        </div>
     
        <div class="mb-3">
          <label class="form-label">password</label>
          <input type="password" name="txt_password" class="form-control" placeholder="Password" >
        </div>
    
        <div class="mb-3">
          <label class="form-label">group</label>
           <select class="form-control" name="slc_group">
              <option value="Admin">Admin</option>
              <option value="Kair">Kasir</option>
              <option value="Owner">Owner</option>
           </select>
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