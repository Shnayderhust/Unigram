<?php
define("BASE_DIR", __DIR__);

require BASE_DIR . "../Includes/dbconnection.inc.php";
require BASE_DIR . "../Includes/sessionconfig.inc.php";
require BASE_DIR . "chatmessage_model.inc.php";

$currentLogedInUserId = $_SESSION["userid"];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $data = json_decode(file_get_contents("php://input"));
    $messagePackage = $data->messagePackage;

    if ($messagePackage->onloadFlag === 'initial_load') {
        $convorId = $messagePackage->convorId;
        $allConvoMessages = get_convorData($unigram_conn, $convorId);

        echo json_encode($allConvoMessages);
        http_response_code(201);
    } else {
        $lastMessage = add_message($unigram_conn, $messagePackage);

        echo json_encode($lastMessage);
        http_response_code(200);
    }
}
