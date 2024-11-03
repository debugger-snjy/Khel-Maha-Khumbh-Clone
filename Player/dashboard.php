<!-- Checking whether the user is Logged in or NOT -->
<?php require("../Database/checkLoggedIn.php"); ?>

<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
echo "<script>console.log('Dashboard : " . $_SESSION["userData"] . "')</script>";

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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>

</head>

<body>

    <?php
    require_once ("navBar.php");

    $playerDetails = json_decode($_SESSION["userData"], true)[0];


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

    <div class="userCard my-4 px-4" id="playerDetailsCard">
        <div class="row">
            <div class="col-4 userNameAndGame text-white">
                <p>
                    <img src="<?php echo explode("htdocs", $playerDetails['profileImage'])[1] ?>" width=80%>
                </p>
                <h1 class="fw-bolder">
                    <?php echo "<span id='playerfname'>" . $playerDetails["firstName"] . "</span>" . "&nbsp;" . "<span id='playerlname'>" . $playerDetails["lastName"] . "</span>" ?>
                </h1>
                <p class="fs-5 fw-medium">
                    <?php echo $playerDetails["sports"] . " - " . $playerDetails["subSports"] ?>
                </p>
            </div>
            <div class="col-8 otherDetails p-0 m-0" style="text-align: left;">
                <div class="row mb-3">
                    <div class="col-4">
                        <div class="fw-bold fs-5 playerDashboardField">Player ID</div>
                        <div class="fw-medium fs-5 playerDashboardData">
                            <?php echo $playerDetails["playerId"] ?>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="fw-bold fs-5 playerDashboardField">KhelMahaKumbh ID</div>
                        <div class="fw-medium fs-5 playerDashboardData">
                            <?php echo $playerDetails["playerId"] ?>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="fw-bold fs-5 playerDashboardField">Age Group</div>
                        <div class="fw-medium fs-5 playerDashboardData">
                            <?php echo $playerDetails["ageGroup"] ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-4">
                        <div class="fw-bold fs-5 playerDashboardField">Gender</div>
                        <div class="fw-medium fs-5 playerDashboardData">
                            <?php echo $playerDetails["gender"] ?>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="fw-bold fs-5 playerDashboardField">Date Of Birth</div>
                        <div class="fw-medium fs-5 playerDashboardData">
                            <?php echo $playerDetails["dateOfBirth"] ?>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="fw-bold fs-5 playerDashboardField">Caste</div>
                        <div class="fw-medium fs-5 playerDashboardData">
                            <?php echo $playerDetails["caste"] ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-4">
                        <div class="fw-bold fs-5 playerDashboardField">Email ID</div>
                        <div class="fw-medium fs-5 playerDashboardData">
                            <?php echo $playerDetails["email"] ?>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="fw-bold fs-5 playerDashboardField">Mobile Number</div>
                        <div class="fw-medium fs-5 playerDashboardData">
                            <?php echo $playerDetails["mobileNumber"] ?>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="fw-bold fs-5 playerDashboardField">Height & Weight</div>
                        <div class="fw-medium fs-5 playerDashboardData">
                            <?php echo $playerDetails["height"] . $playerDetails["weight"] ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-4">
                        <div class="fw-bold fs-5 playerDashboardField">Guardian Name</div>
                        <div class="fw-medium fs-5 playerDashboardData">
                            <?php echo $playerDetails["guardFname"] . $playerDetails["guardLname"] ?>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="fw-bold fs-5 playerDashboardField">Guardian Phone Number</div>
                        <div class="fw-medium fs-5 playerDashboardData">
                            <?php echo $playerDetails["guardMobNo"] ?>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="fw-bold fs-5 playerDashboardField">Created On</div>
                        <div class="fw-medium fs-5 playerDashboardData">
                            <?php echo $playerDetails["creationDate"] ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-4">
                        <div class="fw-bold fs-5 playerDashboardField">District</div>
                        <div class="fw-medium fs-5 playerDashboardData">
                            <?php echo $playerDetails["district"] ?>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="fw-bold fs-5 playerDashboardField">Taluka</div>
                        <div class="fw-medium fs-5 playerDashboardData">
                            <?php echo $playerDetails["taluka"] ?>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="fw-bold fs-5 playerDashboardField">Village</div>
                        <div class="fw-medium fs-5 playerDashboardData">
                            <?php echo $playerDetails["village"] ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-4">
                        <div class="fw-bold fs-5 playerDashboardField">Coach Name</div>
                        <div class="fw-medium fs-5 playerDashboardData">
                            <?php echo $playerDetails["coachName"] ?>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="fw-bold fs-5 playerDashboardField">Coach Mobile Number</div>
                        <div class="fw-medium fs-5 playerDashboardData">
                            <?php echo $playerDetails["coachMobNo"] ?>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="fw-bold fs-5 playerDashboardField">Coach Address</div>
                        <div class="fw-medium fs-5 playerDashboardData">
                            <?php echo $playerDetails["coachAddress"] ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row" style="margin:0px 60px;">
        <div class="col-6 p-0">
            <div class="otherCards mx-2">
                <h5 class="fw-medium">Receipt</h5>
                <hr>
                <div>
                    <form action="pdfGenerator.php" method="post" class="d-inline">
                        <button type="submit" id="generatePDFBtn" class="px-3 py-3 btn btn-warning fw-medium"><img
                                src="../Images/receipt.svg" alt="Recipt Icon" height="25px"> Download
                            Receipt</button>
                    </form>
                    <button type="button" id="generateCardBtn" class="px-3 py-3 btn btn-warning fw-medium"><img
                            src="../Images/player-card.svg" alt="Recipt Icon" height="25px"> Download
                        Player Card</button>
                </div>
            </div>
        </div>
        <div class="col-6 p-0">
            <div class="otherCards mx-2">
                <h5 class="fw-medium">Upcoming Events</h5>
                <hr>
                <div>
                    No Upcoming Events . . .
                </div>
            </div>
        </div>

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