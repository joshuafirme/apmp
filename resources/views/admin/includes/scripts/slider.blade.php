<script>
    $(function(){
        "use strict";



        function clearInputs() {
            $('[name=title]').val('');
            $('[name=description]').val('');
            $('[name=link]').val('');
            $('[name=image]').val('');
        }

        function removePasswordHtml() {
            $('#change-password').remove();
        }
        
        $('#btn-add-slider').click(function(event) {

            let modal = $('#sliderModal');

            let modal_type = $(this).attr('modal-type');

            clearInputs();
            removePasswordHtml();

            if (modal_type == 'create') {

                modal.find('.modal-title').text('Add');
                modal.find('form').attr('action', "{{route('slider.store')}}");

                modal.find('[name=image]')[0].setAttribute('required', '');
            }
            

        });
    });
</script>