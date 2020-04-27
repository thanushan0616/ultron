<?php
require_once('connection.php');
if(isset($_POST['signup'])){

    if(empty($_POST['fname']) || empty($_POST['lname']) || empty($_POST['ema']) || empty($_POST['uname'])
     || empty($_POST['pass1']) || empty($_POST['pass2'])){
        header("location:../signuptemp.php?empty");   

    }
    else{
        $fname=mysqli_real_escape_string($con,$_POST['fname']);
        $lname=mysqli_real_escape_string($con,$_POST['lname']);
        $email=mysqli_real_escape_string($con,$_POST['ema']);
        $uname=mysqli_real_escape_string($con,$_POST['uname']);
        $password=mysqli_real_escape_string($con,$_POST['pass1']);
       
        if(!preg_match("/^[a-zA-Z]*$/",$fname)|| !preg_match("/^[a-zA-Z]*$/",$lname)){
            header("location:../signuptemp.php?invalid");
        }        

        else{
            if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
                header("location:../signuptemp.php?Email");
            }

            else{
                $query="select * from user_detail where uname='".$uname."'";
                $result=mysqli_query($con,$query);
                if(mysqli_fetch_assoc($result)){

                    header("location:../signuptemp.php?username");
                    exist();
                }
                else{
                    $query="select * from user_detail where email='".$email."'";
                    $result=mysqli_query($con,$query);
                if(mysqli_fetch_assoc($result)){

                    header("location:../signuptemp.php?Emailexist");
                    exist();
                }
                else{
                    $hash=password_hash($password,PASSWORD_DEFAULT);
                    $query="insert into user_detail (fname,lname,email,uname,password) values ('$fname','$lname','$email','$uname','$hash')";
                    $result=mysqli_query($con,$query);
                    header('location:../signintemp.php?success');
                    exit(); 

                }
                }
            }
        }
    }

}
else{

    header("location:../index.php");
}
?>