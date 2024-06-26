<?php
define("BASE_DIR", __DIR__);
require BASE_DIR . "../Includes/dbconnection.inc.php";
require BASE_DIR . "../Includes/sessionconfig.inc.php";
require BASE_DIR . "convo_model.inc.php";

$currentLogedInUserId = $_SESSION["userid"];


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $data = json_decode(file_get_contents("php://input"));
    $convoPackage = $data->convoPackage;

    if ($convoPackage === 'initial_load') {
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
    } else if (doesConvoExistForCurrentUser($unigram_conn, $currentLogedInUserId, $convoPackage)) {

        $convoId = get_convoid($unigram_conn, $currentLogedInUserId, $convoPackage);

        echo json_encode($convoId);
        http_response_code(201);
    } else if (doesConvoExistForBothUser($unigram_conn, $currentLogedInUserId, $convoPackage)) {
        $convoId = get_convoid($unigram_conn, $currentLogedInUserId, $convoPackage);
        $userOneFriendData = get_useronefrienddata($unigram_conn, $convoPackage);

        $response = array(
            'userOneFriendData' => $userOneFriendData,
            'convoId' => $convoId,
            'currentLogedInUserId' => $currentLogedInUserId
        );

        echo json_encode($response);
        http_response_code(202);
    } else {
        add_convo($unigram_conn, $currentLogedInUserId, $convoPackage);

        $userOneFriendData = get_useronefrienddata($unigram_conn, $convoPackage);

        $convoId = get_convoid($unigram_conn, $currentLogedInUserId, $convoPackage);
        $allConvoData = get_convodata($unigram_conn, $convoId["convor_id"]);

        $lastConvoRowData = end($allConvoData);

        $response = array(
            'userOneFriendData' => $userOneFriendData,
            'convoId' => $convoId,
            'currentLogedInUserId' => $currentLogedInUserId
        );
        echo json_encode($response);
        http_response_code(200);
    }
}
