<?php
define('BASE_DIR', __DIR__);
require BASE_DIR . "../Includes/sessionconfig.inc.php";
require "signup_view.inc.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./assets/picsandicons/favicon.png">
    <link rel="stylesheet" href="./assets/reg.css">
    <title>Unigram | Register</title>
</head>

<body>
    <section class="left">
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

            <div id=errorcontainer>
            </div>

        </div>

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


    <script src="../JS/formdata.js"></script>
    <script src="../JS/reg.js"></script>
    <script src="../JS/nav.js"></script>
</body>

</html>