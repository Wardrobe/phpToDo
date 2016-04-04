<?php
        session_start();
       
        include_once 'Task.php';
         $tasks1 = new Tasks();
         $_SESSION['tasks'] = serialize($tasks1);
        include_once 'FormCommunication.php';
        include_once 'connection.php';
        //include 'SubtaskFormObject.php';
       
       

?>
<!DOCTYPE html>
    <html>
    <head>
        <title>To do list</title>
        <meta charset="UTF-8">
        <meta name="author" content="Trajko,Filip,Otas,Dule legenda">
        <meta name="description" content="To do list / Lista stvari za uraditi">
        <link rel="stylesheet" type="text/css" href="mycss.css">
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
        <script>
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


                    $(par1).click(function() {
                        // alert($(this).prop('checked'));
                        if ($(this).is(':checked') == true) {
                            $(par2).val(document.getElementById(par3).value);
                            $(par2).prop('disabled', true);
                        }else{
                            $(par2).prop('disabled', false);
                        }
                    });
            }

            $(document).ready(function(){
                $('.show_hide').click(function(){
                    $(this).next('#slidingDiv').slideToggle();
                    return false;
                });
            });
        </script>
    </head>
    <body>

    <?=$tasks1->allTasksToHTML()?>
    <?=include 'taskForm.php'; ?>
<!--         --><?php
////         include('Task.php');
////         include('subtasksTest.php');
//
//         $sub1 = new Subtask();
//         $sub1->taskID = 1;
//         $sub1->expired = false;
//         $sub1->name = "SUB1";
//         $sub1->time = "time";
//         $sub2 = new Subtask();
//         $sub2->taskID = 2;
//         $sub2->expired = false;
//         $sub2->name = "SUB2";
//         $sub2->time = "timee";
//         $sub3 = new Subtask();
//         $sub3->taskID = 3;
//         $sub3->expired = false;
//         $sub3->name = "SUB3";
//         $sub3->time = "timeee";
//
//         $tsk1 = new MainTask();
//         $tsk1->taskID = 1;
//         $tsk1->expired = false;
//         $tsk1->name = "TSK1";
//         $tsk1->time = "timetsk1";
//         $tsk1->subtasks = array($sub1, $sub2, $sub3);
//
//         $tsk2 = new MainTask();
//         $tsk2->taskID = 2;
//         $tsk2->expired = false;
//         $tsk2->name = "TSK2";
//         $tsk2->time = "timetsk2";
//         $tsk2->subtasks = array($sub1, $sub2, $sub3);
//
//         $tasks = array();
//         $tasks[] = $tsk1;
//         $tasks[] = $tsk2;
//         ?>
<!---->
<!--         --><?php
//         foreach ($tasks as $task) {
//             echo '<div class="task">';
//             echo '<h4>'.$task->taskID.'</h4>';
//
//             if($task->expired == true) {
//                 echo '<input type="checkbox" checked onclick="return false"';
//             } else {
//                 echo '<input type="checkbox" onclick="expiration.js">';
//             }
//
//             echo '<h4>'.$task->name.'</h4>'.'<h4>'.$task->time.'</h4>';
//             echo '<div class="subtask">';
//             foreach ($task->subtasks as $subtask) {
//                 echo '<h4>'.$subtask->taskID.'</h4>';
//
//                 if($subtask->expired == true) {
//                     echo '<input type="checkbox" checked onclick="return false"';
//                 } else {
//                     echo '<input type="checkbox" onclick="expiration.js">';
//                 }
//
//                 echo '<h4>'.$subtask->name.'</h4>'.'<h4>'.$subtask->time.'</h4><br>';
//
//             }
//             echo '</div>';
//             echo '</div>';
//         }
//         ?>
    </body>
    </html>