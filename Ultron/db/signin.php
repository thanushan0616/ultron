<?php
session_start();
require_once('connection.php');
if(isset($_POST['signin'])){
    if(empty($_POST['uname'])||empty($_POST['pass'])){
        header('location:../signintemp.php?empty');
        exit();

    }
    else{
        $username=mysqli_real_escape_string($con,$_POST['uname']);
        $password=mysqli_real_escape_string($con,$_POST['pass']);
        $query="select * from user_detail where uname='".$username."' or email='".$username."'";
        $result=mysqli_query($con,$query);
        if($row=mysqli_fetch_assoc($result)){
            $hash=password_verify($password,$row['password']);
            if($hash==FALSE){
                header('location:../signintemp.php?passinvalid');
                exit();
            }
            elseif($hash==TRUE){
                $_SESSION['U_D']=$row['ID'];
                $_SESSION['fname']=$row['fname'];
                $_SESSION['lname']=$row['lname'];
                $_SESSION['email']=$row['email'];                
                $_SESSION['username']=$row['username'];
                $_SESSION['password']=$row['password'];
                header('location:../profile.php?Well');
                exit();
            }
        }
        else{

            header('location:../signintemp.php?invalid');
        }

    }

}
else{
    header('location:../signintemp.php?empty');
    exit();    
}

?>