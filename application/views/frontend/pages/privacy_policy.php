<style type="text/css">
	.container {
  /*margin-top: 20px;*/
  background: none!important;
  width: 100%!important;
}
.row_widthreduce{width: 100%;background-color:rgba(222,217,178,0.18); }
.privacy_policydiv{position: relative;
    background: #ffffff;
    margin-bottom: 70px; }
.privacy_policydiv .container{   margin-top:40px;/* border-left: 1px solid #d1d1d1;
    border-right: 1px solid #d1d1d1;*/}    
.accordion_container h3{
	font-weight: bold;text-align: center!important;color: #333333;
}
.heading_style h3{font-weight: bold;text-align: left!important;}
.accordion_container p{    font-size: 18px;
    line-height: inherit;margin-bottom: 20px;}
.privacy_listpoints{
      display: block;
    list-style-type: disc;
    font-size: 18px;
    color: #333333;
}.accordion_container hr{line-height: 25px!important;}
.tc_background_imagediv{       background-size: cover;
    min-height: 200px;background-position: center;
}
.tc_background_imagediv p{
  font-size: 20px;
      color: white;
    line-height: 45px;
    padding-bottom: 50px;
    
}
.accordion_container hr{line-height: 25px!important;}

  
</style>
<style>
body {
    font-family: "Lato", sans-serif;
}
</style>

<!-- <script src="paging.js"></script>
 -->
 <div class="col-md-12 tc_background_imagediv" style="background-image: url('<?php echo $base_url.$banner_image?>'); ">
 <div class="col-md-2"></div>
    <div class="col-md-8">
            <?php echo $banner_Content; ?>
    </div>
    <div class="col-md-2"></div>
</div>
<br>
<br>
<div class="row row_widthreduce">
<div class="col-md-12">
 
	<div class="col-md-2"></div>
	<div class="col-md-8 privacy_policydiv">

<div class="container">

 <!-- <div class="navigation_test"> -->
    <div class="accordion_container accordion_container_stl_faq page page1"  >
	       <?php echo $page_data->post_content;?>
 					
				</div>
 				   
			<!-- </div> -->
  
</div>
	</div>
</div>
<div class="col-md-2"></div>
</div>

</div>



<script type="text/javascript">
	
</script>