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
        $player = new Player();
        $playerData = $player->fetch();
        $playerDisplayFields = [
            "firstName" => "First Name",
            "lastName" => "Last Name",
            "ageGroup" => "Age Group",
            "gender" => "Gender",
            "sports" => "Sports",
            "subSports" => "Sub Sports",
            "email" => "Email Address",
            "district" => "District",
            "coachName" => "Coach Name",
            "coachMobNo" => "Coach Mobile Number",
            "profileImage" => "Profile Image"
        ];
        ?>

        <div class="table-responsive">
            <table class="table table-hover table-borderless table-dark align-middle">
                <thead class="">
                    <tr>
                        <?php
                        foreach ($playerDisplayFields as $key => $value) {
                            echo "<th class='fs-6 text-center'>$value</th>";
                        }
                        echo "<th class='fs-6 text-center'>Operations</th>";
                        ?>
                    </tr>
                </thead>
                <tbody class="table-light ">
                    <?php
                    foreach ($playerData as $player) {
                        echo "<tr class='text-center'>";
                        foreach ($playerDisplayFields as $fieldName => $displayName) {
                            if ($fieldName == "profileImage") {
                                echo "<td><img src='" . explode("htdocs", $player[$fieldName])[1] . "' height='100px'></td>";
                                // echo "<td>".explode("htdocs",$player[$fieldName])[1]."</td>";
                            } else {
                                echo "<td class='fs-6'>" . $player[$fieldName] . "</td>";
                            }
                        }
                        echo "<td class='fs-6'>";
                        echo "<div class='d-inline mx-3'><a href='editplayer.php?playerid=" . $player["playerId"] . "'><img src='../Images/pencil-fill.svg' alt='Edit' height='20px'/></a></div>";
                        echo "<div class='d-inline mx-3'><a href='deleteplayer.php?playerid=" . $player["playerId"] . "'><img src='../Images/trash-fill.svg' alt='Edit' height='20px'/></a></div>";
                        echo "<div class='d-inline mx-3'><a href='viewplayer.php?playerid=" . $player["playerId"] . "'><img src='../Images/view-fill.svg' alt='Edit' height='20px'/></a></div>";
                        echo "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
                <tfoot>

                </tfoot>
            </table>
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