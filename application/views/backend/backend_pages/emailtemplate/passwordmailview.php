<head>
<meta name='viewport' content='width=device-width, initial-scale=1'>
<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>


<style type="text/css">
	
.backend_mail_content .panel-primary>.panel-heading{background-color: darkgrey;
border-color:darkgrey !important;}
.backend_mail_content .panel-primary{border-color:darkgrey !important;}
 .backend_mail_content blockquote{background-color: #27afd859 !important;}
 .backend_mail_content button.btn.btn-icon.pull-right.student_parent {
    background-color: #5E9E37 !important;
    color: #fff !important;}



</style>

</head>


<!-- BEGIN CONTENT -->
   <div class="backend_mail_content">
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <!-- BEGIN PAGE HEADER-->
                    <h1 class="page-title"> <?php echo 'Password Reset Email'; ?>                
                    </h1>
                    <div class="row">
	<!-- student mail -->
	<?php if(!empty($customermail))
	{ 
        foreach($customermail as $mail)
        {
           $id = $mail->id;
           $mail_subject = $mail->mail_subject;
           $mail_content = $mail->mail_content;
           $mail_type = $mail->mail_type;
	  
        }
	}
	   ?>
	<script type="text/javascript" src="<?php echo $base_url; ?>/assets/global/plugins/ckeditor/ckeditor.js"></script> 
     <script type="text/javascript"> 
    $(document).ready(function(){
     CKEDITOR.replace( 'mail_content',
        {
            fullPage : true,
            uiColor : '#fffffff'
        });
      
      
 });
 
</script>

	<div class="col-md-6">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<div class="panel-title"> Reset password Mail Content </div>
            </div>
			<div class="panel-body">
				<div class="mail-compose">
					<blockquote class="blockquote-blue"> <p> <strong>Shortcode:</strong> </p> <p> <small><strong>{{name}}, {{email}},{{resetpasswordlink}}</strong></small> </p> </blockquote><br>
					
					 <form action="<?php echo $base_url;?>admin/mailsetting/insert_passwordrest_details" class="form-horizontal1 validate1" target="_top" method="post" accept-charset="utf-8">

						<input type="hidden" name="mail_type" value="password">
						<input type="hidden" name="mail_id" value="1">
					 
						<div class="form-group col-md-12">
							<label for="subject"><b>Mail Subject:</b></label>	
							<input type="text" class="form-control" name="mail_subject" placeholder="Write Your Mail Subject" value="<?php echo $mail_subject;?>">
						</div>
						<div class="compose-message-editor form-group col-md-12">
							<label for="subject"><b>Mail Content:</b></label>	
                              <textarea name="mail_content" id="mail_content" placeholder="write_your_mail_content" class="mail_content form-control" row="10"><?php echo $mail_content; ?></textarea>
							 
						</div>
						<br>
						<!-- File adding module -->

						<button type="submit" class="btn btn-icon pull-right student_parent">
							Save &nbsp;<i class='fas fa-envelope'></i>							 
						</button>
						 </form>
                  
					
				</div>
			</div>
		</div>
	</div>
	<!-- /student mail -->
	<!-- parent mail -->
	<!-- <div class="col-md-6">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<div class="panel-title">  Garage Mail Content  </div>
            </div>
			<div class="panel-body">
				<div class="mail-compose">
					<blockquote class="blockquote-blue"> <p> <strong>Shortcode:</strong> </p> <p> <small><strong>{{garage_name}}, {{garage_email}}, {{garage_password}}</strong></small> </p> </blockquote><br>
					<form action="<?php echo $base_url;?>admin/mailsetting/insert_garage_details" target="_top" method="post" accept-charset="utf-8">
					
						<input type="hidden" name="mail_typeg" value="garage">
						<input type="hidden" name="mail_idg" value="2">
 						<div class="form-group">
							<label for="subject"><b>Mail Subject:</b></label>	
							<input type="text" class="form-control" name="mail_subjectg" placeholder="Write Your Mail Subject" value="<?php echo $mail_subjectg;?> ">
						</div>

						<div class="compose-message-editor form-group">
							<label for="subject"><b>Mail Content:</b></label>	
							    <textarea name="mail_contentg" id="mail_contentg" placeholder="write_your_mail_content" class="mail_content form-control" row="10"><?php echo $mail_contentg; ?></textarea>
														 
					 
						</div>
						<br>

						<button type="submit" class="btn btn-icon pull-right student_parent">
							Save &nbsp; <i class='fas fa-envelope'></i>							 
						</button>
						 </form>		-->				<!-- File adding module -->

					  <!-- end -->
					 <!-- </div>
					  </div>
					  </div>
					  </div>
					   -->
					  <!-- charu -->

   
   
   
					  </div>
					</div>
				</div>


			</div>