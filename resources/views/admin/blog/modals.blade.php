<div class="modal fade" id="blogModal" tabindex="-1">
    <div class="modal-dialog modal-xl">
      <form action="#" method="post" class="modal-content">
        @csrf
        <div class="modal-header">
          <h5 class="modal-title">Create Blog</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
          <div class="modal-body row g-3 ">
            <div class="col-md-12">
              <label for="validationCustom01" class="form-label">Title</label>
              <input type="text" class="form-control" name="title"  required>
            </div>
            <div class="col-md-12 mt-3">
              <label for="validationCustom01" class="form-label">Description</label>
              <input type="text" class="form-control" name="description"  required>
            </div>
            <div class="col-md-12 mt-3">
              <label for="validationCustom01" class="form-label">Posted By</label>
              <input type="text" class="form-control" name="posted_by"  required>
            </div>
            <div class="col-md-12 mt-3">
              <label for="validationCustom01" class="form-label">Blog Content</label>
              <textarea name="blog_content" id="blog_content_editor" rows="9" required></textarea>
            </div>

          </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-dismiss="modal">Close</button>
          <button class="btn btn-sm btn-primary" type="submit">Save</button>
        </div>
      </form>
    </div>
  </div><!-- End Large Modal-->