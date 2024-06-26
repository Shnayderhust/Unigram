<?php
define("BASE_DIR", __DIR__);
require BASE_DIR . "../Includes/dbconnection.inc.php";
require BASE_DIR . "../Includes/sessionconfig.inc.php";
require "friend_model.inc.php";

$currentLogedInUserId = $_SESSION["userid"];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $data = json_decode(file_get_contents("php://input"));

    $getUserId = $data->getUserId;

    $userIdToRemove = $getUserId->userId;
    $removeUser = $getUserId->removeFlag;
    // error_log(json_encode($userIdToRemove) . "\n", 3, "debug.log");

    if ($removeUser === 'removeFriend') {
        remove_userfriends($unigram_conn, $currentLogedInUserId, $userIdToRemove);
        http_response_code(200);
    }
}
