<?php

?>
<!DOCTYPE html>
    <html>
    <head>
        <title>To do list</title>
        <meta charset="UTF-8">
        <meta name="author" content="Trajko,Filip,Otas,Dule legenda">
        <meta name="description" content="To do list / Lista stvari za uraditi">
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
                $('#datefromparent').click(function() {
                    // alert($(this).prop('checked'));
                    if ($(this).is(':checked') == true) {
                        $('#datesubtask').val("2017-03-23T00:00:50");
                        $('#datesubtask').prop('disabled', true);
                    }else{
                        $('#datesubtask').prop('disabled', false);
                    }
                });
            });
        </script>
    </head>
    <body>

         <input type="checkbox" checked onclick="return false">
            <br>
         <?php include 'taskForm.php';?>
         <?php include 'subtaskForm.php';?>
    </body>
    </html>