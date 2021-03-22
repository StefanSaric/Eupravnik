$(document).ready(function(){
    $('.timepicker').timepicker({
            'twelweHour': false,
            'format' : 'HH:ii:SS'
        });
    $('.timepicker').on('change', function() {
        let receivedVal = $(this).val();
        $(this).val(receivedVal + ":00");
    });
});


