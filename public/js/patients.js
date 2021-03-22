var id;

$(".verifyPatient").click(function () {

    id = $(this).parent().parent().attr('id');
    $("input[name^=_method]").val("GET");
    $("#patientForm").attr("action", window.location + "/verifyPatient/" + id);
    $("#patientButton").click();
    
});

$(".editPatient").click(function () {
    id = $(this).parent().parent().attr('id');
    $("input[name^=_method]").val("GET");
    $("#patientForm").attr("action", window.location +  "/" + id + "/edit");
    $("#patientButton").click();
});