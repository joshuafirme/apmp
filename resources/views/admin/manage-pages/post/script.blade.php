<script>
    $(function(){
        "use strict";

        function clearInputs() {
            $('[name=title]').val('');
            $('[name=description]').val('');
            $('[name=link]').val('');
        }

        function removePasswordHtml() {
            $('#change-password').remove();
        }
        
        $('.open-modal').click(function(event) {

            let el = $(this);

            let post_text = el.attr('post-text');
            let category = el.attr('category');

            $('[name=category]').val(category);
            
            let modal = $('#postModal');
            modal.modal('show');


            let modal_type = $(this).attr('modal-type');

            clearInputs();

            if (modal_type == 'create') {

                modal.find('.modal-title').text('Create ' + post_text);
                modal.find('form').attr('action', "{{route('post.store')}}");

            }
            else {
                modal.find('.modal-title').text('Update ' + post_text);

                let data = JSON.parse(el.attr('data-info'));
         
                $('[name=title]').val(data.title);
                $('[name=description]').val(data.description);
                $('[name=link]').val(data.link);
                
                modal.find('form').attr('action', "/post/update/"+data.id);
            }
            

        });
    });
</script>