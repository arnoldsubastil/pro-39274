
var today = new Date();
var new_date = [];
var startOfMorning = [];
var endOfMorning = [];
var startOfAfternoon = [];
var endOfAfternoon = [];
var deliveryDate=[];

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

     startOfMorning[i] = moment().add(i,"days").format('8:00');
     endOfMorning[i] = moment().add(i,"days").format('10:00');     
    
    startOfAfternoon[i] = moment().add(i,"days").format('1:00');
    endOfAfternoon[i] = moment().add(i,"days").format('6:00');

    deliveryDate[i] = moment().add(i,"days").format("dddd - MMM DD, YYYY");

    sHTML = sHTML + "<li id='DateList' class='active'><label id='CollapsibleDateLabel' class='btn-expand'>" + deliveryDate[i] + "</label><div id='DateOptionsDiv' class='expand' ><input type='radio' id='" + new_date[i] + " " + startOfMorning[i] + " " + endOfMorning[i] + "' name='ReceiveDate' value='" + new_date[i] + " (" + startOfMorning[i] + " AM - " + endOfMorning[i] + " AM)'/><label for='" + new_date[i] + " " + startOfMorning[i] + " " + endOfMorning[i] + "'> Morning (8:00 am to 11:00 am)</label><br/><input type='radio' id='" + new_date[i] + " " + startOfAfternoon[i] + " " + endOfAfternoon[i] + "' name='ReceiveDate' value='" + new_date[i] + " (" + startOfAfternoon[i] + " PM - " + endOfAfternoon[i] +" PM) ' /><label for='" + new_date[i] + " " + startOfAfternoon[i] + " " + endOfAfternoon[i] + "'> Afternoon (1:00 pm to 6:00 pm)</label></div></li>";
   
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
            format: 'dddd - MMM DD, YYYY (HH:mm A)'
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


var collapsibleButton = document.getElementById("CollapsibleDateLabel");
var content = document.getElementById("DateOptionsDiv");


$(".btn-expand").click(function() {
    $(this).next(".expand").toggle();
});



