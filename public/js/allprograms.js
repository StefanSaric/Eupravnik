var base = $('#base_url').val();

$('#datatable tbody').on('click', 'td.details-control', function () {
    var tr = $(this).closest('tr');
    var row = table.row( tr );
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