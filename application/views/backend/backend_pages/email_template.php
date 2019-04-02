<script src="http://stallioni.in/551/assets/js/wysihtml5/wysihtml5-0.4.0pre.min.js"></script>
	<script src="http://stallioni.in/551/assets/js/wysihtml5/bootstrap-wysihtml5.js"></script>
<div class="row">
	<!-- student mail -->
	<div class="col-md-6">
		<div class="panel panel-primary" >
			<div class="panel-heading">
				<div class="panel-title">
                       <?php echo ('Mail Content'); ?>
                 </div>
            </div>
			<div class="panel-body">
				<div class="mail-compose">
					<blockquote class="blockquote-blue"> <p> <strong>Shortcode:</strong> </p> <p> <small><strong>{{name}}, {{address}},{{email}}</strong></small> </p> </blockquote><br>
					
					 

						
						<div class="form-group col-md-12">
							<label for="subject"><?php echo ('mail_subject'); ?>:</label>	
							<input type="text" class="form-control" name="mail_subject" placeholder="" value="">
						</div>
						<div class="compose-message-editor form-group col-md-12">
							<label for="subject"><?php echo ('mail_content'); ?>:</label>	

							<textarea row="2" class="form-control wysihtml5" data-stylesheet-url="<?php echo base_url(); ?>/assets/front/css/wysihtml5-color.css"
								name="mail_content" 
								id="sample_wysiwyg" required></textarea>
						</div>
						<br>
						<!-- File adding module -->

						<button type="submit" class="btn btn-success btn-icon pull-right student_parent">
							<?php echo ('save'); ?>
							<i class="entypo-mail"></i>
						</button>
						

                  
					</form>
				</div>
			</div>
		</div>
	</div>
	</div>
<script type="text/javascript">
	// $(".wysihtml5").each(function(i, el)
	// 		{
	// 			var $this = $(el),
	// 				stylesheets = attrDefault($this, 'stylesheet-url', '')
				
	// 			$(".wysihtml5").wysihtml5({
	// 				stylesheets: stylesheets.split(','),
	// 				"image": false,
	// 				"color": false,
	// 			});
	// 		});
	$('.wysihtml51').wysihtml5();
</script>