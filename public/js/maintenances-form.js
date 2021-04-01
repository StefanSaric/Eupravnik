var value = $('#numofmaintenance').val();
if (value == 0) {
    var counter = 1;
}
else{
    var counter = value;
}

//$(document).on('click', "#addMaintenance", function() {
//    var div = $('#add-boxes')
//    var html = `
//        <div class = "form-group">
//            <div class="col-md-2">
//            </div>
//            <div class="col-md-2">
//                <input type="text" name="maintenance[`+counter+`][name]" id = "maintenance[`+counter+`][name]" class="form-control"  placeholder="Naziv" value="" required />
//            </div>
//            <div class="col-md-2">
//                <input type="text" name="maintenance[`+counter+`][condition]" id = "maintenance[`+counter+`][condition]" class="form-control"  placeholder="Stanje" value="" required />
//            </div>
//            <div class="col-md-2">
//                <input type="text" name="maintenance[`+counter+`][team]" id = "maintenance[`+counter+`][team]" class="form-control"  placeholder="Izvođač" value="" required />
//            </div>
//             <div class="col-md-2">
//                <input type="text" name="maintenance[`+counter+`][priority]" id = "maintenance[`+counter+`][priority]" class="form-control"  placeholder="Prioritet" value="" required />
//            </div>
//        </div>`;
//    counter++;
//    div.append(html);
//});

$(document).on('click', "#addMaintenance", function() {
    var div = $('#add-boxes')
    var html = `
        <div id="element_` +counter + `" class="card z-depth-0  grey lighten-4">
            <div class="card-content">
                <div class="card-title row">
                    <div class="col s6 m6 l6">
                        <h5 class="card-title">Element analize</h5>
                    </div>
                    <div class="col s6 m6 l6" style="text-align: right">
                        <button type="button" class="remove-element mb-1 btn-floating waves-effect waves-light red accent-2" id="remove-element_` + counter + `">
                            <i class="material-icons">clear</i>
                        </button>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m11 l11">
                        <i class='material-icons prefix'>short_text</i>
                        <input type="text" name="maintenance[`+counter+`][name]" id = "maintenance[`+counter+`][name]" class="form-control"  placeholder="Naziv" value="" required />
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m11 l11">
                        <i class='material-icons prefix'>build</i>
                        <input type="text" name="maintenance[`+counter+`][reported_condition]" id = "maintenance[`+counter+`][reported_condition]" class="form-control"  placeholder="Stanje" value="" required />
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m11 l11">
                        <i class='material-icons prefix'>work</i>
                        <input type="text" name="maintenance[`+counter+`][contractor]" id = "maintenance[`+counter+`][contractor]" class="form-control"  placeholder="Izvođač" value="" required />
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m11 l11">
                        <i class='material-icons prefix'>star</i>
                        <input type="text" name="maintenance[` + counter + `][priority]" id = "maintenance[` + counter + `][priority]" class="form-control"  placeholder="Prioritet" value="" required />
                    </div>
                </div>
            </div>
            
        </div>
    `;
    counter++;
    div.append(html);
});

$(document).on('click', ".remove-element", function() {
    var id = $(this).attr('id');
    var countHelper = id.split('_');
    var idHelper = countHelper[1];
    $('#element_'+idHelper).remove();
});