<form id="movers_update" name="movers_update" enctype="multipart/form-data" method="post" action="<?php echo BASE_URL.'/garage/save_customer_po';?>"> 

<div class="modal-header">
  <span> Upload Garage Photos</span>
  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
</div>
<div class="modal-body">
    <div class="row">
        <div class="col-md-12">
              <label class="control-label col-md-12">Upload File </label>
            </br>
          <div class="form-group">
             
                                        <div class="col-md-6">
                                            
                                         
                                         <input type="file" name="files[]" multiple required="" />
                                        </div>
                                         <div class="col-md-6">
                                      <!--    <input type="button" style=" font-size: 13px;" id="add_more" class="upload add_more_filesbtn" value="Add More Files"/>
 -->
    
                                        </div>
              </div>
        </div>
    </div>
</div>
<div class="modal-footer">
  <div class="col-md-3">
  <button type="submit" class="btn btn-theme">Save</button>
</div>
</div>

</form>

 
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