<?php
    class Tasks{
        public $tasks=array();
        public $changed;
        function loadTasks(){
            
        }

        function createNewTask($text,$time){
            $this->tasks[]=new MainTask($this->tasks.count(),$text,$time,false,null);
        }

        function findExpired() {
            $today = new DateTime();
            foreach($this->tasks as $oneTask) {
                if($oneTask->time < $today) {
                    $oneTask-> expired = true;
                }else { $oneTask-> expired = false;
                }
            }
        }


    }
    abstract class Task{
        public $taskID;
        public $text;
        public $time;
        public $done;
        public $expired;

        function __construct($taskID,$text,$time,$done)
        {
            $this->$taskID=$taskID;
            $this->text=$text;
            $this->time=$time;
            $this->done=$done;
        }

        abstract function createNewTaskInDatabase();
    }



    class MainTask extends Task{
        public $subTasks=array();
        function __construct($taskID,$text,$time,$done,$subTasks)
        {
           super($taskID,$text,$time,$done);
            $this->subTasks=$subTasks;
        }
        function createNewSubtask($text,$time)
        {
            $this->subTasks[] = new SubTask($this->subTasks.count(),$this->taskID, $text, $time,false);

        }
        function createNewTaskInDatabase(){
            include_once "connection.php.php";
            $sql="INSERT INTO Task VALUES ($this->taskID,$this->text,$this->date,$this->done";
            $result=$conn->query($sql);
            $conn->close();
        }

    }


    class SubTask extends Task{
        public $subTaskID;
        function __construct($subTaskID,$taskID,$text,$time,$done)
        {
            super($taskID,$text,$time,$done);
            $this->$subTaskID=$subTaskID;

        }
        function createNewTaskInDatabase(){
            include_once "connection.php.php";
            $sql="INSERT INTO SubTask VALUES ($this->taskID,$this->subTaskId,$this->text,$this->date,$this->done)";
            $result=$conn->query($sql);
            $conn->close();
        }
    }
?>