<?php

function display_login_error()
{
    if (isset($_SESSION["error_login"])) {
        $errors = $_SESSION["error_login"];

        foreach ($errors as $error) {
            echo '<p id="loginerrormessage">> ' . $error . '</p>';
        }

        unset($_SESSION["error_login"]);
    }
}

function logout()
{
    if (isset($_POST["logout"])) {
        session_destroy();
        header("location: ../Unigram/login.php");
    }
}
