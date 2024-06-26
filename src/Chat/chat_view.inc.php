<?php

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
