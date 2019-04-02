<!-- <div class="dummy_top">
	<p>Profile</p>
</div> -->
<div class="content">
	<div class="col-md-12 movers_div">
		<div class="col-md-3 movers_sidebar">

				<div class="col-md-12">
					<div class="movers_pimg">
						<img src="<?php echo $base_url; ?>/<?php echo $this->session->userdata['user_image']; ?>" alt="profile image">
					</div>
					<div class="movers_details">
						<p class="movers_name"><?php echo (isset($this->session->userdata['user_name']))?$this->session->userdata['user_name']:''; ?></p>
						<p class="movers_email"><?php echo (isset($this->session->userdata['user_email']))?$this->session->userdata['user_email']:''; ?></p>
						<p class="movers_phone"><?php echo (isset($this->session->userdata['user_phone']))?$this->session->userdata['user_phone']:''; ?></p>
					</div>
				</div>

		</div>
		<div class="col-md-9">
			<div class="row">
				<div class="col-md-12">
					<!-- <div class="col-md-3"></div> -->
					<div class="col-md-4">
						<div class="movers_menu <?php echo ($current_submenu == 'basic_profile')?'active':'' ?>">
							<a href="<?php echo $base_url; ?>customer/profile"><i class="fa fa-user"></i> Basic profile details</a>
						</div>
					</div>
					<!-- <div class="col-md-4">
						<div class="movers_menu <?php echo ($current_submenu == 'company_details')?'active':'' ?>">
							<a href="<?php echo $base_url; ?>movers/company"><i class="fa fa-user"></i> Company Overview</a>
						</div>
					</div>
					<div class="col-md-4">
						<div class="movers_menu">
							<a href="<?php echo $base_url; ?>movers/reviews"><i class="fa fa-user"></i> Reviews & Rates</a>
						</div>
					</div> -->
					<!-- <div class="col-md-3"></div> -->
				</div>
				<div style="clear:both;"></div>
		<!-- 		<hr> -->
				<div class="col-md-12">
					<?php echo $pagename; ?>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="ajax" role="basic" aria-hidden="true" >
<div class="modal-dialog modal-lg">
    <div class="modal-content">

        <div class="modal-body">
            <img src="<?php echo $base_url;?>assets/global/img/loading-spinner-grey.gif" alt="" class="loading">
            <span> &nbsp;&nbsp;Loading... </span>
        </div>
    </div>
</div>
</div>


<div style="clear:both;"></div>