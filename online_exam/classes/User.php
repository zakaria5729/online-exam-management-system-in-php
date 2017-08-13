<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Session.php');
include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../helpers/Format.php');

class User{
    private $db;
    private $fm;
    public function __construct(){
        $this->db = new Database();
        $this->fm = new Format();
    }

    public function userRegistration($name, $username, $password, $email){
        $name     = $this->fm->validation($name);
        $username = $this->fm->validation($username);
        $password = $this->fm->validation($password);
        $email    = $this->fm->validation($email);

        $name     = mysqli_real_escape_string($this->db->link, $name);
        $username = mysqli_real_escape_string($this->db->link, $username);

        $email    = mysqli_real_escape_string($this->db->link, $email);

        if($name == "" || $username == "" || $password == "" || $email == ""){
            echo "<span style='color: red'>Fields Must Not be Empty!</span>";
            exit();
        }else if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
            echo "<span style='color: red'>Invalid Email Address!</span>";
            exit();
        }else{
            $checkQuery = "SELECT * FROM tbl_user WHERE email = '$email'";
            $checkResult = $this->db->select($checkQuery);
            if($checkResult != false){
                echo "<span style='color: red'>Email Address Already Exist!</span>";
                exit();
            }else{
                $password = mysqli_real_escape_string($this->db->link, md5($password));
                $query = "INSERT INTO tbl_user(name, username, password, email) VALUES('$name', '$username', '$password', '$email')";
                $insert_row = $this->db->insert($query);
                if($insert_row){
                    echo "<span style='color: green'>Registration Successful!</span>";
                    exit();
                }else{
                    echo "<span style='color: red'>Registration Unsuccessful!</span>";
                    exit();
                }
            }
        }
    }

    public function userLogin($email, $password){
        $email    = $this->fm->validation($email);
        $password = $this->fm->validation($password);

        $email    = mysqli_real_escape_string($this->db->link, $email);
        $password = mysqli_real_escape_string($this->db->link, $password);
        if($email == "" || $password == ""){
            echo "empty";
            exit();
        }else{
            $query = "SELECT * FROM tbl_user WHERE email = '$email' AND password = '$password'";
            $result = $this->db->select($query);
            if($result != false){
                $value = $result->fetch_assoc();
                if($value['status'] == '1'){
                    echo "disable";
                    exit();
                }else{
                    Session::init();
                    Session::set("login", true);
                    Session::set("userId", $value['userId']);
                    Session::set("username", $value['username']);
                    Session::set("name", $value['name']);
                    Session::set("password", $value['password']);
                }
            }else{
                echo "error";
                exit();
            }
        }
    }

    public function getAllUser(){
        $query = "SELECT * FROM tbl_user ORDER BY userId DESC";
        $result = $this->db->select($query);
        return $result;
    }

    public function getUserData($userId){
        $query = "SELECT * FROM tbl_user WHERE userId = '$userId'";
        $result = $this->db->select($query);
        return $result;
    }

    public function updateUserData($userId, $data){
        $name     = $this->fm->validation($data['name']);
        $username = $this->fm->validation($data['username']);
        $email    = $this->fm->validation($data['email']);
        $password    = $this->fm->validation($data['password']);

        $name     = mysqli_real_escape_string($this->db->link, $name);
        $username = mysqli_real_escape_string($this->db->link, $username);
        $email    = mysqli_real_escape_string($this->db->link, $email);
        $password    = mysqli_real_escape_string($this->db->link, md5($password));

        $query = "UPDATE tbl_user SET name='$name', username='$username', email='$email', password='$password' where userId = '$userId'";
        $updated_row = $this->db->update($query);
        if($updated_row){
            $msg = "<span style='font-size: 17px;' class='success'>User Profile Update Successfully!</span>";
            return $msg;
        }else{
            $msg = "<span style='font-size: 17px' class='success'>User Profile Not Updated!</span>";
            return $msg;
        }
    }

    public function disableUser($userId){
       $query = "UPDATE tbl_user SET status = '1' where userId = '$userId'";
        $updated_row = $this->db->update($query);
        if($updated_row){
            $msg = "<span style='font-size: 17px' class='success'>User Disable Successfully!</span>";
            return $msg;
        }else{
            $msg = "<span style='font-size: 17px' class='success'>User Not Disable!</span>";
            return $msg;
        }
    }

    public function enableUser($userId){
        $query = "UPDATE tbl_user SET status = '0' where userId = '$userId'";
        $updated_row = $this->db->update($query);
        if($updated_row){
            $msg = "<span style='font-size: 17px' class='success'>User Enable Successfully!</span>";
            return $msg;
        }else{
            $msg = "<span style='font-size: 17px' class='success'>User Not Enable!</span>";
            return $msg;
        }
    }

    public function deleteUser($userId){
        $query = "DELETE FROM tbl_user WHERE userId = '$userId'";
        $delData = $this->db->delete($query);
        if(isset($delData)){
            $msg = "<span style='font-size: 17px' class='success'>User Remove Successfully!</span>";
            return $msg;
        }else{
            $msg = "<span style='font-size: 17px' class='success'>User Not Remove!</span>";
            return $msg;
        }
    }

    public function insert_viva_data($name, $email, $fb, $skp){
        $query = "INSERT INTO tbl_viva(name, email, facebook, skype) VALUES('$name', '$email', '$fb', '$skp')";
        $insert_row = $this->db->insert($query);
        if($insert_row){
            echo "<span style='color: green'>info Successful!</span>";
        }else{
            echo "<span style='color: red'>info Unsuccessful!</span>";
        }
    }

    public function getAllVivaApplier(){
        $query = "SELECT * FROM tbl_viva";
        $result = $this->db->select($query);
        return $result;
    }
}
?>