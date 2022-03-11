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
        
        $('.open-modal').click(function(event) {

            let modal = $('#sliderBannerModal');

            let modal_type = $(this).attr('modal-type');

            clearInputs();
            removePasswordHtml();

            if (modal_type == 'create') {

                modal.find('.modal-title').text('Add');
                modal.find('form').attr('action', "{{route('slider-banner.store')}}");

                modal.find('[name=image]')[0].setAttribute('required', '');
            }
            else {
                modal.find('.modal-title').text('Update');
                
                let data = JSON.parse($(this).attr('data-info'));
                
                modal.find('form').attr('action', "/slider-banner/update/"+data.id);

                modal.find('[name=title]').val(data.title);
                modal.find('[name=description]').val(data.description);
                modal.find('[name=link]').val(data.link);
                modal.find('[name=image]')[0].removeAttribute('required');
            }
            

        });
    });
</script>