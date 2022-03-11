<script>
    $(function(){
        "use strict";

        var blog_content_editor = new RichTextEditor("#blog_content_editor"); 

        function clearInputs() {
            $('[name=title]').val('');
            $('[name=description]').val('');
            $('[name=posted_by]').val('');
            blog_content_editor.setHTMLCode('');     
        }
        
        $('.open-modal').click(function(event) {

            let modal = $('#blogModal');
            modal.modal('show');

            let modal_type = $(this).attr('modal-type');

            clearInputs();

            if (modal_type == 'create') {

                modal.find('.modal-title').text('Create Blog');
                modal.find('form').attr('action', "{{route('blog.store')}}");

            }
            else {
                modal.find('.modal-title').text('Update Blog');

                let data = JSON.parse($(this).attr('data-info'));
                
                modal.find('form').attr('action', "/blog/update/"+data.id);
                modal.find('[name=title]').val(data.title);
                modal.find('[name=description]').val(data.description);
                modal.find('[name=posted_by]').val(data.posted_by);
                blog_content_editor.setHTMLCode(data.blog_content);         

            }
            

        });
    });
</script>