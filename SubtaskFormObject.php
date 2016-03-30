<?php


class SubtaskFormObject
{
    private $taskParentID;
    private $taskParentDate;

    public function __construct($taskParentID,$taskParentDate)
    {
        $this->taskParentID=$taskParentID;
        $this->taskParentDate=$taskParentDate;
    }

    function __toString()
    {
        $a="";
        $c=Date("Y-m-d")."T".Date("H:i");
        if(isset($this->taskParentDate) and isset($this->taskParentID))
        {
            $a="<button type='button' class='show_hide'>+</button>
            <form name=\"subtaskForm\" action=".$_SERVER['PHP_SELF']." method=\"post\" id='slidingDiv'>
                    Subtask:<br>
                    <input type=\"text\" name=\"task\" id=\"ab\" required>
                    <br>
                    Date:<br>
                    <input type=\"hidden\" name=\"country\" value=".$this->taskParentID.">
                    <input type=\"hidden\" name=\"country\" value=".$this->taskParentDate.">
                    <input type=\"datetime-local\" name=\"date\" min=".$c." id=\"datesubtask\"> or
                    <input type=\"checkbox\" id=\"datefromparent\" required>Same as parent</input>
                    <br>
                    <input type=\"submit\" name=\"submit_subtask\" value=\"Save\">
                    <br>
                </form>";
        }
        return $a;
    }

}