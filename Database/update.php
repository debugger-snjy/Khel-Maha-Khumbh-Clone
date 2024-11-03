<!-- Checking whether the user is Logged in or NOT -->
<?php require("checkLoggedIn.php"); ?>

<?php

require "./Classes/Connection.php";
require "./Classes/PlayerClass.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    var_dump($_POST);

    $profilefullPath = "";

    if ($_FILES && count($_FILES) > 0 && $_FILES['userProfileImage']['tmp_name']) {

        echo "<hr>";
        var_dump($_FILES);

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
    }

    $playerUpdatedData = array(
        "playerId" => (int) $_POST["playerId"],
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
        "profileImage" => $profilefullPath
    );

    // print_r($playerUpdatedData);
    // var_dump($playerUpdatedData["weight"]);

    // Triming the Whitespace for Given Data :
    foreach ($playerUpdatedData as $key => $value) {
        if (is_int($value)) {
            $playerUpdatedData[$key] = (int) trim($value);
        } else {
            $playerUpdatedData[$key] = trim($value);
        }

        // Checking for the Empty Values : (In this caase, we will be only having the Profile Image Empty !!)
        if ($key == "profileImage") {
            if ($value == "" || strlen($value) == 0) {
                // Removing the profileImage from the array
                unset($playerUpdatedData["profileImage"]);
            }
        }

    }

    // echo "<hr>";
    // print_r($playerUpdatedData);

    $updatedPlayer = new Player();

    $result = $updatedPlayer->updatePlayerData($playerUpdatedData);

    if ($result) {
        header("Location: ../Admin/players.php");
    } else {
        header("Location: ../Admin/editplayer.php?playerId=" . $_POST["playerId"]);
    }
}

?>