<?php

function signupsuccess()
{
    if (isset($_GET["signup"]) && $_GET["signup"] === "success") {
        echo "<p class='signupsuccessmessage'>You Have Successfull Sign Up</p>";
        echo "<p class='signupsuccessmessage'>Now Log In Using Your Credentials</p>";
    }
}
