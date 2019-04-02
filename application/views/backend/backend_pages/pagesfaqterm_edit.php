<form id="faq_update" name="faq_update" enctype="multipart/form-data" method="post"> 
<div class="modal-header">
    <span style="font-weight: bold;">EDIT FAQ TYPE</span>
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
</div>
<?php  
if(!empty($term_details))
{
   // foreach($term_details as $data)
   // {
               $term_id = $term_details->term_id;
               $term_name = $term_details->term_name;
               $term_slug = $term_details->term_slug;
               $term_desc = $term_details->term_desc;
               $term_icon = $term_details->term_icon;
               $status = $term_details->status;
  //  }
 
} ?>
<div class="modal-body">
    <div class="row">
        <div class="col-md-12">
 <?php $profile_image='';?>
<input type="hidden" name="action" value="newcust">
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-4">
                  <label class="form-label">Faq Type</label>
                </div>
                <div class="col-md-8">
                    <input type="text" class="form-control" name="term_name" value="<?php echo $term_name;?>">
                    <input type="hidden" class="form-control" name="term_id" value="<?php echo $term_id;?>">
                    <input type="hidden" class="form-control" name="status" value="<?php echo $status;?>">
                </div>
            </div>
            <br>
        </div> 
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-4">
                  <label class="form-label">Faq slug</label>
                </div>
                <div class="col-md-8">
                    <input type="text" class="form-control" name="term_slug" value="<?php echo $term_slug;?>">
                </div>
            </div>
            <br>
        </div> 
        <div style="clear:both;"></div>
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-4">
                  <label class="form-label">Description</label>
                </div>
                <div class="col-md-8">
                  <textarea name="term_desc" cols="20" rows="7" id="term_desc"><?php echo $term_desc;?></textarea>
                   
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-4">
                  <label class="form-label">Icon</label>
                </div>
                <div class="col-md-8">
                    <input type="text" class="form-control" name="term_icon" value="<?php echo $term_icon;?>">
                </div>
            </div>
          </div>
     
<?php
//  }
 
?>
        </div>

    </div>
</div>
<div class="modal-footer">
    <div class="col-md-12">
    <button type="submit" class="btn btn-theme save_btn">Save</button>
</div>
</div>

</form>
<script type="text/javascript">
     jQuery("#faq_update").validate({
         debug: true,
        rules: {
             
            term_name: {
                required: true,
            },
             
        },
        messages: {
          term_name: "Please enter your Type of FAQ",
         },
        submitHandler: function(form) {
            var formData = new FormData(document.getElementsByName('faq_update')[0]);
             $.ajax({
                url: "<?php echo BASE_URL; ?>/admin/pages/edit_termdetails", 
                type: "POST",             
                data: formData,
                contentType : false,
                cache: false,
                processData : false,
                dataType:'json',    
                success: function(data) {
                 
                  //  $("#signup_message").html(data.message);
                    if(data =='1')
                    {
                        toastr.options = {
                          "closeButton": true,
                        }
                        toastr.success("Type updated successfully", "Notifications");
                        setTimeout(function(){ location.reload(); }, 500); 
                    }
                    else
                    {
                        toastr.options = {
                          "closeButton": true,
                        }
                        toastr.warning("Error in update", "Notifications");
                    }
                }
            });
            return false;
        }
     });

</script>
 