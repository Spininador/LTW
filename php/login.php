<?php
    session_start();
    include_once('connectdb.php');
    include_once('users.php');
    $dbh = connectdb('../database/database.db');
    
    if(isset($_POST['username_input'])){
        $user = $_POST['username_input'];
    }else $user = '';
    
    if(isset($_POST['password_input'])){
        $pass = $_POST['password_input'];
    }else $pass = '';
    $hashed_pass = md5($pass);

    $retrieved_user = getUser($dbh,$user);

    if($retrieved_user['password'] === $hashed_pass){
        $_SESSION['username'] = $user;
        header('Location: ../index.php');
    }else header('Location: ../index.php?errlog=1');
    exit();
?>