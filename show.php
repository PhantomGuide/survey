<?php
require_once('class/database.php');
error_reporting(0);
class show extends database
{
    //This function will insert all the data from questions
    public function insertFunction()
    {
        if (isset($_POST['id'])) {
            $id = $_POST['id'];
            $age = $_POST['age'];
            $genre = $_POST['genre'];
            $gender = $_POST['gender'];
            $ending = $_POST['ending'];
            $sequel = $_POST['sequel'];
            $fof = $_POST['fof'];
            $rating = $_POST['rating'];
            //To check if the values are empty or not
            if ($id == '' || $age == '' || $genre == '' || $gender == '' || $ending == '' || $ending == '' || $sequel == '' || $fof == '' || $rating == 0) {
                echo "Empty";
            } else {
                //Insert all the value in database
                $sql = "INSERT INTO `data_tbl` (`data_id`, `ques1`, `ques2`, `ques3`, `ques4`, `ques5`, `ques6`, `ques7`, `movie_id`, `created`) VALUES (NULL, '$age', '$genre', '$gender', '$ending', '$sequel', '$fof', '$rating', '$id', CURRENT_TIMESTAMP)";
                $res = mysqli_query($this->link, $sql);
                if ($res) {
                    echo "Added";
                } else {
                    echo "Problem";
                }
            }
        }
        # code...
    }
}
$obj = new show;
$objShow = $obj->insertFunction();