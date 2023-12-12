<?php

require_once "dbconnection.inc.php";
require_once "sessionconfig.inc.php";
require_once "chat_model.in.php";

if ($_SESSION["username"]) {
    $username = $_SESSION["username"];
    $status = 1;
    $status = $_SESSION["status"];

    update_status($unigram_conn, $username, $status);
}
