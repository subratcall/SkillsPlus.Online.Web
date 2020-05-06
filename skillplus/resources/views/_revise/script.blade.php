<script src="{{ asset('assets/_plugins/jquery.scrolling-tabs.min.js') }}"></script>
 <script>
    $(document).ready(function() {
        setTimeout(() => {
           let table =  $('#datatable-details');

           table.DataTable({
               "responsive": true,
               "columnDefs": [
                    { responsivePriority: 1, targets: 0 },
                    { responsivePriority: 2, targets: -1 }
               ]
           });

           $(".table-responsive").removeClass();
        }, 500);
    });
 </script>