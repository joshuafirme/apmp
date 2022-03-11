<script>
    $(function(){
        "use strict";

        function clearInputs() {
            $('[name=name]').val('');
            $('[name=description]').val('');
            $('[name=image]').val('');   
        }
        
        $('.open-modal').click(function(event) {

            let modal = $('#downloadModal');
            modal.modal('show');

            let modal_type = $(this).attr('modal-type');

            clearInputs();

            if (modal_type == 'create') {

                modal.find('.modal-title').text('Create download');
                modal.find('form').attr('action', "{{route('downloads.store')}}");
                modal.find('[name=image]')[0].setAttribute('required', '');
            }
            else {
                modal.find('.modal-title').text('Update download');

                let data = JSON.parse($(this).attr('data-info'));
                
                modal.find('form').attr('action', "/downloads/update/"+data.id);
                modal.find('[name=name]').val(data.name);
                modal.find('[name=description]').val(data.description);
                modal.find('[name=image]')[0].removeAttribute('required');
            }
            

        });
    });
</script>