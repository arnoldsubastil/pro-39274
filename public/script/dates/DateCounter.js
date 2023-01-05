
//get the date today

var today = new Date();
var dd = String(today.getDate()).padStart(2, '0');
var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
var yyyy = today.getFullYear();

today = mm + '/' + dd + '/' + yyyy;
document.getElementById('elem').innerHTML = formatted;

console.log(today);

//get the next five days from today
var today = new Date();
var new_date = [];
// var sHTML = "<table border=1>";

for (i = 0; i < 5; i++) {
  
//   new_date[i] = moment().add(i,"days").format("MMM DD");

  new_date[i] = new Date(date.setDate(date.getDate() + 1));

//   sHTML = sHTML + "<tr><td>" + new_date[i] + "</td></tr>";
console.log(new_date[i]);
  
}

// sHTML = sHTML + "</table>";

// $("#result").html(sHTML);

// date      = new Date(receiveDate);
// next_date = new Date(date.setDate(date.getDate() + 1));
// formatted = next_date.getUTCFullYear() + '-' + padNumber(next_date.getUTCMonth() + 1) + '-' + padNumber(next_date.getUTCDate())
// document.getElementById('elem').innerHTML = formatted;

// function padNumber(number) {
//     var string  = '' + number;
//     string      = string.length < 2 ? '0' + string : string;
//     return string;
// }