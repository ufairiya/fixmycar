<form id="movers_abtupdate" name="movers_abtupdate" method="post"> 
<div class="modal-header">
	<span>Edit About details</span>
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
</div>
<div class="modal-body">
    <div class="row">
        <div class="col-md-12">
<?php
if($UserAbtDetails) {
		$user_id = $UserAbtDetails->user_id;
		$content = $UserAbtDetails->content;

}
else
{
	$user_id = $user_id;
	$content = '';
}


?>
<input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
		<div class="col-md-12">
			<div class="row">
		        <div class="col-md-12">
		          <label class="form-label">About Content:</label>
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

            jQuery("#movers_abtupdate").validate({
         debug: true,
        rules: {
             content:{required:true,},
        },
        messages: {
          content: "Please enter the about us content",
        },
        submitHandler: function(form) {
            var formData = new FormData(document.getElementsByName('movers_abtupdate')[0]);
             formData.append('content', CKEDITOR.instances['content'].getData());
           // $('#address').prop("required", true);
            $.ajax({
                url: "<?php echo $base_url; ?>garage/update_movers_abtdetails", 
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

