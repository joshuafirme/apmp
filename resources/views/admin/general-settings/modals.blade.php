<div class="modal fade" id="userModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Create User</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="#" method="post" class="row g-3 needs-validation">
              @csrf
                <div class="col-md-4">
                  <label for="validationCustom01" class="form-label">First name</label>
                  <input type="text" class="form-control" name="firstname"  required>

                </div>
                <div class="col-md-4">
                  <label for="validationCustom02" class="form-label">Last name</label>
                  <input type="text" class="form-control" name="lastname" required>

                </div>
                <div class="col-md-4">
                  <label for="validationCustom02" class="form-label">Middle name</label>
                  <input type="text" class="form-control" name="middlename">

                </div>
                <div class="col-md-6">
                  <label for="validationCustom02" class="form-label">Email</label>
                  <input type="text" class="form-control" name="email" required>

                </div>
                <div class="col-md-6">
                  <label for="validationCustom02" class="form-label">Password</label>
                  <input type="password" class="form-control" name="password" required>

                </div>
                <div class="col-md-6 mb-2">
                  <label for="validationCustom04" class="form-label">Access Level</label>
                  <select class="form-select" name="access_level" id="validationCustom04" required>
                    <option selected disabled value="">Choose...</option>
                    <option value="2">Support</option>
                    <option value="1">Admin</option>
                  </select>
                  <div class="invalid-feedback">
                    Please select a valid state.
                  </div>
                </div>

                <div class="col-md-6" id="change-password">
                  <button class="btn btn-sm btn-primary" type="submit">Change Password</button>
                </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-dismiss="modal">Close</button>
          <button class="btn btn-sm btn-primary" type="submit">Save</button>
        </form><!-- End Custom Styled Validation -->
        </div>
      </div>
    </div>
  </div><!-- End Large Modal-->