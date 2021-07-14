<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Example of Bootstrap Popover with Close Button</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap-confirmation2/dist/bootstrap-confirmation.min.js"></script>
    <script>
        $(document).ready(function(){
            $('[data-toggle="popover"]').popover({
                placement : 'top',
                html : true,
                title : 'User Info <a href="#" class="close" data-dismiss="alert">&times;</a>',
                content : '<div class="media"><img src="/examples/images/avatar-tiny.jpg" class="mr-3" alt="Sample Image"><div class="media-body"><h5 class="media-heading">Jhon Carter</h5><p>Excellent Bootstrap popover! I really love it.</p></div></div>'
            });
            $(document).on("click", ".popover .close" , function(){
                $(this).parents(".popover").popover('hide');
            });
        });
    </script>
    <script>

    </script>
    <script>
        $(function() {
            $('body').confirmation({
                selector: '[data-toggle="confirmation"]'
            });

            $('.confirmation-callback').confirmation({
                onConfirm: function(event, element) { alert('confirm') },
                onCancel: function(event, element) { alert('cancel') }
            });
        });
    </script>
    <style>
        .bs-example{
            margin: 200px 150px 0;
        }
        .popover-title .close{
            position: relative;
            bottom: 3px;
        }
    </style>
</head>
<body>




<div class="bs-example">
    <a href="#confirm" class="btn btn-default confirmation-callback">Click me</a>
    <a href="http://google.com" class="btn" data-toggle="confirmation">Confirmation</a>
    <button class="btn btn-default" data-toggle="confirmation">Confirmation</button>
    <button type="button" class="btn btn-primary" data-toggle="popover">Click Me</button>
</div>
</body>
</html>