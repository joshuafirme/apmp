
<!-- Vendor JS Files -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>


<script type="text/javascript" src="{{asset('assets/vendor/richtexteditor/rte.js')}}"></script>  
<script type="text/javascript" src='{{asset('assets/vendor/richtexteditor/plugins/all_plugins.js')}}'></script>  

<script>
    $(function(){
        if ($('#rich_text_editor').length > 0) {
        var editor1 = new RichTextEditor("#rich_text_editor"); 
    }
    }); 
  </script>

<!-- Template Main JS File -->
<script src="{{asset('assets/js/main.js')}}"></script>