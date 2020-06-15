<?php
$loggedIn = false;
session_start();
if (isset($_SESSION['email']) && isset($_SESSION['phone'])  && isset($_SESSION['name'])) {
    $loggedIn = true;
}

?>

<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Cache-control" content="no-cache">
	    <title>April</title>
	    <link rel="stylesheet" href="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" />
        <link rel="stylesheet" href="./assets/style.css">
        <link rel="stylesheet" href="./assets/navbar-footer.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    </head>
    <body onload="loadFunction()">
    <i style="color: #00a591; display: block; margin: 20% auto;" id="loader" class="fas fa-spinner fa-pulse fa-6x fa-fw"></i>
    <div class="whole-page" id="whole-page" style="display: none;">
        <!-- Nav Bar Start -->
        <div class="navBar">
            <div class="header">
                <div class="logo">
                    <a href=""><img src="./assets/img/logo.png"></a>
                </div>
                <div class="navigation">
                    <ul>
                        <li title="Home"><a href="#" class="home active">Home</a></li>
                        <li title="Browse Advertisements" ><a href="#" class="navads">Browse Ads</a></li>
                        <li title="How it Works">
                            <a href="./howitworks" class="works">How It Works</a>
                            <ul class="navads-dropdown">
                                <li title="Frequently Asked Questions"><a href="./howitworks/FAQ/FAQ.html">FAQ</a></li>
                            </ul>
                        </li>
                        <li title="All Categories"><a href="./categories/categories.html" class="cat">All Categories</a></li>
                        <li title="Contact us"><a href="contact/contact.html" class="contact">Contact</a></li>
                        <li title="Compare"><a href="#"><img src="./assets/img/Compare.svg"></a></li>
                        <?php 
                        if (!$loggedIn) echo '<li  id="login-modal-btn" title="Login"><a href=""><img src="./assets/img/Login.svg"></a></li>';
                        else echo '<li title="Dashboard"><a href="./dashboard/dashboard.php"><img src="./assets/img/profile.png"></a></li>';
                        ?>
                        <li title="Submit Advertisement"><a href="#"><img src="./assets/img/Submit.svg">Submit Ad</a></li>
                        <button id="response"></button>
                    </ul>
                </div>
            </div>
        </div>
        
        <div id="login-modal" class="login-modal">
            <div class="login-modal-content">
                <iframe style='border: none;' width='100%' height="100%" src="./user/login.html">
                </iframe>
            </div>
        </div>

        <div class="menuBar">
            <div class="toogle"></div>
            <div class="menuBar-nav hide">
                <ul>
                    <li><a href="#">Home </a></li>
                    <li><a href="#">Browse Ads</a></li>
                    <li class="dropdown-btn"><a href="./howitworks">How It Works</a><i class="fa fa-caret-down" style="float: right;"></i></li>
                    <div class="dropdown-container">
                        <li title="Frequently Asked Questions"><a href="./howitworks/FAQ/FAQ.html">FAQ</a></li>
                    </div>
                    <li><a href="./categories/categories.html">All Categories</a></li>
                    <li><a href="./contact/contact.html">Contact</a></li>
                </ul>
            </div>
            <div class="logo">
                <a href="#"><img src="./assets/img/logo.png"></a>
            </div>
            <div class="login-icon">
                <a href="#"><img src="./assets/img/Submit-green.svg"></a>
            </div>
        </div>
        <div class="menuBar-bottom">
            <ul>
                <li><a href="#"><img src="./assets/img/search.svg"></a></li>
                <?php
                if (!$loggedIn) echo '<li title="Login"><a href="./user/login.php"><img src="./assets/img/Login.svg" alt=""></a></li>';
                else echo '<li title="Dashboard"><a href="./dashboard/dashboard.php"><img src="./assets/img/profile.png" alt=""></a></li>';
                ?>
                <li><a href="#"><img src="./assets/img/Compare.svg" alt=""></a></li>
            </ul>
        </div>
        <!-- Nav Bar End -->

        <!-- Home Start -->
        <div class="homepage">
            <div class="homepage-inside">
                <div class="heading">
                    <h3>All You Need Is Here & Classified</h3>
                    <p>Browse from more than 15,000,000 adverts while new ones come on daily bassis</p>
                </div>
                <div class="search">
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
        </div>
        <!-- Home End -->

        <!-- Products Cards Start -->
        <div class="products">
            <div class="products-inside">
                <div class="products-items">
                    <img src="./assets/img/Electronics.svg">
                    <h3><a href="#">Electronics</a></h3>
                    <p>O Ads Posted</p>
                </div>
                <div class="products-items">
                    <img src="./assets/img/Sofa.svg">
                    <h3><a href="#">Furniture</a></h3>
                    <p>O Ads Posted</p>
                </div>
                <div class="products-items">
                    <img src="./assets/img/Jobs.svg">
                    <h3><a href="#">Jobs</a></h3>
                    <p>O Ads Posted</p>
                </div>
                <div class="products-items">
                    <img src="./assets/img/Estate.svg">
                    <h3><a href="#">Real Estate</a></h3>
                    <p>O Ads Posted</p>
                </div>
                <div class="products-items">
                    <img src="./assets/img/Services.svg">
                    <h3><a href="#">Services</a></h3>
                    <p>O Ads Posted</p>
                </div>
                <div class="products-items">
                    <img src="./assets/img/Bike.svg">
                    <h3><a href="#">Vechicles</a></h3>
                    <p>O Ads Posted</p>
                </div>
            </div>
        </div>
        <!-- Products Cards End -->
        
        <!-- Ads Start -->
        <div class="ads"> 
            <div style="height: 200px;width: 100%;"></div>
            <div class="switch">
                <div class="switch-btn switch-btn-active" id = "switch-latest">Latest Ads</div>
                <div class="switch-btn" id = "switch-end">Ending Soon</div>
            </div>
            <div id="ads-latest">
                <div class="ads-grid">
                    <div class="ads-card"></div>
                    <div class="ads-card"></div>
                </div>
            </div>
            <div id="ads-end">
                <div class="ads-grid">
                    <div class="ads-card"></div>
                    <div class="ads-card"></div>
                    <div class="ads-card"></div>
                </div>
            </div>
        </div>
        <!-- Ads End -->

        <!-- Register & Benefit Start -->
        <div class="register-benefit">
            <h3>Register & Benefit</h3>
            <ul>
                <li>&nbsp;Participate in auctions</li>
                <li>&nbsp;Submit your ads</li>
                <li>&nbsp;Promote your ads</li>
                <li>&nbsp;Get reviewed to become noticeable</li>
                <li>&nbsp;Save favorite ads</li>
                <li>&nbsp;And more</li>
            </ul>
            <button class="how-it-works">HOW IT WORKS</button>
        </div>
        <!-- Register & Benefit End -->

        <!-- Location Starts -->
        <div class="location">
            <div class="location-head">
                <h3>Popular Location</h3>
                <p>Check out ads from our members located in popular locations</p>
            </div>
            <div class="location-grid">
                <div class="location-card">
                    <div class="location-card-title">
                        <h3>New York</h3>
                        <p>0 Ads Posted</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Location Ends -->

        <!-- Subscribe Start -->
        <div class="subscribe">
            <div class="subscribe-inside">
                <div class="subscribe-head">
                    <img src="./assets/img/msg.svg">
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
            <a href="#"><img src="./assets/img/up-arrow.svg"></a>
        </div>

        <footer>
            <div class="footer-text">
                Crafted with &hearts; by Grafity.com
            </div>
            <ul class="footer-icon">
                <li><a href="#"><img src="./assets/img/facebook.png"></a></li>
                <li><a href="#"><img src="./assets/img/twitter.png"></a></li>
                <li><a href="#"><img src="./assets/img/youtube.svg"></a></li>
                <li><a href="#"><img src="./assets/img/instagram.svg"></a></li>
                <li><a href="#"><img src="./assets/img/pinterest.svg"></a></li>
            </ul>
        </footer>
        <!-- Footer End -->
</div>
        <script src="./assets/style.js"></script>
    </body>
</html>