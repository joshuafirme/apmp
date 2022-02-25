<!-- Delete modal -->
<div class="modal fade" id="delete-record-modal" tabindex="-1">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Confirm Delete</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <p><small>You are going to delete this data. All contents related with this data will be lost. Do you want to delete it?</small></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-dismiss="modal">Close</button>
          <button class="btn btn-sm btn-danger delete-record-btn">Yes</button>
        </div>
      </div>
    </div>
</div>

<!-- Delete script -->
<script>
    $(function(){
        'use strict'

        $(document).on('click', '.delete-record', function(){
            var id = $(this).attr('data-id');
            var object = $(this).attr('object');
   
            $("#delete-record-modal").attr("record-id", id);
            $("#delete-record-modal").attr("object", object);
        });

        $(document).on('click', '.delete-record-btn', function(){
            var id = $('#delete-record-modal').attr('record-id');
            var object = $('#delete-record-modal').attr('object');
            var btn = $(this);
            btn.html('Please wait...');
            $.ajax({
                url: `/`+object+`/`+id,
                data: {
                    "_token": "{{ csrf_token() }}"
                },
                type: 'DELETE',
                success: function(result) {
                    if(result.status == "success"){
                        $("#record-id-"+id).fadeOut(100);
                        btn.html('Yes');
                        $('#delete-record-modal').modal('hide');
                    }else{
                        alert("Deletion failed.");
                    }
                }
            });
        });
    });
</script>