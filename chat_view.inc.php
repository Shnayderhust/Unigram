<?php
// require_once "dbconnection.inc.php";
// require_once "sessionconfig.inc.php";
// require_once "chat_model.in.php";

function displayusername()
{

    if ($_SESSION["username"]) {
        echo $_SESSION["username"];
    }
}

function displaybio()
{

    if ($_SESSION["userbio"]) {
        echo $_SESSION["userbio"];
    }
}

function displayprofile()
{

    if ($_SESSION["userbio"]) {
        echo $_SESSION["userbio"];
    }
}

function displaystatus()
{
    if ($_SESSION["status"]) {
        echo "<p>Active now</p>";
    }
}
