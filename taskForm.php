<?php
    $a=Date("Y-m-d");
    $b=Date("H:i");
    $c=$a."T".$b;
//2016-03-23T00:00:50
/*<?$a?>T<?$b?>*/
?>
<form id="task_form" action="index.php" method="post">
    Task:<br>
    <input type="text" name="task" required=>
    <br>
    Date:<br>
    <input type="datetime-local" name="date" min="<?=$c?>" required>
    <br>
    <input type="submit" name="submit_task" value="Save">
</form>