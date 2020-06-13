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

$('.close-btn').on('click',function() {
	$('#login-options-container').css('display', 'none');
	$('#phone-container').css('display', 'none');
	$('#email-container').css('display', 'none');
});
$('.back-btn').on('click',function() {
	$('#phone-container').css('display', 'none');
	$('#email-container').css('display', 'none');
	$('#login-options-container').css('display', 'block');
});

// -------------------------------------- CLOSE AND BACK BUTTON FUNCTION END --------------------------------------------

// -------------------------------------- LOGIN OPTIONS BUTTON FUNCTION START -------------------------------------------

$('#phone-btn').on('click',function() {
	$('#phone-container').css('display', 'block');
	$('#login-options-container').css('display', 'none');
});
$('#email-btn').on('click',function() {
	$('#login-options-container').css('display', 'none');
	$('#email-container').css('display', 'block');
});

// --------------------------------------- LOGIN OPTIONS BUTTON FUNCTION END --------------------------------------------

// -------------------------------------- PHONE INPUT TEXTBOX ANIMATION START -------------------------------------------

$("#phone").focus(function(){
    $(".textbox").css("outline", "2px solid #00a591");
});
$("#phone").blur(function(){
    $(".textbox").css("outline", "none");
});

// --------------------------------------- PHONE INPUT TEXTBOX ANIMATION END --------------------------------------------

function validatePhone(input) {
    let phone_constraint = /^[6-9]\d{9}$/;
    if(phone_constraint.test(input.value))
        $('#phone-input input[type="button"]').css('pointer-events', 'auto');
}
function validatePassword(input) {

    if(input.value == $('phone-password').val())
        $('#phone-password-btn').css('pointer-events', 'auto');
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

// ----------------------------------------- PHONE-TAB1 CLICK FUNCTION START --------------------------------------------

$('#phone-input input[type="button"]').on('click',function() {

	let phoneno = $('#phone').val();

	$.ajax({
        url: "../bin/user/phone-input.php",
        type: "POST",
        data: {
            phoneno: phoneno
        },

        beforeSend: function() {
    
            $('#phone-input input[type="button"]')
                .html('<i class="fas fa-sync-alt"></i> Please Wait')
                .css("pointer-events", "none");
        },
    
        success: function(response) {

            response = $.trim(response);

            $('.back-btn').css('visibility', 'hidden');
            $('.close-btn').css('visibility', 'hidden');

            if (response == 'Already_Registered') {
                $('#phone-input').css('display', 'none');
                $('#phone-password-input').css('display', 'block');
                $('#phone-cpassword').css('display', 'none');
                $('#phone-password-btn').html('Login');
            }

            else if (response == 'OTP Success') {
	            $('#phone-input').css('display', 'none');
	            $('#phone-otp-input').css('display', 'block');
            }
        }

    });
});

// ------------------------------------------ PHONE-TAB1 CLICK FUNCTION END ---------------------------------------------

// ----------------------------------------- PHONE-TAB3 CLICK FUNCTION START --------------------------------------------

$('#phone-password-input input[type="button"]').on('click',function() {
	$('#phone-password-input').css('display', 'none');
	$('#phone-name-input').css('display', 'block');
});

// ------------------------------------------ PHONE-TAB3 CLICK FUNCTION END ---------------------------------------------

// --------------------------------------- OTP INPUT TEXTBOX ANIMATION START --------------------------------------------

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
                data: {
                    phone1: phone1,
                    phone2: phone2,
                    phone3: phone3,
                    phone4: phone4
                },
    
                success: function(response) {

                    response = $.trim(response);

                    if (response == 'Verification Success') {
                        $('#phone-otp-input').css('display', 'none');
                        $('#phone-password-input').css('display', 'block');
                    }

                    else {
                        $('#phone-otp-response').html(response);
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
            $('#email-otp-container').css('display', 'none');
	        $('#password-container').css('display', 'block');
        }
    }
    if (eventCode === 8 && index !== 1) {
        getCodeBoxElement21(index - 1).focus();
    }
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

// ----------------------------------------- OTP INPUT TEXTBOX ANIMATION END ---------------------------------------------