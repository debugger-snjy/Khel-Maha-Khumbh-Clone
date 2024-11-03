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
    <meta name="viewport" content="width=device-width, initial-scale=1">
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

    <!-- Alert Messages -->
    <div class="my-4" style="margin: 0px 65px;">
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

                <div class="d-flex justify-content-between align-items-center">
                    <div class="d-flex justify-content-center align-items-center">
                        <?php
                        if ($playerData[0]['gender'] == "male") {
                            echo "<img src='../Images/male.png' alt='Male Logo' height='50px'><h2 class='my-0 mx-2'>" . $playerData[0]['firstName'] . " " . $playerData[0]['lastName'] . "</h2>";
                        } else {
                            echo "<img src='../Images/female.png' alt='Female Logo' height='50px'><h2 class='my-0 mx-2'>" . $playerData[0]['firstName'] . " " . $playerData[0]['lastName'] . "</h2>";
                        }
                        ?>
                    </div>
                    <!-- Delete Button Form -->
                    <div class="d-flex justify-content-center align-items-center">
                        <small class="fw-bolder text-danger mx-2">You will not get back you account !</small>
                        <form action="../Database/delete.php" method="post" class="m-0">
                            <input type="hidden" name="playerId" value="<?php echo $playerData[0]['playerId'] ?>">
                            <input type="submit" value="Delete Player" name="deleteBtn" class="btn btn-danger px-4 fs-5">
                        </form>
                    </div>
                </div>

                <hr>


                <div class="row">
                    <div class="col-sm-12 col-lg-12 col-xl-7 data">

                        <p class='fw-medium fs-5'>Date of Birth :
                            <?php echo $playerData[0]['dateOfBirth'] ?>
                        </p>
                        <p class='fw-medium fs-5'>Age Group :
                            <?php echo $playerData[0]['ageGroup'] ?>
                        </p>
                        <p class='fw-medium fs-5'>Mobile Number :
                            <?php echo $playerData[0]['mobileNumber'] ?>
                        </p>
                        <p class='fw-medium fs-5'>Email Address :
                            <?php echo $playerData[0]['email'] ?>
                        </p>
                        <p class='fw-medium fs-5'>Player Address :
                            <?php echo $playerData[0]['district'] . ", " . $playerData[0]['taluka'] . ", " . $playerData[0]['village'] ?>
                        </p>
                        <p class='fw-medium fs-5'>Guardian Name :
                            <?php echo $playerData[0]['guardFname'] . " " . $playerData[0]['guardLname'] ?>
                        </p>
                        <p class='fw-medium fs-5'>Guardian Mobile Number :
                            <?php echo $playerData[0]['guardMobNo'] ?>
                        </p>
                        <p class='fw-medium fs-5'>Coach Name :
                            <?php echo $playerData[0]['coachName'] ?>
                        </p>
                        <p class='fw-medium fs-5'>Coach Mobile Number :
                            <?php echo $playerData[0]['coachMobNo'] ?>
                        </p>
                        <p class='fw-medium fs-5'>Coach Address :
                            <?php echo $playerData[0]['coachAddress'] ?>
                        </p>

                        <p class='fw-medium fs-5'>Height :
                            <?php echo $playerData[0]['height'] . " cm" ?>
                        </p>
                        <p class='fw-medium fs-5'>Weight :
                            <?php echo $playerData[0]['weight'] . " kg" ?>
                        </p>

                        <p class='fw-medium fs-5'>Caste :
                            <?php echo $playerData[0]['caste'] ?>
                        </p>

                    </div>
                    <div class="col-sm-12 col-lg-12 col-xl-5 profileImage">
                        <figure>
                            <img src="<?php echo explode("htdocs", $playerData[0]['profileImage'])[1] ?>" width="100%">
                            <figcaption class="fw-bold text-danger text-center">
                                <?php echo $playerData[0]['firstName'] . "'s Profile Image"; ?>
                            </figcaption>
                        </figure>

                        <div class="bg-danger text-white w-100 p-4" style="border-radius: 20px;">
                            <div class='fw-medium fs-5'>Sports Enrolled In :
                                <strong>
                                    <?php echo $playerData[0]['sports'] ?>
                                </strong>
                            </div>

                            <div class='fw-medium fs-5'>Sub Sports Event :
                                <strong>
                                    <?php echo $playerData[0]['subSports'] ?>
                                </strong>
                            </div>
                        </div>

                    </div>
                </div>

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