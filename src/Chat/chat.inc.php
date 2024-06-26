<?php
define('BASE_DIR', __DIR__);
require BASE_DIR . "../Includes/dbconnection.inc.php";
require BASE_DIR . "../Includes/sessionconfig.inc.php";
require BASE_DIR . "chat_model.inc.php";


if ($_SESSION["username"]) {
    $username = $_SESSION["username"];
    $status = 1;
    $status = $_SESSION["status"];

    update_status($unigram_conn, $username, $status);
}
