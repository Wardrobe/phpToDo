<?php
    include_once 'Task.php';

    if(isset($_POST['submit_task'])) {
        $formText = $_POST['task'];
        $formTime = $_POST['date'];
        Tasks::createNewTask($formText,$formTime);
    }



?>