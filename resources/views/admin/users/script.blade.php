<script>
    $(function(){
        "use strict";

        $('#btn-create').click(function(event) {

            let modal = $('#userModal');
            modal.find('.modal-title').text('Create User');

            modal.find('form').attr('action', "{{route('users.store')}}");

        });

        
        $('.btn-edit').click(function(event) {

            let modal = $('#userModal');
            modal.modal('show');
            modal.find('.modal-title').text('Update User');
            
            let data = JSON.parse($(this).attr('data-info'));
            let name = data.name.split(' ')
            
            modal.find('form').attr('action', "/user/update/"+data.id);

            modal.find('[name=firstname]').val(name[0]);
            modal.find('[name=middlename]').val(name[1]);
            modal.find('[name=lastname]').val(name[2]);
            modal.find('[name=email]').val(data.email);
            modal.find('[name=access_level]').val(data.access_level);

        });

        $('#change-password button').click(function(event) {
            $(this).remove();
            let change_pass_html = '<div class="d-flex col-12">';
                change_pass_html +=    '<input type="password" class="form-control name="password" autocomplete="new-password" placeholder="New password" required>';
                change_pass_html +=        '<a class="btn btn-sm btn-danger" id="btn-cancel">Cancel</a>';
                change_pass_html +=    '</div>';

            $('#change-password').append(change_pass_html);
        });

        $('#btn-cancel').click(function(event) {
            $(this).closest('input').remove();
            $(this).remove();
            let change_pass_html = '<div class="d-flex col-12">';
                change_pass_html +=        '<a class="btn btn-sm btn-danger">Change password</a>';
                change_pass_html +=    '</div>';

            $('#change-password').append(change_pass_html);
        });

        

        /*$('#user-form').submit(function(event) {
                event.preventDefault();
                $('#btn-submit').html("Please wait...");

                $.ajax({
                    type: 'POST',
                    url: '/users/store',
                    data: $(this).serialize()
                })
                .done(function(data){
                    console.log(data)
                    $('#btn-submit').html("Save");
                    setTimeout(() => {
                        location.reload();
                    }, 1000);
                })
                .fail(function() {
                    alert( "Posting failed. Please try again." );
                });

                return false;
        });*/
    });
</script>