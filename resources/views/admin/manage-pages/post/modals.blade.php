<div class="modal fade" id="postModal" tabindex="-1">
  <div class="modal-dialog modal-lg">
    <form action="#" method="post" class="modal-content" enctype="multipart/form-data"> 
      @csrf
      <div class="modal-header">
        <h5 class="modal-title">Add</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <div class="modal-body row g-3 ">

              <input type="hidden" class="form-control" name="category">

              <div class="col-md-12">
                <label for="validationCustom01" class="form-label">Title</label>
                <input type="text" class="form-control" name="title">
              </div>
              <div class="col-md-12">
                <label for="validationCustom01" class="form-label">Description</label>
                <textarea name="description" class="form-control" rows="3"></textarea>
              </div>
              <div class="col-md-12">
                <label for="validationCustom01" class="form-label">Link</label>
                <input type="text" class="form-control" name="link">
              </div>
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