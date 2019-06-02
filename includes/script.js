$( document ).ready(function() {

  var day = document.getElementById('day');

  $(".day").click(function(){
    // console.log($(this).attr('data-bookingslot'));
    day.value = $(this).attr('data-bookingslot');
    console.log(day.value);

  })

});


$(document).ready(function(){
    $('.modal').modal();
});


function bookTime(time, date) {

  var selected = document.getElementById("timeValue");
  selected.value=time;

  var daySelected = document.getElementById("dateValue");
 
  var theDate = date;
  year = theDate.toString().slice(0,4);
  month = theDate.toString().slice(4,6);
  day = theDate.toString().slice(6,8);

  daySelected.value = year + "-" + month + "-" + day;

};

function nextBookingTime(time, date) {

  var selected = document.getElementById("timeValue");
  selected.value=time;

  var nextDaySelected = document.getElementById("dateValue");

  nextDaySelected.value = date;

}


function previousBookingTime(time, date) {

  var selected = document.getElementById("timeValue");
  selected.value=time;

  var previousDaySelected = document.getElementById("dateValue");

  previousDaySelected.value = date;


}
