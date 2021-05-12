var base = $('#base_url').val();
var table;

$(document).ready(function(){
    table = $('#datatable').DataTable({
        responsive: true,
        scrollCollapse: true,
        lengthMenu: [ [10, 25, 50, -1], [10, 25, 50, "All"] ]
    });
    
    subtable = $('.subtables').DataTable({
        responsive: true,
        scrollCollapse: true,
        lengthMenu: [ [10, 25, 50, -1], [10, 25, 50, "All"] ]
    });
    
});


$('#datatable tbody').on('click', 'td.details-control', function () {
   //alert('usao');
    var tr = $(this).closest('tr');
    var row = table.row( tr );
    //row.style.backgroundColor = '#f4f5f7';
    //alert(row.data().DT_RowId);
    if ( row.child.isShown() ) {
        // This row is already open - close it
        row.child.hide();
        tr.removeClass('shown');
    }
    else {
        // Open this row
        //var d = row.data();
        //var tableID = "offers_"+d.DT_RowId;
        //alert(tableID);
        
        row.child(format(row.data())).show();
        tr.addClass('shown');

//        $('#' + tableID).DataTable({
//
//            responsive: true,
//            scrollCollapse: true,
//            destroy: true,
//            select: true
//        });

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
                $(div).ready(function(){
                    
                    
                });
        }
    } );
    return div;
}