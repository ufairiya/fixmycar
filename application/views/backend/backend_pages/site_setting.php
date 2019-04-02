<style type="text/css">
  
  .mail_setting .panel-primary>.panel-heading {
    background-color: darkgrey;
    border-color: darkgrey !important;}
  .mail_setting .panel-primary {border-color: darkgrey !important;}
  .mail_setting .form-group {margin-bottom: 30px !important;}
  button.btn.save_button {background-color: #5E9E37 !important;
    color: #fff !important;}
    span.btn.btn-white.btn-file {border: 1px solid #eee;}
    button.btn.upload_button{background-color: #5E9E37 !important;
    color: #fff !important;}
</style>
 
<!-- BEGIN CONTENT -->

            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content ">
                    <!-- BEGIN PAGE HEADER-->
                    <h1 class="page-title"> <?php echo ' System Settings'; ?>                
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
     if(!empty($garagemail))
    {
       foreach($garagemail as $mail)
            {
               $idg = $mail->id;
               $mail_subjectg = $mail->mail_subject;
               $mail_contentg = $mail->mail_content;
               $mail_typeg = $mail->mail_type;
        
            }
    }?>


  <script type="text/javascript" src="<?php echo $base_url; ?>/assets/global/plugins/ckeditor/ckeditor.js"></script> 
     <script type="text/javascript"> 
    $(document).ready(function(){
     CKEDITOR.replace( 'mail_content',
        {
            fullPage : true,
            uiColor : '#fffffff'
        });
      CKEDITOR.replace( 'mail_contentg',
        {
            fullPage : true,
            uiColor : '#fffffff'
        });
      
 });
 
</script>




  <div class="col-md-6 mail_setting">
    <form name="settingform" action="<?php echo $base_url.'admin/settings/do_update';?>" method="POST" >
    <div class="panel panel-primary">
      <div class="panel-heading">
        <div class="panel-title"> System Settings </div>
            </div>
      <div class="panel-body">
        
            <div class="form-group">
               <label  class="col-sm-3 control-label">System Name</label>
                  <div class="col-sm-9">
                    <input type="text" required="true" class="form-control" name="system_name"
                              value="<?php echo $system_name;?>" required>
                  </div>
            </div> <div style="clear:both;"></div><br>


            <div class="form-group">
               <label  class="col-sm-3 control-label">System Title</label>
                  <div class="col-sm-9">
                    <input type="text" required="true" class="form-control" name="system_title"
                              value="<?php echo $system_title;?>" required>
                  </div>
            </div>
<div style="clear:both;"></div><br>

            <div class="form-group">
               <label  class="col-sm-3 control-label">System Email</label>
                  <div class="col-sm-9">
                    <input type="mail" required="true" class="form-control" name="system_email"
                              value="<?php echo $system_email;?>" required>
                  </div>
            </div>
<div style="clear:both;"></div><br>

             <div class="form-group">
               <label  class="col-sm-3 control-label">Phone</label>
                  <div class="col-sm-9">
                    <input type="text" required="true" class="form-control" name="phone"
                              value="<?php echo $phone;?>" required>
                  </div>
            </div>
<div style="clear:both;"></div><br>

             <div class="form-group">
               <label  class="col-sm-3 control-label">Address</label>
                  <div class="col-sm-9">
                    <input type="text" required="true" class="form-control" name="address"
                              value="<?php echo $address;?>" required>
                  </div>
            </div>
<div style="clear:both;"></div><br>

                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-9">
                        <button type="submit" class="btn save_button">Save</button>
                    </div>
                  </div>


      
      </div>
    </div>
  </form>
  </div>
  <!-- /student mail -->
  <!-- parent mail --> 
  <div class="col-md-6 mail_setting">
     <form name="settingform" action="<?php echo $base_url.'admin/settings/upload_logo';?>" method="POST" enctype="multipart/form-data">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <div class="panel-title"> Upload Logo  </div>
            </div>
               
             <div class="panel-body panel_photo_upload">


                      <div class="form-group">
                          <label for="field-1" class="col-sm-3 control-label">Photo</label>

                          <div class="col-sm-3">
                              <div class="fileinput fileinput-new" data-provides="fileinput"><input type="hidden">
                                  <div class="fileinput-new thumbnail" style="width: 100px; height: 100px;" data-trigger="fileinput">
                                      <img src="<?php echo $base_url.$system_logo;?>" alt="...">
                                  </div>
                                  <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 10px;"></div>
                                  <div>
                                      <span class="btn btn-white btn-file">
                                          <span class="fileinput-new">Select image</span>
                                          <span class="fileinput-exists">Change</span>
                                          <input type="file" name="userfile" accept="image/*" required="required">
                                      </span><div style="clear:both;"></div><br>
                                      <a href="#" class="btn btn-warning fileinput-exists" data-dismiss="fileinput">Remove</a>
                                  </div>
                              </div>
                          </div>
                     


                          
                      <div class="form-group">
                          <label for="field-1" class="col-sm-3 control-label">upload Email logo</label>

                          <div class="col-sm-3">
                              <div class="fileinput fileinput-new" data-provides="fileinput"><input type="hidden">
                                  <div class="fileinput-new thumbnail" style="width: 100px; height: 100px;" data-trigger="fileinput">
                                      <img src="<?php echo $base_url.$system_maillogo;?>" alt="...">
                                  </div>
                                  <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 10px;"></div>
                                  <div>
                                      <span class="btn btn-white btn-file">
                                          <span class="fileinput-new">Select image</span>
                                          <span class="fileinput-exists">Change</span>
                                          <input type="file" name="userfile" accept="image/*" required="required">
                                      </span><div style="clear:both;"></div><br>
                                      <a href="#" class="btn btn-warning fileinput-exists" data-dismiss="fileinput">Remove</a>
                                  </div>
                              </div>
                          </div>
                      </div>   


 <div style="clear:both;"></div><br>

                    <div class="form-group">
                      <div class="col-sm-offset-3 col-sm-3">
                          <button type="submit" class="btn upload_button">Upload</button>
                      </div>
                    </div>

                  </div>  



     
            </div>
            </div>
          </div>
        </form>



         </div>
         <script type="text/javascript" src="<?php echo $base_url; ?>/assets/global/plugins/ckeditor/ckeditor.js"></script> 
     <script type="text/javascript"> 
    $(document).ready(function(){
     CKEDITOR.replace( 'mail_content',
        {
            fullPage : true,
            uiColor : '#fffffff'
        });
      CKEDITOR.replace( 'mail_contentg',
        {
            fullPage : true,
            uiColor : '#fffffff'
        });
      
 });
 
</script>

<div class="row ">
     <form name="settingform" action="<?php echo $base_url.'admin/settings/save_registercontent';?>" method="POST"> 
 <div class="col-md-6 mail_setting">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <div class="panel-title">Register Page Content</div>
            </div>
               
             <div class="panel-body">
               
                <div class="form-group">
              <label for="subject"><b>Customer Content:</b></label>  
                   <textarea class="mail_content form-control" rows="6" cols="30" name="mail_content" id="mail_content"><?php echo $mail_content;?></textarea>
                             
           
            </div>

             <div class="form-group">
              <label for="subject"><b>Garage Content:</b></label>  
                  <textarea class="form-control mail_contentg" rows="6" name="mail_contentg" cols="30" id="mail_contentg"><?php echo $mail_contentg;?></textarea>
              </div>

              <div class="form-group">
                      <div class="col-sm-offset-3 col-sm-3">
                          <button type="submit" class="btn upload_button">Save</button>
                      </div>
                    </div>


                  </div>  
                </div></div>

      </div>
</form>
    </div>