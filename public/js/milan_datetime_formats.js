$(document).ready(function(){
    $('.datepicker').datepicker({
      autoClose: true,
      format: 'yyyy-mm-dd',
      container: 'body',
      onDraw: function () {
         // materialize select dropdown not proper working on mobile and tablets so we make it browser default select
         $('.datepicker-container').find('.datepicker-select').addClass('browser-default');
         $(".datepicker-container .select-dropdown.dropdown-trigger").remove()
      }
   });
   $('.timepicker').timepicker({
        i18n: {
            cancel: 'Otkaži',
            clear: 'Obriši',
            done: 'U redu'
        },
        defaultTime: 'now',
        twelveHour: false
    });
});


