<?php
?>

<form name="subtaskForm" action="<?$_SERVER['PHP_SELF']?>" method="post">
    Subtask:<br>
    <input type="text" name="task" required>
    <br>
    Date:<br>
    <input type="datetime-local" name="date"> or <input type="checkbox" id="A" required>Same as parent</input>
    <br>
    <input type="submit" name="submit_subtask" value="Save">
    <br>
</form>