<?php

require "./Classes/Connection.php";
require "./Classes/PlayerClass.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Current Location of the File !!
    $currentDirectory = __DIR__;

    $tempFilePath = $_FILES['userProfileImage']['tmp_name'];
    // Getting the Main Folder (Week 10 - PHP Website)
    $profileImgPath = str_replace("\\", "/", dirname($currentDirectory)) . "/uploads/profiles/";
    $fileName = $_FILES['userProfileImage']['name'];
    $profilefullPath = $profileImgPath . $fileName;

    if (count($_FILES) > 0) {
        if (is_uploaded_file($tempFilePath)) {
            if (move_uploaded_file($tempFilePath, $profilefullPath)) {
                echo "<script>console.log('File uploaded successfully')</script>";

                // Remove the temporary uploaded file
                // unlink($tempFilePath);

            } else {
                echo "<script>console.log('File Not Uploaded Successfully !!')</script>";
            }
        }
    }

    // Hashing the Password and Storing it then !
    $hashed_password = password_hash($_POST["userPassword"], PASSWORD_DEFAULT);

    $playerData = array(
        "firstName" => $_POST["userFirstName"],
        "midName" => $_POST["userFatherHusbandName"],
        "lastName" => $_POST["userLastName"],
        "ageGroup" => $_POST["userAgeGroup"],
        "gender" => $_POST["gender"],
        "dateOfBirth" => $_POST["userdateOfBirth"],
        "sports" => $_POST["userSportsName"],
        "subSports" => $_POST["userSubSportsName"],
        "mobileNumber" => $_POST["userMobileNumber"],
        "email" => $_POST["userEmail"],
        "password" => $hashed_password,
        "weight" => (int) $_POST["userWeight"],
        "height" => (int) $_POST["userHeight"],
        "district" => $_POST["userDistrict"],
        "taluka" => $_POST["userTaluka"],
        "village" => $_POST["userVillage"],
        "caste" => $_POST["userCaste"],
        "guardFname" => $_POST["userGuardianFirstName"],
        "guardLname" => $_POST["userGuardianLastName"],
        "guardMobNo" => $_POST["userGuardianNumber"],
        "coachName" => $_POST["userCoachName"],
        "coachMobNo" => $_POST["userCoachNumber"],
        "coachAddress" => $_POST["userCoachHomeAddress"],
        "profileImage" => $profilefullPath,
        "creationDate" => date('Y-m-d H:i:s'),
        "updationDate" => null,
        "isDeleted" => 0
    );

    print_r($playerData);
    var_dump($playerData["weight"]);

    // Triming the Whitespace for Given Data :
    foreach ($playerData as $key => $value) {
        if (is_int($value)) {
            $playerData[$key] = (int) trim($value);
        } else {
            $playerData[$key] = trim($value);
        }
    }

    $player = new Player();

    $player->register($playerData);

    // After Register Going to the Form Again !!
    header("Location: ../index.html");
}

?>