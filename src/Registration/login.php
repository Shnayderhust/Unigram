<?php
define("BASE_DIR", __DIR__);
require BASE_DIR . "../Includes/sessionconfig.inc.php";
require "signup_view.inc.php";
require "login_view.inc.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./assets/picsandicons/favicon.png">
    <link rel="stylesheet" href="./assets/reg.css">
    <title>Unigram | Log In</title>
</head>

<body>

    <section class="left">
        <div id="header">
            <div class="mlogo" id="h1">
                <img src="./assets/picsandicons/favicon.png" class="mlogo" alt="" id="img" class="mlogo">
                <h1 class="mlogo">Unigram</h1>
            </div>
            <p>Unigram makes it easy and fun to communicate!.</p>
            <button id="google">Log In With Google</button>
            <div class="div">
                <hr>
                <span>OR</span>
                <hr>
            </div>

            <div id="<?php if (isset($_SESSION["error_login"])) {
                            echo 'loginerror';
                        } else {
                            if (isset($_GET["signup"])) {
                                echo 'signupsuccess';
                            } else {
                                echo 'normalsignup';
                            }
                        } ?>">
                <?php if (isset($_SESSION["error_login"])) {
                    display_login_error();
                } else {
                    signupsuccess();
                } ?>
            </div>

        </div>

        <form action="login.inc.php" id="regform" method="POST">

            <section>
                <label for="user name">User Name</label>
                <input type="text" name="username" id="un" placeholder="Enter Your Username" autocomplete="off">
            </section>

            <section>
                <label for="password" id="ps">Password</label>
                <input type="password" name="password" placeholder="Enter Your Password">
            </section>

            <button id="finalButt" name="login">Log In</button>
            <p>Dont have an account yet?<span class="reglink">Sign up for free</span></p>
        </form>

    </section>

    <section class="right">
        <img src="./assets/picsandicons/favicon.png" class="mlogo" alt="" id="rightlogo">
        <h1>Welcome To Unigram</h1>
        <p>Unigram makes it easy and fun to communicate!.</p>
    </section>

    <script src="../JS/nav.js"></script>
</body>

</html>