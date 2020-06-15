// LOADER

var myVar;

function loadFunction() {
  myVar = setTimeout(showPage, 1500);
}

function showPage() {
  document.getElementById("loader").style.display = "none";
  document.getElementById("whole-page").style.display = "block";
}


$('.toogle').on('click',function () {
    $(this).toggleClass('clicked');
    $('.menuBar-nav').toggleClass('show');
});

var dropdown = document.getElementsByClassName("dropdown-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
  this.classList.toggle("active");
  var dropdownContent = this.nextElementSibling;
  if (dropdownContent.style.display === "block") {
  dropdownContent.style.display = "none";
  } else {
  dropdownContent.style.display = "block";
  }
  });
}

$('#login-modal-btn').on('click',function(event) {

  event.preventDefault();

  $('#login-modal').css('display', 'block');

});

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  let loginModal = document.getElementById('login-modal')
  if (event.target == loginModal)
      loginModal.style.display = "none";
}