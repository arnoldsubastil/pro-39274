//get the date today
// var today = new Date();
// var dd = String(today.getDate()).padStart(2, '0');
// var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
// var yyyy = today.getFullYear();
// today = mm + '/' + dd + '/' + yyyy;
// console.log(today);

//get the date after 5 days
// function padNumber(number) {
//     var string  = '' + number;
//     string      = string.length < 2 ? '0' + string : string;
//     return string;
// }
// date      = new Date();
// next_date = new Date(date.setDate(date.getDate() + 6));
// formatted = next_date.getUTCFullYear() + '-' + padNumber(next_date.getUTCMonth() + 1) + '-' + padNumber(next_date.getUTCDate())
// document.getElementById('elem').innerHTML = formatted;





var today = new Date();
var new_date = [];

var sHTML = "<ul class='noListStyle'>";

if (moment().isBefore('10:00:00')) {
    //include today
    counter=1;
    limit=6;    
}
else
{
    //exclude today
    counter=2;
    limit=7;
}

for (i = counter; i < limit; i++) {

    new_date[i] = moment().add(i,"days").format("MMM DD, YYYY");
    
    sHTML = sHTML + "<li><input type='radio' id='" + new_date[i] + "' name='ReceiveDate' value='" + new_date[i] + "'> <label for='" + new_date[i] + "'>" + moment().add(i,"days").format("dddd"); + "</label></li>";
   

}

sHTML = sHTML + "</ul>";

$("#result").html(sHTML);

$("input:radio[name=ReceiveDate]").click(function() {

    // $("#ReceiveDateTextBox").css("background-color", "yellow");
    $('#ReceiveDateTextBox').val($("input[name='ReceiveDate']:checked").val());
    
});




$(function() {
    $('input[name="to_received_date"]').daterangepicker({

        locale: {
            format: 'MMM DD, YYYY'
        },
        
      singleDatePicker: true,
      showDropdowns: true,
      minYear: 1901,
      maxYear: parseInt(moment().format('YYYY'),10)
    });
  });