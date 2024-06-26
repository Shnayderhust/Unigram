<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $bio = $_POST["custombio"];

    try {
        define("BASE_DIR", __DIR__);
        require BASE_DIR . "../Includes/dbconnection.inc.php";
        require BASE_DIR . "../Includes/sessionconfig.inc.php";
        require BASE_DIR . "../Registration/signup_model.inc.php";
        require BASE_DIR . "../Registration/signup_control.inc.php";


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
