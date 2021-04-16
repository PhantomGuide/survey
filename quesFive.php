<?php
session_start();
require_once('class/database.php');
class question extends database
{
    public function questionFunction()
    {
        $id = $_SESSION['id'];
        $arr = array();

        $sql = "SELECT ques5, count(ques5) as answer FROM data_tbl where movie_id = $id GROUP by ques5";
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