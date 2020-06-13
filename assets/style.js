// LOADER

var myVar;

function loadFunction() {
  myVar = setTimeout(showPage, 2000);
}

function showPage() {
  document.getElementById("loader").style.display = "none";
  document.getElementById("whole-page").style.display = "block";
}

$('#switch-latest').on('click',function(){
    $('#switch-end').removeClass('switch-btn-active');
    $(this).addClass('switch-btn-active');
    $('#ads-end').hide();
    $('#ads-latest').show();
});

$('#switch-end').on('click',function(){
    $('#switch-latest').removeClass('switch-btn-active');
    $(this).addClass('switch-btn-active');    
    $('#ads-latest').hide();
    $('#ads-end').show();
});

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