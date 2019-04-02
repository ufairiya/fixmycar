 <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
    <h4 class="modal-title"><?php echo $title;?></h4>
</div>
<div class="modal-body">
    <div class="row">
        <div class="col-md-12">
        
        <?php 
        $actionType = ($action_type !='add') ? 'update_notes' : 'insert_notes';       
        $customHiddenData = array(
          'action_type'  => $action_type,       
          'company_id'  => $companyId,  
        );
        $customer_notes = ($customer_notes == FALSE) ? 'Add notes here' : $customer_notes;  
        ?>
        <form id="update_company_notes" method="post">
           <?php  echo form_hidden($customHiddenData); ?>  
            <div class="form-body">               
                          
            <div class="row">
              <div class="col-md-12">
                  <div class="form-group">
                      <label class="form_control_1">Customer Notes
                          <span class="required"> * </span>
                      </label>
                      <textarea class="ckeditor form-control" name="cust_notes" rows="6" id="editor1" data-error-container="#editor2_error"><?php echo $customer_notes;?></textarea>
                      <div id="editor2_error"> </div>
                      <span class="help-block"></span>
                  </div>
              </div>
          </div>
       
               
                          
            <div class="form-actions">
                <div class="row">
                    <div class="col-md-12">
                        <button type="submit" class="btn dark"><?php echo $this->lang->line('save'); ?></button>
                    </div>
                </div>
            </div>
        </form>
       
      </div>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn default" data-dismiss="modal">Close</button>
 
</div>
               
<script type="application/javascript">
(function($){
       FormInputMask.init();
       var form1 = $('#update_company_notes');
        var error1 = $('.alert-danger', form1);
        var success1 = $('.alert-success', form1);
  
        form1.validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "", // validate all fields including form hidden input
         messages: {              
                     cust_notes:{
                      required: 'Please enter the Customer Notes',
                     }  
            },
            rules: {
               cust_notes:{
                required:true
               }
                
            },
            errorPlacement: function(error, element) {
                if(element.parent('.input-group').length) {
                error.insertAfter(element.parent());
                } else {
                error.insertAfter(element);
                }
            },
            highlight: function(element) { // hightlight error inputs
                $(element)
                    .closest('.form-group').addClass('has-error'); // set error class to the control group
            },

            unhighlight: function(element) { // revert the change done by hightlight
                $(element)
                    .closest('.form-group').removeClass('has-error'); // set error class to the control group
            },

            success: function(label) {
                label
                    .closest('.form-group').removeClass('has-error'); // set success class to the control group
            },

            submitHandler: function(form,event) {
          //  event.preventDefault();
        var cust_notes = CKEDITOR.instances.editor1.getData();
        var formData = jQuery(form).serializeArray();
        formData.push({ name: "cust_notes", value:cust_notes });
				jQuery.ajax({
					url : '<?php echo $base_url?>company/custnotes_save',
					type: 'POST',
					data: formData,
					success:function(response){
            // console.log(response);
            // return false;     
						jQuery(form)[0].reset();
						toastr.options = {
							"closeButton": true,
						}
						toastr.success("Customer Notes Inserted Succesfully", "Notifications");
						setTimeout(function(){ location.reload(); }, 500);			
						}
					});
            }
        });
})(jQuery);

</script>
<script src="<?php echo $base_url;?>assets/global/scripts/app.min.js" type="text/javascript"></script>
<script src="<?php echo BASE_URL;?>/assets/global/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js" type="text/javascript"></script>
        <script src="<?php echo BASE_URL;?>/assets/pages/scripts/form-input-masks.js" type="text/javascript"></script>
 <script src="<?php echo BASE_URL;?>/assets/global/plugins/ckeditor/ckeditor.js" type="text/javascript"></script>
 <script type="text/javascript">
   CKEDITOR.replace( 'editor1', {

    language: 'en',
    toolbar :
    [
      { name: 'document', items : [ 'Source','-','Save','NewPage','DocProps','Preview','Print','-','Templates' ] },
  { name: 'clipboard', items : [ 'Cut','Copy','Paste','PasteText','PasteFromWord','-','Undo','Redo' ] },  
  '/',
  { name: 'basicstyles', items : [ 'Bold','Italic','Underline','Strike','Subscript','Superscript','-','RemoveFormat' ] },
  { name: 'paragraph', items : [ 'NumberedList','BulletedList','-','Outdent','Indent','-','Blockquote','CreateDiv',
  '-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock','-','BidiLtr','BidiRtl' ] },
  { name: 'links', items : [ 'Link','Unlink','Anchor' ] },
  { name: 'insert', items : [ 'Image','Flash','Table','HorizontalRule','Smiley','SpecialChar','PageBreak','Iframe' ] },
  '/',
  { name: 'styles', items : [ 'Styles','Format','Font','FontSize' ] },
  { name: 'colors', items : [ 'TextColor','BGColor' ] },
  { name: 'tools', items : [ 'Maximize', 'ShowBlocks','-' ] }
    ],
    uiColor: '#9AB8F3'
});
 </script>