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
