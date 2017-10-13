<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style media="screen">

    body, h1, h2, h3, h4, h5, h6
    {
        font-family: "Montserrat", sans-serif;
    }

    .w3-row-padding img
    {
        margin-bottom: 12px;
    }

    /*set the width of the sidebar to 120px*/
    .w3-sidebar
    {
        width: 120px;
        background: #222;
    }

    /*Add a left margin to the "page content" that matches the width of the sidebar (120px)*/
    #main
    {
        margin-left: 120px;
    }

    /*Changing the color of the placeholder */
    ::-webkit-input-placeholder { /* WebKit, Blink, Edge */
        color:    red;
    }
    :-moz-placeholder { /* Mozilla Firefox 4 to 18 */
       color:    red;
       opacity:  1;
    }
    ::-moz-placeholder { /* Mozilla Firefox 19+ */
       color:    red;
       opacity:  1;
    }
    :-ms-input-placeholder { /* Internet Explorer 10-11 */
       color:    red;
    }
    ::-ms-input-placeholder { /* Microsoft Edge */
       color:    red;
    }

    /*Remove margins from "page content" on small screens*/

    @media only screen and (max-width: 600px)
    {
        #main
        {
            margin-left: 0;
        }
    }

    </style>
    <title>About Me</title>
</head>
<body class="w3-black">


<!-- Icon bar (Sidebar -- hidden on small screens) -->
<nav class="w3-sidebar w3-bar-block w3-small w3-hide-small w3-center">

    <!-- Avatar image on top left corner -->
    <img src="../images/batman.jpeg" alt="" style="width:100%">

    <a href="{{url('/')}}" id="yogatracker" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
        <i class="fa fa-home w3-xxlarge"></i>
        <p>YOGA TRACKER HOME PAGE</p>
    </a>
    <a href="#home" class="w3-bar-item w3-button w3-padding-large w3-black">
        <i class="fa fa-home w3-xxlarge"></i>
        <p>HOME</p>
    </a>

    <a href="#about" class="w3-bar-item w3-button w3-padding-large w3-hover-black" >
        <i class="fa fa-user w3-xxlarge"></i>
        <p>ABOUT</p>
    </a>

    <a href="#contact" class="w3-bar-item w3-button w3-padding-large w3-hover-black"><i class="fa fa-envelope w3-xxlarge"></i>
        <p>CONTACT</p>
    </a>
</nav>

<!-- Navbar on small screens (Hidden on medium and large screens) -->

<div class="w3-top w3-hide-large w3-hide-medium" id="myNavbar">
    <div class="w3-bar w3-black w3-opacity w3-hover-opacity-off w3-center w3-small">

        <a href="{{url('/')}}" class="w3-bar-item w3-button" style="width:25% !important">YOGA TRACKER HOME PAGE</a>
        <a href="#home" class="w3-bar-item w3-button" style="width:25% !important">HOME</a>
        <a href="#about" class="w3-bar-item w3-button" style="width:25% !important">ABOUT</a>
        <a href="#contact" class="w3-bar-item w3-button" style="width:25% !important">CONTACT</a>
    </div>
</div>

<!-- Page Content -->

    <div class="w3-padding-large" id="main">

        <header class="w3-container w3-padding-32 w3-center w3-black" id="home">

        <h1 class="w3-jumbo" ><span class="w3-hide-small">I'm</span> Jatin Sharma</h1>
        <p style="font-size:30px;">Laravel Enthusiast and Web Designing Dilettante</p>

        <img src="../images/batman5.jpg" alt="batman" class="w3-image" width=100%  height=100%>
        </header>

        <!-- About Part starts here  -->

        <div class="w3-content w3-justify w3-text-grey w3-padding-64" id="about">

            <h2 class="w3-text-light-grey" style="font-size:40px;">Jatin Sharma</h2>
            <hr style="width:260px;" class="w3-opacity">

            <p>I am someone who is desperately trying to rekindle the "CREATIVE ME" : A part of me that was lost in an abyss created by other HOMOSAPIENS. </p>
            <p class="w3-center" style="font-size: 40px;">You can rely on me since I have a knack for getting things done!!! </p>
            <p>I am enthusiastic and capable of spotting a problem, drilling through the endless factors and details that encompass the issue and I try my level best to come up with a viable solution.</p>
            <p>In my free time I watch movies , read novels and comics. I am an ardent follower of Batman and try to live by his morals.</p>

            <h3 class="w3-padding-16 w3-text-light-grey" style="font-size:40px;">My Skills</h3>
            <hr style="width:160px" class="w3-opacity">
            <p class="w3-wide">HTML CSS and Bootstrap</p>
            <div class="w3-white">
                <div class="w3-dark-grey" style="height:28px; width:65%">
                    <p class="text-center" style="padding-top:4px;">65%</p>
                </div>
            </div>

            <br>

            <p class="w3-wide">PHP and Laravel</p>
            <div class="w3-white">
                <div class="w3-dark-grey" style="height:28px; width:50%">
                    <p class="text-center" style="padding-top:4px;">50%</p>
                </div>
            </div>

            <br>

            <p class="w3-wide">Javascript and jQuery</p>
            <div class="w3-white">
                <div class="w3-dark-grey" style="height:28px; width:40%">
                    <p class="text-center" style="padding-top:4px;">40%</p>
                </div>
            </div>

            <br>

            <p class="w3-wide">MySQL and Databases</p>
            <div class="w3-white">
                <div class="w3-dark-grey" style="height:28px; width:75%">
                    <p class="text-center" style="padding-top:4px;">75%</p>
                </div>
            </div>

            <br>

            <button class="w3-button w3-light-grey w3-padding-large w3-section">
                <i class="fa fa-download"></i>
                Download Resume
            </button>

            <!-- Contact Form starts here -->

            <div class="w3-padding-64 w3-content w3-text-grey" id="contact">
                <h2 class="w3-text-light-grey">Contact Me</h2>
                <hr style="width:200px" class="w3-opacity">

                <div class="w3-section">
                    <p><i class="fa fa-map-marker fa-fw w3-text-white w3-xxlarge w3-margin-right"></i> Delhi, India</p>
                    <p><i class="fa fa-phone fa-fw w3-text-white w3-xxlarge w3-margin-right"></i> Phone: +918826621482</p>
                    <p><i class="fa fa-envelope fa-fw w3-text-white w3-xxlarge w3-margin-right"></i> Email: jatins368@gmail.com</p>
                </div>

                <br>

                <p>Let's get in touch. Send me a message:</p>

                <form class="" action="{{route('contact')}}" method="post">
                      {{ csrf_field() }}
                    <p><input type="text" name="name" value="" class="w3-input w3-row-padding-16" placeholder="Name" required></p>
                    <p><input type="text" name="email" value="" class="w3-input w3-row-padding-16" placeholder="Email" required></p>
                    <p><input type="text" name="subject" value="" class="w3-input w3-row-padding-16" placeholder="Subject" required></p>
                    <p>
                        <textarea name="message" value="" class="w3-input w3-row-padding-16" placeholder="Message" required></textarea>
                    </p>
                    <p>
                        <button class="w3-button w3-light-grey w3-padding-large" type="submit"><i class="fa fa-paper-plane"></i>
                            SEND MESSAGE
                        </button>
                    </p>
                </form>

                <!-- Contact Form ends here -->

            </div>

        </div>
    </div>
</body>
</html>
