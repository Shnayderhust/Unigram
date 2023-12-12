<?php

// The functions below deals with user table
function get_user(object $unigram_conn, $username)
{
    $query = "SELECT * FROM users WHERE username = :username";
    $stmt = $unigram_conn->prepare($query);
    $stmt->bindParam(":username", $username);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function update_status(object $unigram_conn, $username, $status)
{
    $query = "UPDATE users SET status = :status WHERE username = :username;";
    $stmt = $unigram_conn->prepare($query);


    $stmt->bindParam(":username", $username);
    $stmt->bindParam(":status", $status);
    $stmt->execute();
}

// function delete_convo(object $unigram_conn, $convoPackage)
// {
//     $receiverId = $convoPackage->receiverId;
//     $senderId = $convoPackage->senderId;
//     $convorId = $convoPackage->convorId;

//     // $convor_id = $currentLogedInUserId . $userIdToStartConvo;
//     // $query = "INSERT INTO conversation(user1_convodelete, user2_convodelete) VALUES(:user1_convodelete, :user2_convodelete);";

//     $query = "INSERT INTO conversation(firstuserto_deleteconvo, seconduserto_deleteconvo)
//     VALUES (
//         CASE
//             WHEN convor_id = :convor_id AND (user1_id = :user1_id OR user2_id = :user1_id) THEN :firstuserto_deleteconvo
//             ELSE :default
//         END,
//         CASE
//             WHEN convor_id = :convor_id AND (user1_id = :user2_id OR user2_id = :user2_id) THEN :seconduserto_deleteconvo
//             ELSE :default
//         END
//     );";

//     $stmt = $unigram_conn->prepare($query);
//     $stmt->bindParam(":user1_convodelete", 1);
//     $stmt->bindParam(":default", 0);
//     $stmt->bindParam(":user2_convodelete", 1);
//     $stmt->bindParam(":convor_id", $convorId);
//     $stmt->bindParam(":user1_id", $senderId);
//     $stmt->bindParam(":user2_id", $receiverId);
//     $stmt->execute();
// }


// function get_allconvoDataOfOneUser(object $unigram_conn, $allConvoIds)
// {
//     $allConvoData = [];

//     $query = "SELECT * FROM messages WHERE conversation_id = :conversation_id";

//     foreach ($allConvoIds as $convoId) {
//         $stmt = $unigram_conn->prepare($query);
//         $stmt->bindParam(":conversation_id", $convoId["convor_id"]);
//         $stmt->execute();

//         $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
//         $allConvoData = array_merge($allConvoData, $result);
//     };


//     return $allConvoData;
// }

// function get_alluserfriendsdata(object $unigram_conn, $allUserFriendsId)
// {
//     $allUserData = [];

//     $query = "SELECT * FROM users WHERE user_id = :user_id;";

//     foreach ($allUserFriendsId as $FriendId) {

//         $userIdToQuery = isset($FriendId["user1_id"]) ? $FriendId["user1_id"] : $FriendId["user2_id"];

//         $stmt = $unigram_conn->prepare($query);
//         $stmt->bindParam(":user_id", $userIdToQuery);
//         $stmt->execute();

//         $result = $stmt->fetch(PDO::FETCH_ASSOC);

//         $allUserData[] = $result;
//     }

//     return $allUserData;
// }


// function get_allFriendsId(object $unigram_conn, $currentLogedInUserId)
// {
//     $query = "SELECT user2_id FROM conversation WHERE user1_id = :user1_id;
//     UNION SELECT user1_id FROM conversation WHERE user2_id = :user2_id;";

//     $stmt = $unigram_conn->prepare($query);
//     $stmt->bindParam(":user1_id", $currentLogedInUserId);
//     $stmt->bindParam(":user2_id", $currentLogedInUserId);
//     $stmt->execute();
//     $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
//     return $result;
// }
