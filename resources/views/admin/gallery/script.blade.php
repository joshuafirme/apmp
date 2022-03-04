<script>
    $(function(){
        "use strict";

        $('#form-get-fb-photos').submit(function(event) {
            $('.btn-get-photos').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');
            $('.btn-get-photos').prop('disabled', true);
            $.ajax({
                type: 'POST',
                url: '/manage-site/gallery/fb-photos-sync',
                data: $(this).serialize()
            })
            .done(function(data){
				$('.btn-get-photos').html('Get Photos <i class="bx bx-sync"></i>');
                $('.btn-get-photos').prop('disabled', false);
                alert( "Data from FB photos was successfully synced!" );
                location.reload();
            })
            .fail(function() {
				$('.btn-get-photos').html('Get Photos <i class="bx bx-sync"></i>');
                $('.btn-get-photos').prop('disabled', false);
                alert( "Posting failed. Please try again." );
            });

            return false;
        });



        function clearInputs() {
            $('[name=name]').val('');
            $('[name=description]').val('');
            $('[name=link]').val('');
            $('[name=image]').val('');
        }

        function removePasswordHtml() {
            $('#change-password').remove();
        }
        
        $('.open-modal').click(function(event) {

            let modal = $('#galleryModal');
            modal.modal('show');

            let modal_type = $(this).attr('modal-type');

            clearInputs();
            removePasswordHtml();

            if (modal_type == 'create') {

                modal.find('.modal-title').text('Add');
                modal.find('form').attr('action', "{{route('gallery.store')}}");

                modal.find('[name=image]')[0].setAttribute('required', '');
            }
            else {
                modal.find('.modal-title').text('Update');
                
                let data = JSON.parse($(this).attr('data-info'));
                
                modal.find('form').attr('action', "/manage-site/gallery/update/"+data.id);

                modal.find('[name=name]').val(data.name);
                modal.find('[name=description]').val(data.description);
                modal.find('[name=link]').val(data.link);
                modal.find('[name=image]')[0].removeAttribute('required');
            }
            

        });

        $(document).on('click', '#change-password .btn-change-pass',function() {
            $(this).remove();
            let change_pass_html = '<div><label class="mt-2">New Password</label>';
                change_pass_html += '<div class="d-flex">';
                change_pass_html +=    '<input type="password" class="form-control" name="password" autocomplete="new-password" required>';
                change_pass_html +=    '<a class="btn btn-sm btn-danger" id="btn-cancel">Cancel</a>';
                change_pass_html += '</div></div>';

            $('#change-password').append(change_pass_html);
        });

        $(document).on('click', '#btn-cancel',function(event) {
            $(this).parent().parent().remove();
            $(this).remove();
            let change_pass_html = '<div class="d-flex col-12">';
                change_pass_html +=        '<a class="btn btn-sm btn-primary btn-change-pass">Change password</a>';
                change_pass_html +=    '</div>';

            $('#change-password').append(change_pass_html);
        });
    });
</script>