<?php

require_once "dbconnection.inc.php";
require_once "sessionconfig.inc.php";
require_once "friend_model.inc.php";

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
