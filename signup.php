<?php
require_once "signup_view.inc.php";
require_once "sessionconfig.inc.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- linking shortcut icon at the header of the site on the tab named favicon found in assets the pics and icons subfolder -->
    <link rel="shortcut icon" href="./assets/picsandicons/favicon.png">
    <!-- linking css file named reg.css found in assets folder -->
    <link rel="stylesheet" href="./assets/reg.css">
    <title>Unigram | Register</title>
</head>

<body>

    <!-- in body container there are two container named section one with class of left and another with class of right -->

    <!-- this section tag is like a container that hold other html contents  -->
    <section class="left">
        <!-- the div bellow acts as the header of the this section -->
        <div id="header">
            <div class="mlogo" id="h1">
                <img src="assets/picsandicons/favicon.png" id="img" class="mlogo">
                <h1 class="mlogo">Unigram</h1>
            </div>
            <p>Unigram makes it easy and fun to communicate!.</p>
            <button id="google">Sign Up With Google</button>
            <div class="div">
                <hr>
                <span>OR</span>
                <hr>
            </div>



            <!-- This Container Bellow is Responsible for Receiving Error Messages On Registration -->

            <div id=errorcontainer>
            </div>

        </div>

        <!-- This is the inputs form that a user fill out his/her details for registration
    
        Each input and its lable are wrapped inside section just for easy and responsive styling with css

        The method of form is set to Post which is more secure than get in the case of submitting user data
        -->

        <form id="regform">
            <section>
                <label for="first name">First Name</label>
                <input type="text" name="fn" placeholder="Enter Your First Name">
            </section>

            <section>
                <label for="last name">Last Name</label>
                <input type="text" name="ln" placeholder="Enter Your Last Name">
            </section>

            <section>
                <label for="last name">University</label>
                <input type="text" name="University" placeholder="Which university do you enroll">
            </section>

            <section>
                <label for="email">Email</label>
                <input type="email" name="em" placeholder="Enter Your Email">
            </section>

            <section>
                <label for="password">Password</label>
                <input type="password" name="pas" placeholder="Enter Your Password">
            </section>

            <div id="bottom">
                <button id="finalButt" type="submit" name="signupbut">Sign Up</button>
                <p>Already got an account?<span class="mlogin">Log in</span></p>
                <p>You didn't finish registration?<span id="finishreg">Click here</span></p>
            </div>
        </form>


    </section>

    <!-- This section with clss of rigth is the one with purple color in the registration form which is empty we can fill it with some dope design like the app logo or a picture later -->
    <section class="right">
        <img src="./assets/picsandicons/favicon.png" class="mlogo" alt="" id="rightlogo" class="mlogo">
        <h1>Unigram</h1>
        <p>Unigram makes it easy and fun to communicate!.</p>
    </section>

    <div id="topprof">
        <form enctype="multipart/form-data" id="bigcontainer">
            <div id="kichwa">
                <i class="fa-solid fa-arrow-left" id="return"></i>
                <h2 id="title">Now Customize Your Profile</h2>
            </div>
            <div id="profcontainer">
                <p class="explainingtext">In order to log in you need a unique username</p>
                <div id="proferrorcontainer">

                </div>
                <section id="profname">
                    <label for="user name" id="usernamelabel">User Name</label>
                    <input type="text" name="us" placeholder="Choose a Unique username" autocomplete="off">
                </section>
                <section id="profname">
                    <label for="user name" id="biolabel">Biograph</label>
                    <input type="text" name="bio" placeholder="Write short bio bout yourself" autocomplete="off">
                </section>

                <section class="profcustom">
                    <div id="profpic"><img src="./assets/UserPics/userDefaultProfile.png" alt="" id="chosingprof"></div>
                    <div id="buttons">
                        <label for="chooseprof" id="fileLabel">Choose Image</label>
                        <input type="file" name="file" id="chooseprof" onchange="displaySelectedImage()">
                        <label for="kusanya" id="kusanyalabel">Next</label>
                        <input type="submit" name="kusanya" id="kusanya">
                    </div>
                </section>
            </div>


        </form>
    </div>


    <script src="formdata.js"></script>
    <script src="reg.js"></script>
    <script src="nav.js"></script>
</body>

</html>