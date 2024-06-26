<?php

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