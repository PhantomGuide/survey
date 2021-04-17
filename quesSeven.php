<?php
session_start();
require_once('class/database.php');
class question extends database
{
    public function questionFunction()
    {
        $id = $_SESSION['id'];
        $arr = array();
        //This function will show all the result of question 7 from database
        $sql = "SELECT ques7, count(ques7) as answer FROM data_tbl where movie_id = $id GROUP by ques7";
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