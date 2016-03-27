<?php
    $c=Date("Y-m-d")."T".Date("H:i");
?>

<form name="subtaskForm" action="<?$_SERVER['PHP_SELF']?>" method="post">
    Subtask:<br>
    <input type="text" name="task" id="ab" required>
    <br>
    Date:<br>
    <input type="datetime-local" name="date" min="<?=$c?>" id="datesubtask"> or
    <input type="checkbox" id="datefromparent" required>Same as parent</input>
    <br>
    <input type="submit" name="submit_subtask" value="Save">
    <br>
</form>