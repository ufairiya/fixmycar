
<style type="text/css">
	
.recent_views {
	text-align: center;
}
.reviews_details{
	border: 1px solid  #cccbcb;
}

.boder_bottom{
	border-bottom: 1px solid  #cccbcb;
}

.cus_re , .your_res{
	font-size: 20px;
    line-height: 1.4;
    color: #6f6f6f;
    font-weight: normal;
    text-transform: capitalize;
}

.rec_wid {
	width: 65%;
}

.names {
	font-weight: bold;
}

.padd_class{
	margin-top: 30px;
}

.reply_button{
	margin-bottom: 30px;
	    margin-top: 20px;
}

.customer_reviews{
	    border-bottom: 1px solid #cccbcb;
    padding-bottom: 20px;
}

.movers_reviews {

	text-align: right;



}
</style>
<div class="container rec_wid">
<?php  
	
	//echo "<pre>"; print_r($reviews);echo "</pre>";

?>

	<h3 class="recent_views">Recent Reviews</h3> <br>
		<?php 


$count =0;
	foreach ($reviews as $values) {	

		if(!empty($values['star_count']) )
		{


$count++;
			$orderid = $values['id'];
			$star_count =$values['star_count'];
			$review_comments =$values['review_comments'];
			$first_name =ucfirst($values['b_First_name']);

			$movers_replay =$values['movers_review_replay'];


			if($count >1)
			{
				$add_class ="padd_class";
			} else { $add_class =""; }
			?>


<div class="row">
				<div class="col-md-12 reviews_details  <?php echo $add_class;?> ">


						 
						    <div class=" boder_bottom">
								<span class="stars_count"></span> <span class="names"><?php echo $first_name;?> ,Order #<?php echo $orderid;?></span>
								<input type="hidden" name="" class="reply_order" value="<?php echo $orderid;?>">
						   </div> 

						   	<input type="hidden" name="" id="" class="star_count" value="<?php echo $star_count;?>">

						  	<div class="customer_reviews">
							   <span class="cus_re"> customer Reviews:</span><br>
							   <p><?php echo $review_comments?></p>
							 </div>


				<?php 

				if($movers_replay !='')
				{?>


											 <div class="movers_reviews">
											   <span class="cus_re"> Movers Reviews:</span><br>
											   <p><?php echo $movers_replay?></p>
											 </div> <br>

				<?php }
				?>


							<div class="res_div">
								<span class="your_res"> Your response:</span>
								<textarea name="mover_response_text"   rows="5" class="form-control mover_response_text" > </textarea>


		                      <button type="button" class="btn btn-danger cancel_response" ><i class="fa fa-remove"></i>&nbsp;Cancel </button> 
		                       <button type="button" class="btn btn-success send_movers_replay"><i class="fa fa fa-check" aria-hidden="true"></i>&nbsp;Save</button>
							</div>


<?php 

if($movers_replay !='')


{

	// echo 'yesssssssss';


}

else {

	?>
<!-- 	<button type="button" class="btn btn-primary reply_button"><i class="fa fa-reply"></i>&nbsp;Reply</button> -->
<?php }
?>

					
										
										
				</div> 


				
</div>

		<?php }
	}		
	?>
</div>

<script type="text/javascript">

jQuery(".res_div").css("display","none");
jQuery(".reply_button").click(function()


	{
		//alert("reply_button");

		jQuery(this).closest(".reviews_details").find(".res_div").css({"display":"block" ,"margin-bottom" :"20px"});
		jQuery(this).css("display","none");
	});


jQuery(".cancel_response").click(function()


	{
		//alert("cancel_response");

		jQuery(this).closest(".reviews_details").find(".res_div").css({"display":"none" ,"margin-bottom" :"20px"});
		jQuery(this).closest(".reviews_details").find(".reply_button").css("display","block");
	});


	
jQuery(".reviews_details").each(function() {

 var count_star = jQuery(this).find(".star_count").val();

 if(count_star !='')

 {
 
  var results = getStars(count_star);

  jQuery(this).find(".stars_count").html(results);

}


});



function getStars(rating) {


  // Round to nearest half
  rating = Math.round(rating * 2) / 2;
  let output = [];

  // Append all the filled whole stars
  for (var i = rating; i >= 1; i--)
    output.push('<i class="fa fa-star" aria-hidden="true" style="color: gold;"></i>&nbsp;');

  // If there is a half a star, append it
  if (i == .5) output.push('<i class="fa fa-star-half-o" aria-hidden="true" style="color: gold;"></i>&nbsp;');

  // Fill the empty stars
  for (let i = (5 - rating); i >= 1; i--)
    output.push('<i class="fa fa-star-o" aria-hidden="true" style="color: gold;"></i>&nbsp;');

  return output.join('');
}



jQuery(document).on("click",".send_movers_replay",function()
{


var order  = jQuery(this).closest(".reviews_details").find(".reply_order").val();
var mover_response_text =  jQuery(this).closest(".reviews_details").find(".mover_response_text").val();



  $.ajax({
                url: "<?php echo BASE_URL; ?>/home/review_response_by_mover", 
                type: "POST",             
                data: {'order':order,'mover_response_text':mover_response_text},             
                dataType:'json',    
                success: function(data) {
                
              
               //  toastr.success("Service area updated successfully", "Notifications");
                  // setTimeout(function(){ location.reload(); }, 500); 

                }, complete: function(data) {

                  jQuery(".send_movers_replay").attr('disabled', 'disabled');


              
                   toastr.success(" Updated successfully", "Notifications");
                  setTimeout(function(){ location.reload(); }, 500); 
                }
            });




alert(order + mover_response_test );

})

</script>