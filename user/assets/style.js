// ------------------------------------------- SLIDESHOW ANIMATION START ------------------------------------------------

var myIndex = 0;
slideshow();

function slideshow() {

  var i;
  var x = document.getElementsByClassName("inner-content");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  if (myIndex >= x.length)
  	myIndex = 0;

  x[myIndex].style.display = "block";
  myIndex++; 
  setTimeout(slideshow, 3000); // Change image every 3 seconds

}

// -------------------------------------------- SLIDESHOW ANIMATION END -------------------------------------------------

// ------------------------------------- CLOSE AND BACK BUTTON FUNCTION START -------------------------------------------

$('.back-btn').on('click',function() {

	$('#phone-container').css('display', 'none');
	$('#email-container').css('display', 'none');
	$('#login-options-container').css('display', 'block');

});

// -------------------------------------- CLOSE AND BACK BUTTON FUNCTION END --------------------------------------------

// -------------------------------------- LOGIN OPTIONS BUTTON FUNCTION START -------------------------------------------

$('#phone-btn').on('click',function() {

    $('#login-options-container').css('display', 'none');
    $('#phone-container').css('display', 'block');

});

$('#email-btn').on('click',function() {

	$('#login-options-container').css('display', 'none');
	$('#email-container').css('display', 'block');

});

// --------------------------------------- LOGIN OPTIONS BUTTON FUNCTION END --------------------------------------------

// ------------------------------------------- VALIDATION FUNCTION START ------------------------------------------------

function validatePhone(input) {

    let phone_constraint = /^[6-9]\d{9}$/;

    if(phone_constraint.test(input.value)) {

        $('#email-input button').css('pointer-events', 'auto');
        $('#phone-input button').css('pointer-events', 'auto');

        }
    else {

        $('#phone-input button').css('pointer-events', 'none');
        $('#email-input button').css('pointer-events', 'none');

    }

}

function validateSigninPassword(input) {

    if (input.value.trim().length) {
            $('#phone-signin-btn').css('pointer-events', 'auto');
            $('#email-signin-btn').css('pointer-events', 'auto');
        }
    else {
            $('#phone-signin-btn').css('pointer-events', 'none');
            $('#email-signin-btn').css('pointer-events', 'none');
        }
}

function matchPassword(input) {

    if(input.value == $('#phone-password').val())
        $('#phone-password-input button').css('pointer-events', 'auto');
    else
        $('#phone-password-input button').css('pointer-events', 'none');

    if(input.value == $('#email-password').val())
        $('#email-password-input button').css('pointer-events', 'auto');
    else
        $('#email-password-input button').css('pointer-events', 'none');

}

function togglePhonePassword() {

  var x = document.getElementById("phone-password");
  var y = document.getElementById("toggle-phone-password");

  if (x.type === "password") {

    y.classList.remove("fa-eye");
    y.classList.add("fa-eye-slash");
    x.type = "text";

  } else {

    y.classList.remove("fa-eye-slash");
    y.classList.add("fa-eye");
    x.type = "password";

  }

}

function togglePhoneCPassword() {

  var x = document.getElementById("phone-cpassword");
  var y = document.getElementById("toggle-phone-cpassword");

  if (x.type === "password") {

    y.classList.remove("fa-eye");
    y.classList.add("fa-eye-slash");
    x.type = "text";

  } else {

    y.classList.remove("fa-eye-slash");
    y.classList.add("fa-eye");
    x.type = "password";

  }

}

function togglePhoneSigninPassword() {

  var x = document.getElementById("phone-signin-password");
  var y = document.getElementById("toggle-phone-signin-password");

  if (x.type === "password") {

    y.classList.remove("fa-eye");
    y.classList.add("fa-eye-slash");
    x.type = "text";

  } else {

    y.classList.remove("fa-eye-slash");
    y.classList.add("fa-eye");
    x.type = "password";

  }

}

function toggleEmailPassword() {

  var x = document.getElementById("email-password");
  var y = document.getElementById("toggle-email-password");

  if (x.type === "password") {

    y.classList.remove("fa-eye");
    y.classList.add("fa-eye-slash");
    x.type = "text";

  } else {

    y.classList.remove("fa-eye-slash");
    y.classList.add("fa-eye");
    x.type = "password";

  }

}

function toggleEmailCPassword() {

  var x = document.getElementById("email-cpassword");
  var y = document.getElementById("toggle-email-cpassword");

  if (x.type === "password") {

    y.classList.remove("fa-eye");
    y.classList.add("fa-eye-slash");
    x.type = "text";

  } else {

    y.classList.remove("fa-eye-slash");
    y.classList.add("fa-eye");
    x.type = "password";

  }

}

function toggleEmailSigninPassword() {

  var x = document.getElementById("email-signin-password");
  var y = document.getElementById("toggle-email-signin-password");

  if (x.type === "password") {

    y.classList.remove("fa-eye");
    y.classList.add("fa-eye-slash");
    x.type = "text";

  } else {

    y.classList.remove("fa-eye-slash");
    y.classList.add("fa-eye");
    x.type = "password";

  }

}

function validateName(input) {

    if (input.value.trim().length) {

        str = input.value;
        str = str.split(" ");
    
        for (let i = 0, x = str.length; i < x; i++)
            str[i] = str[i][0].toUpperCase() + str[i].substr(1).toLowerCase();

        input.value = str.join(" ");

        $('#phone-name-input button').css('pointer-events', 'auto');
        $('#email-name-input button').css('pointer-events', 'auto');

    }

    else {

            $('#phone-name-input button').css('pointer-events', 'none');
            $('#email-name-input button').css('pointer-events', 'none');

        }

}

function validateEmail(input) {

    let email_constraint = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

    if(email_constraint.test(input.value)) {
        $('#phone-email-input button').css('pointer-events', 'auto');
        $('#email-input button').css('pointer-events', 'auto');
    }
    else {
        $('#phone-email-input button').css('pointer-events', 'none');
        $('#email-input button').css('pointer-events', 'none');
    }

}

function changePhone() {

    $('#phone-otp-input').css('display', 'none');
    $('#phone-input').css('display', 'block');

}

function changeEmail() {

    $('#email-otp-input').css('display', 'none');
    $('#email-input').css('display', 'block');

}

// ------------------------------------------- VALIDATION FUNCTION END --------------------------------------------------

//-----------------------------------------------------------------------------------------------------------------------
//--------------------------------------------- PHONE JS/JQUERY START ---------------------------------------------------
//-----------------------------------------------------------------------------------------------------------------------

// -------------------------------------- PHONE INPUT TEXTBOX ANIMATION START -------------------------------------------

$("#phone").focus(function(){

    $(".textbox").css("outline", "2px solid #00a591");

});

$("#phone").blur(function(){

    $(".textbox").css("outline", "none");

});

// --------------------------------------- PHONE INPUT TEXTBOX ANIMATION END --------------------------------------------

// ----------------------------------------- PHONE-TAB1 CLICK FUNCTION START --------------------------------------------

$('#phone-input button').on('click',function() {

	let phoneno = $('#phone').val();

	$.ajax({
        url: "../bin/user/phone-input.php",
        type: "POST",
        dataType: "json",
        data: {
            phoneno: phoneno
        },

        beforeSend: function() {
    
            $('#phone-input button')
                .html('<i class="fas fa-sync-alt"></i> Please Wait')
                .css("pointer-events", "none");
        },
    
        success: function(response) {

            $('.back-btn').css('visibility', 'hidden');
            $('.phone-value').text(phoneno);

            if (response.code == 'ALREADY_REGISTERED') {

                $('#phone-input').css('display', 'none');
                $('#loader-container').css('display', 'block');

                setTimeout(function() {

                    $('#loader-container').css('display', 'none');
                    $('#phone-signin-password-input').css('display', 'block');

                }, 1000);

            }

            else if(response.code == 'OTP_SENT_SUCCESSFULLY'){

	            $('#phone-input').css('display', 'none');
                $('#loader-container').css('display', 'block');

                setTimeout(function() {

                    $('#loader-container').css('display', 'none');
                    $('#phone-otp-input').css('display', 'block');

                }, 1000);
            }

            else {

                $('#phone').val('');

                $('.back-btn').css('visibility', 'visible');
                
                $('#phone-response').fadeIn();
                $('#phone-response').css('color', 'red');
                $('#phone-response').html('Server Error. Please try another option to Continue');
                $('#phone-response').fadeOut(7000);

            }
        }

    });
});

// ------------------------------------------ PHONE-TAB1 CLICK FUNCTION END ---------------------------------------------

// -------------------------------------------- PHONE-TAB2 FUNCTION START -----------------------------------------------

function getCodeBoxElement1(index) {
    return document.getElementById('phone-otp-input-' + index);
}
function onKeyUpEvent1(index, event) {
    const eventCode = event.which || event.keyCode;
    if (getCodeBoxElement1(index).value.length === 1) {
        if (index !== 4) {
            getCodeBoxElement1(index+ 1).focus();
        } else {
            getCodeBoxElement1(index).blur();
            // Submit code

            let phone1 = $('#phone-otp-input-1').val();
            let phone2 = $('#phone-otp-input-2').val();
            let phone3 = $('#phone-otp-input-3').val();
            let phone4 = $('#phone-otp-input-4').val();

            $.ajax({
                url: "../bin/user/phone-input.php",
                type: "POST",
                dataType: "json",
                data: {
                    phone1: phone1,
                    phone2: phone2,
                    phone3: phone3,
                    phone4: phone4
                },

                beforeSend: function() {
                    $('#phone-otp-input-1').val("");
                    $('#phone-otp-input-2').val("");
                    $('#phone-otp-input-3').val("");
                    $('#phone-otp-input-4').val("");
                },
    
                success: function(response) {

                    if(response.code == 'TIMEOUT') {

                        $('#phone-otp-response').fadeIn();
                        $('#phone-otp-response').css('color', 'red');
                        $('#phone-otp-response').html('Verification Request Timeout.');
                        $('#phone-otp-response').fadeOut(5000);

                    }

                    else if (response.code == 'OTP_MATCHED_SUCCESSFUL') {

                        $('#phone-otp-input').css('display', 'none');
                        $('#loader-container').css('display', 'block');

                        setTimeout(function() {

                            $('#loader-container').css('display', 'none');
                            $('#phone-password-input').css('display', 'block');

                        }, 1000);
                    } 

                    else {
                        $('#phone-otp-response').fadeIn();
                        $('#phone-otp-response').css('color', 'red');
                        $('#phone-otp-response').html('You have entered a Wrong OTP.');
                        $('#phone-otp-response').fadeOut(5000);
                    }
                }

            });

        }
    }
    if (eventCode === 8 && index !== 1) {
        getCodeBoxElement1(index - 1).focus();
    }
}
function onFocusEvent1(index) {
    for (item = 1; item < index; item++) {
        const currentElement = getCodeBoxElement1(item);
        if (!currentElement.value) {
            currentElement.focus();
            break;
        }
    }
}

$('#phone-otp-resend-btn').on('click',function() {

    $.ajax({
        url: "../bin/user/phone-input.php",
        type: "POST",
        dataType: "json",
        data: {
            resend: true
        },

        beforeSend: function() {
            $('#phone-otp-resend-btn').css('display', 'none');
        },

        success: function() {

            if (response.code == 'OTP_SENT_SUCCESSFULLY') {

                $('#phone-otp-response').fadeIn();
                $('#phone-otp-response').css('color', '#00a591');
                $('#phone-otp-response').html('OTP sent Successfully.');
                $('#phone-otp-response').fadeOut(5000);

            }

            else {

                $('#phone').val('');

                $('#phone-otp-input').css('display', 'none');
                $('#phone-input').css('display', 'block');

                $('.back-btn').css('visibility', 'visible');
                
                $('#phone-response').fadeIn();
                $('#phone-response').css('color', 'red');
                $('#phone-response').html('Server Error. Please try another option to Continue');
                $('#phone-response').fadeOut(7000);

            }

        }

    });

});


// --------------------------------------------- PHONE-TAB2 FUNCTION END ------------------------------------------------

// ----------------------------------------- PHONE-TAB3 CLICK FUNCTION START --------------------------------------------

$('#phone-password-input button').on('click',function() {

    $('#phone-password-input').css('display', 'none');
    $('#loader-container').css('display', 'block');

    setTimeout(function() {

        $('#loader-container').css('display', 'none');
        $('#phone-name-input').css('display', 'block');
    }, 1000);

});

// ------------------------------------------ PHONE-TAB3 CLICK FUNCTION END ---------------------------------------------

// ----------------------------------- PHONE-TAB4 CLICK FUNCTION I.E. SIGNIN START --------------------------------------

$("#phone-signin-btn").on("click", function(event) {

    event.preventDefault();

    let phoneno = $('#phone').val();
    let password = $('#phone-signin-password').val();

    //AJAX request for signin form
    $.ajax({
        url: "../bin/user/phone-signin.php",
        type: "POST",
        dataType: "json",
        contentType: "application/json",
        data: JSON.stringify({
            phoneno: phoneno,
            password: password
        }),
        beforeSend: function() {

            $("#phone-signin-btn")
                .html('<i class="fa fa-exchange" aria-hidden="true"></i> Please Wait')
                .css("pointer-events", "none");
            $('#phone').val('');
            $('#phone-signin-password').val('');
        },
        success: function(response) {

            if (response.code == "SIGNIN_SUCCESS") {
                //User credentials has been successfully validated
                $("#phone-signin-btn")
                    .html('<i class="fa fa-spinner fa-spin"></i>   Signing in')
                    .css("pointer-events", "auto");
                window.parent.location.href = "../index.php";

            } else {
                //User has provided invalid credentials or is not registered
                $("#phone-signin-btn")
                    .html('<i class="fa fa-sign-in" aria-hidden="true"></i> Sign in')
                    .css("pointer-events", "auto");

                $('#phone-signin-password-input').css('display', 'none');
                $('.back-btn').css('visibility', 'visible');
                $('#phone-input').css('display', 'block');

                $('#phone-response').fadeIn();
                $('#phone-response').css('color', 'red');
                $('#phone-response').html('Invalid Credentials. Please try Again');
                $('#phone-response').fadeOut(3000);
            }
        },
        error: function(request, error) {

            $("#phone-signin-btn")
                .html('<i class="fa fa-sign-in" aria-hidden="true"></i> Sign in')
                .css("pointer-events", "auto");

            $('#phone-signin-password-input').css('display', 'none');
            $('#phone-input').css('display', 'block');

            $('#phone-response').fadeIn();
            $('#phone-response').css('color', 'red');
            $('#phone-response').html('Server Error');
            $('#phone-response').fadeOut(5000);
        }
    });
});

// ----------------------------------- PHONE-TAB4 CLICK FUNCTION I.E. SIGNIN END ----------------------------------------

// ----------------------------------------- PHONE-TAB5 CLICK FUNCTION START --------------------------------------------

$('#phone-name-input button').on('click',function() {

    $('#phone-name-input').css('display', 'none');
    $('#loader-container').css('display', 'block');

    setTimeout(function() {

        $('#loader-container').css('display', 'none');
        $('#phone-email-input').css('display', 'block');
        
    }, 1000);

});

// ------------------------------------------ PHONE-TAB5 CLICK FUNCTION END ---------------------------------------------

// ----------------------------------- PHONE-TAB6 CLICK FUNCTION I.E. SIGNUP START --------------------------------------

$('#phone-email-input button').on('click',function(event) {

    event.preventDefault();

    let phoneno = $('#phone').val();
    let password = $('#phone-password').val();
    let name = $('#phone-name').val();
    let email = $('#phone-email').val();

    $.ajax({
        url: "../bin/user/signup.php",
        type: "POST",
        dataType: "json",
        contentType: "application/json",
        data: JSON.stringify({
            phoneno: phoneno,
            password: password,
            name: name,
            email: email
        }),

        beforeSend: function() {
    
            $('#phone-email-input button')
                .html('<i class="fas fa-sync-alt"></i> Please Wait')
                .css("pointer-events", "none");
            $('#phone').val('');
            $('#phone-password').val('');
            $('#phone-name').val('');
            $('#phone-email').val('');

        },
    
        success: function(response) {

            if (response.code == "SIGNUP_SUCCESS") {

                $('#phone-email-input button').html('<i class="fa fa-circle-o-notch fa-spin"></i>   Signing up');

                window.parent.location.href = "../index.php";

            }

            else {

                $('#phone-email-input').css('display', 'none');
                $('#phone-input').css('display', 'block');

                $('#phone-response').fadeIn();
                $('#phone-response').css('color', 'red');
                $('#phone-response').html('Server Error');
                $('#phone-response').fadeOut(7000);

            }

        },

        error: function(request, error) {

            $('#phone-email-input').css('display', 'none');
            $('#phone-input').css('display', 'block');

            $('#phone-response').fadeIn();
            $('#phone-response').css('color', 'red');
            $('#phone-response').html('Server Error');
            $('#phone-response').fadeOut(7000);
        }

    });
});

// ----------------------------------- PHONE-TAB6 CLICK FUNCTION I.E. SIGNUP END ----------------------------------------

//-----------------------------------------------------------------------------------------------------------------------
//---------------------------------------------- PHONE JS/JQUERY END ----------------------------------------------------
//-----------------------------------------------------------------------------------------------------------------------

//-----------------------------------------------------------------------------------------------------------------------
//--------------------------------------------- EMAIL JS/JQUERY START ---------------------------------------------------
//-----------------------------------------------------------------------------------------------------------------------

// -------------------------------------- EMAIL INPUT TEXTBOX ANIMATION START -------------------------------------------

$("#email-phone").focus(function(){

    $(".textbox").css("outline", "2px solid #00a591");

});

$("#email-phone").blur(function(){

    $(".textbox").css("outline", "none");

});

// --------------------------------------- EMAIL INPUT TEXTBOX ANIMATION END --------------------------------------------

// ----------------------------------------- EMAIL-TAB1 CLICK FUNCTION START --------------------------------------------

$('#email-input button').on('click',function() {

    let email = $('#email').val();

    $.ajax({
        url: "../bin/user/email-input.php",
        type: "POST",
        dataType: "json",
        data: {
            email: email
        },

        beforeSend: function() {
    
            $('#email-input button')
                .html('<i class="fas fa-sync-alt"></i> Please Wait')
                .css("pointer-events", "none");
        },
    
        success: function(response) {

            $('.back-btn').css('visibility', 'hidden');
            $('.email-value').text(email);

            if (response.code == 'ALREADY_REGISTERED') {

                $('#email-input').css('display', 'none');
                $('#loader-container').css('display', 'block');

                setTimeout(function() {

                    $('#loader-container').css('display', 'none');
                    $('#email-signin-password-input').css('display', 'block');

                }, 1000);

            }

            else if(response.code == 'OTP_SENT_SUCCESSFULLY'){

                $('#email-input').css('display', 'none');
                $('#loader-container').css('display', 'block');

                setTimeout(function() {

                    $('#loader-container').css('display', 'none');
                    $('#email-otp-input').css('display', 'block');

                }, 1000);
            }

            else {

                $('#email').val('');

                $('.back-btn').css('visibility', 'visible');
                
                $('#email-response').fadeIn();
                $('#email-response').css('color', 'red');
                $('#email-response').html('Server Error. Please try another option to Continue');
                $('#email-response').fadeOut(7000);

            }
        }

    });
});

// ------------------------------------------ EMAIL-TAB1 CLICK FUNCTION END ---------------------------------------------

// -------------------------------------------- EMAIL-TAB2 FUNCTION START -----------------------------------------------

function getCodeBoxElement2(index) {
    return document.getElementById('email-otp-input-' + index);
}
function onKeyUpEvent2(index, event) {
    const eventCode = event.which || event.keyCode;
    if (getCodeBoxElement2(index).value.length === 1) {
        if (index !== 4) {
            getCodeBoxElement2(index+ 1).focus();
        } else {
            getCodeBoxElement2(index).blur();
            // Submit code

            let email1 = $('#email-otp-input-1').val();
            let email2 = $('#email-otp-input-2').val();
            let email3 = $('#email-otp-input-3').val();
            let email4 = $('#email-otp-input-4').val();

            $.ajax({
                url: "../bin/user/email-input.php",
                type: "POST",
                dataType: "json",
                data: {
                    email1: email1,
                    email2: email2,
                    email3: email3,
                    email4: email4
                },

                beforeSend: function() {
                    $('#email-otp-input-1').val("");
                    $('#email-otp-input-2').val("");
                    $('#email-otp-input-3').val("");
                    $('#email-otp-input-4').val("");
                },
    
                success: function(response) {

                    if(response.code == 'TIMEOUT') {

                        $('#email-otp-response').fadeIn();
                        $('#email-otp-response').css('color', 'red');
                        $('#email-otp-response').html('Verification Request Timeout.');
                        $('#email-otp-response').fadeOut(5000);

                    }

                    else if (response.code == 'OTP_MATCHED_SUCCESSFUL') {

                        $('#email-otp-input').css('display', 'none');
                        $('#loader-container').css('display', 'block');

                        setTimeout(function() {

                            $('#loader-container').css('display', 'none');
                            $('#email-password-input').css('display', 'block');

                        }, 1000);
                    } 

                    else {
                        $('#email-otp-response').fadeIn();
                        $('#email-otp-response').css('color', 'red');
                        $('#email-otp-response').html('You have entered a Wrong OTP.');
                        $('#email-otp-response').fadeOut(5000);
                    }
                }

            });

        }
    }
    if (eventCode === 8 && index !== 1)
        getCodeBoxElement2(index - 1).focus();
}
function onFocusEvent2(index) {
    for (item = 1; item < index; item++) {
        const currentElement = getCodeBoxElement2(item);
        if (!currentElement.value) {
            currentElement.focus();
            break;
        }
    }
}

$('#email-otp-resend-btn').on('click',function() {

    $.ajax({
        url: "../bin/user/email-input.php",
        type: "POST",
        dataType: "json",
        data: {
            resend: true
        },

        beforeSend: function() {
            $('#email-otp-resend-btn').css('display', 'none');
        },

        success: function() {

            if (response.code == 'OTP_SENT_SUCCESSFULLY') {

                $('#email-otp-response').fadeIn();
                $('#email-otp-response').css('color', '#00a591');
                $('#email-otp-response').html('OTP sent Successfully.');
                $('#email-otp-response').fadeOut(5000);

            }

            else {

                $('#email').val('');

                $('#email-otp-input').css('display', 'none');
                $('#email-input').css('display', 'block');

                $('.back-btn').css('visibility', 'visible');
                
                $('#email-response').fadeIn();
                $('#email-response').css('color', 'red');
                $('#email-response').html('Server Error. Please try another option to Continue');
                $('#email-response').fadeOut(7000);

            }

        }

    });

});


// --------------------------------------------- EMAIL-TAB2 FUNCTION END ------------------------------------------------

// ----------------------------------------- EMAIL-TAB3 CLICK FUNCTION START --------------------------------------------

$('#email-password-input button').on('click',function() {

    $('#email-password-input').css('display', 'none');
    $('#loader-container').css('display', 'block');

    setTimeout(function() {

        $('#loader-container').css('display', 'none');
        $('#email-name-input').css('display', 'block');
    }, 1000);

});

// ------------------------------------------ EMAIL-TAB3 CLICK FUNCTION END ---------------------------------------------

// ----------------------------------- EMAIL-TAB4 CLICK FUNCTION I.E. SIGNIN START --------------------------------------

$("#email-signin-btn").on("click", function(event) {

    event.preventDefault();

    let emailno = $('#email').val();
    let password = $('#email-signin-password').val();

    //AJAX request for signin form
    $.ajax({
        url: "../bin/user/email-signin.php",
        type: "POST",
        dataType: "json",
        contentType: "application/json",
        data: JSON.stringify({
            emailno: emailno,
            password: password
        }),
        beforeSend: function() {

            $("#email-signin-btn")
                .html('<i class="fa fa-exchange" aria-hidden="true"></i> Please Wait')
                .css("pointer-events", "none");
            $('#email').val('');
            $('#email-signin-password').val('');
        },
        success: function(response) {

            if (response.code == "SIGNIN_SUCCESS") {
                //User credentials has been successfully validated
                $("#email-signin-btn")
                    .html('<i class="fa fa-spinner fa-spin"></i>   Signing in')
                    .css("pointer-events", "auto");
                window.parent.location.href = "../index.php";

            } else {
                //User has provided invalid credentials or is not registered
                $("#email-signin-btn")
                    .html('<i class="fa fa-sign-in" aria-hidden="true"></i> Sign in')
                    .css("pointer-events", "auto");

                $('#email-signin-password-input').css('display', 'none');
                $('.back-btn').css('visibility', 'visible');
                $('#email-input').css('display', 'block');

                $('#email-response').fadeIn();
                $('#email-response').css('color', 'red');
                $('#email-response').html('Invalid Credentials. Please try Again');
                $('#email-response').fadeOut(3000);
            }
        },
        error: function(request, error) {

            $("#email-signin-btn")
                .html('<i class="fa fa-sign-in" aria-hidden="true"></i> Sign in')
                .css("pointer-events", "auto");

            $('#email-signin-password-input').css('display', 'none');
            $('#email-input').css('display', 'block');

            $('#email-response').fadeIn();
            $('#email-response').css('color', 'red');
            $('#email-response').html('Server Error');
            $('#email-response').fadeOut(5000);
        }
    });
});

// ----------------------------------- EMAIL-TAB4 CLICK FUNCTION I.E. SIGNIN END ----------------------------------------

// ----------------------------------------- EMAIL-TAB5 CLICK FUNCTION START --------------------------------------------

$('#email-name-input button').on('click',function() {

    $('#email-name-input').css('display', 'none');
    $('#loader-container').css('display', 'block');

    setTimeout(function() {

        $('#loader-container').css('display', 'none');
        $('#email-email-input').css('display', 'block');
        
    }, 1000);

});

// ------------------------------------------ EMAIL-TAB5 CLICK FUNCTION END ---------------------------------------------

// ----------------------------------- EMAIL-TAB6 CLICK FUNCTION I.E. SIGNUP START --------------------------------------

$('#email-phone-input button').on('click',function(event) {

    event.preventDefault();

    let email = $('#email').val();
    let password = $('#email-password').val();
    let name = $('#email-name').val();
    let phoneno = $('#email-phone').val();

    $.ajax({
        url: "../bin/user/signup.php",
        type: "POST",
        dataType: "json",
        contentType: "application/json",
        data: JSON.stringify({
            phoneno: phoneno,
            password: password,
            name: name,
            email: email
        }),

        beforeSend: function() {
    
            $('#email-phone-input button')
                .html('<i class="fas fa-sync-alt"></i> Please Wait')
                .css("pointer-events", "none");
            $('#email').val('');
            $('#email-password').val('');
            $('#email-name').val('');
            $('#email-phone').val('');

        },
    
        success: function(response) {

            if (response.code == "SIGNUP_SUCCESS") {

                $('#email-phone-input button').html('<i class="fa fa-circle-o-notch fa-spin"></i>   Signing up');

                window.parent.location.href = "../index.php";

            }

            else {

                $('#email-phone-input').css('display', 'none');
                $('#email-input').css('display', 'block');

                $('#email-response').fadeIn();
                $('#email-response').css('color', 'red');
                $('#email-response').html('Server Error');
                $('#email-response').fadeOut(7000);

            }

        },

        error: function(request, error) {

            $('#email-phone-input').css('display', 'none');
            $('#email-input').css('display', 'block');

            $('#email-response').fadeIn();
            $('#email-response').css('color', 'red');
            $('#email-response').html('Server Error');
            $('#email-response').fadeOut(7000);
        }

    });
});

// ----------------------------------- EMAIL-TAB6 CLICK FUNCTION I.E. SIGNUP END ----------------------------------------

//-----------------------------------------------------------------------------------------------------------------------
//--------------------------------------------- EMAIL JS/JQUERY START ---------------------------------------------------
//-----------------------------------------------------------------------------------------------------------------------
