<script src="{{ asset('assets/_plugins/jquery.scrolling-tabs.min.js') }}"></script>
<script>
    $(document).ready(function() {
        setTimeout(function() {
             $('#datatable-details').dtcustom({});
        }, 500);

        $(".table-responsive").removeClass();
    });

    (function($) {

        $.fn.dtcustom = function(option) {

            console.log($(this).parent("div").prepend(`
            <div class="row">
                <div class="col-lg-6">
                        <label class="col-lg-2 control-label">Search</label>
                        <input class="col-lg-4 form-control" type="text" id="search" />   
                    </div>
                    <div class="col-lg-6">
                        <select class="col-lg-2 form-control" id="limit"> 
                            <option>10</option>
                            <option>50</option>
                            <option>100</option>
                        </select>
                    </div>
            </div>
            `));
            
            var settings = $.extend({
                responsive: true,
                searching: false,
                lengthChange: false,
                columnDefs: [
                    { responsivePriority: 1, targets: 0 },
                    { responsivePriority: 2, targets: -1 }
               ]
            }, option);

            return this.DataTable({
                lengthChange: settings.lengthChange,
                searching: settings.searching,
               responsive: settings.responsive,
               columnDefs: settings.columnDefs
           });

        }

    }(jQuery));

 </script>