<!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <!-- BEGIN PAGE HEADER-->
                    <h1 class="page-title"> <?php echo $this->lang->line('dashboard'); ?>  
                       
                    </h1>
                    <!-- <?php echo "<pre>";print_r($_SESSION);echo "</pre>"; ?> -->
                    <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <i class="icon-home"></i>
                                <a href="<?php echo $base_url; ?>"><?php echo $this->lang->line('home'); ?> </a>
                                <i class="fa fa-angle-right"></i>
                            </li>
                            <li>
                                <span><?php echo $this->lang->line('dashboard'); ?>  </span>
                            </li>
                        </ul>
                    </div>
                <h3 style="text-align: center;font-weight: bold;">Welcome  <?php echo $user_type;?> :<?php echo $username; ?></h3>
                </div>
            </div>
                <!-- END CONTENT BODY -->

<!--<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script> -->
<link href="<?php echo BASE_URL;?>/assets/global/plugins/bootstrap-table/bootstrap-table.min.css" rel="stylesheet" type="text/css" />
 <script src="<?php echo BASE_URL;?>/assets/global/plugins/bootstrap-table/bootstrap-table.min.js" type="text/javascript"></script>
 <script src="<?php echo BASE_URL;?>/assets/pages/scripts/table-bootstrap.min.js" type="text/javascript"></script>

  <script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-more.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
