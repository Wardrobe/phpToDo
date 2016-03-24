<?php
    include_once 'Task.php';

    if(isset($_POST['submit_task'])) {
        $formText = $_POST['task'];
        $formTime = $_POST['date'];
        Tasks::createNewTask($formText,$formTime);
    }

    if(isset($_POST['submit_subtask'])) {
        $formText = $_POST['task'];
        $formTime = $_POST['date'];
        $formTaskID = $_POST['taskID'];
        $task = Tasks::getTaskByID($formTaskID);
        $task->createNewSubTask($formText,$formTime);
}




?>