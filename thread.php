<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Coding Discussion</title>
    <!-- bootstrap and css links -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/Font-awesome/css/all.min.css"> <!-- Fontawesome Icons Links -->
</head>

<body>
    <!-- Navbar -->
    <?php require "assets/_header.php"; ?>
    <?php require "assets/_dbconnect.php"; ?>

    <div class="container-fluid mt-5 ">
        <!-- MAIN Body -->

        <?php
        $id = $_GET['threadid'];
        $sql = "SELECT * FROM `threads` WHERE thread_id= $id ";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result)){
            $title = $row['thread_title'];
            $desc = $row['thread_desc'];
        }
        ?>
        <div class="row">
            <!-- Home Page Body -->

            <div class="col-md-9">
                <!-- card for some Information about the community and their rules to follow -->

                <div class="card alert alert-info">
                    <div class="card-body">
                        <h6>Some Rules Of this Community You Must Follow for Better interactions</h6>
                        <ul class="text-danger">
                            <li>No Spam / Advertising / Self-promote in the forums.</li>
                            <li>Remain respectful of other members at all times.</li>
                            <li>Do not post “offensive” posts, links or images.</li>
                            <li>Do not cross post questions.</li>
                            <li>Do not PM users asking for help.</li>
                            <li>Do not post copyright-infringing material.</li>
                        </ul>
                        <hr class="my-4">
                        <h1 class="display-4 "><?php echo $title ;?></h1>
                        <p class="lead text-muted"><?php echo $desc ;?></p>
                        <p class="text-dark">Posted by: <strong><i>Vipin Patel</i></strong></p> 
                        
                        <!-- <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a> -->
                    </div>
                </div>
                <?php
                    $showAlert = false;
                    $method = $_SERVER['REQUEST_METHOD'];
                    if($method == "POST"){
                        $showAlert = true;
                        // Insert comments into database
                        
                        $comment = $_POST['comment'];
                        $sql = "INSERT INTO `comments` (`comment_content`, `thread_id`, `comment_by`, `comment_time`) 
                        VALUES ('$comment', '$id', '0', current_timestamp())";
                        $result = mysqli_query($conn, $sql);
                        if($showAlert){
                            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>Success!</strong> your comment has been added.
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>';
                        }
                    }
                ?>
                <?php

                // Form
                echo'<div class="col-md-10 alert alert-light" >
                    <h3 class="text-dark">Post Your Comment</h3>';
                    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                    echo'<form action="'. $_SERVER['REQUEST_URI'].'" method="POST" >
                        <div class=" mb-3 ">
                            <label for="comment" class="text-dark">Type your comment</label>
                            <textarea class="form-control"  name="comment" id="comment"></textarea>
                            
                        </div>
                        <button type="submit" class="btn btn-primary">Post Comment</button>
                    </form>';
                    }else{
                        echo'<div class="fs-5 alert alert-secondary" role="alert">you are not allowed to post comment. please login to post your comment</div>';
                    }
                echo'</div>';
                ?>

                <!-- Comments and disscussion displayed here -->
                <div class="col-md-8 mt-5 mx-4">
                    <h3>Discussions</h3><br>
                    <?php
                        $id = $_GET['threadid'];
                        $sql = "SELECT * FROM `comments` WHERE thread_id= $id ";
                        $result = mysqli_query($conn, $sql);
                        $noResult = true;
                        
                        while($row = mysqli_fetch_assoc($result)){
                            $noResult = false;
                            $id = $row['comment_id'];
                            $content = $row['comment_content'];
                            $comment_time = $row['comment_time'];

                              echo '<div class="card my-1">
                                        <div class="card-header"> 
                                            <i class="fa-solid fa-user fa-2xl"></i>
                                            <strong class=" mx-3">Anonymous User</strong>
                                            <div class="float-end">'.$comment_time.'</div> 
                                        </div>
                                        <div class="card-body">
                                            '.$content.'
                                        </div>
                                    </div>';

                         }
                         if($noResult){
                            echo '<div class="alert alert-secondary" role="alert">
                                    <p class="display-6">No Threads Found</p>
                                    <p>Be the first person to start discussion</p>
                                </div>';
                        }
                    ?>

                </div>
                    
            </div>
            <!-- Home Body ends Here -->

            <!-- SIDEBAR -->
            <div class="col-md-3 mt-0 alert alert-info" style="border: 1px solid #d6d6d4; border-radius: 5px;">
                <button class="w-100 px-0 ">
                    <input type="Search" placeholder="Seacrh.." class="border-0 mx-0" style="outline:none; width:80%;">
                    <i class="fa-solid fa-magnifying-glass"></i> 
                </button>
            
                <h5 class="mt-3 text-dark">Playlist</h5>
                <p>Learn Coding From here...</p>
               
                <!-- programming youtube videos playlist links-->
                <div class="mt-3">
                    <ol>
                        <li><a class="text-decoration-none" href="https://www.youtube.com/watch?v=aqvDTCpNRek&list=PLu0W_9lII9agICnT8t4iYVSZ3eykIAOME" target="_blank">Python videos</a></li>
                        <li><a class="text-decoration-none" href="https://www.youtube.com/watch?v=cvvwkgp4HBg&list=PLu0W_9lII9ajyk081To1Cbt2eI5913SsL" target="_blank">JavaScript videos</a></li>
                        <li><a class="text-decoration-none" href="https://www.youtube.com/watch?v=at19OmH2Bg4&list=PLu0W_9lII9aikXkRE0WxDt1vozo3hnmtR" target="_blank">Php videos</a></li>
                        <li><a class="text-decoration-none" href="https://www.youtube.com/watch?v=j8nAHeVKL08&list=PLu0W_9lII9agpFUAlPFe_VNSlXW5uE0YL" target="_blank">C++ videos</a></li>
                        <li><a class="text-decoration-none" href="https://www.youtube.com/watch?v=7Dh73z3icd8&list=PLu0W_9lII9aiXlHcLx-mDH1Qul38wD3aR" target="_blank">C videos</a></li>
                        <li><a class="text-decoration-none" href="https://www.youtube.com/watch?v=ntLJmHOJ0ME&list=PLu0W_9lII9agS67Uits0UnJyrYiXhDS6q" target="_blank">Java videos</a></li>
                    </ol>
                </div>

                <!-- coding Websites   -->
                <div>
                    <h6 class="text-dark">Some Of the Famous Coding Websites to Learn code and Compete with Others</h6>
                    <ul>
                        <li><a class="text-decoration-none" href="https://www.freecodecamp.org/" target="_blank">FreeCodeCamp</a></li>
                        <li><a class="text-decoration-none" href="https://www.hackerearth.com/" target="_blank">HackerEarth</a></li>
                        <li><a class="text-decoration-none" href="https://www.hackerrank.com/" target="_blank">HackerRank</a></li>
                        <li><a class="text-decoration-none" href="https://www.codechef.com/" target="_blank">CodeChef</a></li>
                        <li><a class="text-decoration-none" href="https://leetcode.com/" target="_blank">LeetCode</a></li>
                        <li><a class="text-decoration-none" href="https://www.w3schools.com/" target="_blank">W3schools</a></li>
                    </ul>
                </div>

                <!-- social media icons -->
                <h6 class="text-dark">Follow Us on Social Media Platforms</h6>

                <div class="mb-5 mt-3">
                    <a href="https://www.facebook.com/" target="_blank"><i class=" fa-brands fa-facebook-square fa-2xl mx-1"></i></a>

                    <a href="https://www.linkedin.com/" target="_blank"><i class="fa-brands fa-linkedin fa-2xl mx-1"></i></a>

                    <a href="https://www.instagram.com/" target="_blank"><i class="fa-brands fa-instagram-square fa-2xl mx-1"></i></a>

                    <a href="https://twitter.com/" target="_blank"><i class="fa-brands fa-twitter-square fa-2xl mx-1"></i></a>

                    <a href="https://www.youtube.com/" target="_blank"><i class="fa-brands fa-youtube fa-2xl mx-1"></i></a>
                </div>

            </div>
            <!-- SIDEBAR Ends here -->

        </div>
        <!-- MAIN Body Ends here -->

    </div>

    <!-- Footer -->
    <?php require "assets/_footer.php"; ?>

    <!-- bootstrap and jquery scripts -->
    <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>