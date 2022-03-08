@include('admin.includes.scripts.tinymce')

<script>
    $(function(){
        "use strict";

        $('#send-mail-form').submit(function(event) {
                event.preventDefault();
                let btn = $('#btn-submit');
                btn.prop('disabled', true);
                btn.html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');

                $.ajax({
                    type: 'POST',
                    url: '/subscriber/send-bulk-mail',
                    data: $(this).serialize()
                })
                .done(function(data){
                    console.log(data)
                    if (data.status == 'success') {
                        if (data.sent_count > 0) {
                            $('#result-message').html('<span class="badge bg-success float-end"><i class="bi bi-check-circle me-1"></i> '+data.sent_count+'/'+data.out_of+' Mail Sent!</span>');
                        }
                    }
                    else {
                        alert( "Sending failed. Please try again." );
                    }
                    
                    btn.prop('disabled', false);
                    btn.html('<i class="bi bi-telegram"></i> Send');

                })
                .fail(function() {
                    alert( "Sending failed. Please try again." );
                    btn.prop('disabled', false);
                    btn.html('<i class="bi bi-telegram"></i> Send');
                });

                return false;
        });
    });
</script>