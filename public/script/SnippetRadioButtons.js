// mode of payment

var BPISection = document.getElementById("BPIPaymentSection");
var GCashSection = document.getElementById("GCashPaymentSection");
var NotificationSection = document.getElementById("NotificationPaymentSection");

var bpiButton = document.getElementById("BPIRadioButton");
var gcashButton = document.getElementById("GCashRadioButton");

bpiButton.onclick = function(event) {
    BPISection.style.display = "block";
    GCashSection.style.display = "none";
    NotificationSection.style.display = "none";
}
gcashButton.onclick = function(event) {
    BPISection.style.display = "none";
    GCashSection.style.display = "block";
    NotificationSection.style.display = "none";
}