var id;
var confirmQuestion = $('#confirmQuestion').val();

$(".editAppointment").click(function () {
    id = $(this).parent().parent().attr('id');
    $("input[name^=_method]").val("GET");
    $("#roleForm").attr("action", window.location +  "/" + id + "/edit");
    $("#roleButton").click();
});

$(".deleteAppointment").click(function () {
    var r = confirm(confirmQuestion);
    if (r == true) {
        id = $(this).parent().parent().attr('id');
        $("input[name^=_method]").val("DELETE");
        $("#appointmentForm").attr("action", window.location + "/delete/" + id);
        $("#appointmentButton").click();
    }
});