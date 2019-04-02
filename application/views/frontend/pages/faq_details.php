<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<meta name='viewport' content='width=device-width, initial-scale=1'>
<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>


<style type="text/css">
	.container {
  /*margin-top: 20px;*/
  background: none!important;
  width: 100%!important;
}
.row_widthreduce{width: 100%;}
.jumbotron{background: none!important;}
.page {
  display: none;
}
.page-active {
  display: block;
}
.frequently_asked_h3,.accordion_container_stl_faq h5{text-align: center;
	margin-bottom: 20px;
}
.faq_div{margin: 0px;}

.accordion_container {
  width: 95%;
}
#about_us_stlr{height: 400px;}
.accordion_head {
  background-color: rgba(211,211,211,0.55);
  color: rgba(0,0,0,0.66);
  
  font-family: arial;
  font-size: 18px;
  margin: 0 0 10px 0;
  padding: 18px 11px;
      border-radius: 3px;
}

.accordion_body {
  background: white;
}

.accordion_body p {
  padding: 0px 5px 10px 5px;
  margin: 0px;
  font-size: 14px;
}

.plusminus {
  float: right;
  cursor: pointer;
  color:#00CACA;
  font-size: 30px;
  line-height: 30px;
}
.accordion_container_stl_faq h5{text-align: left;font-weight: bold;color: #00CACA;text-align: center;width: 65%;}


</style>
</head>
<style>
body {
    font-family: "Lato", sans-serif;
}
.row_widthreduce{padding-left:  0px!important;padding-right: 0px!important;}
.sidenav {
    width: 300px;
    /*position: absolute;*/
    margin-top: 15%;

    z-index: 1;
    /*top: 20px;*/
    left: 20px;
    background: #eee;
    overflow-x: hidden;
    padding: 0px 10px;
}

.sidenav a {
    padding: 8px 8px 8px 32px;
    text-decoration: none;
    font-size: 15px;
    color: #00CACA;
    display: block;
    transition: 0.3s;
    border-bottom: 1px solid gray;
}

.sidenav a:hover {
    color: #00CACA;
}
#booking_resvr_stlr ul{list-style-type: disc;font-size: 14px;}
.sidenav .closebtn {
    position: absolute;
    top: 0;
    right: 25px;
    font-size: 36px;
    margin-left: 50px;
}
.sidenav .icons_stlr {margin-right: 5px;}
@media screen and (max-width: 480px) and (min-width: 320px){
  .accordion_container_stl_faq h5{width: 100%;text-align: center;}

}
@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
</style>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://www.solodev.com/assets/pagination/jquery.twbsPagination.js"></script>
<!-- <script src="paging.js"></script>
 -->
<div class="row row_widthreduce">
 <div class="frequently_asked_h3 ">
			<h3 class="">Frequently Asked Question (FAQs)</h3>
			
		</div>
	<div class="col-md-3">
	<div id="mySidenav" class="sidenav">
		<?php //print_R($terms_details);
		foreach($terms_details as $terms){
			$term_id = $terms->term_id;
			$term_name = $terms->term_name;
			$icon =$terms->term_icon;
			echo '<a href="#" onclick="myFunction'.$term_id.'()" id="alinkt" class=""><i class="icons_stlr fa '.$icon.' aboutus"></i> '.$term_name.'</a>';

		}
		?>
 <!--  <a href="#" onclick="myFunction()" class=""><i class="icons_stlr fa fa-user aboutus"></i> About the movers</a>
  <a href="#" onclick="myFunction1()" class=""><i class="icons_stlr fa fa-shopping-cart"></i>  Booking a reservation</a>
  <a href="#" onclick="myFunction2()" class=""><i class="icons_stlr fa fa-credit-card"></i>  Payment</a>
  <a href="#" onclick="myFunction3()" class="icons_stlr"><i class=" icons_stlr fa fa-truck"></i> During the move</a>
  <a href="#" onclick="myFunction4()"><i class="icons_stlr fa fa-info-circle"></i> Complaints/Damages</a>
  <a href="#" onclick="myFunction5()" class=""><i class="icons_stlr far fa-star"></i>  Reviews</a>  
  <a href="#" onclick="myFunction6()" class=""><i class="icons_stlr  fa fa-home"></i> About us</a>
  
 -->

</div>

	</div>
	<div class="col-md-9">

<div class="container">

 <div class="navigation_test">
 	<?php //print_R($faq_details);
 	 $html='';
 	foreach($terms_details as $terms){
 		$term_id = $terms->term_id;
 		$term_name= $terms->term_name;
        $results = get_faqdatas($term_id);
      //   print_r($results);
        echo  '<div class="accordion_container accordion_container_stl_faq page page'.$term_id.'" id="page'.$term_id.'" >';
        echo '<h5>'.$term_name.'</h5>';
        $i=1;$disp ='display:none;';
        if(!empty($results))
        {
	        foreach($results as $datas)
	        {
	           $post_title= $datas->post_title;
	           $post_content = $datas->post_content;
	           $disp ='display:none;';$sym='+';
	           if($i==1) { $disp = 'display:block;';$sym='-';}
	           echo '<div class="accordion_head">Q'.$i.' '. $post_title.' <span class="plusminus">'.$sym.'</span></div>  <div class="accordion_body" style="'.$disp.'"><p>'.$post_content.'</p></div>';
	           $i++;
	        }
        }
        echo'</div>';
 	}

 	echo $html;?>
    
 
</div>
	</div>
</div>





<script type="text/javascript">
	$('#pagination-demo').twbsPagination({
  totalPages: 2,
  // the current page that show on start
  startPage: 1,

  // maximum visible pages
  visiblePages: 2,

  initiateStartPageClick: true,

  // template for pagination links
  href: false,

  // variable name in href template for page number
  hrefVariable: '{{number}}',

  // Text labels
  // first: 'First',
  // prev: 'Previous',
  // next: 'Next',
  // last: 'Last',

  // carousel-style pagination
  loop: false,

  // callback function
  onPageClick: function (event, page) {
    $('.page-active').removeClass('page-active');
    $('#page'+page).addClass('page-active');
    console.log('page' +page);
  },

  // pagination Classes
  paginationClass: 'pagination',
  // nextClass: 'next',
  // prevClass: 'prev',
  // lastClass: 'last',
  // firstClass: 'first',
  pageClass: 'page',
  activeClass: 'active',
  // disabledClass: 'disabled'

});
</script>
<script>
$(document).ready(function() {
	$('#page1').show();
  //toggle the component with class accordion_body
  $(".accordion_head " ).click(function() {
  
    if ($('.accordion_body').is(':visible')) {
      $(".accordion_body").slideUp(300);
      $(".plusminus").text('+');
     
    }
    if ($(this).next(".accordion_body").is(':visible')) {
      $(this).next(".accordion_body").slideUp(300);
      $(this).children(".plusminus").text('+');
      
    } else {
      $(this).next(".accordion_body").slideDown(300);
      $(this).children(".plusminus").text('-');

     }
  });
});


</script><script>

// $(".row_widthreduce #mySidenav a").on('click',function(){
// 	$(this).siblings().removeClass('active')
//     $(this).addClass('active');
// })
// function myFunction(){
// 	$('#page1').show();
	


// $('#pagination-demo').show();

// 	$('#booking_resvr_stlr').hide();
// 	$('#payment_stlr').hide();
// 	$('#during_move_stlr').hide();
// 	$('#complait_stlr').hide();
// 	$('#review_stlr').hide();
// 	$('#about_us_stlr').hide();
// 	window.location.reload();
// }

function myFunction1(){
	$('#page1').show();
	$('#page2').hide();
	$('#page3').hide();
	$('#page4').hide();
	$('#page5').hide();
	$('#page6').hide();
	$('#page7').hide();
	$('#page8').hide();
	$('#page9').hide();
	$('#page10').hide();

}
function myFunction2(){
	$('#page1').hide();
	$('#page2').show();
	$('#page3').hide();
	$('#page4').hide();
	$('#page5').hide();
	$('#page6').hide();
	$('#page7').hide();
	$('#page8').hide();
	$('#page9').hide();
	$('#page10').hide(); 
}
function myFunction3(){
	$('#page1').hide();
	$('#page2').hide();
	$('#page3').show();
	$('#page4').hide();
	$('#page5').hide();
	$('#page6').hide();
	$('#page7').hide();
	$('#page8').hide();
	$('#page9').hide();
	$('#page10').hide(); 
}
function myFunction4(){
	$('#page1').hide();
	$('#page2').hide();
	$('#page3').hide();
	$('#page4').show();
	$('#page5').hide();
	$('#page6').hide();
	$('#page7').hide();
	$('#page8').hide();
	$('#page9').hide();
	$('#page10').hide(); 
}
function myFunction5(){
	$('#page1').hide();
	$('#page2').hide();
	$('#page3').hide();
	$('#page4').hide();
	$('#page5').show();
	$('#page6').hide();
	$('#page7').hide();
	$('#page8').hide();
	$('#page9').hide();
	$('#page10').hide(); 
}
function myFunction6(){
	 $('#page1').hide();
	$('#page2').hide();
	$('#page3').hide();
	$('#page4').hide();
	$('#page5').hide();
	$('#page6').show();
	$('#page7').hide();
	$('#page8').hide();
	$('#page9').hide();
	$('#page10').hide(); 
}
function myFunction7(){
	 $('#page1').hide();
	$('#page2').hide();
	$('#page3').hide();
	$('#page4').hide();
	$('#page5').hide();
	$('#page6').hide();
	$('#page7').show();
	$('#page8').hide();
	$('#page9').hide();
	$('#page10').hide(); 
}
function myFunction10(){
	 $('#page1').hide();
	$('#page2').hide();
	$('#page3').hide();
	$('#page4').hide();
	$('#page5').hide();
	$('#page6').hide();
	$('#page7').hode();
	$('#page8').hide();
	$('#page9').hide();
	$('#page10').show(); 
}
function myFunction8(){
	 $('#page1').hide();
	$('#page2').hide();
	$('#page3').hide();
	$('#page4').hide();
	$('#page5').hide();
	$('#page6').hide();
	$('#page7').hide();
	$('#page8').show();
	$('#page9').hide();
	$('#page10').hide(); 
}
function myFunction9(){
	 $('#page1').hide();
	$('#page2').hide();
	$('#page3').hide();
	$('#page4').hide();
	$('#page5').hide();
	$('#page6').hide();
	$('#page7').hide();
	$('#page8').hide();
	$('#page9').show();
	$('#page10').hide(); 
}

// function openNav() {
//     document.getElementById("mySidenav").style.width = "250px";
// }

// function closeNav() {
//     document.getElementById("mySidenav").style.width = "0";
// }
</script>