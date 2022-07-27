<?php
session_start();
echo 
'<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php"><img src="assets/images/coding_dojo.png" alt="Coding Gossip" height="50px"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="about.php">About</a>
                </li>
                <li class="nav-item dropdown ">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Categories
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" aria-current="page" href="contact.php">Contact</a>
                </li>
            </ul>';
           
            
            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                echo '  <form class="d-flex" role="search">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-light" type="submit">Search</button>
                
                        </form>
                        <strong class="text-light mx-2">'.$_SESSION['username'].'</strong>
                        <a href="assets/_logout.php" class="btn btn-danger m-1">LogOut</a>';
            } else {
                echo ' <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-light" type="submit">Search</button>
                
            </form>
                <button class="btn btn-success m-1" data-bs-toggle="modal" data-bs-target="#loginModal">LogIn</button>
                            <button class="btn btn-danger m-1" data-bs-toggle="modal" data-bs-target="#signupModal">SignUp</button>';
            }
        echo 
        '</div>
    </div>
</nav>';

include "assets/_loginmodal.php";
include "assets/_signupmodal.php";

if (isset($_GET['signupsuccess']) && $_GET['signupsuccess'] == "true") {
    echo '<div class="alert alert-success alert-dismissible fade show mb-0" role="alert">
                <strong>Success!</strong> You successfully signup please continue to login.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
}

if (isset($_GET['signupsuccess']) && $_GET['signupsuccess'] == "false") {
    echo '<div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
                <strong>' . $_GET["error"] . '!</strong>.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
}

if (isset($_GET['loginsuccess'])) {
    echo '<div class="alert alert-success alert-dismissible fade show mb-0" role="alert">
                <strong>successfully!</strong> loggedin.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
}
if (isset($_GET['loginsuccess']) && $_GET['loginsuccess'] == "false") {
    echo '<div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
                <span>'.$_GET["error"].'</span>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
}

?>