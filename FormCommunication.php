<?php

//    include_once 'Task.php';

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
        $dateArray = explode('T',$formTime);
        $datefirst= explode('-',$dateArray[0]);

        $dateForDatabase = $datefirst[2]."-".$datefirst[1]."-".$datefirst[0]." ".$dateArray[1].":00";
        $formTaskID = $_POST['taskID'];
        $tasks = unserialize($_SESSION['tasks']);
        $task = $tasks->getTaskByID($formTaskID);
        $subtask=$task->createNewSubTask($formText,$dateForDatabase);
        $subtask->createNewTaskInDatabase();
        // ovo dalje je u eksperimentalnoj fazi
        echo $dateForDatabase;

        $_SESSION["edited"] = true;

}




?>