<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Session.php');
include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../helpers/Format.php');

class Process{
    private $db;
    private $fm;
    public function __construct(){
        $this->db = new Database();
        $this->fm = new Format();
    }

    public function processData($data){
        $selectedAns = $this->fm->validation($data['ans']);
        $number      = $this->fm->validation($data['number']);
        $selectedAns = mysqli_real_escape_string($this->db->link, $selectedAns);
        $number      = mysqli_real_escape_string($this->db->link, $number);
        $next = $number + 1;

        if(!isset($_SESSION['score'])) {
            $_SESSION['score'] = '0';
        }

        $total = $this->getTotal();
        $right = $this->rightAns($number);
        if($right == $selectedAns){
            $_SESSION['score']++;
        }

        if($number == $total){
            if($_SESSION['score'] == $total){
                header("Location:viva.php");
                exit();
            }else{
                header("Location:final.php");
                exit();
            }
        }else{
            header("Location:test.php?q=".$next);
        }
    }

    private function getTotal(){
        $query     = "SELECT * FROM tbl_ques";
        $getResult = $this->db->select($query);
        $total     = $getResult->num_rows;
        return $total;
    }

    private function rightAns($number){
        $query    = "SELECT * FROM tbl_ans WHERE quesNo='$number' AND rightAns='1'";
        $get_data = $this->db->select($query)->fetch_assoc();
        $result   = $get_data['id'];
        return $result;
    }

}
?>