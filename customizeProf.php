<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $file = $_FILES["file"];
    $fileName = $_FILES["file"]["name"];
    $fileTmpName = $_FILES["file"]["tmp_name"];
    $fileSize = $_FILES["file"]["size"];
    $fileError = $_FILES["file"]["error"];
    $fileType = $_FILES["file"]["type"];

    // Process file to get Extansion
    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $extAllowed = array('jpg', 'png', 'jpeg',);


    try {

        require_once "sessionconfig.inc.php";
        require_once "dbconnection.inc.php";
        require_once "signup_model.inc.php";
        // require_once "signup_control.inc.php";


        // ERROR HANDLING
        $makosa = [];

        if (!in_array($fileActualExt, $extAllowed)) {
            $makosa["unsuportedformat"] = "Upload an image with format of either jpg, jpeg, png";
        } else if ($fileError > 0) {
            $makosa["unknownerror"] = "There was an error on uploading your file";
        } else if ($fileSize > 50000000000) {
            $makosa["bigsize"] = "Your image size is too big";
        } else if (in_array($fileActualExt, $extAllowed) && $fileError === 0 && $fileSize < 5000000) {
            $newFileName = uniqid("", true) . "." . $fileActualExt;
            $fileDestination = 'assets/UserPics/' . $newFileName;
            $_SESSION["fileDestination"] = $fileDestination;
            move_uploaded_file($fileTmpName, $fileDestination);

            if ($_SESSION["useremail"]) {

                $email = $_SESSION["useremail"];
                $profile_pic_id = $_SESSION["fileDestination"];

                update_profile($unigram_conn, $email, $profile_pic_id);

                http_response_code(200);
                echo json_encode($success = "You have succeed in registering now use your credentials to login");
            } else {
                $makosa["uploadfailed"] = "Uploading your file failed try again";
            }
        }




        if ($makosa) {
            $_SESSION["makosa"] = $makosa;
            if ($_SESSION["makosa"]) {
                http_response_code(400);
                echo json_encode($makosa);
            }
            exit();
        }

        unset($_SESSION["makosa"]);
        $unigram_conn = null;
        $stmt = null;
        exit();
    } catch (PDOException $e) {
        die("connection error:" . $e->getMessage());
    };
} else {
    header("location: chat.php");
    die();
}
