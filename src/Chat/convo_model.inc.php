<?php
function get_allFriendsId(object $unigram_conn, $currentLogedInUserId)
{
    $query1 = "SELECT user1_id FROM conversation WHERE user2_id = :user_id";
    $query2 = "SELECT user2_id FROM conversation WHERE user1_id = :user_id";

    $stmt1 = $unigram_conn->prepare($query1);
    $stmt1->bindParam(":user_id", $currentLogedInUserId);
    $stmt1->execute();
    $result1 = $stmt1->fetchAll(PDO::FETCH_ASSOC);

    $stmt2 = $unigram_conn->prepare($query2);
    $stmt2->bindParam(":user_id", $currentLogedInUserId);
    $stmt2->execute();
    $result2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);

    $allFriends = array_merge($result1, $result2);

    return $allFriends;
}

function get_alluserfriendsdata(object $unigram_conn, $allUserFriendsId)
{
    $allUserData = [];

    $query = "SELECT * FROM users WHERE user_id = :user_id;";

    foreach ($allUserFriendsId as $FriendId) {
        $user1Data = null;
        $user2Data = null;

        if (isset($FriendId["user2_id"])) {
            $stmt2 = $unigram_conn->prepare($query);
            $stmt2->bindParam(":user_id", $FriendId["user2_id"]);
            $stmt2->execute();
            $user2Data = $stmt2->fetch(PDO::FETCH_ASSOC);
        }

        if (isset($FriendId["user1_id"])) {
            $stmt1 = $unigram_conn->prepare($query);
            $stmt1->bindParam(":user_id", $FriendId["user1_id"]);
            $stmt1->execute();
            $user1Data = $stmt1->fetch(PDO::FETCH_ASSOC);
        }

        if ($user1Data) {
            $allUserData[] = $user1Data;
        }
        if ($user2Data) {
            $allUserData[] = $user2Data;
        }
    }

    return $allUserData;
}

function get_allConvoIdOfOneUser(object $unigram_conn, $currentLogedInUserId)
{
    $query = "SELECT convor_id FROM conversation WHERE user1_id = :user1_id
    UNION SELECT convor_id FROM conversation WHERE user2_id = :user2_id;";

    $stmt = $unigram_conn->prepare($query);
    $stmt->bindParam(":user1_id", $currentLogedInUserId);
    $stmt->bindParam(":user2_id", $currentLogedInUserId);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function doesConvoExistForCurrentUser(object $unigram_conn, $currentLogedInUserId, $userIdToStartConvo)
{
    $query = "SELECT convor_id FROM conversation WHERE
     (user1_id = :user1_id AND user2_id = :user2_id);";

    $stmt = $unigram_conn->prepare($query);
    $stmt->bindParam(":user1_id", $currentLogedInUserId);
    $stmt->bindParam(":user2_id", $userIdToStartConvo);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if (empty($result)) {
        return false;
    } else {
        return true;
    }
}

function get_convoid(object $unigram_conn, $currentLogedInUserId, $userIdToStartConvo)
{
    $query = "SELECT convor_id FROM conversation WHERE (user1_id = :user1_id AND user2_id = :user2_id) OR (user1_id = :user2_id AND user2_id = :user1_id);";

    $stmt = $unigram_conn->prepare($query);
    $stmt->bindParam(":user1_id", $currentLogedInUserId);
    $stmt->bindParam(":user2_id", $userIdToStartConvo);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function doesConvoExistForBothUser(object $unigram_conn, $currentLogedInUserId, $userIdToStartConvo)
{
    $query = "SELECT convor_id FROM conversation WHERE
     (user1_id = :user1_id AND user2_id = :user2_id) OR (user1_id = :user2_id AND user2_id = :user1_id);";

    $stmt = $unigram_conn->prepare($query);
    $stmt->bindParam(":user1_id", $currentLogedInUserId);
    $stmt->bindParam(":user2_id", $userIdToStartConvo);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    if (empty($result)) {
        return false;
    } else {
        return true;
    }
}

function get_useronefrienddata(object $unigram_conn, $userIdToStartConvo)
{

    $query = "SELECT * FROM users WHERE user_id = :user_id;";

    $stmt = $unigram_conn->prepare($query);
    $stmt->bindParam(":user_id", $userIdToStartConvo);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result;
}

function add_convo(object $unigram_conn, $currentLogedInUserId, $userIdToStartConvo)
{
    $convor_id = $currentLogedInUserId . $userIdToStartConvo;
    $query = "INSERT INTO conversation(convor_id, user1_id, user2_id) VALUES(:convor_id, :user1_id, :user2_id);";

    $stmt = $unigram_conn->prepare($query);
    $stmt->bindParam(":user1_id", $currentLogedInUserId);
    $stmt->bindParam(":user2_id", $userIdToStartConvo);
    $stmt->bindParam(":convor_id", $convor_id);
    $stmt->execute();
}

function get_convodata(object $unigram_conn, $convoId)
{
    $allConvoData = [];

    $query = "SELECT * FROM messages WHERE conversation_id = :conversation_id";

    $stmt = $unigram_conn->prepare($query);
    $stmt->bindParam(":conversation_id", $convoId);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $allConvoData = array_merge($allConvoData, $result);

    return $allConvoData;
}
