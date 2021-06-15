var base = $('#base_url').val();

$("#council_id").on('change',function() {
    var id = $(this).find(':selected').val();
    if (id != null) {
        $.ajax({
            url: base + '/admin/warnings/getaddress/' + id,
            method: "get",
            success: function (response) {
                if (response != null) {
                    var elements = JSON.parse(JSON.stringify(response));
                    var html = `<option value="" disabled selected>Izaberite</option>`;
                    if (elements["data"].length > 0) {
                        $.each(elements["data"], function (index, element) {
                            html += '<option value="' + element["id"] + '">' + element["address"] + '</option>'
                        });
                    }
                    $('#address_id').html(html);
                    $('#address_id').formSelect();
                }
            }
        });
    }
});


$("#address_id").on('change',function() {
    var id = $(this).find(':selected').val();
    if (id != null) {
        $.ajax({
            url: base + '/admin/warnings/getspaces/' + id,
            method: "get",
            success: function (response) {
                if (response != null) {
                    var elements = JSON.parse(JSON.stringify(response));
                    var html = `<option value="" disabled selected>Izaberite</option>`;
                    if (elements["data"].length > 0) {
                        $.each(elements["data"], function (index, element) {
                            html += '<option value="' + element["id"] + '">' + element["representative"] + " - Sprat:" + element["floor_number"] + " - Stan:" + element["apartment_number"] + '</option>'
                        });
                    }
                    $('#space_id').html(html);
                    $('#space_id').formSelect();
                }
            }
        });
    }

});






