<?php

    include_once 'Task.php';

    if(isset($_POST['submit_task'])) {
        $formText = $_POST['task'];
        $formTime = $_POST['date'];
        Tasks::createNewTask($formText,$formTime);

        // ovo dalje je u eksperimentalnoj fazi

        $_SESSION["edited"] = true;
    }

    if(isset($_POST['submit_subtask'])) {
        $formText = $_POST['task'];
        $formTime = $_POST['date'];
        $formTaskID = $_POST['taskID'];
        $task = Tasks::getTaskByID($formTaskID);
        $task->createNewSubTask($formText,$formTime);

        // ovo dalje je u eksperimentalnoj fazi

        $_SESSION["edited"] = true;

}




?>