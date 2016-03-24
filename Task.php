<?php
    class Tasks{


    }
    class Task{
        public $taskID;
        public $name;
        public $text;
        public $time;
        public $subTasks;
        function __construct($taskID,$name,$text,$time)
        {
            $this->$taskID=$taskID;
            $this->name=$name;
            $this->text=$text;
            $this->time=$time;
            $this->importIntoDatabase();
        }

        function importIntoDatabase(){
            include_once "connection.php.php";
            $sql="INSERT INTO Stavka VALUES (null,$this->name,$this->text,$this->date)";
            $result=$conn->query($sql);
            $conn->close();
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
?>