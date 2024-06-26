<?php

function is_input_empty($username, $password)
{
    if (empty($username) || empty($password)) {
        return true;
    } else {
        return false;
    }
}

function is_username_invalid($result)
{
    if (!$result) {
        return true;
    } else {
        return false;
    }
}

function is_password_invalid($password, $hashedpassword)
{
    if (!password_verify($password, $hashedpassword)) {
        return true;
    } else {
        return false;
    }
}
