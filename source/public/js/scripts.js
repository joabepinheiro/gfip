$(function () {

    // Setup - add a text input to each footer cell
    $('#table-search-columns tfoot th').each( function () {
        var title = $(this).text();
        $(this).html( '<input type="text" placeholder=" '+title+'" />' );
    } );

    // DataTable
    var table = $('#table-search-columns').DataTable();

    // Apply the search
    table.columns().every( function () {
        var that = this;

        $( 'input', this.footer() ).on( 'keyup change', function () {
            if ( that.search() !== this.value ) {
                that
                    .search( this.value )
                    .draw();
            }
        } );
    } );

    $("#example1").DataTable();
    $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false
    });


    $("[data-mask]").inputmask();

    //Initialize Select2 Elements
    $(".select2").select2();


    $( ".datepicker" ).datepicker();

});


$('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
    checkboxClass: 'icheckbox_minimal-blue',
    radioClass: 'iradio_minimal-blue'
});







