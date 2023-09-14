<?php

require_once "dbconnection.inc.php";
require_once "sessionconfig.inc.php";
require_once "chat_model.inc.php";

$currentLogedInUserId = $_SESSION["userid"];


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $data = json_decode(file_get_contents("php://input"));
    $userIdToStartConvo = $data->getUserId;

    // if ($userIdToStartConvo === 'initial_load') {
    //     $convoId = get_convoid($unigram_conn, $currentLogedInUserId, $userIdToStartConvo);
    //     $allConvoData = get_convodata($unigram_conn, $convoId);

    //     echo json_encode($allUserFriendsData);
    //     http_response_code(200);
    // } else {

    if (check_convo($unigram_conn, $currentLogedInUserId, $userIdToStartConvo)) {
        http_response_code(400);
    } else {
        add_convo($unigram_conn, $currentLogedInUserId, $userIdToStartConvo);

        $userOneFriendData = get_useronefrienddata($unigram_conn, $userIdToStartConvo);

        $convoId = get_convoid($unigram_conn, $currentLogedInUserId, $userIdToStartConvo);
        $allConvoData = get_convodata($unigram_conn, $convoId["conver_id"]);

        $lastConvoRowData = end($allConvoData);

        $response = array(
            'userOneFriendData' => $userOneFriendData,
            'lastConvoRowData' => $lastConvoRowData,
        );

        echo json_encode($response);
        http_response_code(200);
    }
    // }
}
