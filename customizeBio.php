<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $bio = $_POST["custombio"];
    // $bio = $_POST["bio"];

    try {

        require_once "sessionconfig.inc.php";
        require_once "dbconnection.inc.php";
        require_once "signup_model.inc.php";
        require_once "signup_control.inc.php";


        // ERROR HANDLING
        $makosa = [];
        // 
        if ($bio == "") {
        } else if ($_SESSION["useremail"]) {

            $email = $_SESSION["useremail"];
            update_bio($unigram_conn, $email, $bio);
            $_SESSION["userbio"] = $bio;
        }
    } catch (PDOException $e) {
        die("connection error:" . $e->getMessage());
    };
}
