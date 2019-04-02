<!-- end header -->
<section id="top-header">
		<div class="container">
			<form class ="form-inline" role="form">				
			<div class="row">
			<div class="col-md-12">
					<div class ="form-group top-drop ">
						<label for="Query">Custom Query : </label>
						
						<?php 
							$queryAttr = array(
								'class' =>'form-control query_select',
								'style' => 'width:150px;'
							);
						 //$country = array('all'=> 'All') + $query;
						 echo form_dropdown('region',$query_values,'',$queryAttr);
						?>
						
					</div>
					
					
					<div class ="form-group top-drop ">
						<label for="Regions">Country : </label>
						
						<?php 
							$countryAttr = array(
								'class' =>'form-control country_select',
								'style' => 'width:150px;'
							);
						 $country = array('all'=> 'All') + $country;
						 echo form_dropdown('region',$country,'',$countryAttr);
						?>
						
					</div>
					
					<div class ="form-group top-drop ">
						<label for="Regions">Regions : </label>
						
						<?php 
							$regionAttr = array(
								'class' =>'form-control region1_select',
								'style' => 'width:150px;'
							);
						 $region = array('all'=> 'All') + $region;
						 echo form_dropdown('region',$region,'',$regionAttr);
						?>
						
					</div>
				
			
					<div class ="form-group top-drop ">
						<label for="Regions">Provinces : </label>
						<?php 
							$provincesAttr = array(
								'class' =>'form-control provinces_select',
								'style' => 'width:150px;'
							);
						 $province = array('all'=> 'All') + $province;
						 echo form_dropdown('provinces',$province,'',$provincesAttr);
						?>
					</div>
			
					<div class ="form-group top-drop ">
						<label for="Regions">Municipalities : </label>
						<?php 
							$municipalityAttr = array(
								'class' =>'form-control municipality_select',
								'style' => 'width:150px;'
							);
						 $municipality = array('all'=> 'All') + $municipality;
						 echo form_dropdown('municipality',$municipality,'',$municipalityAttr);
						?>
					</div>
				
           
			
				</div>
				 </form>
			
			</div>
			<div style="clear:both;"></div>	
		</div>
	</section>
	<section id="banner">
	 
	 <?php echo $map['html']; ?>


 
	</section> 
	
	
	<section id="content">
	
	
	<div class="container">
	    	<div class="row">
			<div class="col-md-12">
				<div class="aligncenter"><h2 class="aligncenter">Our Services</h2>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores quae porro consequatur aliquam, incidunt eius magni provident, doloribus omnis minus ovident, doloribus omnis minus temporibus perferendis nesciunt..</div>
				<br/>
			</div>
		</div>

	 <div class="row">
            <div class="col-sm-4 info-blocks">
                <i class="icon-info-blocks fa fa-bell-o"></i>
                <div class="info-blocks-in">
                    <h3>Consulting</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores quae porro consequatur aliquam, incidunt</p>
                </div>
            </div>
            <div class="col-sm-4 info-blocks">
                <i class="icon-info-blocks fa fa-hdd-o"></i>
                <div class="info-blocks-in">
                    <h3>Strategy</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores quae porro consequatur aliquam, incidunt</p>
                </div>
            </div>
            <div class="col-sm-4 info-blocks">
                <i class="icon-info-blocks fa fa-lightbulb-o"></i>
                <div class="info-blocks-in">
                    <h3>Analysis</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores quae porro consequatur aliquam, incidunt</p>
                </div>
            </div>
        </div>
<div class="row">
            <div class="col-sm-4 info-blocks">
                <i class="icon-info-blocks fa fa-code"></i>
                <div class="info-blocks-in">
                    <h3>Investment</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores quae porro consequatur aliquam, incidunt</p>
                </div>
            </div>
            <div class="col-sm-4 info-blocks">
                <i class="icon-info-blocks fa fa-compress"></i>
                <div class="info-blocks-in">
                    <h3>Creative</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores quae porro consequatur aliquam, incidunt</p>
                </div>
            </div>
            <div class="col-sm-4 info-blocks">
                <i class="icon-info-blocks fa fa-html5"></i>
                <div class="info-blocks-in">
                    <h3>24/7 Support</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores quae porro consequatur aliquam, incidunt</p>
                </div>
            </div>
        </div>
	</div>
	</section>
	
	<section class="section-padding gray-bg">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="section-title text-center">
						<h2>Our Organization</h2>
						<p>Curabitur aliquet quam id dui posuere blandit. Donec sollicitudin molestie malesuada Pellentesque <br>ipsum id orci porta dapibus. Vivamus suscipit tortor eget felis porttitor volutpat.</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6 col-sm-6">
					<div class="about-text">
						<p>Grids is a responsive Multipurpose Template. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur aliquet quam id dui posuere blandit. Donec sollicitudin molestie malesuada. Pellentesque in ipsum id orci porta dapibus. Vivamus suscipit tortor eget felis porttitor volutpat.</p>

						<ul class="withArrow">
							<li><span class="fa fa-angle-right"></span> Lorem ipsum dolor sit amet</li>
							<li><span class="fa fa-angle-right"></span> consectetur adipiscing elit</li>
							<li><span class="fa fa-angle-right"></span> Curabitur aliquet quam id dui</li>
							<li><span class="fa fa-angle-right"></span> Donec sollicitudin molestie malesuada.</li>
						</ul>
						<a href="#" class="btn btn-primary">Learn More</a>
					</div>
				</div>
				<div class="col-md-6 col-sm-6">
					<div class="about-image">
						<img src="<?php echo $base_url;?>assets/front/img/about.png" alt="About Images">
					</div>
				</div>
			</div>
		</div>
	</section>	  


<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyD5tcZNq_JDuSeMaulSJxsTV5pW4l7k-K0&sensor=false"></script>
	<div class="mapjs">
<?php echo $map['js']; ?>
</div>

	
<script>
jQuery(document).ready(function(){
	jQuery(document).on('change','.country_select',function(){
		var country_id = jQuery(".country_select").val();
		jQuery.ajax({
			url : '<?php echo $base_url?>/home1/selected_country',
			type: 'POST',
			data: {"country_id" :country_id },
			dataType: 'json',
			success:function(response){
				console.log(response['map']);
				console.log(response['map']['html']);
				console.log(response['map']['js']);
				jQuery(".region1_select").html(response['region_select']);
				jQuery(".provinces_select").html(response['province_select']);
				jQuery(".municipality_select").html(response['municipality_select']);
				jQuery("#banner").html(response['map']['html']);
				jQuery(".mapjs").html(response['map']['js']);
				initialize_map();
				
			}
		});
	});
	jQuery(document).on('change','.region1_select',function(){
		var region1_id = jQuery(".region1_select").val();
		var country_id = jQuery(".country_select").val();
		jQuery.ajax({
			url : '<?php echo $base_url?>/home1/selected_region1',
			type: 'POST',
			data: {"region1_id" :region1_id,'country_id' : country_id },
			dataType: 'json',
			success:function(response){
				jQuery(".provinces_select").html(response['province_select']);
				jQuery(".municipality_select").html(response['municipality_select']);
				jQuery("#banner").html(response['map']['html']);
				jQuery(".mapjs").html(response['map']['js']);
				initialize_map();
			}
		});
	});
	jQuery(document).on('change','.provinces_select',function(){
		var province_id = jQuery(".provinces_select").val();
		var region1_id = jQuery(".region1_select").val();
		var country_id = jQuery(".country_select").val();
		jQuery.ajax({
			url : '<?php echo $base_url?>/home1/selected_province',
			type: 'POST',
			data: {country_id: country_id ,"province_id" :province_id,region1_id: region1_id },
			dataType: 'json',
			success:function(response){
				jQuery(".municipality_select").html(response['municipality_select']);
				jQuery("#banner").html(response['map']['html']);
				jQuery(".mapjs").html(response['map']['js']);
				initialize_map();
			}
		});
	});
	jQuery(document).on('change','.municipality_select',function(){
		var province_id = jQuery(".provinces_select").val();
		var region1_id = jQuery(".region1_select").val();
		var country_id = jQuery(".country_select").val();
		var municipality_id = jQuery(".municipality_select").val();
		jQuery.ajax({
			url : '<?php echo $base_url?>/home1/selected_municipality',
			type: 'POST',
			data: {"province_id" :province_id,country_id: country_id ,region1_id: region1_id,municipality_id: municipality_id},
			dataType: 'json',
			success:function(response){
				jQuery("#banner").html(response['map']['html']);
				jQuery(".mapjs").html(response['map']['js']);
				initialize_map();
			}
		});
	});
});
</script>
