<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>{{ config('app.name', 'Yoga Tracking Website') }}</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="images/favicon/yoga_awesome.ico">
    <link rel="apple-touch-icon" sizes="144x144" type="image/x-icon" href="images/favicon/yoga_awesome.png">

    <link rel="stylesheet" type="text/css" href="css/plugin.css">

    <link rel="stylesheet" type="text/css" href="css/style.css">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:400,300,500,600,700">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <style type="text/css">

    .style-3::-webkit-scrollbar-track
    {
        -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
        background-color: #F5F5F5  ;
    }

    .style-3::-webkit-scrollbar
    {
        width: 6px;
        background-color: #F5F5F5  ;
    }

    .style-3::-webkit-scrollbar-thumb
    {
        background-color: #1B1617  ;
    }

    @media only screen and (min-width:960px) and (orientation:landscape){
        .navbar-right
        {
            margin-right: -37px !important;
        }
    }



    @media only screen and (min-width:768px) and (orientation:portrait){
        .navbar-right
        {
            margin-right: -37px !important;
        }
    }


    </style>
</head>

<body class="style-3">



    <div id="preloader">
        <div class="loader"></div>
    </div>



    <header id="home" class="home-section">

        <div class="header-top-area">
            <div class="container">
                <div class="row">

                    <div class="col-sm-3">
                        <div class="logo">
                            <a href="{{url('/')}}">Yoga Tracker</a>
                        </div>
                    </div>

                    <div class="col-sm-9">
                        <div class="navigation-menu">
                            <div class="navbar">
                                <div class="navbar-header">
                                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                        <span class="sr-only">Toggle navigation</span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                </div>
                                <div class="navbar-collapse collapse">
                                    <ul class="nav navbar-nav navbar-right nav-layout">
                                        <li class="active"><a class="smoth-scroll" href="#home">Home <div class="ripple-wrapper"></div></a>
                                        </li>
                                        <li><a class="smoth-scroll" href="#about">About Me</a>
                                        </li>
                                        <li><a class="smoth-scroll" href="#yogaimages">Images</a>
                                        </li>
                                        <li><a class="smoth-scroll" href="#yogaquotes">Quotes</a>
                                        </li>
                                        <li><a class="smoth-scroll" href="#contact">Contact</a>
                                        </li>
                                        <li><a class="smoth-scroll" href="{{ route('admin.login') }}">Login</a>
                                        </li>
                                        <li><a class="smoth-scroll" href="{{ route('trainee.register') }}">Register</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="home-section-background" data-stellar-background-ratio="0.6">
            <div class="display-table">
                <div class="display-table-cell">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <div class="header-text">
                                    <!-- <p>Hi! This is Jatin Sharma</p> -->
                                    <h2 style="font-size:30px;"><span class="typing"></span></h2>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </header>




    <section id="about" class="about-section">
        <div class="row">

            <div class="col-md-6 col-sm-12 col-xs-12">
                <img class="img-responsive" src="images/supermanbatman.jpg" draggable="false" alt="">
            </div>

            <div class="col-md-6 col-sm-12 col-xs-12">
                <div class="about-me section-space-padding">

                    <h2 class="text-center">About Me.</h2>

                    <p style="padding-top: 10px;">
                        I am someone who is desperately trying to rekindle the "CREATIVE ME" : A part of me that was lost in an abyss created by other HOMOSAPIENS.
                        You can rely on me since I have a knack for getting things done!!!
                        I am enthusiastic and capable of spotting a problem, drilling through the endless factors and details that encompass the issue and I try my level best to come up with a viable solution.
                        In my free time I watch movies , read novels and comics. I am an ardent follower of Batman and try to live by his morals.
                    </p>
                </div>

            </div>

        </div>
    </section>


    <section id="yogaimages" class="yogaimages section-space-padding">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="section-title">
                        <h2>Yoga Images</h2>
                        <p>
                            I have compiled some yoga images for you to check out!!
                        </p>
                    </div>
                </div>
            </div>

            <div class="row">
                <ul class="yogaimages">
                    <li class="filter" data-filter=".apps">View 1</li>
                    <li class="filter" data-filter="all">all</li>
                    <li class="filter" data-filter=".mockups">View 2</li>
                    <li class="filter" data-filter=".wordpress">View 3</li>
                </ul>
            </div>

            <div class="yogaimages-inner">
                <div class="row">


                    <div class="col-md-4 col-sm-6 col-xs-12 mix apps">
                        <div class="item">
                            <a href="images/yogaimages/yoga1.jpg" class="yogaimages-popup" title="Yoga Image 1">
                                <img src="images/yogaimages/yoga1.jpg" alt="">
                            </a>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-6 col-xs-12 mix mockups">
                        <div class="item">
                            <a href="images/yogaimages/yoga2.jpg" class="yogaimages-popup" title="Yoga Image 2">
                                <img src="images/yogaimages/yoga2.jpg" alt="">
                            </a>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-6 col-xs-12 mix apps">
                        <div class="item">
                            <a href="images/yogaimages/yoga3.jpg" class="yogaimages-popup" title="Yoga Image 3">
                                <img src="images/yogaimages/yoga3.jpg" alt="">
                            </a>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-6 col-xs-12 mix mockups wordpress">
                        <div class="item">
                            <a href="images/yogaimages/yoga4.jpg" class="yogaimages-popup" title="Yoga Image 4">
                                <img src="images/yogaimages/yoga4.jpg" alt="">
                            </a>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-6 col-xs-12 mix wordpress apps">
                        <div class="item">
                            <a href="images/yogaimages/yoga5.jpg" class="yogaimages-popup" title="Yoga Image 5">
                                <img src="images/yogaimages/yoga5.jpg" alt="">
                            </a>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-6 col-xs-12 mix apps mockups wordpress" title="Yoga Image 6">
                        <div class="item">
                            <a href="images/yogaimages/yoga8.jpg" class="yogaimages-popup">
                                <img src="images/yogaimages/yoga8.jpg" alt="">
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="text-center margin-top-50">
            <a class="button button-style button-style-dark button-style-icon fa fa-long-arrow-right smoth-scroll" href="#contact">Let's Discuss</a>
        </div>

    </section>




    <!-- Testimonial Start -->
    <section id="yogaquotes" class="yogaquote-section section-space-padding">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="section-title">
                        <h2>Yoga Quotes</h2>
                        <p>
                            I have compiled some yoga quotes for you to check out!!
                        </p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="yogaquote-carousel-list margin-top-20">

                    <div class="yogaquote-word text-center">
                        <img src="images/yogaquotes/yoga1.png" class="img-responsive circle" alt="">
                        <h2>Sally Kempton</h2>
                        <p>
                            “The very heart of yoga practice is ‘abyhasa’ – steady effort in the direction you want to go.”
                        </p>
                    </div>

                    <div class="yogaquote-word text-center">
                        <img src="images/yogaquotes/yoga2.png" class="img-responsive" alt="">
                        <h2>T. Guillemets</h2>
                        <p>
                            “A photographer gets people to pose for him. A yoga instructor gets people to pose for themselves.”
                        </p>
                    </div>

                    <div class="yogaquote-word text-center">
                        <img src="images/yogaquotes/yoga3.png" class="img-responsive" alt="">
                        <h2>Craig Hamilton</h2>
                        <p>
                            “True meditation is about being fully present with everything that is–including discomfort and challenges. It is not an escape from life.”
                        </p>
                    </div>

                    <div class="yogaquote-word text-center">
                        <img src="images/yogaquotes/yoga5.jpeg" class="img-responsive circle" alt="">
                        <h2>Hatha Yoga Pradipika</h2>
                        <p>
                            “Anyone who practices can obtain success in yoga but not one who is lazy. Constant practice alone is the secret of success.”
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <section id="contact" class="contact-us section-space-padding">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="section-title">
                        <h2>Contact Me.</h2>
                        <p>Please drop in a message in case I don't pick up!!</p>
                    </div>
                </div>
            </div>


            <div class="text-center margin-top-10 margin-bottom-50">
                <div class="row">

                    <div class="col-md-4 col-sm-4">
                        <div class="contact-us-detail">
                            <i class="fa fa-mobile color-6"></i>
                            <p><a href="">+918826621482</a></p>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-4">
                        <div class="contact-us-detail">
                            <i class="fa fa-mail-reply color-5"></i>
                            <p><a href="">jatins368@gmail.com</a></p>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-4">
                        <div class="contact-us-detail">
                            <i class="fa fa-clock-o color-3"></i>
                            <p>Mon - Fri 09:00 – 18:00</p>
                        </div>
                    </div>

                </div>
            </div>


            <div class="row">

                <div class="col-md-6">

                    <div class="row">
                        <form class="" action="{{route('contact')}}" method="post">
                            {{ csrf_field() }}
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="text" id="name" class="form-control" placeholder="Your Name" name="name">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="email" id="email" class="form-control" placeholder="Your Email" name="email">
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <select id="subject" class="form-group form-control" name="subject">
                                    <option value="" selected disabled>Subject</option>
                                    <option>I Want a General Talk</option>
                                    <option>Other</option>
                                </select>
                            </div>

                            <div class="col-sm-12">
                                <div class="textarea-message form-group">
                                    <textarea id="message" class="textarea-message form-control" placeholder="Your Message" rows="5" name="message"></textarea>
                                </div>
                            </div>


                            <div class="text-center">
                                <button type="submit" class="button button-style button-style-dark button-style-icon fa fa-long-arrow-right text-center">Submit</button>
                            </div>

                        </form>

                    </div>
                </div>


                <div class="col-md-6">
                    <div id="my-address" class="map space-set">
                        <p>Map will not be display without Internet Connection.</p>
                    </div>
                </div>


            </div>
        </div>
    </section>
    <!-- Contact End -->




    <!-- Footer Start -->
    <footer class="footer-section">
        <div class="container">
            <div class="row">

                <div class="col-md-4 text-left">
                    <p><span><a href="#about" class="smoth-scroll">About Me</a></span> | <span><a href="#yogaimages" class="smoth-scroll">Yoga Images</a></span></p>
                </div>

                <div class="col-md-4 text-center">
                    <p>© Copyright Jatin Sharma.</p>
                </div>

            </div>
        </div>
    </footer>
    <!-- Footer End -->


    <!-- Back to Top Start -->
    <a href="#" class="scroll-to-top"><i class="fa fa-angle-up"></i></a>
    <!-- Back to Top End -->


    <!-- All Javascript Plugins  -->
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/plugin.js"></script>
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyC0HAKwKinpoFKNGUwRBgkrKhF-sIqFUNA"></script>

    <!-- Main Javascript File  -->
    <script type="text/javascript" src="js/scripts.js"></script>


</body>
</html>
