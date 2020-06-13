<?php
$loggedIn = false;
session_start();
if (isset($_SESSION['email']) && isset($_SESSION['username'])) {
    $loggedIn = true;
}

?>

<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
	    <title>April</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" />
	    <link rel="stylesheet" href="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css">
        <link rel="stylesheet" href="./assets/style.css">
        <link rel="stylesheet" href="../assets/navbar-footer.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    </head>
    <body onload="loadFunction()">
        <i style="color: #00a591; display: block; margin: 20% auto;" id="loader" class="fas fa-cog fa-spin fa-6x fa-fw"></i>

        <div class="whole-page" id="whole-page" style="display: none;">
        <!-- Nav Bar Start -->
        <div class="navBar">
            <div class="header">
                <div class="logo">
                    <a href="../index.php"><img src="../assets/img/logo.png"></a>
                </div>
                <div class="navigation">
                    <ul>
                        <li title="Home"><a href="../index.php" class="home">Home</a></li>
                        <li title="Browse Advertisements" ><a href="#" class="navads">Browse Ads</a></li>
                        <li title="How it Works">
                            <a href="#" class="works active">How It Works</a>
                            <ul class="navads-dropdown">
                                <li title="Frequently Asked Questions"><a href="./FAQ">FAQ</a></li>
                            </ul>
                        </li>
                        <li title="All Categories"><a href="../categories/categories.html" class="cat">All Categories</a></li>
                        <li title="Contact us"><a href="../contact/contact.html" class="contact">Contact</a></li>
                        <li title="Compare"><a href="#"><img src="../assets/img/Compare.svg"></a></li>
                        <?php 
                        if (!$loggedIn) echo '<li title="Login"><a href="../user/login.php"><img src="../assets/img/Login.svg"></a></li>';
                        else echo '<li title="Dashboard"><a href="../dashboard/dashboard.php"><img src="../assets/img/profile.png"></a></li>';
                        ?>
                        <li title="Submit Advertisement"><a href="#"><img src="../assets/img/Submit.svg">Submit Ad</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="menuBar">
            <div class="toogle"></div>
            <div class="menuBar-nav hide">
                <ul>
                    <li><a href="../index.php">Home</a></li>
                    <li><a href="#">Browse Ads</a></li>
                    <li class="dropdown-btn"><a href="#">How It Works</a><i class="fa fa-caret-down" style="float: right;"></i></li>
                    <div class="dropdown-container">
                        <li title="Frequently Asked Questions"><a href="./FAQ">FAQ</a></li>
                    </div>
                    <li><a href="../categories/categories.html">All Categories</a></li>
                    <li><a href="../contact/contact.html">Contact</a></li>
                </ul>
            </div>
            <div class="logo">
                <a href="#"><img src="../assets/img/logo.png"></a>
            </div>
            <div class="login-icon">
                <a href="#"><img src="../assets/img/Submit-green.svg"></a>
            </div>
        </div>
        <div class="menuBar-bottom">
            <ul>
                <li><a href="#"><img src="../assets/img/search.svg"></a></li>
                <?php
                if (!$loggedIn) echo '<li title="Login"><a href="../user/login.php"><img src="../assets/img/Login.svg" alt=""></a></li>';
                else echo '<li title="Dashboard"><a href="../dashboard/dashboard.php"><img src="../assets/img/profile.png" alt=""></a></li>';
                ?>
                <li><a href="#"><img src="../assets/img/Compare.svg" alt=""></a></li>
            </ul>
        </div>
        <!-- Nav Bar End -->

        <!-- How It Works Head Start -->
        <div class="head">
            <div class="head-inside">
                <div class="head-text">
                    <h3>How It Works</h3>
                    <p>Home > How It Works</p>
                </div>
                <img src="../assets/img/binocular.svg">
            </div>
        </div>
        <!-- How It Works Head End -->

        <!-- Search Start -->
        <div class="search">
            <div class="search-inside">
                <input type="text" name="search" placeholder="Search For" required>
                <input type="text" name="place" placeholder="Where" required>
                <datalist id="place">
                </datalist>
                <input type="text" name="cat" placeholder="In Category">
                <datalist id="place">
                </datalist>
                <button>Submit</button>
            </div>
        </div>
        <!-- Search End -->
        
        <!-- Instruction Start -->
        <div class="container">
            <div class="container-inside">
                <div class="container-rows">
                    <div class="rows-text">
                        <h3>1. Create An Account</h3>
                        <p>First thing you need to do is to create your own account which will allow you to post ads and better communications with our members as well as some very cool features</p>
                    </div>
                    <img src="../assets//img/hiw-1.png">
                </div>
                <div class="container-rows">
                    <img src="../assets//img/hiw-2.png">
                    <div class="rows-text">
                        <h3>2. Post An Ad</h3>
                        <p>Once you are finished with creating your account it is time to sell goods and/or services you are offering and in order to do that add submit some ads so people can notice you</p>
                    </div>
                </div>
                <div class="container-rows">
                    <div class="rows-text">
                        <h3>3. Start Earning</h3>
                        <p>Now sit back, relax and wait for the potential buyers to contact you regarding goods and/or  services you are offering and start earning money and building contact as easy as that</p>
                    </div>
                    <img src="../assets//img/hiw-3.png">
                </div>
            </div>
        </div>
        <!-- Insturction End -->

        <!-- Subscribe Start -->
        <div class="subscribe">
            <div class="subscribe-inside">
                <div class="subscribe-head">
                    <img src="../assets/img/msg.svg">
                    <div class="subscribe-title">
                        <h4>Subscribe To Newsletter</h4>
                        <p>and receive new ads in inbox</p>
                    </div>
                </div>
                <div class="subscribe-form">
                    <input type="email" name="email" placeholder="Input Your Email Address">
                    <button>Subscribe</button>
                </div>
            </div>
        </div>
        <!-- Subscribe End -->

        <!-- Footer Start -->
        <div class="footer-button">
            <a href="#"><img src="../assets/img/up-arrow.svg"></a>
        </div>

        <footer>
            <div class="footer-text">
                Crafted with &hearts; by Grafity.com
            </div>
            <ul class="footer-icon">
                <li><a href="#"><img src="../assets//img/facebook.png"></a></li>
                <li><a href="#"><img src="../assets/img/twitter.png"></a></li>
                <li><a href="#"><img src="../assets/img/youtube.svg"></a></li>
                <li><a href="#"><img src="../assets/img/instagram.svg"></a></li>
                <li><a href="#"><img src="../assets/img/pinterest.svg"></a></li>
            </ul>
        </footer>
        <!-- Footer End -->
    </div>
        <script src="./assets/style.js"></script>
    </body>
</html>