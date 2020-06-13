// LOADER

var myVar;

function loadFunction() {
  myVar = setTimeout(showPage, 1500);
}

function showPage() {
  document.getElementById("loader").style.display = "none";
  document.getElementById("whole-page").style.display = "block";
}


$('.row1').on('click',function(){
    $(this).addClass('row-active');
    $('.row2').removeClass('row-active');
    $('.row3').removeClass('row-active');
    $('.row4').removeClass('row-active');
    $('.row5').removeClass('row-active');
    $('.row6').removeClass('row-active');
    $('.row7').removeClass('row-active');
    $('.row8').removeClass('row-active');
    $('.row9').removeClass('row-active');
});
$('.row2').on('click',function(){
    $(this).addClass('row-active');
    $('.row1').removeClass('row-active');
    $('.row3').removeClass('row-active');
    $('.row4').removeClass('row-active');
    $('.row5').removeClass('row-active');
    $('.row6').removeClass('row-active');
    $('.row7').removeClass('row-active');
    $('.row8').removeClass('row-active');
    $('.row9').removeClass('row-active');
});
$('.row3').on('click',function(){
    $(this).addClass('row-active');
    $('.row2').removeClass('row-active');
    $('.row1').removeClass('row-active');
    $('.row4').removeClass('row-active');
    $('.row5').removeClass('row-active');
    $('.row6').removeClass('row-active');
    $('.row7').removeClass('row-active');
    $('.row8').removeClass('row-active');
    $('.row9').removeClass('row-active');
});
$('.row4').on('click',function(){
    $(this).addClass('row-active');
    $('.row2').removeClass('row-active');
    $('.row3').removeClass('row-active');
    $('.row1').removeClass('row-active');
    $('.row5').removeClass('row-active');
    $('.row6').removeClass('row-active');
    $('.row7').removeClass('row-active');
    $('.row8').removeClass('row-active');
    $('.row9').removeClass('row-active');
});
$('.row5').on('click',function(){
    $(this).addClass('row-active');
    $('.row2').removeClass('row-active');
    $('.row3').removeClass('row-active');
    $('.row4').removeClass('row-active');
    $('.row1').removeClass('row-active');
    $('.row6').removeClass('row-active');
    $('.row7').removeClass('row-active');
    $('.row8').removeClass('row-active');
    $('.row9').removeClass('row-active');
});
$('.row6').on('click',function(){
    $(this).addClass('row-active');
    $('.row2').removeClass('row-active');
    $('.row3').removeClass('row-active');
    $('.row4').removeClass('row-active');
    $('.row5').removeClass('row-active');
    $('.row1').removeClass('row-active');
    $('.row7').removeClass('row-active');
    $('.row8').removeClass('row-active');
    $('.row9').removeClass('row-active');
});
$('.row7').on('click',function(){
    $(this).addClass('row-active');
    $('.row2').removeClass('row-active');
    $('.row3').removeClass('row-active');
    $('.row4').removeClass('row-active');
    $('.row5').removeClass('row-active');
    $('.row6').removeClass('row-active');
    $('.row1').removeClass('row-active');
    $('.row8').removeClass('row-active');
    $('.row9').removeClass('row-active');
});
$('.row8').on('click',function(){
    $(this).addClass('row-active');
    $('.row2').removeClass('row-active');
    $('.row3').removeClass('row-active');
    $('.row4').removeClass('row-active');
    $('.row5').removeClass('row-active');
    $('.row6').removeClass('row-active');
    $('.row7').removeClass('row-active');
    $('.row1').removeClass('row-active');
    $('.row9').removeClass('row-active');
});
$('.row9').on('click',function(){
    $(this).addClass('row-active');
    $('.row2').removeClass('row-active');
    $('.row3').removeClass('row-active');
    $('.row4').removeClass('row-active');
    $('.row5').removeClass('row-active');
    $('.row6').removeClass('row-active');
    $('.row7').removeClass('row-active');
    $('.row8').removeClass('row-active');
    $('.row1').removeClass('row-active');
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