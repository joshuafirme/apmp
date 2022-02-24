<div class="modal fade" id="sendMailModal" tabindex="-1">
  <div class="modal-dialog modal-lg">
    <form action="#" method="post" class="modal-content" id="send-mail-form">
      @csrf
      <div class="modal-header">
        <h5 class="modal-title">Send Email</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <div class="modal-body row g-3 ">
              <div class="col-md-12">
                <label for="validationCustom01" class="form-label">Subject</label>
                <input type="text" class="form-control" name="subject"  required>
              </div>
              <div class="col-md-12">
                <label for="validationCustom02" class="form-label">Message</label>
                <textarea rows="4" type="text" class="form-control" name="message" required></textarea>
              </div>
              <div class="col-md-12" id="result-message">
              </div>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-dismiss="modal">Close</button>
        <button class="btn btn-sm btn-primary" id="btn-submit" type="submit"><i class="bi bi-telegram"></i> Send</button>
      </div>
    </form>
  </div>
</div><!-- End Large Modal-->