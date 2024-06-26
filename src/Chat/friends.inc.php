<?php
define("BASE_DIR", __DIR__);
require BASE_DIR . "../Includes/dbconnection.inc.php";
require BASE_DIR . "../Includes/sessionconfig.inc.php";
require BASE_DIR . "friend_model.inc.php";

$currentLogedInUserId = $_SESSION["userid"];

$users = get_alluser($unigram_conn, $currentLogedInUserId);


function displayuserprof($users)
{
    foreach ($users as $user) {
        echo '<div class="onefriend" data-username = "' . $user["username"] . '">';
        echo '<div class="leftprof">';
        echo '<img src="' . $user["profile_pic_id"] . '" alt="" class="profpic">';
        echo '<div class="details">';
        echo '<h3 class="jina">' . $user["username"] . '</h3>';
        echo '<p class="friendbio">' . $user["bio"] . '</p>';
        echo '</div>';
        echo '</div>';
        echo '<button class="addfriend" data-user-id = "' . $user["user_id"] . '">ADD</button>';
        echo '</div>';
    }
}



if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $data = json_decode(file_get_contents("php://input"));
    $userIdToAdd = $data->getUserId;


    if ($userIdToAdd === 'initial_load') {
        $UserFriendsId = get_userfriendsid($unigram_conn, $currentLogedInUserId);
        $allUserFriendsData = get_userfriendsdata($unigram_conn, $UserFriendsId);

        echo json_encode($allUserFriendsData);
        http_response_code(200);
    } else {

        if (dofriend_exist($unigram_conn, $currentLogedInUserId, $userIdToAdd)) {
            http_response_code(400);
        } else {
            add_userfriends($unigram_conn, $currentLogedInUserId, $userIdToAdd);

            $UserFriendsId = get_userfriendsid($unigram_conn, $currentLogedInUserId);
            $allUserFriendsData = get_userfriendsdata($unigram_conn, $UserFriendsId);

            echo json_encode($allUserFriendsData);
            http_response_code(200);
        }
    }
}
