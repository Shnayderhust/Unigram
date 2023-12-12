<?php

require_once "dbconnection.inc.php";

ini_set("session.use_only_cookies", 1);
ini_set("session.use_strict_mode", 1);

session_set_cookie_params([
    "lifetime" => 1800,
    "domain" => "localhost",
    "path" => "/",
    "secure" => true,
    "httponly" => true
]);

session_start();

// The Blocks below is for security measures of user session
if (isset($_SESSION["userid"])) {
    if (!isset($_SESSION["last_regenarate"])) {
        sessionRegenerateLogin();
    } else {
        $interval = 60 * 30;
        if (time() - $_SESSION["last_regenarate"] >= $interval) {
            sessionRegenerateLogin();
        };
    }
} else {
    if (!isset($_SESSION["last_regenarate"])) {
        sessionRegenerate();
    } else {
        $interval = 60 * 30;
        if (time() - $_SESSION["last_regenarate"] >= $interval) {
            sessionRegenerate();
        };
    }
}


function sessionRegenerateLogin()
{
    $userId = $_SESSION["userid"];
    $newUserId = session_create_id();
    $sessionId = $newUserId . "_" . $userId;
    session_id($sessionId);

    $_SESSION["last_regenarate"] = time();
}

function sessionRegenerate()
{
    session_regenerate_id(true);
    $_SESSION["last_regenarate"] = time();
}
