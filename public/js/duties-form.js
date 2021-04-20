//var currYear = (new Date()).getFullYear();
var dateFrom;
var dayFrom;
var dateTo;
var dayTo;
var timeFrom;

$(document).ready(function () {
    $('.datepicker').datepicker({
        i18n: {
            cancel: '',
            clear: 'Obriši',
            done: '',
            months: ["Januar", "Februar", "Mart", "April", "Maj", "Jun", "Jul", "Avgust", "Septembar", "Oktobar", "Novembar", "Decembar"],
            monthsShort: ["Jan", "Feb", "Mar", "Apr", "Maj", "Jun", "Jul", "Avg", "Sep", "Okt", "Nov", "Dec"],
            weekdays: ["Ponedeljak", "Utorak", "Sreda", "Četvrtak", "Petak", "Subota", "Nedelja"],
            weekdaysShort: ["Pon", "Uto", "Sre", "Čet", "Pet", "Sub", "Ned"],
            weekdaysAbbrev: ["P", "U", "S", "Č", "P", "S", "N"]
        },
        //minDate: today,
        minDate: new Date(),
        defaultDate: new Date(),
        format: "yyyy-mm-dd",
        autoClose: true
    });
    
    $('.timepicker').timepicker({
        i18n: {
            cancel: 'Otkaži',
            clear: 'Obriši',
            done: 'U redu'
        },
        defaultTime: 'now',
        twelveHour: false
    });
    
    $('#date_from').change(function () {
        dateFrom = $('#date_from').val();
        var dateArray = dateFrom.split('-');
        dayFrom = dateArray[2];
        //alert(dayFrom);
    });
    $('#date_to').change(function () {
        dateTo = $('#date_to').val();
        var dateArray = dateTo.split('-');
        dayTo = dateArray[2];
        //alert(timeFrom);
        if(dayFrom == dayTo){
            $('.time')
        }
    });
    $('#time_from').change(function () {
        timeFrom = $('#time_from').val();
        //alert(timeFrom);
    });
    $('#time_to').change(function () {
        var timeTo = $('#time_to').val();
        
        if (dayFrom == dayTo && timeFrom > timeTo) {
            $('#time_to_warning').removeAttr('hidden');
            $('#offer_submit_btn').attr('disabled', true);
        }else{
            $('#time_to_warning').attr('hidden', true);
            $('#offer_submit_btn').removeAttr('disabled');
        }
    });
    
});



