
<div class="modal fade" id="addStock" tabindex="-1" aria-labelledby="addMakanan" aria-hidden="true">
  <div class="in modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" ><i class="align-middle me-2" data-feather="plus"></i> Stock Adjustment +/-</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="controller/master_p.php?role=TAMBAH_STOCK" method="POST" enctype="multipart/form-data" 
      id="form_action">
        <div class="modal-body">
        
        <div class="mb-3">
          <label class="form-label">Trans Date</label>
          <input type="date" name="txt_menu" class="form-control" placeholder="Trans_date" value="<?php echo date('Y-m-d')?>">
        </div>

        <div class="mb-3">
          <label class="form-label">Notes</label>
          <!-- <textarea class="form-control" name='txt_deskripsi'></textarea> -->
          <input type="text" name="txt_notes" class="form-control" placeholder="Notes">
        </div>
        <h6>Detail Adjustment</h6>
        <hr>
        <table class="table table-striped">
          <thead>
            <th>Product</th>
            <th>Quantity</th>
          </thead>
          <tbody id="newRow">
            
          </tbody>
        </table>
        <button class="btn btn-primary" id="addRow">Add More</button>
        <button class="btn btn-danger">Delete</button>
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