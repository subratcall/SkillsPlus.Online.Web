{{-- <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script> --}}
<script src="/assets/_plugins/jquery.validate.min.js" ></script>
<script>
    function validation(form) {
        form.validate({
            rules: {
                name: {
                    required: true,
                },
                username: {
                    required: true,
                    rangelength: [4, 20]
                },
                password: {
                    required: true,
                    minlength: 6
                },
                confirmpassword: {
                    required: true,
                    minlength: 6,
                    equalTo: "#password"
                },
                email: {
                    required: true,
                    email: true
                }
            },
            messages: {
                name: {
                    required: "Please enter your real name",
                },
                username: {
                    required: "Please enter your username",
                    rangelength: "Enter atleast 4 - 6 characters"
                },
                password: {
                    required: "Please enter your password",
                    rangelength: "Enter atleast 4 - 6 characters"
                },
                confirmpassword: {
                    required: "Please enter your confirm password",
                    equalTo: "Your password is mismatch"
                },
                email: {
                    required: "Please enter your email",
                    email: "Please enter a valid email address"
                }
            },
            submitHandler: function(form) { 
                form.submit();
            }
        });
    }

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
                    <div class="col-12 margin-bottom margin-top">
                    <div class="row">
                        <div class="col-6">
                            <div class="row">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-xs-1 col-sm-2 col-md-2 col-lg-2">
                                            <label for="search" class="col-form-label">Search</label>
                                        </div>
                                        <div class="col-xs-1 col-sm-10 col-md-10 col-lg-10">
                                            <input type="text" class="form-control" id="search">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="row">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-xs-1 col-sm-3 col-md-3 col-lg-2">
                                            <label class="col-form-label">Limit</label>
                                        </div>
                                        <div class="col-xs-1 col-sm-5 col-md-4 col-lg-4">
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
                `); 


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