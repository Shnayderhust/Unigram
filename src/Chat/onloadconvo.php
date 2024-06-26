<?php
define("BASE_DIR", __DIR__);
require BASE_DIR . "../Includes/dbconnection.inc.php";
require BASE_DIR . "../Includes/sessionconfig.inc.php";
require "chat_model.inc.php";

$currentLogedInUserId = $_SESSION["userid"];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $data = json_decode(file_get_contents("php://input"));
    $userIdToStartConvo = $data->getUserId;

    if ($userIdToStartConvo === 'initial_load') {
        $allUserFriendsId = get_allFriendsId($unigram_conn, $currentLogedInUserId);
        $allUserFriendsData = get_alluserfriendsdata($unigram_conn, $allUserFriendsId);

        $currentLoggedUserConvoIds = get_allConvoIdOfOneUser($unigram_conn, $currentLogedInUserId);

        $response = array(
            'allUserFriendsData' => $allUserFriendsData,
            'currentLoggedUserConvoIds' => $currentLoggedUserConvoIds,
            'currentLogedInUserId' => $currentLogedInUserId
        );

        echo json_encode($response);
        http_response_code(203);
    }
}
