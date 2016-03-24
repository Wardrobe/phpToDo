<?php
?>
<form action=".$_SERVER['PHP_SELF']." method=\"post\>
    Task:<br>
    <input type="text" name="task" required=>
    <br>
    Date:<br>
    <input type="datetime-local" name="date" min="2016-03-23T00:00:50" required>
    <br>
    <input type="submit" name="submit_task" value="Save">
</form>