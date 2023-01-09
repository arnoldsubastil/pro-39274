
var today = new Date();
var new_date = [];
var startOfMorning = [];
var endOfMorning = [];
var startOfAfternoon = [];
var endOfAfternoon = [];
var deliveryDate=[];

var sHTML = "<ul class='noListStyle'>";


if (today.valueOf() < moment('10:00', 'hh:mm').valueOf()) {   
    //next day
    counter=1;
    limit=6;    
    minDateValue=moment().add(1, 'days').format("dddd - MMM DD, YYYY (hh:mm A)");
    startDateValue=moment().add(1, 'days');
}
else
{
    //next next day
    counter=2;
    limit=7;
    minDateValue=moment().add(2, 'days').format("dddd - MMM DD, YYYY (hh:mm A)");
    startDateValue=moment().add(2, 'days');
}

// for (i = counter; i < limit; i++) {

//     new_date[i] = moment().add(i,"days").format("dddd - MMM DD, YYYY");
//     // sHTML = sHTML + "<li><input type='radio' id='" + new_date[i] + "' name='ReceiveDate' value='" + new_date[i] + "'> <label for='" + new_date[i] + "'>place option here" + moment().add(i,"days").format("dddd - MMM DD, YYYY"); + "</label></li>";
//     sHTML = sHTML + "<fieldset><label>" + moment().add(i,"days").format("dddd - MMM DD, YYYY"); + "</label></fieldset>";

// }


for (i = counter; i < limit; i++) {

    new_date[i] = moment().add(i,"days").format("dddd - MMM DD, YYYY");

     startOfMorning[i] = moment().add(i,"days").format('08:00');
     endOfMorning[i] = moment().add(i,"days").format('10:00');     
    
    startOfAfternoon[i] = moment().add(i,"days").format('01:00');
    endOfAfternoon[i] = moment().add(i,"days").format('06:00');

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
        timePicker : true,
        minDate: minDateValue,
        locale: {
            format: 'dddd - MMM DD, YYYY (hh:mm A)'
        },
        
      singleDatePicker: true,
      showDropdowns: false,
     // allowTimes: ['10','11'],
      startDate: startDateValue.set({ hour: 8, minute: 0, millisecond: 0 })
    //   disabledHours: {
    //     hour: '7:00'
    //   }
      
    //   startTime: moment(startDateValue).startOf({ hour: 8, minute: 0, millisecond: 0 })
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



