<?php
function get_alluser(object $unigram_conn, $currentLogedInUserId)
{
    $query = "SELECT * FROM users WHERE user_id <> :user_id;";

    $stmt = $unigram_conn->prepare($query);
    $stmt->bindParam(":user_id", $currentLogedInUserId);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function get_userfriendsid(object $unigram_conn, $currentLogedInUserId)
{
    $query = "SELECT friend_id FROM friends WHERE user_id = :user_id;";

    $stmt = $unigram_conn->prepare($query);
    $stmt->bindParam(":user_id", $currentLogedInUserId);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function get_userfriendsdata(object $unigram_conn, $UserFriendsId)
{
    $allUserData = [];

    $query = "SELECT * FROM users WHERE user_id = :user_id;";

    foreach ($UserFriendsId as $FriendId) {

        $stmt = $unigram_conn->prepare($query);
        $stmt->bindParam(":user_id", $FriendId["friend_id"]);
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $allUserData = array_merge($allUserData, $result);
    }
    return $allUserData;
}

// The functions below deals mainly with friend table and user table a little
function dofriend_exist(object $unigram_conn, $currentLogedInUserId, $userIdToAdd)
{
    $query = "SELECT * FROM friends WHERE user_id = :user_id AND friend_id = :friend_id;";

    $stmt = $unigram_conn->prepare($query);
    $stmt->bindParam(":user_id", $currentLogedInUserId);
    $stmt->bindParam(":friend_id", $userIdToAdd);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if (empty($result)) {
        return false;
    } else {
        return true;
    }
}

function add_userfriends(object $unigram_conn, $currentLogedInUserId, $userIdToAdd)
{
    $query = "INSERT INTO friends(user_id, friend_id) VALUES(:user_id, :friend_id);";

    $stmt = $unigram_conn->prepare($query);
    $stmt->bindParam(":user_id", $currentLogedInUserId);
    $stmt->bindParam(":friend_id", $userIdToAdd);
    $stmt->execute();
}

function remove_userfriends(object $unigram_conn, $currentLogedInUserId, $userIdToRemove)
{
    $query = "DELETE FROM friends WHERE (user_id = :user_id AND friend_id = :friend_id) OR (user_id = :friend_id AND friend_id = :user_id);";

    $stmt = $unigram_conn->prepare($query);
    $stmt->bindParam(":user_id", $currentLogedInUserId);
    $stmt->bindParam(":friend_id", $userIdToRemove);
    $stmt->execute();
}
