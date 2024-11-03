<!-- Checking whether the user is Logged in or NOT -->
<?php require("../Database/checkLoggedIn.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{firstName}}'s KhelMahaKumbh Details</title>
    <!-- <link rel="stylesheet" href="../CSS/style.css"> -->

    <style>
        * {
            font-family: system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", "Noto Sans", "Liberation Sans", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
        }

        .userCard {
            box-shadow: 0px 0px 50px 2px rgba(128, 128, 128, 0.837);
            width: 95%;
            padding: 20px;
            border-radius: 10px;
            background-color: #113669;
        }

        .row {
            display: flex;
            justify-content: space-between;
        }

        .col-4 {
            width: 33%;
        }

        .col-8 {
            width: 66%;
        }

        .my-4 {
            margin-top: 40px;
            margin-bottom: 40px;
        }

        .px-4 {
            padding-left: 40px;
            padding-right: 40px;
        }

        .mb-3 {
            margin-bottom: 30px;
        }

        .fw-bolder {
            font-weight: bolder;
        }

        .fw-medium {
            font-weight: bolder;
        }

        .fw-bold {
            font-weight: bold;
        }

        .fs-5 {
            font-size: larger;
        }

        .text-white {
            color: white;
        }

        .col-4,
        .col-8 {
            display: inline-block;
        }

        .p-0 {
            padding: 0px;
        }

        .m-0 {
            margin: 0px;
        }
    </style>

</head>

<body>
    <h1 class="mb-3" style="text-align: center;">Khel Maha Kumbh Registration Receipt</h1>
    <hr>
    <table style="width:100%;font-size:large">
        <tr>
        <th>Player Name :</th>
            <td>{{firstName}} {{lastName}}</td>
            <th>Sport Enrolled :</th>
            <td>{{sports}}</td>
            <th>Sub Sports Event Name :</th>
            <td>{{subSports}}</td>
        </tr>
    </table>
    <hr>
    <div class="my-4 px-4 userCard" id="playerDetailsCard">
            <div class="otherDetails p-0 m-0" style="text-align: left;margin-top:50px;">
                <div class="row mb-3">
                    <div class="col-4">
                        <div class="fw-bold fs-5" style="color : rgb(255, 255, 255);">Player ID</div>
                        <div class="fw-medium fs-5" style="color : rgb(145, 229, 255);">
                            {{playerId}} </div>
                    </div>
                    <div class="col-4">
                        <div class="fw-bold fs-5" style="color : rgb(255, 255, 255);">KhelMahaKumbh ID</div>
                        <div class="fw-medium fs-5" style="color : rgb(145, 229, 255);">
                            {{playerId}} </div>
                    </div>
                    <div class="col-4">
                        <div class="fw-bold fs-5" style="color : rgb(255, 255, 255);">Age Group</div>
                        <div class="fw-medium fs-5" style="color : rgb(145, 229, 255);">
                            {{ageGroup}} </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-4">
                        <div class="fw-bold fs-5" style="color : rgb(255, 255, 255);">Gender</div>
                        <div class="fw-medium fs-5" style="color : rgb(145, 229, 255);">
                            {{gender}} </div>
                    </div>
                    <div class="col-4">
                        <div class="fw-bold fs-5" style="color : rgb(255, 255, 255);">Date Of Birth</div>
                        <div class="fw-medium fs-5" style="color : rgb(145, 229, 255);">
                            {{dateOfBirth}} </div>
                    </div>
                    <div class="col-4">
                        <div class="fw-bold fs-5" style="color : rgb(255, 255, 255);">Caste</div>
                        <div class="fw-medium fs-5" style="color : rgb(145, 229, 255);">
                            {{caste}} </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-4">
                        <div class="fw-bold fs-5" style="color : rgb(255, 255, 255);">Email ID</div>
                        <div class="fw-medium fs-5" style="color : rgb(145, 229, 255);">
                            {{email}} </div>
                    </div>
                    <div class="col-4">
                        <div class="fw-bold fs-5" style="color : rgb(255, 255, 255);">Mobile Number</div>
                        <div class="fw-medium fs-5" style="color : rgb(145, 229, 255);">
                            {{mobileNumber}} </div>
                    </div>
                    <div class="col-4">
                        <div class="fw-bold fs-5" style="color : rgb(255, 255, 255);">Height &amp; Weight</div>
                        <div class="fw-medium fs-5" style="color : rgb(145, 229, 255);">
                            {{height}} cm & {{weight}} kg </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-4">
                        <div class="fw-bold fs-5" style="color : rgb(255, 255, 255);">Guardian Name</div>
                        <div class="fw-medium fs-5" style="color : rgb(145, 229, 255);">
                            {{guardFname}} {{guardLname}} </div>
                    </div>
                    <div class="col-4">
                        <div class="fw-bold fs-5" style="color : rgb(255, 255, 255);">Guardian Phone Number</div>
                        <div class="fw-medium fs-5" style="color : rgb(145, 229, 255);">
                            {{guardMobNo}} </div>
                    </div>
                    <div class="col-4">
                        <div class="fw-bold fs-5" style="color : rgb(255, 255, 255);">Created On</div>
                        <div class="fw-medium fs-5" style="color : rgb(145, 229, 255);">
                            {{creationDate}} </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-4">
                        <div class="fw-bold fs-5" style="color : rgb(255, 255, 255);">District</div>
                        <div class="fw-medium fs-5" style="color : rgb(145, 229, 255);">
                            {{district}} </div>
                    </div>
                    <div class="col-4">
                        <div class="fw-bold fs-5" style="color : rgb(255, 255, 255);">Taluka</div>
                        <div class="fw-medium fs-5" style="color : rgb(145, 229, 255);">
                            {{taluka}} </div>
                    </div>
                    <div class="col-4">
                        <div class="fw-bold fs-5" style="color : rgb(255, 255, 255);">Village</div>
                        <div class="fw-medium fs-5" style="color : rgb(145, 229, 255);">
                            {{village}} </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-4">
                        <div class="fw-bold fs-5" style="color : rgb(255, 255, 255);">Coach Name</div>
                        <div class="fw-medium fs-5" style="color : rgb(145, 229, 255);">
                            {{coachName}} </div>
                    </div>
                    <div class="col-4">
                        <div class="fw-bold fs-5" style="color : rgb(255, 255, 255);">Coach Mobile Number</div>
                        <div class="fw-medium fs-5" style="color : rgb(145, 229, 255);">
                            {{coachMobNo}} </div>
                    </div>
                    <div class="col-4">
                        <div class="fw-bold fs-5" style="color : rgb(255, 255, 255);">Coach Address</div>
                        <div class="fw-medium fs-5" style="color : rgb(145, 229, 255);">
                            {{coachAddress}} </div>
                    </div>
                </div>
            </div>
    </div>

    <hr>
    <p>Thank you for registering! Your registration for the KhelMahaKumbh event has been successfully processed. We're
        thrilled to have you join us and be part of this exciting event. By registering, you've officially become a
        participant in the competition, contributing to the vibrant spirit of sportsmanship and camaraderie.</p>

    <p>As you embark on this journey, we want to extend our warmest wishes for success. May your efforts be rewarded
        with achievement and fulfillment. Whether you're competing for glory or simply enjoying the experience, we hope
        you find joy and satisfaction in every moment. As you prepare for the competition, remember that you're not
        alone. You're part of a community of passionate
        individuals united by a love for sports and healthy competition. Together, let's create memories, forge
        friendships, and celebrate the spirit of sportsmanship.</p>

    <p>Once again, welcome aboard! We're excited to see you in action and witness the remarkable moments that lie
        ahead.
        Wishing you the best of luck and an unforgettable experience with us!</p>

    <hr>
</body>

</html>