var value = $('#numofmaintenance').val();
if (value == 0) {
    var counter = 1;
}
else{
    var counter = value;
}

$(document).on('click', "#addMaintenance", function() {
    var div = $('#add-boxes')
    var html = `
        <div class = "form-group">
            <div class="col-md-2">
            </div>
            <div class="col-md-2">
                <input type="text" name="maintenance[`+counter+`][name]" id = "maintenance[`+counter+`][name]" class="form-control"  placeholder="Naziv" value="" required />
            </div>
            <div class="col-md-2">
                <input type="text" name="maintenance[`+counter+`][condition]" id = "maintenance[`+counter+`][condition]" class="form-control"  placeholder="Stanje" value="" required />
            </div>
            <div class="col-md-2">
                <input type="text" name="maintenance[`+counter+`][team]" id = "maintenance[`+counter+`][team]" class="form-control"  placeholder="Tim" value="" required />
            </div>
             <div class="col-md-2">
                <input type="text" name="maintenance[`+counter+`][priority]" id = "maintenance[`+counter+`][priority]" class="form-control"  placeholder="Prioritet" value="" required />
            </div>
        </div>`;
    counter++;
    div.append(html);
});
