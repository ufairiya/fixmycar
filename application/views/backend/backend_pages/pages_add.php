<form id="add_pages" name="add_pages" method="post"> 
<div class="modal-header">
  <span>Add pages</span>
  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
</div>
<div class="modal-body">
    <div class="row">
        <div class="col-md-12">
<?php
 
  $user_id = $user_id;$content=$title='';
  
?>
<input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
    <div class="col-md-12">
      <div class="row">
            <div class="col-md-12">
              <label class="form-label"> Title:</label>
            </div>
            <div class="col-md-12">
            <input type="text" name="title" class="form-control" value="<?php echo $title; ?>">
            </div>
        </div>
         <div class="row">
            <div class="col-md-12">
              <label class="form-label"> Content:</label>
            </div>
            <div class="col-md-12">
              <textarea name="content" id="content" class="content form-control" row="10"><?php echo $content; ?></textarea>
            </div>
        </div>
    </div> 
<?php
?>
        </div>

    </div>
</div>
<div class="modal-footer">
  <div class="col-md-3">
  <button type="submit" class="btn btn-theme">Save</button>
</div>
</div>

</form>

<script type="text/javascript" src="<?php echo $base_url; ?>/assets/global/plugins/ckeditor/ckeditor.js"></script> 

    <script type="text/javascript"> 
//<![CDATA[

    CKEDITOR.replace( 'content',
        {
            fullPage : true,
            uiColor : '#fffffff'
        });
//]]>
</script>


<script type="text/javascript">

            jQuery("#add_pages").validate({
         debug: true,
        rules: {
             content:{required:true,},
              title:{required:true,},
        },
        messages: {
          content: "Please enter the content",
           title: "Please enter the title",
        },
        submitHandler: function(form) {
            var formData = new FormData(document.getElementsByName('add_pages')[0]);
             formData.append('content', CKEDITOR.instances['content'].getData());
           // $('#address').prop("required", true);
            $.ajax({
                url: "<?php echo $base_url; ?>pages/insert_page_abtdetails", 
                type: "POST",             
                data: formData,
                contentType : false,
                cache: false,
                processData : false,
                dataType:'json',    
                success: function(data) {
                  //alert("ssssssss");
                   // $('#signup_loading').hide();
                   //  $('#signup_message').show();
                  //  $("#signup_message").html(data.message);
                    if(data =='1')
                    {
                        toastr.options = {
                    "closeButton": true,
                  }
                  toastr.success("About details updated successfully", "Notifications");
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

