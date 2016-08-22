<!--model box -->
<div id="changePic" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
               <h3><?php echo $this->requestAction('app/get-translate/'.base64_encode('Change Profile Picture')); ?></h3>
            </div>
            <div class="modal-body">
                <form id="cropimage" method="post" enctype="multipart/form-data" action="profile.php">
                   <?php echo $this->requestAction('app/get-translate/'.base64_encode('Upload your image')); ?>  <input type="file" name="photoimg" id="photoimg" />
                    <input type="hidden" name="hdn-profile-id" id="hdn-profile-id" value="1" />
                    <input type="hidden" name="hdn-x1-axis" id="hdn-x1-axis" value="" />
                    <input type="hidden" name="hdn-y1-axis" id="hdn-y1-axis" value="" />
                    <input type="hidden" name="hdn-x2-axis" value="" id="hdn-x2-axis" />
                    <input type="hidden" name="hdn-y2-axis" value="" id="hdn-y2-axis" />
                    <input type="hidden" name="hdn-thumb-width" id="hdn-thumb-width" value="" />
                    <input type="hidden" name="hdn-thumb-height" id="hdn-thumb-height" value="" />
                    <input type="hidden" name="action" value="" id="action" />
                    <input type="hidden" name="image_name" value="" id="image_name" />
                    
                    <div id='preview-avatar-profile'>
                </div>
                <div id="thumbs" style="padding:5px; width:600"></div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Close')); ?></button>
                <button type="button" id="btn-crop" class="btn btn-primary"><?php echo $this->requestAction('app/get-translate/'.base64_encode('Crop & Save')); ?></button>
            </div>
        </div>
    </div>
</div>
