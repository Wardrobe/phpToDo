<?php
    class Tasks{
        static public $tasks=array();
         static public $changed;
        // puni i task i subtask u nizove
        function loadTasks(){
            $sqltask = "select * from task";
            $query_run = mysqli_query($sqltask);
            if($query_run) {
                while ($row = mysqli_fetch_assoc($query_run)) {
                    $sqlSubTask = "select * from 'subtask' where TaskID =". $row['TaskID'];
                        $subTaskRow = array();
                    $query_run_subtask = mysqli_query($sqlSubTask);
                    if($query_run_subtask) {
                        while ($rowSubtask = mysqli_fetch_assoc($query_run_subtask)) {
                            $subTaskRow[] = new SubTask($rowSubtask['SubTaskID'], $rowSubtask['TaskID'],
                                $rowSubtask['SubTaskText'],$rowSubtask['SubTaskDateTime'], $rowSubtask['SubTaskDone'] );
                        }
                    }else { mysqli_error();}
                    $this::tasks[] = new MainTask($row['taskID'],$row['text'], $row['time'],
                        $row['TaskDone'],$subTaskRow);
                }
            }else { mysqli_error();}
        }

        function createNewTask($text,$time){
            $this::tasks[]=new MainTask($this->tasks.count(),$text,$time,false,null);
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
        function getTaskById($id){
            foreach($this::tasks as $task){
                if($task->taskID==$id) return $task;
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