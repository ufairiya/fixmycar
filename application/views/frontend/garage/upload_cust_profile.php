<style type="text/css">
   .add_more_filesbtn{
      color: white;
    background: #48ad69;
    border: 1px solid #48ad69;
    padding: 8px;
    font-weight: bold;
   }
   .back_option{background-color: black;border:1px solid black;padding: 5px;border-radius: 3px !important;color:white;}
</style>
<div class="page-content-wrapper">
   <!-- BEGIN CONTENT BODY -->
   <div class="page-content1"  >
      <div class="portlet box blue">
         <div class="portlet-title">
            <div class="caption">
               <i class="fa fa-gift"></i>Upload Customer Profile 
            </div>
         </div>
         
         <div class="portlet-body form">
         <br>
         <div class="row">
                      <div class="col-md-12">
                      <?php 
                      if($param=='create'){
                       $backoption = 'invoice/create/'.$company_id;
 
                     }else{
                      $backoption = 'invoice';
                     }


                      ?>
                       <!--  <a href="<?php echo $base_url,$backoption;?>" class="col-md-6"><button type="button" class="back_option"><i class="fa fa-arrow-left" aria-hidden="true"></i> &nbsp;Back</button></a> -->
                        
                      </div>
                    </div>
            <div class="form-body">
               <form action="<?php echo BASE_URL.'/garage/save_customer_profile/'.$company_id;?>" enctype="multipart/form-data" class="horizontal-form" method="POST" id="purchase_order123" >
                  <div class="form-body">
                  <input type="hidden" name="redirect_url" value="/garage/garage_details/<?php echo $company_id;?>">

                          <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Upload File </label>
                                        <div class="col-md-3">
                                            
                                         
                                         <input type="file" name="files[]" multiple required="" />
                                         <br>
                                         
    
                                        </div>
                                        <div class="col-md-2">
                                              <button type="submit" class="btn green">Submit</button>
                                        </div>
                                    </div>
                                </div>
                             
                            </div>
                        
                        </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
<script type="text/javascript">
   
var abc = 0;      // Declaring and defining global increment variable.
$(document).ready(function() {
//  To add new input file field dynamically, on click of "Add More Files" button below function will be executed.
$('#add_more').click(function() {
$(this).before($("<div/>", {
id: 'filediv'
}).fadeIn('slow').append($("<input/>", {
name: 'files[]',
type: 'file',
id: 'file'
}), $("<br/><br/>")));
});

// Following function will executes on change event of file input to select different file.
// $('body').on('change', '#file', function() {
// if (this.files && this.files[0]) {
// abc += 1; // Incrementing global variable by 1.
// var z = abc - 1;
// var x = $(this).parent().find('#previewimg' + z).remove();
// $(this).before("<div id='abcd" + abc + "' class='abcd'><img id='previewimg" + abc + "' src=''/></div>");
// var reader = new FileReader();
// reader.onload = imageIsLoaded;
// reader.readAsDataURL(this.files[0]);
// $(this).hide();
// $("#abcd" + abc).append($("<img/>", {
// id: 'img',
// src: 'x.png',
// alt: 'delete'
// }).click(function() {
// $(this).parent().parent().remove();
// }));
// }
// });
// To Preview Image
// function imageIsLoaded(e) {
// $('#previewimg' + abc).attr('src', e.target.result);
// };
// $('#upload').click(function(e) {
// var name = $(":file").val();
// if (!name) {
// alert("First Image Must Be Selected");
// e.preventDefault();
// }
// });
});
</script>