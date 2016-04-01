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
                    <input type=\"text\" name=\"task\" id=\"\" required>
                    <br>
                    Date:<br>
                    <input type=\"hidden\" name=\"taskID\" value=".$this->taskParentID.">
                    <input type=\"hidden\" name=\"datefromparent\" value=".$this->taskParentDate." id=\"parent_date".$this->taskParentID."\">
                    <input type=\"datetime-local\" name=\"date\" min=".$c." id=\"datesubtask".$this->taskParentID."\"> or
                    <input type=\"checkbox\" id=\"datefromparent".$this->taskParentID."\" onclick=
                    \"setAsParent('#datefromparent".$this->taskParentID."','#datesubtask".$this->taskParentID."','parent_date".$this->taskParentID."')\">
                    Same as parent</input>
                    <br>
                    <input type=\"submit\" name=\"submit_subtask\" value=\"Save\">
                    <br>
                    <script>setAsParent('#datefromparent".$this->taskParentID."','#datesubtask".$this->taskParentID."','parent_date".$this->taskParentID."');</script>
                </form>";
        }
        return $a;
    }

}