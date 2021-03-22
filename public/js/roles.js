var id;
var confirmQuestion = $('#confirmQuestion').val();

$(".editRole").click(function () {
    id = $(this).parent().parent().attr('id');
    $("input[name^=_method]").val("GET");
    $("#roleForm").attr("action", window.location +  "/" + id + "/edit");
    $("#roleButton").click();
});

$(".deleteRole").click(function () {
    var r = confirm(confirmQuestion);
    if (r == true) {
        id = $(this).parent().parent().attr('id');
        $("input[name^=_method]").val("DELETE");
        $("#roleForm").attr("action", window.location + "/delete/" + id);
        $("#roleButton").click();
    }
});