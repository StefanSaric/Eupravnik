var base = $('#base_url').val();

// $("#price").on('change',function() {
$(document).ready(function () {
    var id = $('#council_id').val();
    var price = $("#price").val();
    console.log(id);
    console.log(price);
    if (id != null && price != null) {
        $.ajax({
            url: base + '/admin/councils/get-real-price/' + id + '/' + price ,
            method: "get",
            success: function (response) {
                if (response != null) {
                    $("#real_price").val(response);
                }
            }
        });
    }
});

$("#price").on('change',function() {
    var id = $('#council_id').val();
    var price = $("#price").val();
    console.log(id);
    console.log(price);
    if (id != null && price != null) {
        $.ajax({
            url: base + '/admin/councils/get-real-price/' + id + '/' + price ,
            method: "get",
            success: function (response) {
                if (response != null) {
                    $("#real_price").val(response);
                }
            }
        });
    }
});
