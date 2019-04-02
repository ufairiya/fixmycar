<form id="faq_update" name="faq_update" enctype="multipart/form-data" method="post"> 
<div class="modal-header">
    <span style="font-weight: bold;">Add FAQ Type</span>
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
</div>
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
                    <input type="text" class="form-control" name="term_name" value="">
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
                    <input type="text" class="form-control" name="term_slug" value="">
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
                  <textarea name="term_desc" cols="20" rows="7" id="term_desc"></textarea>
                   
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-4">
                  <label class="form-label">Icon</label>
                </div>
                <div class="col-md-8">
                    <input type="text" class="form-control" name="term_icon" value="">
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
                url: "<?php echo BASE_URL; ?>/admin/pages/add_termdetails", 
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
                        toastr.success("New type created successfully", "Notifications");
                        setTimeout(function(){ location.reload(); }, 500); 
                    }
                    else
                    {
                        toastr.options = {
                          "closeButton": true,
                        }
                        toastr.warning("Error in create", "Notifications");
                    }
                }
            });
            return false;
        }
     });

</script>
 