<!-- Checking whether the user is Logged in or NOT -->
<?php require("../Database/checkLoggedIn.php"); ?>

<?php
session_start();
echo "<script>console.log('Dashboard : " . $_SESSION["userData"] . "')</script>";

require "../Database/Classes/Connection.php";
require "../Database/Classes/PlayerClass.php";

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" value="" content="width=device-width, initial-scale=1">
    <title>Sports Authority of Gujarat</title>

    <!-- CSS -->
    <link rel="stylesheet" href="../CSS/style.css">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Bootstrap Scripts -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">

</head>

<body>

    <?php
    require_once("adminNavBar.php");
    ?>

    <div class="my-4 mx-3">
        <!-- Alert Messages -->
        <div class="alert alert-success alert-dismissible fade show" id="successalertBox" role="alert">
            <strong id="successMsg"></strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

        <div class="alert alert-danger alert-dismissible fade show" id="dangeralertBox" role="alert">
            <strong id="dangerMsg"></strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>

    <div class="bg-white mainCard my-4">

        <?php

        // Checking whether we have got the player id to display or not
        if (isset($_GET["playerid"])) {
            $player = new Player();
            $playerData = $player->fetchByID((int) $_GET["playerid"]);
            // print_r($playerData);
        
            if ($playerData) {
                ?>

                <!-- Edit Form -->
                <form action="../Database/update.php" method="post" enctype="multipart/form-data" id="editForm">

                    <input type="hidden" name="playerId" value=<?php echo $_GET["playerid"] ?>>

                    <!-- Second Section : Player Details -->
                    <h4 class="subHeading"><strong>Player Details</strong></h4>
                    <hr>
                    <div class="row g-3 align-items-end mt-1">
                        <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
                            <label for="userFirstName" class="form-label fw-medium">First Name <span
                                    class="asterisk">*</span></label>
                            <input type="text" class="form-control" id="userFirstName" name="userFirstName"
                                value="<?php echo $playerData[0]["firstName"] ?>">
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
                            <label for="userFatherHusbandName" class="form-label fw-medium">Father/Husband Name <span
                                    class="asterisk">*</span></label>
                            <input type="text" class="form-control" id="userFatherHusbandName" name="userFatherHusbandName"
                                value="<?php echo $playerData[0]["midName"] ?>">
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
                            <label for="userLastName" class="form-label fw-medium">Last Name <span
                                    class="asterisk">*</span></label>
                            <input type="text" class="form-control" id="userLastName" name="userLastName"
                                value="<?php echo $playerData[0]["lastName"] ?>">
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
                            <label for="userAgeGroup" class="form-label fw-medium">Age Group <span
                                    class="asterisk">*</span></label>
                            <select id="userAgeGroup" name="userAgeGroup" class="form-select">
                                <option value="1-7 Yrs" <?php if ($playerData[0]["ageGroup"] == "1-7 Yrs")
                                    echo "selected"; ?>>1-7
                                    Years</option>
                                <option value="8-10 Yrs" <?php if ($playerData[0]["ageGroup"] == "8-10 Yrs")
                                    echo "selected"; ?>>
                                    8-10 Years</option>
                                <option value="11-13 Yrs" <?php if ($playerData[0]["ageGroup"] == "11-13 Yrs")
                                    echo "selected"; ?>>11-13 Years</option>
                                <option value="14-16 Yrs" <?php if ($playerData[0]["ageGroup"] == "14-16 Yrs")
                                    echo "selected"; ?>>14-16 Years</option>
                                <option value="17-19 Yrs" <?php if ($playerData[0]["ageGroup"] == "17-19 Yrs")
                                    echo "selected"; ?>>17-19 Years</option>
                                <option value="20-22 Yrs" <?php if ($playerData[0]["ageGroup"] == "20-22 Yrs")
                                    echo "selected"; ?>>20-22 Years</option>
                                <option value="23-25 Yrs" <?php if ($playerData[0]["ageGroup"] == "23-25 Yrs")
                                    echo "selected"; ?>>23-25 Years</option>
                                <option value="26-28 Yrs" <?php if ($playerData[0]["ageGroup"] == "26-28 Yrs")
                                    echo "selected"; ?>>26-28 Years</option>
                                <option value="29-31 Yrs" <?php if ($playerData[0]["ageGroup"] == "29-31 Yrs")
                                    echo "selected"; ?>>29-31 Years</option>
                                <option value="32-34 Yrs" <?php if ($playerData[0]["ageGroup"] == "32-34 Yrs")
                                    echo "selected"; ?>>32-34 Years</option>
                            </select>
                        </div>

                    </div>
                    <div class="row g-3 align-items-end mt-1">

                        <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
                            <label for="" class="form-label fw-medium">Select Your Gender <span
                                    class="asterisk">*</span></label>
                            <div class="d-flex">
                                <div class="form-check d-inline">
                                    <input class="form-check-input" type="radio" name="gender" id="male" value="male" <?php if ($playerData[0]["gender"] == "male")
                                        echo "checked"; ?>>
                                    <label class="form-check-label" for="male">
                                        Male
                                    </label>
                                </div>
                                <span class="mx-2"> </span>
                                <div class="form-check d-inline">
                                    <input class="form-check-input" type="radio" name="gender" id="female" value="female" <?php if ($playerData[0]["gender"] == "female")
                                        echo "checked"; ?>>
                                    <label class="form-check-label" for="female">
                                        Female
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
                            <label for="userdateOfBirth" class="form-label fw-medium">Date of Birth <span
                                    class="asterisk">*</span></label>
                            <input type="date" class="form-control" id="userdateOfBirth" name="userdateOfBirth"
                                value="<?php echo $playerData[0]["dateOfBirth"] ?>">
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
                            <label for="userSportsName" class="form-label fw-medium">Sports Name <span
                                    class="asterisk">*</span></label>
                            <select id="userSportsName" name="userSportsName" class="form-select">
                                <option value="" <?php if ($playerData[0]["sports"] == "")
                                    echo "selected"; ?>>Select</option>
                                <option value="Cricket" <?php if ($playerData[0]["sports"] == "Cricket")
                                    echo "selected"; ?>>
                                    Cricket</option>
                                <option value="Hockey" <?php if ($playerData[0]["sports"] == "Hockey")
                                    echo "selected"; ?>>
                                    Hockey</option>
                                <option value="Basketball" <?php if ($playerData[0]["sports"] == "Basketball")
                                    echo "selected"; ?>>Basketball</option>
                                <option value="Football" <?php if ($playerData[0]["sports"] == "Football")
                                    echo "selected"; ?>>Football</option>
                                <option value="Tennies" <?php if ($playerData[0]["sports"] == "Tennies")
                                    echo "selected"; ?>> Tennies</option>
                                <option value="VolleyBall" <?php if ($playerData[0]["sports"] == "VolleyBall")
                                    echo "selected"; ?>> VolleyBall</option>
                            </select>
                        </div>

                        <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
                            <label for="userSubSportsName" class="form-label fw-medium">Sub Sports Name <span
                                    class="asterisk">*</span></label>
                            <select id="userSubSportsName" name="userSubSportsName" class="form-select">
                                <option value="" <?php if ($playerData[0]["subSports"] == "")
                                    echo "selected"; ?>>Select Sub
                                    Events</option>
                                <option value="Cricket" <?php if ($playerData[0]["subSports"] == "Cricket")
                                    echo "selected"; ?>>Cricket</option>
                                <option value="Hockey" <?php if ($playerData[0]["subSports"] == "Hockey")
                                    echo "selected"; ?>>
                                    Hockey</option>
                                <option value="Basketball" <?php if ($playerData[0]["subSports"] == "Basketball")
                                    echo "selected"; ?>>Basketball</option>
                                <option value="Football" <?php if ($playerData[0]["subSports"] == "Football")
                                    echo "selected"; ?>>Football</option>
                                <option value="Tennies" <?php if ($playerData[0]["subSports"] == "Tennies")
                                    echo "selected"; ?>>Tennies</option>
                                <option value="VolleyBall" <?php if ($playerData[0]["subSports"] == "VolleyBall")
                                    echo "selected"; ?>>VolleyBall</option>
                            </select>
                        </div>

                    </div>
                    <div class="row g-3 align-items-start mt-1">
                        <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
                            <label class="form-label fw-medium" for="">
                                Tick the checkbox to select the another game
                            </label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="anotherGame" value="" id="anotherGame"
                                    name="anotherGame" value="">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
                            <label for="userMobileNumber" class="form-label fw-medium">Mobile Number <span
                                    class="asterisk">*</span></label>
                            <input type="tel" class="form-control" id="userMobileNumber" name="userMobileNumber"
                                value="<?php echo $playerData[0]["mobileNumber"] ?>" maxlength="10">
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
                            <label for="userEmail" class="form-label fw-medium">Email ID <span class="asterisk">*</span></label>
                            <input type="email" class="form-control" id="userEmail" name="userEmail"
                                value="<?php echo $playerData[0]["email"] ?>">
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
                            <label for="userWeight" class="form-label fw-medium">Weight(Kg) <span
                                    class="asterisk">*</span></label>
                            <input type="number" class="form-control" id="userWeight" name="userWeight"
                                value="<?php echo $playerData[0]["weight"] ?>">
                        </div>
                    </div>
                    <div class="row g-3 align-items-start mt-1">
                        <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
                            <label for="userHeight" class="form-label fw-medium">Height (cm) <span
                                    class="asterisk">*</span></label>
                            <input type="number" class="form-control" id="userHeight" name="userHeight"
                                value="<?php echo $playerData[0]["height"] ?>">
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
                            <label for="userDistrict" class="form-label fw-medium">District <span
                                    class="asterisk">*</span></label>
                            <select id="userDistrict" name="userDistrict" value="" class="form-select">
                                <option value="" selected>Select District</option>
                                <option value="Ahmedabad" <?php if ($playerData[0]["district"] == "Ahmedabad")
                                    echo "selected"; ?>>Ahmedabad</option>
                            </select>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
                            <label for="userTaluka" class="form-label fw-medium">Taluka/Zone <span
                                    class="asterisk">*</span></label>
                            <select id="userTaluka" name="userTaluka" value="" class="form-select">
                                <option value="" selected>Select Taluka/Zone </option>
                                <option value="Ahmedabad City" <?php if ($playerData[0]["taluka"] == "Ahmedabad City")
                                    echo "selected"; ?>>Ahmedabad City</option>
                                <option value="Daskroi" <?php if ($playerData[0]["taluka"] == "Daskroi")
                                    echo "selected"; ?>>Daskroi</option>
                                <option value="Dholka" <?php if ($playerData[0]["taluka"] == "Dholka")
                                    echo "selected"; ?>>Dholka
                                </option>
                                <option value="Sanand" <?php if ($playerData[0]["taluka"] == "Sanand")
                                    echo "selected"; ?>>Sanand
                                </option>
                                <option value="Bavla" <?php if ($playerData[0]["taluka"] == "Bavla")
                                    echo "selected"; ?>>Bavla</option>
                            </select>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
                            <label for="userVillage" class="form-label fw-medium">Village/Ward <span
                                    class="asterisk">*</span></label>
                            <select id="userVillage" name="userVillage" value="" class="form-select">
                                <option value="" selected>Select Village/Ward </option>
                                <option value="Chandkheda" <?php if ($playerData[0]["village"] == "Chandkheda")
                                    echo "selected"; ?>>Chandkheda</option>
                                <option value="Sarkhej" <?php if ($playerData[0]["village"] == "Sarkhej")
                                    echo "selected"; ?>>Sarkhej</option>
                                <option value="Vasna" <?php if ($playerData[0]["village"] == "Vasna")
                                    echo "selected"; ?>>Vasna</option>
                                <option value="Vastral" <?php if ($playerData[0]["village"] == "Vastral")
                                    echo "selected"; ?>>Vastral</option>
                                <option value="Chandlodia" <?php if ($playerData[0]["village"] == "Chandlodia")
                                    echo "selected"; ?>>Chandlodia</option>
                            </select>
                        </div>
                    </div>
                    <div class="row g-3 align-items-start mt-1">
                        <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
                            <label for="userCaste" class="form-label fw-medium">Caste <span class="asterisk">*</span></label>
                            <select id="userCaste" name="userCaste" value="" class="form-select">
                                <option value="Select" selected>Select</option>
                                <option value="General" <?php if ($playerData[0]["caste"] == "General")
                                    echo "selected"; ?>>General</option>
                                <option value="OBC" <?php if ($playerData[0]["caste"] == "OBC")
                                    echo "selected"; ?>>OBC</option>
                                <option value="ST" <?php if ($playerData[0]["caste"] == "ST")
                                    echo "selected"; ?>>ST</option>
                                <option value="SC" <?php if ($playerData[0]["caste"] == "SC")
                                    echo "selected"; ?>>SC</option>
                            </select>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
                            <label for="userProfileImage" class="form-label fw-medium">Your New Profile Image
                                <!-- <span class="asterisk">*</span> -->
                            </label>
                            <input type="file" class="form-control" id="userProfileImage" name="userProfileImage" value="">
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
                            <label for="userProfileImage" class="form-label fw-medium">Your Old Profile Image</label>
                            <figure>
                                <img src="<?php echo explode("htdocs", $playerData[0]['profileImage'])[1] ?>" width="50%">
                            </figure>
                        </div>
                    </div>

                    <!-- Third Section : Guardian Details -->
                    <h4 class="subHeading"><strong>Guardian Details</strong></h4>
                    <hr>
                    <div class="row g-3 align-items-end mt-1">
                        <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
                            <label for="userGuardianFirstName" class="form-label fw-medium">First Name <span
                                    class="asterisk">*</span></label>
                            <input type="text" class="form-control" id="userGuardianFirstName" name="userGuardianFirstName"
                                value="<?php echo $playerData[0]["guardFname"] ?>">
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
                            <label for="userGuardianLastName" class="form-label fw-medium">Last Name <span
                                    class="asterisk">*</span></label>
                            <input type="text" class="form-control" id="userGuardianLastName" name="userGuardianLastName"
                                value="<?php echo $playerData[0]["guardLname"] ?>">
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
                            <label for="userGuardianNumber" class="form-label fw-medium">Mobile Number <span
                                    class="asterisk">*</span></label>
                            <input type="text" class="form-control" id="userGuardianNumber" name="userGuardianNumber"
                                value="<?php echo $playerData[0]["guardMobNo"] ?>">
                        </div>
                    </div>

                    <!-- Fourth Section : Other Details -->
                    <h4 class="subHeading"><strong>Other Details</strong></h4>
                    <hr>
                    <div class="row g-3 align-items-end mt-1">
                        <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
                            <label for="userCoachName" class="form-label fw-medium">Coach Name <span
                                    class="asterisk">*</span></label>
                            <input type="text" class="form-control" id="userCoachName" name="userCoachName"
                                value="<?php echo $playerData[0]["coachName"] ?>">
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
                            <label for="userCoachNumber" class="form-label fw-medium">Coach Mobile Number <span
                                    class="asterisk">*</spa></label>
                            <input type="text" class="form-control" id="userCoachNumber" name="userCoachNumber"
                                value="<?php echo $playerData[0]["coachMobNo"] ?>">
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
                            <label for="userCoachHomeAddress" class="form-label fw-medium">Coach Home Address <span
                                    class="asterisk">*</span></label>
                            <textarea class="form-control" id="userCoachHomeAddress" name="userCoachHomeAddress"
                                rows="1"><?php echo $playerData[0]["coachAddress"] ?></textarea>
                        </div>
                    </div>
                    <div class="row g-3 align-items-end mt-1">
                        <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
                            <label for="userCaptcha" class="form-label fw-medium">Captcha <span
                                    class="asterisk">*</span></label>
                            <input type="text" class="form-control d-inline-block" id="userCaptcha" name="userCaptcha" value="">
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
                            <img src="../Images/captcha.png" alt="Your Captcha">
                        </div>
                    </div>

                    <div>

                        <!-- <div class="noteForLoginIDAndPassword mt-4">Note - You will receive the login ID and password
                            information of
                            the player in the above e-mail.</div> -->

                        <ol class="confirmations my-3">

                            <li>If any kind of physical injury happens during the competition, it will be the responsibility of
                                me and my guardian. The organizer will have no responsibility </li>
                            <li>I will register from one place from the entire state, otherwise my registration will be
                                canceled.</li>
                            <li>Therefore, I <strong><u>
                                        <?php echo "&nbsp;&nbsp;&nbsp;" . $playerData[0]["firstName"] . " " . $playerData[0]["lastName"] . "&nbsp;&nbsp;&nbsp;" ?>
                                    </u></strong> guarantee that if I am selected as the winner in
                                Khelmahakumbh, I will be present at the competition venue at my own expense and risk before the
                                time indicated. 4. Mark the event on the back page for each individual sub-event game.</li>
                            <li>Form-A for individual sport and Form-A and Form B for joint sport are mandatory to be filled.
                            </li>
                            <li>Form-B must be filled for Table Tennis, Lawn Tennis, Badminton Doubles and Mixed Doubles.</li>
                        </ol>

                        <div class="AcceptanceCheck">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="updateAcceptTandC" value=""
                                    id="updateAcceptTandC">
                                <label class="form-label fw-medium" for="updateAcceptTandC">
                                    I Accept above all the terms and conditions and all the details that are updated are
                                    original and correct
                                </label>
                            </div>
                        </div>

                    </div>

                    <hr>

                    <div class="SubmitButtonSection text-end">
                        <input type="submit" id="submitEditForm" name="submitEditForm"
                            class="btn KMKButton text-white fw-bold px-4 disabled" value="Update Form">
                    </div>

                </form>

                <?php
            } else {
                echo "<h3 class='text-danger fw-medium'>No Record Available !!</h3>";
            }
        } else {
            echo "<h3 class='text-danger fw-medium'>No Record Available !!</h3>";
        }
        ?>

    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

    <!-- jQuery Script -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <!-- jQuery Validation Script -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>

    <!-- jQuery Cookie Script -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>

    <!-- My Script -->
    <script src="../JS/script.js"></script>

</body>

</html>