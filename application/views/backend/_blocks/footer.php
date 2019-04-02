<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
     </div>
   
        <!-- END CONTAINER -->
        <!-- BEGIN FOOTER -->
        <div class="page-footer" style="display: none;">
			<?php 
			 $lang = $this->session->site_lang; 
			?>
            
            <div class="page-footer-inner" >
            <p class="copyright">© All rights reserved HireMovers LLC</p>
            <!-- <?php echo date('Y');?> &copy; <?php echo SITE_NAME;?> By HireMovers LLC -->
              <!-- <a target="_blank" href="http://stallioni.com/">Stallioni</a> &nbsp; -->
                <div class="scroll-to-top">
                    <i class="icon-arrow-up"></i>
                </div>
            </div>
        <!-- BEGIN CORE PLUGINS -->
		<script src="<?php echo $base_url;?>assets/sign/jSignature.js"></script>
        <script src="<?php echo $base_url;?>assets/sign/plugins/jSignature.CompressorBase30.js"></script>
        <script src="<?php echo $base_url;?>assets/sign/plugins/jSignature.CompressorSVG.js"></script>
        <script src="<?php echo $base_url;?>assets/sign/plugins/jSignature.UndoButton.js"></script> 
        <script src="<?php echo $base_url;?>assets/sign/plugins/signhere/jSignature.SignHere.js"></script> 

        <script src="<?php echo $base_url;?>assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
        <script src="<?php echo $base_url;?>assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="<?php echo $base_url;?>assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="<?php echo $base_url;?>assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        
         <script src="<?php echo $base_url;?>assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="<?php echo $base_url;?>assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
        <script src="<?php echo $base_url;?>assets/global/plugins/jquery-validation/js/additional-methods.min.js" type="text/javascript"></script>
        <script src="<?php echo $base_url;?>assets/global/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
        <script src="<?php echo $base_url;?>assets/global/plugins/moment.min.js" type="text/javascript"></script>
        <script src="<?php echo $base_url;?>assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js" type="text/javascript"></script>
        <script src="<?php echo $base_url;?>assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
        <script src="<?php echo $base_url;?>assets/global/plugins/morris/morris.min.js" type="text/javascript"></script>
        <script src="<?php echo $base_url;?>assets/global/plugins/morris/raphael-min.js" type="text/javascript"></script>
        <script src="<?php echo $base_url;?>assets/global/plugins/counterup/jquery.waypoints.min.js" type="text/javascript"></script>
        <script src="<?php echo $base_url;?>assets/global/plugins/counterup/jquery.counterup.min.js" type="text/javascript"></script>
        <script src="<?php echo $base_url;?>assets/global/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
        <script src="<?php echo $base_url;?>assets/global/plugins/flot/jquery.flot.min.js" type="text/javascript"></script>
        <script src="<?php echo $base_url;?>assets/global/plugins/flot/jquery.flot.resize.min.js" type="text/javascript"></script>
        <script src="<?php echo $base_url;?>assets/global/plugins/flot/jquery.flot.categories.min.js" type="text/javascript"></script>
        <script src="<?php echo $base_url;?>assets/global/plugins/jquery-easypiechart/jquery.easypiechart.min.js" type="text/javascript"></script>
        <script src="<?php echo $base_url;?>assets/global/plugins/jquery.sparkline.min.js" type="text/javascript"></script>
        <script src="<?php echo $base_url;?>assets/global/plugins/jqvmap/jqvmap/jquery.vmap.js" type="text/javascript"></script>
        <script src="<?php echo $base_url;?>assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.russia.js" type="text/javascript"></script>
        <script src="<?php echo $base_url;?>assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.world.js" type="text/javascript"></script>
        <script src="<?php echo $base_url;?>assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.europe.js" type="text/javascript"></script>
        <script src="<?php echo $base_url;?>assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.germany.js" type="text/javascript"></script>
        <script src="<?php echo $base_url;?>assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.usa.js" type="text/javascript"></script>
        <script src="<?php echo $base_url;?>assets/global/plugins/jqvmap/jqvmap/data/jquery.vmap.sampledata.js" type="text/javascript"></script>
        <script src="<?php echo $base_url;?>assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="<?php echo $base_url;?>assets/global/scripts/app.min.js" type="text/javascript"></script>
        
        <script src="<?php echo $base_url;?>assets/global/plugins/bootstrap-sweetalert/sweetalert.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="<?php echo $base_url;?>assets/global/scripts/datatable.js" type="text/javascript"></script>
        <script src="<?php echo $base_url;?>assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
        <script src="<?php echo $base_url;?>assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
        <script src="<?php echo $base_url;?>assets/pages/scripts/dashboard.min.js" type="text/javascript"></script>
        <script src="<?php echo $base_url;?>assets/pages/scripts/ui-modals.min.js" type="text/javascript"></script>
        <script src="<?php echo $base_url;?>assets/global/plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js" type="text/javascript"></script>
        <script src="<?php echo $base_url;?>assets/pages/scripts/form-wizard.js" type="text/javascript"></script>
		<script src="<?php echo $base_url;?>assets/global/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js" type="text/javascript"></script>
        <script src="<?php echo $base_url;?>assets/global/plugins/jquery-minicolors/jquery.minicolors.min.js" type="text/javascript"></script>

        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="<?php echo $base_url;?>assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
        <script src="<?php echo $base_url;?>assets/layouts/layout2/scripts/layout.min.js" type="text/javascript"></script>
        <script src="<?php echo $base_url;?>assets/layouts/layout2/scripts/demo.min.js" type="text/javascript"></script>
        <script src="<?php echo $base_url;?>assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
        <script src="<?php echo $base_url;?>assets/layouts/global/scripts/quick-nav.min.js" type="text/javascript"></script>
        <script src="<?php echo $base_url;?>assets/global/plugins/bootstrap-summernote/summernote.min.js" type="text/javascript"></script>
        
         <script src="<?php echo $base_url;?>assets/global/plugins/bootstrap-toastr/toastr.min.js" type="text/javascript"></script>
         <script src="<?php echo $base_url;?>assets/global/plugins/jquery-repeater/jquery.repeater.js" type="text/javascript"></script>
          <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="<?php echo $base_url;?>assets/pages/scripts/form-repeater.js" type="text/javascript"></script>
        <script src="<?php echo $base_url;?>assets/pages/scripts/components-date-time-pickers.js" type="text/javascript"></script>
         <script src="<?php echo $base_url;?>assets/pages/scripts/components-color-pickers.min.js" type="text/javascript"></script>
          <script type="text/javascript" src="<?php echo $base_url;?>assets/icon/bootstrap-iconpicker/js/iconset/iconset-all.min.js"></script>
        <script type="text/javascript" src="<?php echo $base_url;?>assets/icon/bootstrap-iconpicker/js/bootstrap-iconpicker.js"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <script src="<?php echo $base_url;?>assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
        <!-- END THEME LAYOUT SCRIPTS -->

        <script src="<?php echo BASE_URL;?>/assets/global/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js" type="text/javascript"></script>
        <script src="<?php echo BASE_URL;?>/assets/pages/scripts/form-input-masks.js" type="text/javascript"></script>

        <?php if($this->uri->segment(1) == 'purchase_order'){ ?> 

        <link href="<?php echo BASE_URL;?>/assets/global/plugins/bootstrap-select/css/bootstrap-select.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo BASE_URL;?>/assets/global/plugins/jquery-multi-select/css/multi-select.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo BASE_URL;?>/assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo BASE_URL;?>/assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo BASE_URL;?>/assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" /> 

        <script src="<?php echo BASE_URL;?>/assets/global/plugins/bootstrap-select/js/bootstrap-select.min.js" type="text/javascript"></script>
        <script src="<?php echo BASE_URL;?>/assets/global/plugins/jquery-multi-select/js/jquery.multi-select.js" type="text/javascript"></script>
        <script src="<?php echo BASE_URL;?>/assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
        <script src="<?php echo BASE_URL;?>/assets/pages/scripts/components-multi-select.min.js" type="text/javascript"></script>  
        <link href="<?php echo BASE_URL;?>/assets/global/plugins/bootstrap-table/bootstrap-table.min.css" rel="stylesheet" type="text/css" />
       <script src="<?php echo BASE_URL;?>/assets/global/plugins/bootstrap-table/bootstrap-table.min.js" type="text/javascript"></script>

       <script src="<?php echo BASE_URL;?>/assets/pages/scripts/table-bootstrap.min.js" type="text/javascript"></script>
       <script src="<?php echo BASE_URL;?>/assets/global/plugins/bootstrap-sweetalert/sweetalert.min.js" type="text/javascript"></script>
       <script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js" type="text/javascript"></script>  

        <link href="<?php echo BASE_URL;?>/assets/global/plugins/bootstrap-table/bootstrap-table.min.css" rel="stylesheet" type="text/css" />
        <script src="<?php echo BASE_URL;?>/assets/global/plugins/bootstrap-table/bootstrap-table.min.js" type="text/javascript"></script>
      

        <?php } ?>

       
    </body>
 </html>
