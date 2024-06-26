<?php

function is_input_empty($firstname, $lastname, $email, $password, $university)
{
    if (empty($firstname) || empty($lastname) || empty($email) || empty($password) || empty($university)) {
        return true;
    } else {
        return false;
    }
}

function is_email_invalid($email)
{
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
    } else {
        return false;
    }
}



function is_email_registered(object $unigram_conn, $email)
{
    if (get_email($unigram_conn, $email)) {
        return true;
    } else {
        return false;
    }
}

function is_username_taken(object $unigram_conn, $username)
{
    if (get_username($unigram_conn, $username)) {
        return true;
    } else {
        return false;
    }
}
