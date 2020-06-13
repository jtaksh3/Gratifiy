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
        <link rel="stylesheet" href="../../assets/navbar-footer.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    </head>
    <body onload="loadFunction()">
        <i style="color: #00a591; display: block; margin: 20% auto;" id="loader" class="fas fa-cog fa-spin fa-6x fa-fw"></i>
        <div class="whole-page" id="whole-page" style="display: none;">
        <!-- Nav Bar Start -->
        <div class="navBar">
            <div class="header">
                <div class="logo">
                    <!-- <h3><a href="#">Gratifiy.com</a></h3> -->
                    <a href="../../index.php"><img src="../../assets/img/logo.png"></a>
                </div>
                <div class="navigation">
                    <ul>
                        <li title="Home"><a href="../../index.php" class="home">Home</a></li>
                        <li title="Browse Advertisements" ><a href="#" class="navads">Browse Ads</a></li>
                        <li title="How it Works">
                            <a href="../index.php" class="works active">How It Works</a>
                            <ul class="navads-dropdown">
                                <li title="Frequently Asked Questions"><a href="#">FAQ</a></li>
                            </ul>
                        </li>
                        <li title="All Categories"><a href="../../categories/categories.html" class="cat">All Categories</a></li>
                        <li title="Contact us"><a href="../../contact/contact.html" class="contact">Contact</a></li>
                        <li title="Compare"><a href="#"><img src="../../assets/img/Compare.svg"></a></li>
                        <?php 
                        if (!$loggedIn) echo '<li title="Login"><a href="../../user/login.php"><img src="../../assets/img/Login.svg"></a></li>';
                        else echo '<li title="Dashboard"><a href="../../dashboard/dashboard.php"><img src="../../assets/img/profile.png"></a></li>';
                        ?>
                        <li title="Submit Advertisement"><a href="#"><img src="../../assets/img/Submit.svg">Submit Ad</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="menuBar">
            <div class="toogle"></div>
            <div class="menuBar-nav hide">
                <ul>
                    <li><a href="../../index.php">Home </a></li>
                    <li><a href="#">Browse Ads</a></li>
                    <li class="dropdown-btn"><a href="../index.php">How It Works</a><i class="fa fa-caret-down" style="float: right;"></i></li>
                    <div class="dropdown-container">
                        <li title="Frequently Asked Questions"><a href="#">FAQ</a></li>
                    </div>
                    <li><a href="../../categories/categories.html">All Categories</a></li>
                    <li><a href="../../contact/contact.html">Contact</a></li>
                </ul>
            </div>
            <div class="logo">
                <a href="#"><img src="../../assets/img/logo.png"></a>
            </div>
            <div class="login-icon">
                <a href="#"><img src="../../assets/img/Submit-green.svg"></a>
            </div>
        </div>
        <div class="menuBar-bottom">
            <ul>
                <li><a href="#"><img src="../../assets/img/search.svg"></a></li>
                <?php
                if (!$loggedIn) echo '<li title="Login"><a href="../../user/login.php"><img src="../../assets/img/Login.svg" alt=""></a></li>';
                else echo '<li title="Dashboard"><a href="../../dashboard/dashboard.php"><img src="../../assets/img/profile.png" alt=""></a></li>';
                ?>
                <li><a href="#"><img src="../../assets/img/Compare.svg" alt=""></a></li>
            </ul>
        </div>
        <!-- Nav Bar End -->

        <!-- How It Works Head Start -->
        <div class="head">
            <div class="head-inside">
                <div class="head-text">
                    <h3>FAQ</h3>
                    <p>Home > FAQ</p>
                </div>
                <img src="../../assets/img/binocular.svg">
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

        <!-- FAQ Questions Start -->
        <div class="ques">
            <div class="ques-inside">
                <div class="row row1 row-active">
                    <div class="row-head">Types of Ads</div>
                    <div class="row-body">
                        <p>Marketplace offers you 5 different types of ads which you can select during ad posting or reposting. It is not possible to switch between different ad types while it is live. Available types are:</p>
                        <br>
                        <ol>
                            <li><strong>Sell</strong></li>
                            <li><strong>Auction</strong></li>
                            <li><strong>Buying</strong></li>
                            <li><strong>Exchange</strong></li>
                            <li><strong>Gift</strong></li>
                        </ol>
                    </div>
                </div>
                <div class="row row2">
                    <div class="row-head">How Auctions Works?</div>
                    <div class="row-body">
                        <p>
                            In order to participate in any auction first you need to register an account. Once you have an account visit any auction and in the sidebar you will notice bidding box.
                            <br>
                            Below input for bid value you will see what is the minimum value you must place. Once the auction is finished and if you've won it you will receive confirmation mail.
                            <br>
                            List of all auctions in which you are or have been participated in is displayed on your profile under Auctions.
                        </p>
                    </div>
                </div>
                <div class="row row3">
                    <div class="row-head">How To Promote Submitted Ad?</div>
                    <div class="row-body">
                        <p>In order to promote your ads first you must navigate to your submitted ads and from the action menu select last option. It will open modal with list of all available promotions on market as well as your currently active promotions for the particular ad.</p>
                        <br>
                        <p>List of available promotions are:</p><br>
                        <ol>
                            <li><strong>Bump Up Ad</strong> ( this will update creation date while expire time remains and can be used only once per ad )</li>
                            <li><strong>Highlight Ad</strong> ( this will make your ad stand out from others in listing )</li>
                            <li><strong>Top Ad</strong> ( make your add in the first XX positions of listing as well as in it’s regualr listing position )</li>
                            <li><strong>Urgent Ad</strong> ( display urgent ribon on ad box )</li>
                            <li><strong>Home Map Ad</strong> ( have your ad appear on landing page )</li>
                        </ol>
                        <br>
                        <p>
                            With an exception of Bump Up promotion all of them can have multiple packages available.<br>
                            Once you have selected promotion type and period you can proceed to payment screen. Once the payment is cleared your promotion will be active. Promotion starts from the time when payment is cleared and not from time the promotion is requested.
                        </p>
                    </div>
                </div>
                <div class="row row4">
                    <div class="row-head">Why There Are Locations In Dropdown And On Map?</div>
                    <div class="row-body">
                        <p>From dropdown you are selecting general location of your advert while selecting it on the map you are being more precise. Also if the location search of the marketplace is set to geolocation, people who search by location will find your ad more easier. Location sSearch of the marketplace can also be set as list of predefined values in which case value from the dropdown is being used.</p>
                    </div>
                </div>
                <div class="row row5">
                    <div class="row-head">What Submitting Packs Do You Offer?</div>
                    <div class="row-body">
                        <p>Depending on the settings of the marketplace you can have:</p><br>
                        <ul>
                            <li>Packages ( in the packages time for submitting ads is unlimited while number of ad is final )</li>
                            <li>Subscriptions ( here time for submitting is limited while number of ads is not)</li>
                        </ul>
                        <br><p>Number of different packages and subscriptions is unlimited and it all depends on the prefered settings of the administrator.</p>
                    </div>
                </div>
                <div class="row row6">
                    <div class="row-head">How Can I Contact Seller?</div>
                    <div class="row-body">
                        <p>
                            In order to retrieve phone number of the seller go to it's profile page or any of his ads and you will notice block with phone number.
                            <br><br>
                            If you wish to start messaging conversation with the seller first create an account. Once you have created your account navigate to any of his ads and you will notice button for sending message. List of you messages is available on your profile. There you have AJAX messaging system where you will be able to continue conversations.
                        </p>
                    </div>
                </div>
                <div class="row row7">
                    <div class="row-head">How Review System Works?</div>
                    <div class="row-body">
                        <p>
                            There are two types of reviews – buyer and seller. First step is to register on our marketplace. Next you need to send a message to a seller. Once the seller responds to your message you will be able to review seller and in the same time seller will be able to review you.
                            <br><br>When users visit your profile they will be able to see your overall review , complete list of your reviews and to filter them by type.
                            <br><br>Once you post review it can not be changed. Also seller and you have option to respond to review.
                        </p>
                    </div>
                </div>
                <div class="row row8">
                    <div class="row-head">What Are Featured Ads?</div>
                    <div class="row-body">
                        <p>If you have found some ad which you want to visit later or contact seller later, etc. you can mark it as Favorite and it will be save to the list of your favorite ads which you can access from your profile dashboard.</p>
                    </div>
                </div>
                <div class="row row9">
                    <div class="row-head">How To Report Ad?</div>
                    <div class="row-body">
                        <p>If you feel that the ad  is breaking some rules, you can report it directly from ad page by clicking on the Report button and writing detail reason. Ad will remain active until administrator checks it out.</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- FAQ Questions End -->

        <!-- Subscribe Start -->
        <div class="subscribe">
            <div class="subscribe-inside">
                <div class="subscribe-head">
                    <img src="../../assets/img/msg.svg">
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
            <a href="#"><img src="../../assets/img/up-arrow.svg"></a>
        </div>

        <footer>
            <div class="footer-text">
                Crafted with &hearts; by Grafity.com
            </div>
            <ul class="footer-icon">
                <li><a href="#"><img src="../../assets/img/facebook.png"></a></li>
                <li><a href="#"><img src="../../assets/img/twitter.png"></a></li>
                <li><a href="#"><img src="../../assets/img/youtube.svg"></a></li>
                <li><a href="#"><img src="../../assets/img/instagram.svg"></a></li>
                <li><a href="#"><img src="../../assets/img/pinterest.svg"></a></li>
            </ul>
        </footer>
        <!-- Footer End -->
    </div>
        <script src="./assets/style.js"></script>
    </body>
</html>