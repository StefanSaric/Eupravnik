var base = $('#base_url').val();

var table = $('#datatable').DataTable({
    sPaginationType: "full_numbers",
            aaSorting: [],
            oColVis: {
                "buttonText": "Columns",
                "iOverlayFade": 4,
                "sAlign": "right"
            },
            oLanguage: {
                sLengthMenu: '_MENU_ entries per page',
                sSearch: '<i class="fa fa-search"></i>',
                oPaginate: {
                    sPrevious: '<i class="fa fa-angle-left"></i>',
                    sNext: '<i class="fa fa-angle-right"></i>'
                }
            }
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