<!DOCTYPE HTML>
<html lang="en">
<head>
    <!--=============== basic  ===============-->
    <meta charset="UTF-8">
    <title>Cemeteries - World’s largest gravesite collection</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="robots" content="index, follow"/>
    <meta name="keywords" content=""/>
    <meta name="description" content=""/>
    <!--=============== css  ===============-->
    <link type="text/css" rel="stylesheet" href="/css/reset.css">
    <link type="text/css" rel="stylesheet" href="/css/plugins.css">
    <link type="text/css" rel="stylesheet" href="/css/style.css">
    <link type="text/css" rel="stylesheet" href="/css/color.css">
    <!--=============== favicons ===============-->
    <link rel="shortcut icon" href="/images/favicon.ico">

    <style>
        .memorials .listsearch-input-item {
            width: 25%;
            padding: 2px 3px;
        }
        .memorials .geodir-category-img{
            width: 20%!important;
        }
       .memorials .geodir-category-content {
            width: 40%!important;
        }
       .clisting .listsearch-input-text {
           margin-top: 0!important;
       }
        .listing-item {
            width: 33%!important;
        }
    </style>
</head>
<body>
<!--loader-->
<div class="loader-wrap">
    <div class="pin"></div>
    <div class="pulse"></div>
</div>
<!--loader end-->
<!-- Main  -->
<div id="main">

    @include('partials.header')
    <!--  wrapper  -->

        @yield('content')

    <!-- wrapper end -->
    <!--footer -->
    <footer class="main-footer dark-footer  ">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="footer-widget fl-wrap">
                        <h3>About Us</h3>
                        <div class="footer-contacts-widget fl-wrap">
                            <p>In ut odio libero, at vulputate urna. Nulla tristique mi a massa convallis cursus. Nulla eu mi magna. Etiam suscipit commodo gravida. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam. </p>
                            <ul  class="footer-contacts fl-wrap">
                                <li><span><i class="fa fa-envelope-o"></i> Mail :</span><a href="#" target="_blank">support@cemeteries.com</a></li>
                                <li> <span><i class="fa fa-map-marker"></i> Adress :</span><a href="#" target="_blank">USA 27TH Brooklyn NY</a></li>
                                <li><span><i class="fa fa-phone"></i> Phone :</span><a href="#">+7(111)000000000</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="footer-widget fl-wrap">
                        <h3>Our  Twitter</h3>
                        <div id="footer-twiit"></div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="footer-widget fl-wrap">
                        <h3>Subscribe</h3>
                        <div class="subscribe-widget fl-wrap">
                            <p>Want to be notified when we launch a new template or an udpate. Just sign up and we'll send you a notification by email.</p>
                            <div class="subcribe-form">
                                <form id="subscribe">
                                    <input class="enteremail" name="email" id="subscribe-email" placeholder="Email" spellcheck="false" type="text">
                                    <button type="submit" id="subscribe-button" class="subscribe-button"><i class="fa fa-rss"></i> Subscribe</button>
                                    <label for="subscribe-email" class="subscribe-message"></label>
                                </form>
                            </div>
                        </div>
                        <div class="footer-widget fl-wrap">
                            <div class="footer-menu fl-wrap">
                                <ul>
                                    <li><a href="#">Home </a></li>
                                    <li><a href="#">Memorials</a></li>
                                    <li><a href="#">Cemeteries</a></li>
                                    <li><a href="#">Contact Us</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="sub-footer fl-wrap">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="about-widget">
                            <img src="/images/logo.png" alt="">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="copyright"> &#169; Cemeteries @ 2018 - {{ date('Y') }} .  All rights reserved.</div>
                    </div>
                    <div class="col-md-4">
                        <div class="footer-social">
                            <ul>
                                <li><a href="#" target="_blank" ><i class="fa fa-facebook-official"></i></a></li>
                                <li><a href="#" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#" target="_blank" ><i class="fa fa-chrome"></i></a></li>
                                <li><a href="#" target="_blank" ><i class="fa fa-vk"></i></a></li>
                                <li><a href="#" target="_blank" ><i class="fa fa-whatsapp"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--footer end  -->
    <!--register form -->
    <div class="main-register-wrap modal">
        <div class="main-overlay"></div>
        <div class="main-register-holder">
            <div class="main-register fl-wrap">
                <div class="close-reg"><i class="fa fa-times"></i></div>
                <h3>Sign In <span>City<strong>Book</strong></span></h3>
                <div class="soc-log fl-wrap">
                    <p>For faster login or register use your social account.</p>
                    <a href="#" class="facebook-log"><i class="fa fa-facebook-official"></i>Log in with Facebook</a>
                    <a href="#" class="twitter-log"><i class="fa fa-twitter"></i> Log in with Twitter</a>
                </div>
                <div class="log-separator fl-wrap"><span>or</span></div>
                <div id="tabs-container">
                    <ul class="tabs-menu">
                        <li class="current"><a href="#tab-1">Login</a></li>
                        <li><a href="#tab-2">Register</a></li>
                    </ul>
                    <div class="tab">
                        <div id="tab-1" class="tab-content">
                            <div class="custom-form">
                                <form method="post"  name="registerform">
                                    <label>Username or Email Address * </label>
                                    <input name="email" type="text"   onClick="this.select()" value="">
                                    <label >Password * </label>
                                    <input name="password" type="password"   onClick="this.select()" value="" >
                                    <button type="submit"  class="log-submit-btn"><span>Log In</span></button>
                                    <div class="clearfix"></div>
                                    <div class="filter-tags">
                                        <input id="check-a" type="checkbox" name="check">
                                        <label for="check-a">Remember me</label>
                                    </div>
                                </form>
                                <div class="lost_password">
                                    <a href="#">Lost Your Password?</a>
                                </div>
                            </div>
                        </div>
                        <div class="tab">
                            <div id="tab-2" class="tab-content">
                                <div class="custom-form">
                                    <form method="post"   name="registerform" class="main-register-form" id="main-register-form2">
                                        <label >First Name * </label>
                                        <input name="name" type="text"   onClick="this.select()" value="">
                                        <label>Second Name *</label>
                                        <input name="name2" type="text"  onClick="this.select()" value="">
                                        <label>Email Address *</label>
                                        <input name="email" type="text"  onClick="this.select()" value="">
                                        <label >Password *</label>
                                        <input name="password" type="password"   onClick="this.select()" value="" >
                                        <button type="submit"     class="log-submit-btn"  ><span>Register</span></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--register form end -->
    <a class="to-top"><i class="fa fa-angle-up"></i></a>
</div>
<!-- Main end -->
<!--=============== scripts  ===============-->
<script type="text/javascript" src="/js/jquery.min.js"></script>
<script type="text/javascript" src="/js/plugins.js"></script>
<script type="text/javascript" src="/js/scripts.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAMby_wXUDOQbdZtIhHjv_nXyKqtO1w-AY&amp;libraries=places&amp;callback=initAutocomplete"></script>


<script type="text/javascript" src="/js/map_infobox.js"></script>
<script type="text/javascript" src="/js/markerclusterer.js"></script>
<script type="text/javascript" src="/js/maps.js"></script>

</body>
</html>
