var base = $('#base_url').val();
var table;

$(document).ready(function(){
    table = $('#datatable').DataTable({
        responsive: true,
        scrollCollapse: true,
        lengthMenu: [ [10, 25, 50, -1], [10, 25, 50, "All"] ]
    });
});


$('#datatable tbody').on('click', 'td.details-control', function () {
   //alert('usao');
    var tr = $(this).closest('tr');
    var row = table.row( tr );
    //alert(row.data().DT_RowId);
    if ( row.child.isShown() ) {
        row.child.hide();
        tr.removeClass('shown');
    }
    else {
        row.child( format(row.data()) ).show();
        tr.addClass('shown');
    }
});

function format ( rowData ) {
    var div = $('<div/>')
        .addClass( 'loading' )
        .text( 'Loading...' );
    $.ajax( {
        url: base + '/admin/programs/grabOffers/' + rowData.DT_RowId,
        type: 'get',
        success: function ( json ) {
            div
                .html( json['html'] )
                .removeClass( 'loading' );
        }
    } );
    return div;
}