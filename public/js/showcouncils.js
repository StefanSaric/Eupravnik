$(document).ready(function(){
    $('#billstable').dataTable({
        responsive: true,
        scrollCollapse: true,
        lengthMenu: [ [10, 25, 50, -1], [10, 25, 50, "All"] ],
        initComplete: function () {
            this.api().columns([1,2,3,4,5]).every( function () {
                var column = this;
                var select = $('<select><option value=""></option></select>')
                    .appendTo( $(column.footer()).empty() )
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );
 
                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );
 
                column.data().unique().sort().each( function ( d, j ) {
                    select.append( '<option value="'+d+'">'+d+'</option>' );
                } );
            } );
        }
    });
    
    $('#transactionsstable').dataTable({
        responsive: true,
        scrollCollapse: true,
        lengthMenu: [ [10, 25, 50, -1], [10, 25, 50, "All"] ],
        initComplete: function () {
            this.api().columns([1,2,3,4]).every( function () {
                var column = this;
                var select = $('<select><option value=""></option></select>')
                    .appendTo( $(column.footer()).empty() )
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );
 
                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );
 
                column.data().unique().sort().each( function ( d, j ) {
                    select.append( '<option value="'+d+'">'+d+'</option>' );
                } );
            } );
        }
    });
});

