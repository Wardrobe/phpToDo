<?php
        session_start();
       
        include_once 'Task.php';
         $tasks1 = new Tasks();
         $_SESSION['tasks'] = serialize($tasks1);
        include_once 'FormCommunication.php';
        include_once 'connection.php';

?>
<!DOCTYPE html>
    <html>
    <head>
        <title>To do list</title>
        <meta charset="UTF-8">
        <meta name="author" content="Trajko,Filip,Otas,Dule legenda">
        <meta name="description" content="To do list / Lista stvari za uraditi">
        <link rel="stylesheet" type="text/css" href="mycss.css">

    </head>
    <body>
    <?php
    echo $tasks1->allTasksToHTML();
    include_once "taskForm.php";
    ?>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script type="text/javascript">
        /*$(document).ready(function(){
         $('#datefromparent').click(function() {
         // alert($(this).prop('checked'));
         if ($(this).is(':checked') == true) {
         $('#datesubtask').val(document.getElementById("parent_date").value);
         $('#datesubtask').prop('disabled', true);
         }else{
         $('#datesubtask').prop('disabled', false);
         }
         });
         });*/

        function setAsParent(par1,par2,par3){



                // alert($(this).prop('checked'));
                if ($(par1).is(':checked') == true) {
                    $(par2).val(document.getElementById(par3).value);
                    $(par2).prop('disabled', true);
                }else{
                    $(par2).prop('disabled', false);
                }
        }

        $(document).ready(function(){
            $('.show_hide').click(function(){
                $(this).next('#slidingDiv').slideToggle();
                return false;
            });
        });
    </script>

    </body>
    </html>