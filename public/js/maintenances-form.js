var currYear = (new Date()).getFullYear();
$(document).ready(function () {
    $('.datepicker').datepicker({
        i18n: {
            cancel: 'Otkaži',
            clear: 'Obriši',
            done: 'U redu',
            months: ["Januar", "Februar", "Mart", "April", "Maj", "Jun", "Jul", "Avgust", "Septembar", "Oktobar", "Novembar", "Decembar"],
            monthsShort: ["Jan", "Feb", "Mar", "Apr", "Maj", "Jun", "Jul", "Avg", "Sep", "Okt", "Nov", "Dec"],
            weekdays: ["Ponedeljak", "Utorak", "Sreda", "Četvrtak", "Petak", "Subota", "Nedelja"],
            weekdaysShort: ["Pon", "Uto", "Sre", "Čet", "Pet", "Sub", "Ned"],
            weekdaysAbbrev: ["P", "U", "S", "Č", "P", "S", "N"]
        },
        defaultDate: new Date(),
        yearRange: [1928, currYear],
        format: "yyyy-mm-dd"
    });    
});

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
                        <button type="button" class="remove-element mb-1 btn-small waves-effect waves-light red accent-2" id="remove-element_` + counter + `">
                            <i class="material-icons">clear</i>
                        </button>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m6 l6">
                    <i class='material-icons prefix'>dashboard</i>
                        <select name="maintenance[`+counter+`][name]" id="maintenance[`+counter+`][name]" class="" required>
                            <option value="" disabled selected>Naziv elementa</option>
                            <option value="stepenice">Stepenice</option>
                            <option value="podrum">Podrum</option>
                            <option value="lift">Lift</option>
                        </select>
                    </div>
                    <div class="col s12 m1 l1">
                    </div>
                    <div class="input-field col s12 m4 l4">
                    <i class='material-icons prefix'>star</i>
                        <select name="maintenance[`+counter+`][priority]" id="maintenance[`+counter+`][priority]" class="" required>
                            <option value="" disabled selected>Prioritet</option>
                            <option value="nizak">Nizak</option>
                            <option value="srednji">Srednji</option>
                            <option value="visok">Visok</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m6 l6">
                        <i class='material-icons prefix'>build</i>
                        <input type="text" name="maintenance[`+counter+`][reported_condition]" id = "maintenance[`+counter+`][reported_condition]" class="form-control"  placeholder="Stanje" value="" required />
                    </div>
                    <div class="input-field col s12 m1 l1">
                    </div>
                    <div class="input-field col s12 m4 l4">
                        <i class='material-icons prefix'>date_range</i>
                        <input type="text" name="maintenance[`+counter+`][element_date]" id="maintenance[`+counter+`][element_date]" placeholder="Datum provere"  
                         class="datepicker" value="" required></input>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m6 l6">
                        <i class='material-icons prefix'>work</i>
                        <input type="text" name="maintenance[`+counter+`][contractor]" id = "maintenance[`+counter+`][contractor]" class="form-control"  placeholder="Izvođač" value="" required />
                    </div>
                    <div class="col s12 m2 l2">
                    </div>
                    <div class="input-field col s12 m3 l3">
                        <label for="maintenance[`+counter+`][type_check]">
                            <input type="checkbox" name="maintenance[`+counter+`][type_check]" id="maintenance[`+counter+`][type_check]" />
                            <span>Prosledi u program održavanja?</span>
                        </label>
                    </div>
                </div>
            </div>
            
        </div>
    `;
    counter++;
    div.append(html);
    
    $(document).ready(function () {
        $('select').formSelect();
        $('.datepicker').datepicker({
            i18n: {
                cancel: 'Otkaži',
                clear: 'Obriši',
                done: 'U redu',
                months: ["Januar", "Februar", "Mart", "April", "Maj", "Jun", "Jul", "Avgust", "Septembar", "Oktobar", "Novembar", "Decembar"],
                monthsShort: ["Jan", "Feb", "Mar", "Apr", "Maj", "Jun", "Jul", "Avg", "Sep", "Okt", "Nov", "Dec"],
                weekdays: ["Ponedeljak", "Utorak", "Sreda", "Četvrtak", "Petak", "Subota", "Nedelja"],
                weekdaysShort: ["Pon", "Uto", "Sre", "Čet", "Pet", "Sub", "Ned"],
                weekdaysAbbrev: ["P", "U", "S", "Č", "P", "S", "N"]
            },
            defaultDate: new Date(),
            yearRange: [1928, currYear],
            format: "yyyy-mm-dd"
        });
    });
    
});

$(document).on('click', ".remove-element", function() {
    var id = $(this).attr('id');
    var countHelper = id.split('_');
    var idHelper = countHelper[1];
    $('#element_'+idHelper).remove();
});