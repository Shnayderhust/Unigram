<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Capture Registration Data
    $firstname = $_POST["fn"];
    $lastname = $_POST["ln"];
    $email = $_POST["em"];
    $password = $_POST["pas"];
    $university = $_POST["University"];

    try {

        define('BASE_DIR', __DIR__);
        require BASE_DIR . "../Includes/dbconnection.inc.php";
        require BASE_DIR . "../Includes/sessionconfig.inc.php";
        require "signup_model.inc.php";
        require "signup_control.inc.php";

        // ERROR HANDLING
        $errors = [];

        if (is_input_empty($firstname, $lastname, $email, $password, $university)) {
            $errors["empty_input"] = "Please fill out the Empty fields";
        } else if (!is_input_empty($firstname, $lastname, $email, $password, $university) && is_email_invalid($email)) {
            $errors["invalid_email"] = "Please fill out a valid email";
        } else if (is_email_registered($unigram_conn, $email)) {
            $errors["registered_email"] = "The email you used is already registered";
        }



        if ($errors) {
            $_SESSION["error_signup"] = $errors;
            if ($_SESSION["error_signup"]) {
                http_response_code(400);
                echo json_encode($errors);
            }
        } else if (!is_input_empty($firstname, $lastname, $email, $password, $university) && !is_email_invalid($email) && !is_email_registered($unigram_conn, $email)) {
            set_users($unigram_conn, $firstname, $lastname, $email, $password, $university);

            $_SESSION["useremail"] = $email;

            echo $_SESSION["useremail"];
            // error_log($email, 3, "debug.log");
            http_response_code(200);
        }



        unset($_SESSION["error_signup"]);
        $unigram_conn = null;
        $stmt = null;
        exit();
    } catch (PDOException $e) {
        die("connection error:" . $e->getMessage());
    };
} else {
    header("location: ./signup.php");
    die();
}
