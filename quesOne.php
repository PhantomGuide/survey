<?php
require_once('class/database.php');
class question extends database
{
    public function questionFunction()
    {
        $id = $_POST['movie'];
        $arr = array();

        $sql = "";
        $res = mysqli_query($this->link, $sql);
        if ($res) {
            foreach ($res as $row) {
                $arr[] = $row;
            }
            return $arr;
        } else {
            return false;
        }

        # code...
    }
}
$obj = new question;
$objQues = $obj->questionFunction();