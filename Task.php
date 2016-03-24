<?php
    class Tasks{
        public $tasks;
        function loadTasks(){
            
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
    class Task{
        public $taskID;
        public $name;
        public $text;
        public $time;
        public $subTasks;

        public $done;

        public $expired;

        function __construct($taskID,$name,$text,$time)
        {
            $this->$taskID=$taskID;
            $this->name=$name;
            $this->text=$text;
            $this->time=$time;
            $this->subTasks=array();
        }

        function importIntoDatabase(){
            include_once "connection.php.php";
            $sql="INSERT INTO Task VALUES (null,$this->name,$this->text,$this->date)";
            $result=$conn->query($sql);
            $conn->close();
        }

        function createNewSubtask($name,$text,$time)
        {
            $subTasks[] = new SubTask($name, $text, $time);

        }

//        function selectFromDatabase(){
//            include_once "connection.php";
//            $sql="Select * from Stavka";
//            $result=$conn->query($sql);
//            if ($result->num_rows > 0) {
//                while($row = $result->fetch_assoc()) {
//                   $this->taskID=row['StavkaID'];
//                    $this->name=row['ImeStavke'];
//                    $this->text=row['TekstStavke'];
//                    $this->time=row['Vreme'];
//                }
//            } else {
//                echo "0 results";
//            }
//            $conn->close();
//        }
    }
    class SubTask{
        public $subTaskID;
        public $taskID;
        public $name;
        public $text;
        public $time;
        public $done;
        function __construct($subTaskID,$taskID,$name,$text,$time)
        {

        }
    }
?>