$(document).ready(function () {

    console.log("Hello");

    // Hide alert message divs initially
    $('#successalertBox').hide();
    $('#dangeralertBox').hide();

    if ($.cookie('message') && $.cookie('messageType')) {

        console.log($.cookie('message'));
        console.log($.cookie('messageType'));
        // console.log($.cookie('affectedRows'));

        if ($.cookie('messageType') == "success") {
            $("#successMsg").text($.cookie('message'));
            $('#successalertBox').show().fadeIn('fast').delay(5000).fadeOut('slow');
        }
        else if ($.cookie('messageType') == "danger" || $.cookie('messageType') == "failed") {
            $("#dangerMsg").text($.cookie('message'));
            $('#dangeralertBox').show().fadeIn('fast').delay(5000).fadeOut('slow');
        }

        $.removeCookie("message", { path: '/' });
        $.removeCookie("messageType", { path: '/' });
    }

    // Toggling the Submit Button Disability on Accepting the Terms and Condition
    $('#acceptTandC').on('click', function () {
        $(this).prop('checked', $(this).prop('checked'));
        if ($(this).prop('checked') == true) {
            $("#submitRegisterForm").removeClass("disabled");
        }
        else {
            $("#submitRegisterForm").addClass("disabled");
        }
    });

    // Toggling the Update Submit Button Disability on Accepting the Terms and Condition
    $('#updateAcceptTandC').on('click', function () {
        console.log("Helloe");
        $(this).prop('checked', $(this).prop('checked'));
        if ($(this).prop('checked') == true) {
            $("#submitEditForm").removeClass("disabled");
        }
        else {
            $("#submitEditForm").addClass("disabled");
        }
    });

    // jQuery Validation Code For the Registration Form
    $('#registerForm').validate({
        // Define validation rules for each input field
        rules: {
            userFirstName: {
                required: true,
                lettersOnly: true // Applying the Custom Validation
            },
            userFatherHusbandName: {
                required: true,
                lettersOnly: true // Applying the Custom Validation
            },
            userLastName: {
                required: true,
                lettersOnly: true // Applying the Custom Validation
            },
            userAgeGroup: {
                required: true
            },
            gender: {
                required: true
            },
            userdateOfBirth: {
                required: true
            },
            userSportsName: {
                required: true
            },
            userSubSportsName: {
                required: true
            },
            userMobileNumber: {
                required: true,
                digits: true,
                maxlength: 10,
                minlength: 10
            },
            userEmail: {
                required: true,
                email: true
            },
            userWeight: {
                required: true,
                digits: true
            },
            userHeight: {
                required: true,
                digits: true
            },
            userDistrict: {
                required: true
            },
            userTaluka: {
                required: true
            },
            userVillage: {
                required: true
            },
            userCaste: {
                required: true
            },
            userProfileImage: {
                required: true
            },
            userGuardianFirstName: {
                required: true,
                lettersOnly: true // Applying the Custom Validation
            },
            userGuardianLastName: {
                required: true,
                lettersOnly: true // Applying the Custom Validation
            },
            userGuardianNumber: {
                required: true,
                digits: true,
                maxlength: 10,
                minlength: 10
            },
            userCoachName: {
                required: true,
                lettersOnly: true // Applying the Custom Validation
            },
            userCoachNumber: {
                required: true,
                digits: true,
                maxlength: 10,
                minlength: 10
            },
            userCoachHomeAddress: {
                required: true,
                lettersOnly: true // Applying the Custom Validation
            }
        },
        // Optionally, define custom error messages
        messages: {

            userFirstName: {
                required: "First Name is Required !"
            },
            userFatherHusbandName: {
                required: "Father or Husband Name is Required !"
            },
            userLastName: {
                required: "Last Name is Required !"
            },
            userAgeGroup: {
                required: "Age Group is Required !"
            },
            gender: {
                required: "Gender is Required !"
            },
            userdateOfBirth: {
                required: "Date Of Birth is Required !"
            },
            userSportsName: {
                required: "Sports Name is Required !"
            },
            userSubSportsName: {
                required: "Sub Sports Name is Required !"
            },
            userMobileNumber: {
                required: "Mobile Number is Required !",
                digits: "Only Digits are Allowed !",
            },
            userEmail: {
                required: "Email Address is Required !",
                email: "Invalid Email Address"
            },
            userWeight: {
                required: "Weight is Required !",
                digits: "Only Digits are Allowed !"
            },
            userHeight: {
                required: "Height is Required !",
                digits: "Only Digits are Allowed !"
            },
            userDistrict: {
                required: "District is Required !"
            },
            userTaluka: {
                required: "Taluka is Required !"
            },
            userVillage: {
                required: "Village is Required !"
            },
            userCaste: {
                required: "Caste is Required !"
            },
            userProfileImage: {
                required: "Profile Image is Required !"
            },
            userGuardianFirstName: {
                required: "Guardian First Name is Required !"
            },
            userGuardianLastName: {
                required: "Guardian Last Name is Required !"
            },
            userGuardianNumber: {
                required: "Guardian Mobile Number is Required !",
                digits: "Only Digits are Allowed !",
            },
            userCoachName: {
                required: "Coach Name is Required !"
            },
            userCoachNumber: {
                required: "Coach Number is Required !",
                digits: "Only Digits are Allowed !",
            },
            userCoachHomeAddress: {
                required: "Coach Home Address is Required !"
            }
        },
        // Specify the error placement
        errorPlacement: function (error, element) {
            error.insertAfter(element);
        },
        invalidHandler: function (form, validator) {
            var errors = validator.numberOfInvalids();
            if (errors) {
                $("#dangerMsg").text("Some Fields are Empty or Have Invalid Input !!");
                $("#dangeralertBox").show().fadeIn('fast').delay(2000).fadeOut('slow')
            }
        },
        // Specify the class for the error label
        errorClass: "text-danger fw-medium"
    });

    // jQuery Validation Code for Login Form
    $('#loginForm').validate({
        rules: {
            userEmailID: {
                required: true,
                email: true
            },
            userPassword: {
                required: true,
                minlength: 5,
            }
        },
        messages: {
            userEmailID: {
                required: "Email Address is Required !",
                email: "Invalid Email Address"
            },
            userPassword: {
                required: "Password is required",
            }
        },
        // Specify the error placement
        errorPlacement: function (error, element) {
            error.insertAfter(element);
        },
        invalidHandler: function (form, validator) {
            var errors = validator.numberOfInvalids();
            if (errors) {
                $("#dangerMsg").text("Some Fields are Empty or Have Invalid Input !!");
                $("#dangeralertBox").show().fadeIn('fast').delay(2000).fadeOut('slow')
            }
        },
        // Specify the class for the error label
        errorClass: "text-danger fw-medium"
    })

    $('#editForm').validate({
        // Define validation rules for each input field
        rules: {
            userFirstName: {
                required: true,
                lettersOnly: true // Applying the Custom Validation
            },
            userFatherHusbandName: {
                required: true,
                lettersOnly: true // Applying the Custom Validation
            },
            userLastName: {
                required: true,
                lettersOnly: true // Applying the Custom Validation
            },
            userAgeGroup: {
                required: true
            },
            gender: {
                required: true
            },
            userdateOfBirth: {
                required: true
            },
            userSportsName: {
                required: true
            },
            userSubSportsName: {
                required: true
            },
            userMobileNumber: {
                required: true,
                digits: true,
                maxlength: 10,
                minlength: 10
            },
            userEmail: {
                required: true,
                email: true
            },
            userWeight: {
                required: true,
                digits: true
            },
            userHeight: {
                required: true,
                digits: true
            },
            userDistrict: {
                required: true
            },
            userTaluka: {
                required: true
            },
            userVillage: {
                required: true
            },
            userCaste: {
                required: true
            },
            userGuardianFirstName: {
                required: true,
                lettersOnly: true // Applying the Custom Validation
            },
            userGuardianLastName: {
                required: true,
                lettersOnly: true // Applying the Custom Validation
            },
            userGuardianNumber: {
                required: true,
                digits: true,
                maxlength: 10,
                minlength: 10
            },
            userCoachName: {
                required: true,
                lettersOnly: true // Applying the Custom Validation
            },
            userCoachNumber: {
                required: true,
                digits: true,
                maxlength: 10,
                minlength: 10
            },
            userCoachHomeAddress: {
                required: true,
                lettersOnly: true // Applying the Custom Validation
            },
            userCaptcha: {
                required: true,
                equalTo: "25w53"
            }
        },
        // Optionally, define custom error messages
        messages: {

            userFirstName: {
                required: "First Name is Required !"
            },
            userFatherHusbandName: {
                required: "Father or Husband Name is Required !"
            },
            userLastName: {
                required: "Last Name is Required !"
            },
            userAgeGroup: {
                required: "Age Group is Required !"
            },
            gender: {
                required: "Gender is Required !"
            },
            userdateOfBirth: {
                required: "Date Of Birth is Required !"
            },
            userSportsName: {
                required: "Sports Name is Required !"
            },
            userSubSportsName: {
                required: "Sub Sports Name is Required !"
            },
            userMobileNumber: {
                required: "Mobile Number is Required !",
                digits: "Only Digits are Allowed !",
            },
            userEmail: {
                required: "Email Address is Required !",
                email: "Invalid Email Address"
            },
            userWeight: {
                required: "Weight is Required !",
                digits: "Only Digits are Allowed !"
            },
            userHeight: {
                required: "Height is Required !",
                digits: "Only Digits are Allowed !"
            },
            userDistrict: {
                required: "District is Required !"
            },
            userTaluka: {
                required: "Taluka is Required !"
            },
            userVillage: {
                required: "Village is Required !"
            },
            userCaste: {
                required: "Caste is Required !"
            },
            userGuardianFirstName: {
                required: "Guardian First Name is Required !"
            },
            userGuardianLastName: {
                required: "Guardian Last Name is Required !"
            },
            userGuardianNumber: {
                required: "Guardian Mobile Number is Required !",
                digits: "Only Digits are Allowed !",
            },
            userCoachName: {
                required: "Coach Name is Required !"
            },
            userCoachNumber: {
                required: "Coach Number is Required !",
                digits: "Only Digits are Allowed !",
            },
            userCoachHomeAddress: {
                required: "Coach Home Address is Required !"
            },
            userCaptcha: {
                required: "Captcha is Required !",
                equalTo: "Incorrect captcha code. Please try again."
            }
        },
        // Specify the error placement
        errorPlacement: function (error, element) {
            error.insertAfter(element);
        },
        invalidHandler: function (form, validator) {
            var errors = validator.numberOfInvalids();
            if (errors) {
                $("#dangerMsg").text("Some Fields are Empty or Have Invalid Input !!");
                $("#dangeralertBox").show().fadeIn('fast').delay(2000).fadeOut('slow')
            }
        },
        // Specify the class for the error label
        errorClass: "text-danger fw-medium"
    })

    $('#generateCardBtn').click(function () {
        // var playerData = document.getElementById("playerDetailsCard").innerHTML; // Assuming playerDetailsCard is the ID of the element containing your data
        // document.getElementById("playerDetail").value = playerData.toString();
        var playerFirstName = document.getElementById("playerfname").innerHTML;
        var playerlastName = document.getElementById("playerlname").innerHTML;
        const invoice = document.getElementById("playerDetailsCard");
        console.log(invoice);
        // console.log(window);
        var opt = {
            margin: 1,
            filename: playerFirstName + "_" + playerlastName + '_PlayerCard.pdf',
            image: { type: 'png', quality: 1 },
            html2canvas: { scale: 2 },
            jsPDF: { unit: 'px', format: 'Ledger', orientation: 'landscape', hotfixes: ["px_scaling"] }
        };
        html2pdf().from(invoice).set(opt).save();

    });

    console.log("bye");

    // Add custom validation method for alphabets only
    $.validator.addMethod("lettersOnly", function (value, element) {
        // this.optional(element) : This is used to check whether the element is optional (i.e, not required and required true is not set)
        // Or it will check the validation if the value is not optional using regex
        return this.optional(element) || /^[a-zA-Z]+[ a-zA-Z]+$/.test(value);
    }, "Please enter only alphabetic characters.");

});