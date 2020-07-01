
     <!-- Begin Loading Modal-->
     <style>
      .loading-modal {
       position: fixed;
       background-color: rgba(0, 0, 0, 0.534);
       width: 100%;
       height: 100%;
       top: 0;
       left: 0;
       z-index: 9999999;
      }

      .loading-modal .loading-gif {
       background-image: url("https://mir-s3-cdn-cf.behance.net/project_modules/disp/35771931234507.564a1d2403b3a.gif");
       background-repeat: no-repeat;
       width: 100%;
       height: 100%;
       margin-left: 40%;
       margin-right: auto;
       margin-top: 15%;
      }
      
     </style>
     <div class="loading-modal">
       <div class="loading-gif"></div>
     </div>
     <!-- End Loading Modal-->

<div id="ImageModal" class="modal fade" role="dialog">
    <div class="modal-dialog" style="z-index: 1050">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <p>
                 <img src="#" class="img-responsive" />
                </p>
            </div>
        </div>

    </div>
</div>

<div id="VideoModal" class="modal fade" role="dialog">
    <div class="modal-dialog" style="z-index: 1050">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <p>
                    <video width="570" controls>
                        <source src="#" type="video/mp4">
                        Your browser does not support HTML5 video.
                    </video>
                </p>
            </div>
        </div>

    </div>
</div>

<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="z-index: 1050">
        <div class="modal-content">
            <div class="modal-header">
            {{{  trans('admin.system_alert') }}}
            </div>
            <div class="modal-body">
            {{{  trans('admin.are_you_sure') }}}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">{{{ trans('main.cancel') }}}</button>
                <a class="btn btn-danger btn-ok">{{{ trans('main.yes_sure') }}}</a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="confirm-withdraw" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="z-index: 1050">
        <div class="modal-content">
            <div class="modal-header">
            {{{  trans('admin.system_alert') }}}
            </div>
            <div class="modal-body">
              <p>{{{  trans('admin.withdrawal_modal_main') }}}</p>
                <p>
                <form method="post" id="withdraw-form">
                    <div class="form-group">
                    <label class="control-label"> {{{  trans('admin.withdrawal_modal_desc') }}}</label>
                    <input type="text" class="form-control" name="description" placeholder="Your description...">
                    </div>
                </p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-danger btn-ok" type="submit">{{{  trans('admin.withdrawal_confirmation_button') }}}</button>
                </form>
                <button type="button" class="btn btn-default" data-dismiss="modal">{{{  trans('admin.cancel') }}}</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="uploader-modal" role="dialog">
    <div class="modal-dialog" style="z-index: 1050;max-width: 1000px;">
        <div class="modal-content">
            <div class="modal-body">
                <iframe width="100%" height="400" src="/assets/filemanager/dialog.php?type=2&field_id=upload-id-fill&relative_url=1" frameborder="0" style="overflow: scroll; overflow-x: hidden; overflow-y: scroll; "></iframe>
            </div>
        </div>
    </div>
</div>

