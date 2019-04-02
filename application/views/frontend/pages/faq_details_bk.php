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
		
  <a href="#" onclick="myFunction()" class=""><i class="icons_stlr fa fa-user aboutus"></i> About the movers</a>
  <a href="#" onclick="myFunction1()" class=""><i class="icons_stlr fa fa-shopping-cart"></i>  Booking a reservation</a>
  <a href="#" onclick="myFunction2()" class=""><i class="icons_stlr fa fa-credit-card"></i>  Payment</a>
  <a href="#" onclick="myFunction3()" class="icons_stlr"><i class=" icons_stlr fa fa-truck"></i> During the move</a>
  <a href="#" onclick="myFunction4()"><i class="icons_stlr fa fa-info-circle"></i> Complaints/Damages</a>
  <a href="#" onclick="myFunction5()" class=""><i class="icons_stlr far fa-star"></i>  Reviews</a>  
  <a href="#" onclick="myFunction6()" class=""><i class="icons_stlr  fa fa-home"></i> About us</a>
  


</div>

	</div>
	<div class="col-md-9">

<div class="container">

 <div class="navigation_test">
    <div class="accordion_container accordion_container_stl_faq page page1" id="page1" >
			
				<h5>ABOUT THE MOVERS</h5>
				  <div class="accordion_head">Q1. Who are the movers? <span class="plusminus">-</span></div>
					  <div class="accordion_body" >
					    <p>Most of the moving labor providers who advertise on HireMovers do loading and unload services for a living. Many are labor only moving companies that specialize specifically in loading and unloading moving trucks/containers. Some are full service movers willing to send their movers out on labor-only jobs. Be sure to check out their description, rates, and reviews on their profile.</p>
					  </div>
 				 <div class="accordion_head">Q2. Will my movers bring a truck? <span class="plusminus">+</span></div>
					  <div class="accordion_body" style="display: none;">
					    <p>No. You can only book them for moving labor services even if they are a full service mover (company that provides owns their own truck).</p>
					  </div>
				 <div class="accordion_head">Q3. Do they bring moving equipment or material? <span class="plusminus">+</span></div>
				  <div class="accordion_body" style="display: none;">
				    <p>Each mover listed on our site is required to provide a utility dolly and basic tools for assembly/disassembly. Any packing material or equipment needed to secure the load will be your responsibility. We have quality products that ship to most places within 1-2 days. We understand how important it is to get supplies quick!</p>
				  </div>
			
  				<div class="accordion_head">Q4. How do I know if a mover is available? <span class="plusminus">+</span></div>
				  <div class="accordion_body" style="display: none;">
				    <p>Movers manage their availability directly on their profile. If they are not available their profile will show unavailable! We recommend checking other dates and times for availability if there aren’t any available movers. Most people move during the first/last week of each month and Fridays/Saturdays are the busiest. Sundays are often the slower day of the week. Mornings and Afternoons are the busiest time of each day.</p>
				  </div>
				  <div class="accordion_head">Q5. What happens if they get hurt on the job? <span class="plusminus">+</span></div>
				  <div class="accordion_body" style="display: none;">
				    <p>By using our site all movers agree that they will not and can not hold their customer liable for injuries. Most will be willing to sign a liability waiver for you upon request.</p>
				  </div>
				   <div class="accordion_head">Q6. Do they help pack/unpack boxes? <span class="plusminus">+</span></div>
				  <div class="accordion_body" style="display: none;">
				    <p>Movers specialize in loading and unloading, they are not professional packers but may be willing to help out. Be sure to ask them if you want them to help. They are NOT required to pack or unpack. This is up to the mover. </p>
				  </div>
				   <div class="accordion_head">Q7. Do I get charged for travel time?<span class="plusminus">+</span></div>
				  <div class="accordion_body" style="display: none;">
				    <p>When you search for a mover we will only show movers that service your location. The clock will not start until they arrive at your door. The amount you see on HireMovers includes travel fees to and from the job site. If you book loading and unloading service the travel time between locations is on the clock.</p>
				  </div>
				  <div class="accordion_head">Q8. How do I contact a mover?<span class="plusminus">+</span></div>
				  <div class="accordion_body" style="display: none;">
				    <p>Make a reservation with them. Right after you make your reservation you and your mover will receive each others contact information. We recommend calling your mover a few hours after the booking is completed. If they don’t answer right away leave a voicemail. They are most likely out on moving jobs and will return your call when they can view their schedule. Most movers do their callbacks in the evening since morning and afternoons are busiest times of the day. </p>
				  </div>
				  <div class="accordion_head">Q9. Is there an extra charge for stairs? <span class="plusminus">+</span></div>
				  <div class="accordion_body" style="display: none;">
				    <p>There is never a charge for stairs, yet remember that stairs will likely require additional time.</p>
				  </div>

				  <div class="accordion_head">Q10.Will they load and unload my things for me?<span class="plusminus">+</span></div>
				  <div class="accordion_body" style="display: none;">
				    <p>They can help load and unload your items as long as the mover provides services in both locations. You may book multiple movers for different locations. Keep in mind that the clock does not stop when driving between locations. This is a good idea for local moves though.</p>
				  </div>
				  
				
				
				
				
			</div>
  
  <div class="accordion_container accordion_container_stl_faq page page2" id="page2" >
			<h5>ABOUT THE MOVERS</h5>
			
				<!-- <div class="accordion_head">Q14. Will they load and unload my things for me? <span class="plusminus">-</span></div>
					  <div class="accordion_body"  >
					    <p>They can help load and unload your items as long as the mover provides services in both locations. Keep in mind that the clock does not stop when driving between locations. This is a good idea for local moves! </p>
					  </div> -->
 				 <!-- <div class="accordion_head">Q15.Are they licensed?  <span class="plusminus">+</span></div>
					  <div class="accordion_body" style="display: none;">
					    <p>There is not requirement for someone to have a license to lift things in and out of a truck or container. If a mover does provide a license to attract more customers they will have it listed in their profile.</p>
					  </div> -->
					  <div class="accordion_head">Q11.Are they licensed?<span class="plusminus">+</span></div>
				  <div class="accordion_body" style="display: none;">
				    <p>It is not necessarily required for someone to have a license to lift things in and out of a truck or container. Although, some states require this.</p>
				  </div>
				  <div class="accordion_head">Q12.Can the movers drive my truck?<span class="plusminus">+</span></div>
				  <div class="accordion_body" style="display: none;">
				    <p>Some movers may be willing to drive the truck if you provide insurance/coverage on the truck that will cover them driving the truck but they are not required to offer this. Some movers have an extra charge for this. This is not required.</p>
				  </div>
				  <div class="accordion_head">Q13.Do they bring furniture pads?<span class="plusminus">+</span></div>
				  <div class="accordion_body" style="display: none;">
				    <p>They do not provide any furniture padding. We recommend providing AT LEAST 1 piece of padding per piece of furniture. If no padding is provided the mover may not be willing to negotiate if there are any damages during transit. You may also order any moving material needed on or site.</p>
				  </div>
				  
					  <div class="accordion_head">Q14.How do I know the movers will actually work?
					  <span class="plusminus">+</span></div>
					  <div class="accordion_body" style="display: none;">
					    <p>Read customer reviews. This is the best way to find out what past customers have experienced with each mover. The mover is required to provide satisfaction and come to an agreement in order to have their payment released. Most movers don’t want to jeopardize their reputation as well.</p>
					  </div>
					  <div class="accordion_head">Q15.Are there higher rates for certain dates?
					  <span class="plusminus">+</span></div>
					  <div class="accordion_body" style="display: none;">
					    <p>Depending on the movers availability will likely determine the rate. We recommend checking other dates for availability if there aren’t any available movers or if the price is just too high. Most people move during the first/last week of each month and Fridays/Saturdays are the busiest. Sundays are often the slower day of the week. Mornings and Afternoons are the busiest time of each day. Some movers may discount days they have no moves. Most movers will have a premium for holidays or high interest moving days.  </p>
					  </div>
					  <!-- <div class="accordion_head">Q18.How do I know the movers will actually work?
					  <span class="plusminus">+</span></div>
					  <div class="accordion_body" style="display: none;">
					    <p>Read customer reviews. This is the best way to find out what past customers have experienced with each mover. The mover is required to provide satisfaction and come to an agreement in order to have their payment released. Most movers don’t want to jeopardize their reputation as well. We also pay the movers $10 for each 5 star review a customer writes them!</p>
					  </div> -->


				<!-- div class="accordion_head">Q19.Can the movers drive my truck? <span class="plusminus">+</span></div>
				  <div class="accordion_body" style="display: none;">
				    <p>Some movers may be willing to drive the truck if you provide insurance/coverage on the truck that will cover them driving the truck but they are not required to offer this. </p>
				  </div> -->
  				
				  <div class="accordion_head">Q16. Can they assemble/disassemble furniture?  <span class="plusminus">+</span></div>
				  <div class="accordion_body" style="display: none;">
				    <p>Movers are required to assemble/disassemble furniture if requested. Please make sure you put this in your order details and allow for extra time needed. Before the job you should discuss which tools are needed. Movers are required to provide basic tools but are not required to bring any power tools.</p>
				  </div>
				   <div class="accordion_head">Q17. Are they insured? <span class="plusminus">+</span></div>
				  <div class="accordion_body" style="display: none;">
				    <p>Movers must have insurance to be listed on HireMovers. If something happens, we will not release the payment unless an agreement is made between the customer and mover. Most movers will work something out with you to prevent jeopardizing their reputation. Movers ARE NOT liable for any in-transit damages using FREIGHT TRAILERS. We DO NOT recommend using freight trailers.</p>
				  </div>
				   <!-- <div class="accordion_head">Q22. How do I know the movers won’t milk the clock?  <span class="plusminus">+</span></div>
				  <div class="accordion_body" style="display: none;">
				    <p>Read customer reviews. This is the best way to find out what past customers have experienced with each mover. The mover is required to provide satisfaction and come to an agreement in order to have their payment released. Most movers don’t want to jeopardize their reputation as well. We also pay the movers $10 for each 5 star review a customer writes them!. </p>
				  </div> -->
				   
				 
				  
  </div>
   <ul id="pagination-demo" class="pagination-lg pull-right" style=""></ul>
 </div> 
  <div class="accordion_container accordion_container_stl_faq page page3" id="booking_resvr_stlr" >
			<h5>BOOKING A RESERVATION</h5>
				  <div class="accordion_head">Q1.Can they move my piano or safe? <span class="plusminus">-</span></div>
					  <div class="accordion_body" >
					    <p>Only certain movers have the equipment and tools to safely move a piano. To compare movers who are able to move pianos, indicate which type of piano in the drop down menu when searching for movers. The easiest and safest way to move a piano is to have the truck backed up to the porch or deck if possible. This will also save time during your move as your movers will have less distance from the home to truck to carry items. </p>
					  </div>

 				 <div class="accordion_head">Q2.What is considered an oversized item? <span class="plusminus">+</span></div>
					  <div class="accordion_body" style="display: none;">
					    <p>An oversized item is defined as anything that is 300 lbs or more. You will be required to hire at least 3 or 4 crew. These items may take a good amount of time to move especially if there are stairs. There is an extra charge for oversized items and the price will vary for each moving company. 
					    <br>
					    Some oversized/overweight items may be:

						<ul>
							<li>Buffet table</li>
							<li>Armoire</li>
							<li>Hospital bed</li>
							<li>Pianos; Upright, Console, Spinet, Electric (Not keyboard)</li>
							<li>Organ</li>
							<li>Safe</li>
							<li>Sofa bed</li>
							<li>Murphy bed</li>
							<li>Pool table</li>
							<li>Mechanical Bed</li>
							
						</ul>
						</p>
					  </div>
				<div class="accordion_head">Q3.Can I change the date of my job?
 					<span class="plusminus">+</span></div>
				  <div class="accordion_body" style="display: none;">
				    <p>If you need to change the date and/or time of your move please contact your mover directly. If your mover is unable to work with the new time and date requested there may be a cancellation fee. We will assist in asking the mover to waive this fee and find a new mover to help but their rates may be different. </p>
				  </div>
  				<div class="accordion_head">Q4. When will my mover call me? <span class="plusminus">+</span></div>
				  <div class="accordion_body" style="display: none;">
				    <p>Movers will call you within 24 hours of booking services. If your mover does not contact you immediately after booking it is very possible they are out on jobs. We recommend calling your mover a few hours after booking services.</p>
				  </div>
				  <div class="accordion_head">Q5. How much notice is needed to book a reservation?  <span class="plusminus">+</span></div>
				  <div class="accordion_body" style="display: none;">
				    <p>We recommend booking a reservation as soon as you know your moving. If you wait until a few days before your move it’s very likely the prices will be higher and more experienced movers will be booked up.</p>
				  </div>
				   <div class="accordion_head">Q6.What if I need to cancel? <span class="plusminus">+</span></div>
				  <div class="accordion_body" style="display: none;">
				    <p>Cancel without a fee up to 3 days before the job start time. If you cancel after that you will be charged a $50 cancellation fee. If you cancel within 24 hours of your move there will be a $100 cancellation fee. If you cancel with less than 1 hour from the first arrival time you will be charged for 2 hours(EX: 12PM-1PM would be 12PM). This is to compensate the movers for possible lost jobs due to reserving the time and day for you and/or gas and drive time.</p>
				  </div>
				   <div class="accordion_head">Q7. How many hours do I need?   <span class="plusminus">+</span></div> 
				  <div class="accordion_body" style="display: none;">
				    <p>Most moves generally take between 2-4 hours. Larger moves may require 4-8. Be sure to keep in mind some variables that may increase your time needed such as: stairs, heavy or bulky items, assembling/disassembling, special placement of items, wrapping furniture, and roping/strapping things in the truck. If you are unsure how much time to book use our moving labor estimator. </p>
				  </div>
				   <div class="accordion_head">Q8.What is the minimum hours I can book?<span class="plusminus">+</span></div>
				  <div class="accordion_body" style="display: none;">
				    <p>The minimum hours booked for each mover will vary. Most movers require a 2 hour minimum. You may view the movers details for booking minimums when searching for movers.</p>
				  </div>
				 
  </div>
  <div class="accordion_container accordion_container_stl_faq page page4" id="payment_stlr" >
			<h5>PAYMENT</h5>
				  <div class="accordion_head">Q1.Where can I find my receipt? <span class="plusminus">-</span></div>
					  <div class="accordion_body" >
					    <p>We will send you a receipt to your email. </p>
					  </div>
 				 <div class="accordion_head">Q2.When do I get charged? <span class="plusminus">+</span></div>
					  <div class="accordion_body" style="display: none;">
					    <p>Your card will be charged when you book services. This guarantees your reservation for your time and date with the mover you have selected.		   
						</p>
				  </div>
				<div class="accordion_head">Q3.Do the movers have my credit card information?<span class="plusminus">+</span></div>
				  <div class="accordion_body" style="display: none;">
				    <p>We will NEVER give our your credit card information. HireMovers holds the funds after you book services until the move is completed. With your approval we will release the funds to the mover. </p>
				  </div>
  				<!-- <div class="accordion_head">Q4. When will my mover call me? <span class="plusminus">+</span></div>
				  <div class="accordion_body" style="display: none;">
				    <p>Movers will call you within 24 hours of booking services. If your mover does not contact you immediately after booking it is very possible they are out on jobs. We recommend calling your mover a few hours after booking services.</p>
				  </div> -->
				  <div class="accordion_head">Q4.How can I pay for additional time? <span class="plusminus">+</span></div>
				  <div class="accordion_body" style="display: none;">
				    <p>We recommend paying for additional time through the site to ensure your move is completed satisfactory and so that your receipt will match up to your total payment. We can not guarantee any payments paid directly to the mover.  </p>
				  </div>
				   <div class="accordion_head">Q5.How long do refunds take?<span class="plusminus">+</span></div>
				  <div class="accordion_body" style="display: none;">
				    <p>Once a refund is issued, the funds are released. Depending on your financial institution will vary when the funds are posted to your account. MOST credit card companies take 1-4 business days to post the funds back to your account. Some can take up to 5-8 business days.</p>
				  </div>
				   <div class="accordion_head">Q6. Why do you need my credit card information?  <span class="plusminus">+</span></div> 
				  <div class="accordion_body" style="display: none;">
				    <p>We collect payment to ensure safety between movers and customers by ensuring jobs are completed and to give assurance to movers their job is paid for. </p>
				  </div>
				   <div class="accordion_head">Q7.How does the mover get paid?<span class="plusminus">+</span></div>
				  <div class="accordion_body" style="display: none;">
				    <p>When the job is completed we will send funds to the mover(minus commission paid to HireMovers) ONLY if the customer and mover have agreed the move was completed to expectations.</p>
				  </div>
				  <div class="accordion_head">Q8.Do I get refunded for unused time?<span class="plusminus">+</span></div>
				  <div class="accordion_body" style="display: none;">
				    <p>We refund for up to 1 hour of unused time over the movers set hourly minimum. The reason for this is because movers turn away other jobs to reserve the time you schedule. It can be difficult to set up schedules when job times are only estimated. You may use our moving labor estimator to help determine how much time will be needed.</p>
				  </div>
				  <div class="accordion_head">Q9.Who will charge my card?<span class="plusminus">+</span></div>
				  <div class="accordion_body" style="display: none;">
				    <p>Hire Movers, LLC will be the name on your statement.</p>
				  </div>
				  

				 
  </div>

  <div class="accordion_container accordion_container_stl_faq page page5" id="during_move_stlr" >
			<h5>DURING THE MOVE</h5>
				  <div class="accordion_head">Q1.What if I need additional time? <span class="plusminus">-</span></div>
					  <div class="accordion_body" >
					    <p>We understand how difficult it is to estimate the correct time for your move. Talk with your mover to find out if they think you will require more or less time, after all they do this for a living. All movers are required to stay AT LEAST 1 hour after the scheduled time is up. Some movers may be able to stay longer depending on their availability. If you need more than 1 hour and the movers are unable to stay longer, we can assist in getting another crew out for at least their required minimum time.</p>
					  </div>
 				 <div class="accordion_head">Q2.Can I tip my mover?<span class="plusminus">+</span></div>
					  <div class="accordion_body" style="display: none;">
					    <p>Yes! If you feel like your mover did an outstanding job it we encourage you to tip them! You can add a tip to your order through the payment release option in the order details on your account. Also, if you felt they did a good job give them a 5 star review to show your appreciation.
	   
						</p>
				  </div>
				<div class="accordion_head">Q3.Do I need to have furniture wrapped?<span class="plusminus">+</span></div>
				  <div class="accordion_body" style="display: none;">
				    <p>It will save you time and prevent any damages to walls/furniture in tight places. If you do not wish to wrap furniture prior you may have the movers wrap your items for you. Be sure to include this in your move details when booking and explain whether you would like the items wrapped inside the house or inside the truck. Allow extra time for prepping furniture. Please be sure to provide furniture pads and/or stretch wrap. If you need any moving material you can purchase some right here on our page! </p>
				  </div>
  				<div class="accordion_head">Q4. Do I need to take items out of drawers? <span class="plusminus">+</span></div>
				  <div class="accordion_body" style="display: none;">
				    <p>We recommend taking items of drawers so that the load is not so heavy. Some furniture may fall apart due to poor quality if there are items packed inside. It can also make some furniture too heavy to safely carry up or down flights of stairs</p>
				  </div>
				  <div class="accordion_head">Q5.Can family/friends move things also? <span class="plusminus">+</span></div>
				  <div class="accordion_body" style="display: none;">
				    <p>This can save time which spares you cash! Although, remember that family and friends probably aren’t professional movers and wont pack a truck as well.</p>
				  </div>
				   
				 
  </div>
  <div class="accordion_container accordion_container_stl_faq page page6" id="complait_stlr" >
			<h5>COMPLAINTS/DAMAGES</h5>
				  <div class="accordion_head">Q1.What if my helper doesn’t show up? <span class="plusminus">-</span></div>
					  <div class="accordion_body" >
					    <p>Call to find out what is going on. Don’t forget they have a 1 hour window for arrival. If they will not respond contact us and we will find you a replacement. We are serious about No-Show violations. Movers that violate this repeatedly will have their rights revoked from advertising on our site and will owe you a fee.</p>
					  </div>
 				 <div class="accordion_head">Q2.Can movers charge hidden fees?<span class="plusminus">+</span></div>
					  <div class="accordion_body" style="display: none;">
					    <p>This is NOT allowed. If they attempt to get extra payment for fees not posted on the site contact us immediately. All fees will be visible in the booking checkout.   
						</p>
				  </div>
				<div class="accordion_head">Q3.What if my mover is running late?<span class="plusminus">+</span></div>
				  <div class="accordion_body" style="display: none;">
				    <p>Movers listed on our marketplace have a 1 hour window of arrival. If it exceeds that the mover may be willing to provide a discount to accomodate for the tardiness. </p>
				  </div>
  				<div class="accordion_head">Q4.How do I file a complaint about a mover?<span class="plusminus">+</span></div>
				  <div class="accordion_body" style="display: none;">
				    <p>Contact your movers and let them know about the issue. If they do not resolve the issue to your satisfaction contact us. If pictures will help resolve the issue please include them. We will step in and evaluate the situation.</p>
				  </div>
				  <div class="accordion_head">Q5.What happens if they break my things? <span class="plusminus">+</span></div>
				  <div class="accordion_body" style="display: none;">
				    <p>If there is any damages talk with your mover to see what they will do about the situation. Many movers are willing to negotiate an agreement to avoid jeopardizing their reputation.</p>
				  </div>
				   
				 
  </div>
   <div class="accordion_container accordion_container_stl_faq page page7" id="review_stlr" >
			<h5>REVIEWS</h5>
				  <div class="accordion_head">Q1.What information is posted with my review?<span class="plusminus">-</span></div>
					  <div class="accordion_body" >
					    <p>Your first name and last initial, including the city and state the move was placed.</p>
					  </div>
 				 <div class="accordion_head">Q2.Who can write a review?<span class="plusminus">+</span></div>
					  <div class="accordion_body" style="display: none;">
					    <p>Only moves booked through HireMovers.org will be eligible to post a review to a mover. The reviews you see on HireMovers are unfiltered real reviews from real people. 
						</p>
				  </div>
				<div class="accordion_head">Q3.Can my review be changed?<span class="plusminus">+</span></div>
				  <div class="accordion_body" style="display: none;">
				    <p>A review or mover response can be changed OR removed by HireMovers if it violates the Terms & Conditions. If you have left a negative review and your mover contacts you to resolve any issues you will be able to change the review for 30 days due to the mover resolving a conflict of interest. We will NEVER change a review for a mover unless a CUSTOMER gives us permission to.</p>
				  </div>
  				<div class="accordion_head">Q4.Can my mover respond to my review?<span class="plusminus">+</span></div>
				  <div class="accordion_body" style="display: none;">
				    <p>Movers are given an opportunity to respond to a review posted to them.</p>
				  </div>
				 <!--  <div class="accordion_head">Q5.What happens if they break my things? <span class="plusminus">+</span></div>
				  <div class="accordion_body" style="display: none;">
				    <p>If there is any damages talk with your mover to see what they will do about the situation. Many movers are willing to negotiate an agreement to avoid jeopardizing their reputation.</p>
				  </div> -->
				   
				 
  </div>
  <div class="accordion_container accordion_container_stl_faq page page8" id="about_us_stlr" >
			<h5>ABOUT US</h5>
				  <div class="accordion_head">Q1.Is HireMovers a moving company?<span class="plusminus">-</span></div>
					  <div class="accordion_body" >
					    <p>No, we are an online marketplace that allows customers to be able to find moving labor services where you can compare and book moving labor. Service providers do not work for us and do not supply a truck.</p>
					  </div>
 				 <div class="accordion_head">Q2.Are movers on HireMovers employees?<span class="plusminus">+</span></div>
					  <div class="accordion_body" style="display: none;">
					    <p>No, Each mover is an independent service provider that advertises their moving labor services on our site. We are here to provide a marketplace for customers and movers throughout their booking process.
						</p>
				  </div>
				
				   
				 
  </div>
  
 
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
function myFunction(){
	$('#page1').show();
	


$('#pagination-demo').show();

	$('#booking_resvr_stlr').hide();
	$('#payment_stlr').hide();
	$('#during_move_stlr').hide();
	$('#complait_stlr').hide();
	$('#review_stlr').hide();
	$('#about_us_stlr').hide();
	window.location.reload();
}
function myFunction1(){
	$('#booking_resvr_stlr').show();
	$('#review_stlr').hide();
	$('#page1').hide();
	$('#page2').hide();
	$('#during_move_stlr').hide();
	$('#complait_stlr').hide();
	$('#payment_stlr').hide();
	$('#about_us_stlr').hide();
	$('#pagination-demo').hide();

}
function myFunction2(){
	// $('#page3').hide();
	$('#payment_stlr').show();
	$('#page1').hide();
	$('#booking_resvr_stlr').hide();
	$('#page2').hide();
	$('#during_move_stlr').hide();
	$('#review_stlr').hide();
	$('#complait_stlr').hide();
	$('#about_us_stlr').hide();
	$('#pagination-demo').hide();
	// $('#page1').hide();
	// $('#page5').hide();
}
function myFunction3(){
	$('#during_move_stlr').show();
	$('#page1').hide();
	$('#booking_resvr_stlr').hide();
	$('#review_stlr').hide();
	$('#page2').hide();
	$('#complait_stlr').hide();
	$('#about_us_stlr').hide();
	$('#payment_stlr').hide();
	$('#pagination-demo').hide();
	// $('#page4').hide();
	// $('#page1').hide();
}
function myFunction4(){
	$('#complait_stlr').show();
	$('#page1').hide();
	$('#page2').hide();
	$('#booking_resvr_stlr').hide();
	$('#review_stlr').hide();
	$('#during_move_stlr').hide();
	
	$('#about_us_stlr').hide();
	$('#payment_stlr').hide();
	$('#pagination-demo').hide();
	// $('#page4').hide();
	// $('#page1').hide();
	// $('#page7').hide();
}
function myFunction5(){
	$('#review_stlr').show();
	$('#page2').hide();
	$('#page1').hide();
	$('#booking_resvr_stlr').hide();
	$('#complait_stlr').hide();
	$('#during_move_stlr').hide();
	$('#about_us_stlr').hide();
	$('#payment_stlr').hide();
	$('#pagination-demo').hide();
	// $('#page1').hide();
	// $('#page8').hide();
	// $('#page6').hide();
	// $('#page5').hide();
	// $('#page2').hide();
}
function myFunction6(){
	$('#about_us_stlr').show();
	$('#page2').hide();
	$('#page1').hide();
	$('#booking_resvr_stlr').hide();
	$('#review_stlr').hide();
	$('#during_move_stlr').hide();
$('#payment_stlr').hide();
	$('#complait_stlr').hide();
	$('#pagination-demo').hide();
	// $('#page1').hide();
}

// function openNav() {
//     document.getElementById("mySidenav").style.width = "250px";
// }

// function closeNav() {
//     document.getElementById("mySidenav").style.width = "0";
// }
</script>