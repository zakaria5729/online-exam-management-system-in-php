<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../lib/Session.php');
    include_once ($filepath.'/../lib/Database.php');
    include_once ($filepath.'/../helpers/Format.php');

class Admin{
    private $db;
    private $fm;
    public function __construct(){
        $this->db = new Database();
        $this->fm = new Format();
    }

    public function getAdminData($_data){
        $adminUser = $this->fm->validation($_data['adminUser']);
        $adminPass = $this->fm->validation($_data['adminPass']);

        $username  = mysqli_real_escape_string($this->db->link, $adminUser);
        $adminPass = mysqli_real_escape_string($this->db->link, md5($adminPass));

        $query = "select * from tbl_admin where adminUser='$adminUser' and adminPass='$adminPass'";
        $result = $this->db->select($query);
            if($result != false){
            $value = $result->fetch_assoc();
                Session::init();
                Session::set("adminLogin", true);
                Session::set("adminUser", $value['adminUser']);
                Session::set("adminId", $value['adminId']);
                header("Location:index.php");
        }else{
                $smg = "<span class='error'>Username or Password Not Matched!</span>";
                return $smg;
            }
    }
}
?>