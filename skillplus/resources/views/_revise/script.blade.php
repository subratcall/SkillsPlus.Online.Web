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
                <form>
                    <div class="row">
                        <div class="form-group row col-sm-6">
                            <div class="col-xs-12 row">
                                <label for="staticEmail" class="col-xs-3 col-form-label">Search</label>
                                <div class="col-xs-9">
                                    <input type="text" class="form-control" id="staticEmail">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row col-xs-6">
                            <div class="col-xs-12 row">
                                <label for="inputPassword" class="col-xs-3 col-form-label">Limit</label>
                                <div class="col-xs-9">
                                    <select class="form-control">
                                        <option>10</option>
                                        <option>50</option>
                                        <option>100</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
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