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


//show all the next five days in radio buttons
var today = new Date();
var new_date = [];

var sHTML = "<ul class='noListStyle'>";

for (i = 1; i < 6; i++) {
  
    // new_date[i] = moment().add(i,"days").format("MMM DD");
    new_date[i] = moment().add(i,"days").format("dddd");
    
    sHTML = sHTML + "<li><input type='radio' id='" + new_date[i] + "' name='ReceiveDate' value='" + new_date[i] + "'> <label for='" + new_date[i] + "'>" + new_date[i] + "</label></li>";
    
}

sHTML = sHTML + "</ul>";

$("#result").html(sHTML);


//show value selected in radio buttons
// var today = new Date();
// var new_date = [];

// var sHTML = "<ul class='noListStyle'>";

// for (i = 1; i < 6; i++) {
  
//     // new_date[i] = moment().add(i,"days").format("MMM DD");
//     new_date[i] = moment().add(i,"days").format("dddd");
    
//     sHTML = sHTML + "<li><input type='radio' id='" + new_date[i] + "' name='ReceiveDate' value='" + new_date[i] + "'> <label for='" + new_date[i] + "'>" + new_date[i] + "</label></li>";
    
// }

// sHTML = sHTML + "</ul><input id='ReceiveDateTextBox' name='to_received_date' value='"+ value +"' class='u-border-1 u-border-grey-30 u-input u-input-rectangle u-radius-4 u-white u-input-1'>";

// $("#result").html(sHTML);


