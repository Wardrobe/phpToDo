<?php
    include 'SubtaskFormObject.php';

    class Tasks{
        static public $tasks=array();
        static public $changed;
        // puni i task i subtask u nizove
//        function loadChanged(){
//            if(isset($_SESSION['changed'])){
//                $changed=$_SESSION['changed'];
//            }
//        }
        function __construct()
        {
            if(!isset($_SESSION['edited']) or $_SESSION['edited']==true)
                $this->loadTasks();
                $this->findExpired();
        }

    function loadTasks(){
//            if(isset($_SESSION['edited']) && $_SESSION['edited'] == false) {
//                return;
//            }
//            $_SESSION['edited'] = false;
            self::$changed=false;
            include_once 'connection.php';
            global $conn;
            $sqltask = "select * from task";

            $query_run = $conn->query($sqltask);

            if($query_run) {
                while ($row = $query_run->fetch_assoc()) {
                    $sqlSubTask = "select * from subtask where TaskID =". $row['TaskID'];
                        $subTaskRow = array();
                    $query_run_subtask = $conn->query($sqlSubTask);
                    if($query_run_subtask) {

                        while ($rowSubtask = $query_run_subtask->fetch_assoc()) {
                            $subTaskRow[] = new SubTask($rowSubtask['SubTaskID'], $rowSubtask['TaskID'],
                                $rowSubtask['SubTaskText'],$rowSubtask['SubTaskDateTime'], $rowSubtask['SubTaskDone'] );
                        }
                    }
//                    else { mysqli_error();}
                    self::$tasks[] = new MainTask($row['TaskID'],$row['TaskText'], $row['TaskDateTime'],
                        $row['TaskDone'],$subTaskRow);
                }
            }

//            else { mysqli_error();}

        }

        static function createNewTask($text,$time){
            $mainTask = new MainTask(null,$text,$time,false,null);
            self::$tasks[]= $mainTask;
            $mainTask->createNewTaskInDatabase();
            self::$changed=true;

        }

        static function findExpired() {
            $today = new DateTime();
            foreach(self::$tasks as $oneTask) {
                if($oneTask->time < $today) {
                    $oneTask-> expired = true;
                }else { $oneTask-> expired = false;

                }

            }
        }
        function getTaskById($id){
            foreach(self::$tasks as $task){
                if($task->taskID==$id) return $task;
            }
        }
        public function allTasksToHTML(){
            $toHTML="";
            foreach(self::$tasks as $oneMainTask){
                $toHTML=$toHTML.$oneMainTask->taskToHTML();
            }
            return $toHTML;
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
            $this->taskID=$taskID;
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
            parent::__construct($taskID,$text,$time,$done);
            $this->subTasks=$subTasks;
        }
        function createNewSubtask($text,$time)
        {
            $subtask=new SubTask(count($this->subTasks),$this->taskID, $text, $time,false);
            $this->subTasks[] = $subtask;
            Tasks::$changed=true;
            return $subtask;

        }
        function createNewTaskInDatabase(){
            include_once 'connection.php';
            global $conn;
            $Date = date('Y-m-d H:i:s', strtotime($this->time . ":00"));
            $sql="INSERT INTO Task VALUES (NULL ,'$this->text','$Date',0)";
            if ($conn->query($sql) === TRUE) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
//            $conn->query($sql);
            $conn->close();
        }

        function taskToHTML(){ //mora da predje u toString 99%
            $toHTML="<div class=\"task\"><h4>$this->taskID.</h4>";
            if($this->expired == true and ($this->done == false)) {
                $toHTML=$toHTML.'<input type="checkbox" onclick="return false"';
            } if($this->done == true){
                $toHTML=$toHTML.'<input type="checkbox" checked onclick="return false"';//moze js kao isteklo je
            } else {
                $toHTML=$toHTML.'<input type="checkbox" onclick="return false">';
            }
            $toHTML=$toHTML.'<h4>'.$this->text.'</h4>'.'<h4>'.$this->time.'</h4><div id="subtasks">';
            foreach($this->subTasks as $oneSubtask){
                $toHTML=$toHTML.$oneSubtask->subtaskToHTML();
            }
            $z=explode(" ",$this->time);
            return $toHTML.new SubtaskFormObject($this->taskID,$z[0]."T".$z[1])."</div></div>";
        }

    }


    class SubTask extends Task{
        public $subTaskID;
        function __construct($subTaskID,$taskID,$text,$time,$done)
        {
            parent::__construct($taskID,$text,$time,$done);
            $this->subTaskID=$subTaskID;

        }
        function createNewTaskInDatabase(){
            include_once 'connection.php';
            global $conn;
            $sql="INSERT INTO SubTask VALUES ('$this->taskID', NULL ,'$this->text','$this->time',0)";


            $result=$conn->query($sql);
            $conn->close();
        }
        function subtaskToHTML(){
            $subtaskHTML='<h4>'.$this->taskID.'</h4>';
            if($this->expired == true and ($this->done == false)) {
                $subtaskHTML=$subtaskHTML.'<input type="checkbox" onclick="return false"';
            } if($this->done == true){
                $subtaskHTML=$subtaskHTML.'<input type="checkbox" checked onclick="return false"';//moze js kao isteklo je
            } else {
                $subtaskHTML=$subtaskHTML.'<input type="checkbox" onclick="expiration.js">';
            }
            $subtaskHTML=$subtaskHTML.'<h4>'.$this->text.'</h4>'.'<h4>'.$this->time.'</h4><br>';
            return $subtaskHTML;
        }
    }
?>