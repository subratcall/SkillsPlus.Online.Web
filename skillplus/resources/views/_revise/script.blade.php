 <script>
    $(document).ready(function() {
        setTimeout(() => {
           let table =  $('#datatable-details');

           table.DataTable({});
           $(".table-responsive").removeClass();
           
         //   table.removeClass();
         //   table.addClass("display responsive nowrap");
         //   table.attr('cellspacing', "0");
         //   table.attr('width', '100%');
           
            // display responsive nowrap
            // cellspacing="0" width="100%"
        }, 500);
    });
 </script>