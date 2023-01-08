
var today = new Date();
var new_date = [];
var startOfMorning = [];
var endOfMorning = [];
var startOfAfternoon = [];
var endOfAfternoon = [];;

var sHTML = "<ul class='noListStyle'>";


if (moment().isBefore('10:00:00')) {
    //include today
    counter=1;
    limit=6;    
    minDateValue=moment().add(1, 'days');
    minDateValue=moment().format("dddd - MMM DD, YYYY");
    
}
else
{
    //exclude today
    counter=2;
    limit=7;
    minDateValue=moment().add(2, 'days');
    minDateValue=moment().format("dddd - MMM DD, YYYY");
}

// for (i = counter; i < limit; i++) {

//     new_date[i] = moment().add(i,"days").format("dddd - MMM DD, YYYY");
//     // sHTML = sHTML + "<li><input type='radio' id='" + new_date[i] + "' name='ReceiveDate' value='" + new_date[i] + "'> <label for='" + new_date[i] + "'>place option here" + moment().add(i,"days").format("dddd - MMM DD, YYYY"); + "</label></li>";
//     sHTML = sHTML + "<fieldset><label>" + moment().add(i,"days").format("dddd - MMM DD, YYYY"); + "</label></fieldset>";

// }

for (i = counter; i < limit; i++) {

    new_date[i] = moment().add(i,"days").format("dddd - MMM DD, YYYY");

    //var abc = moment().add(i,"days");
    // var startOfMorning = moment(abc).add(10,'hours').format('hh:mm A');
    //var time = '8:00 PM';  
     startOfMorning[i] = moment().add(i,"days").format('8:00');
     endOfMorning[i] = moment().add(i,"days").format('10:00');
    //morning[i]= startOfMorning;
    //afternoon[i]= 1;
    
    startOfAfternoon[i] = moment().add(i,"days").format('1:00');
    endOfAfternoon[i] = moment().add(i,"days").format('6:00');

    sHTML = sHTML + "<li><div class='content'><input type='radio' id='" + new_date[i] + " " + startOfMorning[i] + " " + endOfMorning[i] + "' name='ReceiveDate' value='" + new_date[i] + " (" + startOfMorning[i] + " AM - " + endOfMorning[i] + "AM)'/><label for='" + new_date[i] + " " + startOfMorning[i] + " " + endOfMorning[i] + "'> Morning (8:00 am to 11:00 am)</label><br/><input type='radio' id='" + new_date[i] + " " + startOfAfternoon[i] + " " + endOfAfternoon[i] + "' name='ReceiveDate' value='" + new_date[i] + " (" + startOfAfternoon[i] + " PM - " + endOfAfternoon[i] +" PM) ' /><label for='" + new_date[i] + " " + startOfAfternoon[i] + " " + endOfAfternoon[i] + "'> Afternoon (1:00 pm to 6:00 pm)</label></div><label id='CollapsibleDateLabel'>" + moment().add(i,"days").format("dddd - MMM DD, YYYY"); + "</label><br/></li>";
   

}

sHTML = sHTML + "</ul>";

$("#result").html(sHTML);

$("input:radio[name=ReceiveDate]").click(function() {

    // $("#ReceiveDateTextBox").css("background-color", "yellow");
    $('#ReceiveDateTextBox').val($("input[name='ReceiveDate']:checked").val());
    //alert($("input[name='ReceiveDate']:checked").val());
});


$(function() {
    $('input[name="to_received_date"]').daterangepicker({
        minDate: new Date(minDateValue),
        locale: {
            format: 'dddd - MMM DD, YYYY'
        },
        
      singleDatePicker: true,
      showDropdowns: true,
      startDate: moment().add(1, 'day')
    //   minYear: 1901,
    //maxYear: parseInt(moment().format('YYYY'),10),
    // ranges: {
    //     'Last 245 Days': [moment().subtract(244, 'days'), moment()],
    //     'Last 3 Years': [moment().subtract(3, 'years').add(1, 'day'), moment()]
    //   },
      
    });
  });


//   var coll = document.getElementById("CollapsibleDateLabel");
//   for (i = 0; i < coll.length; i++) {
//       coll[i].addEventListener("click", function() {
//         this.classList.toggle("active");
//         var content = this.nextElementSibling;
//         if (content.style.display === "block") {
//           content.style.display = "none";
//         } else {
//           content.style.display = "block";
//         }
//       });
//     } 


// $('#CollapsibleDateLabel').click(function() {

 
//     alert("hello");

// });



