<?php
session_start();
echo " Logging you out. Please Wait....";
session_destroy();
header("Location: /php_forum/index.php");
?>