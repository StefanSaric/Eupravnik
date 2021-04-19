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
