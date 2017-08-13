<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../helpers/Format.php');

class Exam{
    private $db;
    private $fm;
    public function __construct(){
        $this->db = new Database();
        $this->fm = new Format();
    }

    public function addQuestions($data){
        $quesNo = mysqli_real_escape_string($this->db->link, $data['quesNo']);
        $ques   = mysqli_real_escape_string($this->db->link, $data['ques']);

        $ans       = array();
        $ans[1]   = $data['ans1'];
        $ans[2]   = $data['ans2'];
        $ans[3]   = $data['ans3'];
        $ans[4]   = $data['ans4'];
        $rightAns = $data['rightAns'];

        $query = "INSERT INTO tbl_ques(quesNo, ques) VALUES('$quesNo', '$ques')";
        $insert_row = $this->db->insert($query);

        if($insert_row){
            foreach($ans as $key => $ansName){
                if($ansName != ''){
                    if($rightAns == $key){
                        $r_query = "INSERT INTO tbl_ans(quesNo, rightAns, ans) VALUES('$quesNo', '1', '$ansName')";
                    }else{
                        $r_query = "INSERT INTO tbl_ans(quesNo, rightAns, ans) VALUES('$quesNo', '0', '$ansName')";
                    }
                    $insertTheRow = $this->db->insert($r_query);
                    if($insertTheRow){
                        continue;
                    }else{
                        die('Error..');
                    }
                }
            }
            $msg = "<span style='font-size: 17px' class='success'>Question Added Successfully!</span>";
            return $msg;
        }
    }

    public function getQuesByOrder(){
        $query  = "SELECT * FROM tbl_ques ORDER BY quesNo ASC";
        $result = $this->db->select($query);
        return $result;
    }

    /*join tbl_ques and tbl_ans*/
    public function delQuestion($quesNo){
        $tables = array("tbl_ques","tbl_ans");
        foreach ($tables as $table) {
            $delQuery = "DELETE FROM $table WHERE QuesNo = '$quesNo'";
            $delData  = $this->db->delete($delQuery);
        }
        if($delData){
            $msg = "<span style='font-size: 17px' class='success'>Question Deleted Successfully!</span>";
            return $msg;
        }else{
            $msg = "<span style='font-size: 17px' class='success'>Question Not Deleted!</span>";
            return $msg;
        }
    }

    public function getTotalRows(){
        $query     = "SELECT * FROM tbl_ques";
        $getResult = $this->db->select($query);
        $total     = $getResult->num_rows;
        return $total;
    }

    public function getQuestion(){
        $query     = "SELECT * FROM tbl_ques";
        $getData   = $this->db->select($query);
        $result    = $getData->fetch_assoc();
        return $result;
    }

    public function getQuesByNumber($number){
        $query     = "SELECT * FROM tbl_ques WHERE quesNo = '$number'";
        $getDataRow   = $this->db->select($query);
        $result    = $getDataRow->fetch_assoc();
        return $result;
    }

    public function getAnswer($number){
        $query       = "SELECT * FROM tbl_ans WHERE quesNo = '$number'";
        $getData = $this->db->select($query);
        return $getData;
    }



}
?>