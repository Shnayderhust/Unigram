<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $username = $_POST["customusername"];

    try {
        define("BASE_DIR", __DIR__);
        require BASE_DIR . "../Includes/dbconnection.inc.php";
        require BASE_DIR . "../Includes/sessionconfig.inc.php";
        require BASE_DIR . "../Registration/signup_model.inc.php";
        require BASE_DIR . "../Registration/signup_control.inc.php";

        // ERROR HANDLING
        $makosa = [];
        // 
        if (is_username_taken($unigram_conn, $username)) {
            $makosa["username_taken"] = "The username you choose is already taken";
        } else if ($username === "") {
            $makosa["empty_username_field"] = "Username Should not be empty!... Write Your Username Again";
        } else if ($_SESSION["useremail"]) {

            $email = $_SESSION["useremail"];
            update_username($unigram_conn, $email, $username);
            $_SESSION["username"] = $username;
        }
    } catch (PDOException $e) {
        die("connection error:" . $e->getMessage());
    };
}
