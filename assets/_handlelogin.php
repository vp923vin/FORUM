<?php

$showError = "false";
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    include '_dbconnect.php';
    $user_email = $_POST['email'];
    $user_password = $_POST['password'];

    $sql = "SELECT * FROM `users` WHERE user_email = '$user_email' ";
    $result = mysqli_query($conn, $sql);
    
    $numRows = mysqli_num_rows($result);
    if($numRows == 1){
        $row = mysqli_fetch_assoc($result);
        $name = $row['user_name'];
        if(password_verify($user_password, $row['user_pass'])){
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['useremail'] = $user_email;
            $_SESSION['username'] = $name;
            
            // echo 'loggedin as user '.$user_email;
             header('Location: /php_forum/index.php');
            //  exit();
        }else{
            $showError = "Invalid Password";
            header("Location: /php_forum/index.php?loginsuccess=false&error=$showError"); 
        }   
    }else{
        $showError = "Entered Email is not registered with us!";
        header("Location: /php_forum/index.php?loginsuccess=false&error=$showError"); 
    }
    // header("Location: /php_forum/index.php?loginsuccess=false&error=$showError"); 
    
}



?>