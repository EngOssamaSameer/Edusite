<?php

require_once '../../model/user.php';
require_once '../../controller/DBcontroller.php';

class AuthController{
    public $db;

    //login functin
    public function login(User $user){
        $this->db = new DBcontroller;
    
        if ($this->db->openConnection()) {
            $query = "SELECT * FROM user WHERE name='$user->userName' AND password='$user->userPassowrd'";
           
            $result = $this->db->select($query);
    
            if ($result == false) {
                return false;
            } else {
                echo "<pre>";
                // print_r($result);
                // echo "<pre>";
                session_start();
                $_SESSION["userId"] = $result[0]["id"];
                $_SESSION["userName"] = $result[0]["name"];
                $_SESSION["userEmail"] = $result[0]["email"];
                $_SESSION["userPassword"] = $result[0]["password"];
                $_SESSION["userPrograss"] = $result[0]["prograss"];
                $_SESSION["userPhoto"] = $result[0]["image"];
                
                if ($result[0]["is_teacher"] == 1) {
                    $_SESSION["userRole"] = "Teacher";
                } else {
                    $_SESSION["userRole"] = "Student";
                }
    
                return true;
            }
        } else {
            echo 'error in open connection';
            return false;
        }
    }
    

        //login functin
    public function register(User $user){

        $this->db = new DBcontroller ;
        if($this->db->openConnection()){
            
            $query = " insert into user(`userId`, `userName`, `userEmail`, `userPhone`, `userPassowrd`, `userRoleId`, `image`, `rate`) values('','$user->userName','$user->userEmail',
            '$user->userEmail','$user->userPassowrd','$user->userRoleId','../../view/images/R.png',0)";
            $result = $this->db->insert($query);
            //create wallet
            $qu= "insert INTO `cash`(`cashId`, `userId`, `funds`) VALUES ('','$result ',0)" ;
            $this->db->insert($qu);
            if(!$result){
                return false;
            }else{
               
                session_start();
                $_SESSION["userId"]= $result ;
                $_SESSION["userName"]= $user->userName;
                $_SESSION["userEmail"]=  $user->userEmail;
                $_SESSION["userPhone"]=  $user->userPhone;
                $_SESSION["userPassword"]=  $user->userPassowrd;
                $_SESSION["rate"]=  0.0 ;
                $_SESSION["userPhoto"]= '../../view/images/R.png';
                if($user->userRoleId==1){
                    $_SESSION["userRole"]= "admin";
                }else if ($user->userRoleId==2){
                    $_SESSION["userRole"]= "driver";
                    // car info 
                    $q="insert into `car`(`userId`, `model`, `caeNumber`, `CaeKind`, `carImage`) values ('$result','Uber Model','123 | ABC','CAR','../images/defaultCar.png')";
                    $this->db->insert($q);
                    // car info 
                }else{
                    $_SESSION["userRole"]= "user";
                }
                return true;


            }
        }else{
            echo 'error in open connection';
            return false;
        }
    }

    //select all users functin
    public function selectAllUser(){

        $this->db = new DBcontroller ;
        if($this->db->openConnection()){
            $query = " select * from user where 1 ";
            $result = $this->db->select($query);
            if($result == false){
                return false;
            }else{
                return $result;
            }
        }else{
            echo 'error in open connection';
            return false;
        }
    }
    //select all users functin
    public function deleteUser($userId){

        $this->db = new DBcontroller ;
        if($this->db->openConnection()){
            $query = "delete from  user where userId = '$userId'";
            $result = $this->db->delete($query);
            if($result == false){
                return false;
            }else{
                return true;
            }
        }else{
            echo 'error in open connection';
            return false;
        }
    }
    //select all users
    public function selecAllUser(){

        $this->db = new DBcontroller ;
        if($this->db->openConnection()){
            $query = "select * from `user` where 1 ";
            $result = $this->db->update($query);
            if($result == false){
                return false;
            }else{
                return $result;
            }
        }else{
            echo 'error in open connection';
            return false;
        }
    }

    public function updateUser($userid, $user) {
        $this->db = new DBcontroller;
        $query1 = "UPDATE `user` SET `name` = '$user->userName', `email` = '$user->userEmail', `password` = '$user->userPassword' WHERE `user`.`id` = $userid";
        $this->db->openConnection();
        $result = $this->db->update($query1);
        $this->db->closeConnection();
        if($result){
            $_SESSION["userName"]=  $user->userName;
            $_SESSION["userEmail"]= $user->userEmail;
            return true;
        }else{return false;}
    }


    public function contact($userid,$sub,$msg){
        $this->db = new DBcontroller;
        $query1 ="INSERT INTO `feedbacks` ( `User_id`, `sup`, `msg`) VALUES ( '$userid', '$sub', '$msg')";
        $this->db->openConnection();
        $result = $this->db->update($query1);
        $this->db->closeConnection();
        if ($result){
            return true;
        }else{return false;
    }
}
}
?>