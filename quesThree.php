<?php
session_start();
require_once('class/database.php');
class question extends database
{
    public function questionFunction()
    {
        $id = $_SESSION['id'];
        $arr = array();

        $sql = "SELECT ques3, count(ques3) as answer FROM data_tbl where movie_id = $id GROUP by ques3";
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
echo json_encode($objQues);