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

            var settings = $.extend({
                bLengthChange: true,
                bFilter: true,
                responsive: true,
                columnDefs: [
                    { responsivePriority: 1, targets: 0 },
                    { responsivePriority: 2, targets: -1 }
               ]
            }, option);

            return this.DataTable({
                initComplete: function () {

                var vm = this;

                $(this).parent('div').prepend(`
                <div class="row margin-bottom margin-top margin-left">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-2">
                                        <label for="search" class="col-form-label">Search</label>
                                    </div>
                                    <div class="col-md-7">
                                        <input type="text" class="form-control" id="search">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <label class="col-form-label">Limit</label>
                                            </div>
                                            <div class="col-md-5">
                                                <select class="form-control" id="lengthMenu">
                                                    <option value="10">10</option>
                                                    <option value="50">50</option>
                                                    <option value="100">100</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>`); 


                $("#search").on("keyup", function(e) {
                    vm.DataTable().search(e.target.value).draw();
                });

                $("#lengthMenu").on("change", function(e) {
                    console.log(e.target.value);
                    vm.DataTable().page.len(e.target.value).draw();
                });
      
                },
                bLengthChange : settings.bLengthChange,
                bFilter: settings.bFilter,
               responsive: settings.responsive,
               columnDefs: settings.columnDefs
           });

        }

    }(jQuery));

 </script>