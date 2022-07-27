<?php
$showError = "false";
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    include '_dbconnect.php';
    $user_name = $_POST['name'];
    $user_email = $_POST['email'];
    $user_password= $_POST['password'];
    $user_confirm_password = $_POST['confirm_password'];

    // check that user exits or not in the database
    $existEmail = "SELECT * FROM `users` WHERE user_email = '$user_email' ";
    $result = mysqli_query($conn, $existEmail);
    $numRows = mysqli_num_rows($result);

    if($numRows>0){
        $showError = "Email already in use.";
    }else{
        if($user_password == $user_confirm_password){
            $hash = password_hash($user_password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO `users` (`user_name`, `user_email`, `user_pass`, `user_time_stamp`) 
            VALUES ('$user_name', '$user_email', '$hash', current_timestamp())";
            $result = mysqli_query($conn, $sql);
            if($result){
                $showAlert = true;
                header("location: /php_forum/index.php?signupsuccess=true");
                exit();
            }

        }else{
            $showError = "Password do not match";
        }
    }
    header("location: /php_forum/index.php?signupsuccess=false&error=$showError");

}

?>