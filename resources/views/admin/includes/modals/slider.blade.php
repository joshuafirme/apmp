<div class="modal fade" id="sliderModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
      <form action="#" method="post" class="modal-content" enctype="multipart/form-data"> 
        @csrf
        <div class="modal-header">
          <h5 class="modal-title">Add</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
          <div class="modal-body row g-3 ">
  
                <div class="col-md-12">
                  <label for="formFile" class="form-label">Image</label>
                  <input class="form-control" type="file" name="image">
                </div>
            </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-dismiss="modal">Close</button>
          <button class="btn btn-sm btn-primary" type="submit">Save</button>
        </div>
      </form>
    </div>
  </div><!-- End Large Modal-->