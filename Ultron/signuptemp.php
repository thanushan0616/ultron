<?php  require_once('header.php') ?>
<script type="text/javascript">
   document.getElementById("fname").focus();
</script>

<h1>Sign up Page</h1>
<div class='form'>
        <!--empty -->
        <?php
            if(isset($_GET['empty'])){
                $Message=$_GET['empty'];
                $Message='Fill The Blanks';
        ?>
        <?php echo $Message ?>
            <?php } ?>

        <!--invalid -->
            <?php
            if(isset($_GET['invalid'])){
                $Message=$_GET['invalid'];
                $Message='Invalid Characters';
        ?>
        <?php echo $Message ?>
            <?php } ?>

        <!--Email invalid -->
        <?php
            if(isset($_GET['Email'])){
                $Message=$_GET['Email'];
                $Message='Email Address is Invalid';
        ?>
        <?php echo $Message ?>
            <?php } ?>

            <!--username invalid -->
            <?php
            if(isset($_GET['username'])){
                $Message=$_GET['username'];
                $Message='Username is already exist';
        ?>
        <?php echo $Message ?>
            <?php } ?>      

            <?php
            if(isset($_GET['Emailexist'])){
                $Message=$_GET['Emailexist'];
                $Message='Email Address is already exist';
        ?>
        <?php echo $Message ?>
            <?php } ?>

    <form action="db/signup.php" method='POST'>
        <input type="text" placeholder='firlstname' name='fname'>
        <input type="text" placeholder='lastname' name='lname'>
        <input type="email" placeholder='Email' name='ema'>
        <input type="text" placeholder='Username' name='uname'>
        <input type="password" placeholder='Pasworrd' name='pass1'>
        <input type="password" placeholder='Confirm Password' name='pass2'>
        <input type="submit" value='click me' name='signup' class='form-button'>
    </form>
    
</div>    
