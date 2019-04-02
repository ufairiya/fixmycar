<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
<style type="text/css">
	
	   .status_heading {text-align: center;
    /*color: black;*/
    text-transform: capitalize; }

    .review_heading , .review_comments{
    	text-align: left;
      font-size: 15px;
    line-height: 1.4;
    color: #6f6f6f;
    font-weight: normal;
    }

    .send_comments {
         text-align: right;
    }



/* Rating Star Widgets Style */
.rating-stars ul {
  list-style-type:none;
  padding:0;
  
  -moz-user-select:none;
  -webkit-user-select:none;
}
.rating-stars ul > li.star {
  display:inline-block;
  
}

/* Idle State of the stars */
.rating-stars ul > li.star > i.fa {
 /* font-size:2.5em;*/ /* Change the size of the stars */
 /* color:#ccc;*/ /* Color on idle state */

  color: black;
  font-size:1.8em;
}

/* Hover state of the stars */
.rating-stars ul > li.star.hover > i.fa {
  color:#FFCC36;
}

/* Selected state of the stars */
.rating-stars ul > li.star.selected > i.fa {
  /*color:#FF912C;*/
      color: gold;
}
.span_title{
    float: right;
    /* margin-top: -59px; */
     position: absolute; 
    margin-left: 270px;
    margin-top: -59px;
}
.error_reviewstar{color: red;display: inline-block;padding-left: 10px;}

.rating-stars  ul {
  margin:auto;
}


</style>



  <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
    </div>
        <div class="modal-body">
<form id="order_reviews_update" name="order_reviews_update" enctype="multipart/form-data" method="post">
          <h3 class="status_heading"> Write Review</h3>
          <br>
              
          <!--   <select class="form-control"  name="order_status" id="order_status" required="">
          	<option value="">Select order Status</option>
          	<option value="Completed">Completed</option>
          	<option value="Pending">Pending</option>
          	
          </select>  -->
          

          <h3 class="review_heading">Reviews</h3>


<div class="row">

        <!-- Rating Stars Box -->
    <div class="col-md-12">
        <div class='rating-stars'>
          <ul id='stars' class="review_star">
            <li class='star' title='Poor' data-value='1'>
              <i class='fa fa-star fa-fw'></i>
            </li>
            <li class='star' title='Fair' data-value='2'>
              <i class='fa fa-star fa-fw'></i>
            </li>
            <li class='star' title='Good' data-value='3'>
              <i class='fa fa-star fa-fw'></i>
            </li>
            <li class='star' title='Excellent' data-value='4'>
              <i class='fa fa-star fa-fw'></i>
            </li>
            <li class='star' title='WOW!!!' data-value='5'>
              <i class='fa fa-star fa-fw'></i>
            </li>
            <li class="appen_count" id="appen_count"></li>
          </ul>
        </div>
        <input type="hidden" name="star_count" id="star_count" value="">
   </div>
<span class="error_reviewstar" style="display: none;">Please select star review</span>
<input type="hidden" name="orderid" id="orderid" value="<?php echo $orderid;?>">
<input type="hidden" name="date" />

            <div class="col-md-12">
             <h3 class="review_comments">Comments:</h3>
             <textarea  rows="4" class="form-control" name="review_comments_box" id ="review_comments_box" required=""></textarea>
             </div>

              <div class="col-md-12 send_comments">
                <button class="btn btn-danger cancel_comment"><i class="fa fa-remove"></i>&nbsp;CANCEL</button> &nbsp;
             <!-- <button class="btn btn-success send_comment"><i class="fa fa fa-check" aria-hidden="true"></i>&nbsp;SEND</button> -->
             <button type="button" class="btn send_comment"  ><i class="fa fa fa-check" aria-hidden="true"></i>&nbsp;SEND</button>
             </div>

  </div>



</form>
      </div>

<script type="text/javascript">

 jQuery(document).on("click",".cancel_comment",function()
    {

       jQuery('#ajax').modal('hide');

    });

jQuery(document).ready(function(){
  jQuery('.error_reviewstar').hide();
})


 jQuery(document).on("click",".send_comment",function()
{
  

 var star_count='';
var review_comments_box ='';

  var order_id ='<?php echo  $orderid?>';
   star_count =jQuery("#star_count").val();
  console.log(star_count);
 
   review_comments_box =jQuery("#review_comments_box").val();

if(star_count!='' && review_comments_box!=''){
   $.ajax({
                url: "<?php echo BASE_URL; ?>/customer/send_review_comments", 
                type: "POST",
                        
                data: {'order':order_id,'star_count':star_count,'review_comments_box':review_comments_box},             
                dataType:'json',    
                success: function(data) {
                  
                   //   if(data ==1)
                   // { toastr.error("Please select order status", "Notifications");}
                    if(data ==2)
                   { toastr.error("Please select star review", "Notifications");}
                    if(data ==3)
                   { toastr.error("Please enter the review comments", "Notifications");}

                 if(data ==0)
                   {   
                    jQuery("#star_count").val('');
                   jQuery(".order_confrom").attr("disabled","");                            
                   toastr.success("updated  order status successfully", "Notifications");
                  setTimeout(function(){ location.reload(); }, 3000); 
                }

                
              

                }
            });
 }
 else if(star_count==''){
  jQuery("#star_count").val('');
  toastr.error("Please select star review", "Notifications");
 }
 else{
  toastr.error("Please enter the review comments", "Notifications");
 }

});




        
$(document).ready(function(){
  
  /* 1. Visualizing things on Hover - See next part for action on click */
  $('#stars li').on('mouseover', function(){
    var onStar = parseInt($(this).data('value'), 10); // The star currently mouse on
   
    // Now highlight all the stars that's not after the current hovered star
    $(this).parent().children('li.star').each(function(e){
      if (e < onStar) {
        $(this).addClass('hover');
      }
      else {
        $(this).removeClass('hover');
      }
    });
    
  }).on('mouseout', function(){
    $(this).parent().children('li.star').each(function(e){
      $(this).removeClass('hover');
    });
  });
  
  
  /* 2. Action to perform on click */
  $('#stars li').on('click', function(){
    var onStar = parseInt($(this).data('value'), 10); // The star currently selected
    var stars = $(this).parent().children('li.star');
    
    for (i = 0; i < stars.length; i++) {
      $(stars[i]).removeClass('selected');
    }
    
    for (i = 0; i < onStar; i++) {
      $(stars[i]).addClass('selected');
    }
    
    // JUST RESPONSE (Not needed)
    var ratingValue = parseInt($('#stars li.selected').last().data('value'), 10);
    var msg = "";
    if (ratingValue > 1) {
        msg = "Thanks! You rated this " + ratingValue + " stars.";
    }
    else {
        msg = "We will improve ourselves. You rated this " + ratingValue + " stars.";
    }

   // console.log(ratingValue);
    jQuery("#star_count").val(ratingValue);
    if(ratingValue!=0){
      jQuery('.error_reviewstar').hide();
    }
      
  });
  });





      </script>