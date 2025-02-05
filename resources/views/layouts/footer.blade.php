</div>
<script src="https://kit.fontawesome.com/b6b9586b26.js" crossorigin="anonymous"></script>
<script src="{{ asset('javascript/jquery.js') }}"></script>
<script src="{{ asset('javascript/canvas.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"
    integrity="sha512-57oZ/vW8ANMjR/KQ6Be9v/+/h6bq9/l3f0Oc7vn6qMqyhvPd1cvKBRWWpzu0QoneImqr2SkmO4MSqU+RpHom3Q=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript" src="{{ asset('DataTables/DataTables-1.13.8/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('javascript/script.js') }}"></script>
@if (session()->get('locale') == 'de')
    <script>
        $(document).ready(function() {
            // $('#datatable').DataTable();
            $.fn.DataTable.ext.pager.numbers_length = 50; // Adjust as needed
            //Spanish
            $('#datatable').DataTable({
                
                 pagingType: "full_numbers",
                "language": {
                    "sProcessing": "Verarbeitung...",
                    "sLengthMenu": "_MENU_ Einträge anzeigen",
                    "sZeroRecords": "Keine Übereinstimmungen gefunden",
                    "sEmptyTable": "Keine Daten in dieser Tabelle vorhanden",
                    "sInfo": "Zeige Einträge von _START_ bis _END_ von insgesamt _TOTAL_ Einträgen",
                    "sInfoEmpty": "Zeige Einträge von 0 bis 0 von insgesamt 0 Einträgen",
                    "sInfoFiltered": "(gefiltert von insgesamt _MAX_ Einträgen)",
                    "sInfoPostFix": "",
                    "sSearch": "Suchen:",
                    "sUrl": "",
                    "sInfoThousands": ".",
                    "sLoadingRecords": "Wird geladen...",
                    "oPaginate": {
                        "sFirst": "Erste",
                        "sLast": "Letzte",
                        "sNext": "Nächste",
                        "sPrevious": "Vorherige"
                    },
                    "oAria": {
                        "sSortAscending": ": Aktivieren, um die Spalte aufsteigend zu sortieren",
                        "sSortDescending": ": Aktivieren, um die Spalte absteigend zu sortieren"
                    }
                }
            });
        });
    </script>
@else
    <script>
        $(document).ready(function() {
                   $.fn.DataTable.ext.pager.numbers_length = 50; // Adjust as needed

$('#datatable').DataTable({
    pagingType: "full_numbers"
});
          
        });
    </script>
@endif
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(window).on('load', function() {
        $('#loading').hide();
    })
    $(document).ready(function() {
        $('select').select2({
            width: '100%'
        });
        $('#Items_dropdown').select2({
            minimumResultsForSearch: Infinity
        });
    });
</script>

</body>

</html>
