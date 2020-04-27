<?php  require_once('header.php') ?>
<h1>Sign In Page</h1>
<!-- empty -->
<?php
    if(isset($_GET['empty'])){

        $Message=$_GET['empty'];
        $Message='fill the empty field';
    
?>
<?php echo $Message ?>
<?php
    }
?>

<!-- U_invalid -->
<?php
    if(isset($_GET['invalid'])){

        $Message=$_GET['invalid'];
        $Message='invalid username ';
    
?>
<?php echo $Message ?>
<?php
    }
?>

<!-- passinvalid -->
<?php
    if(isset($_GET['passinvalid'])){

        $Message=$_GET['passinvalid'];
        $Message='invalid passworr ';
    
?>
<?php echo $Message ?>
<?php
    }
?>
<form action="db/signin.php" method="POST">
    <input type="text" placeholder="username" name='uname'>
    <input type="password" name="pass" placeholder='pass'>
    <input type="submit" name='signin' value='enter'>
</form>