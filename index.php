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

    <!-- Carousel -->
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="assets/images/learn_code.jpg" class="d-block w-100" alt="learn_code" height="500px">
            </div>
            <div class="carousel-item">
                <img src="assets/images/coding_community.jpg" class="d-block w-100" alt="coding_community" height="500px">
            </div>
            <div class="carousel-item">
                <img src="assets/images/coding_challenge.jpg" class="d-block w-100" alt="coding_challenge" height="500px">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <!-- Carousel Ends Here -->

    <div class="container-fluid mt-5 ">
        <!-- MAIN Body -->

        <h1>Coding Dojo - Categories</h1>
        <div class="row">
            <!-- Home Page Body -->
            <div class="col-md-9">
                <div class="row my-3">

                    <?php
                    $sql = "SELECT * FROM `categories`";
                    $result = mysqli_query($conn, $sql);
                    //  Cards starts from here 
                    while ($row = mysqli_fetch_assoc($result)) {
                        $id = $row['category_id'];
                        $cat = $row['category_name'];
                        $desc = $row['category_desc'];
                        echo '  <div class="col-md-4 mb-3">
                                    <div class="card" style="width: 18rem;">
                                        <div class="card-header">
                                        <img src="assets/images/'.$cat.'.png" class="card-img-top" alt="..." height="200px">
                                        </div>
                                        <div class="card-body">
                                            <h5 class="card-title"><a class="text-decoration-none" href="threadlist.php?catid='.$id.'"> ' . $row['category_name'] . '</a></h5>
                                            <p class="card-text">' . substr($desc, 0, 79) . ' ...</p>
                                            <a  href="threadlist.php?catid='. $id .'" class="btn btn-primary text-decoration-none">View Threads</a>
                                        </div>
                                    </div>
                                </div>';
                    }
                    ?>
                </div>
            </div>

            <!-- SIDEBAR -->
            <div class="col-md-3 mt-3 alert alert-info" style="border: 1px solid #d6d6d4; border-radius: 5px;">
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