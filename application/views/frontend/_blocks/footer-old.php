<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
    <!-- login modal -->

    <div class="modal fade" id="loginmodal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    ×</button>
               
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-8" style="border-right: 1px dotted #C2C2C2;padding-right: 30px;">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#Login" data-toggle="tab">Login</a></li>
                            <li><a href="#Registration" data-toggle="tab">Registration</a></li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane active" id="Login">
                              <?php echo form_open(base_url() . 'home/dashboard' , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?> 
                                <form role="form" class="form-horizontal">
                                <div class="col-md-12">

                                    <label for="email" class="col-sm-2 control-label">
                                        Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" id="email1" placeholder="Email" />
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label for="exampleInputPassword1" class="col-sm-2 control-label">
                                        Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" />
                                    </div>
                                </div>
                                <div class="col-md-12">
                                        <div class="col-sm-2">
                                        </div>
                                        <div class="col-sm-10">
                                            <button type="submit" class="btn  btn_login btn-sm">
                                                Login</button>
                                            <a href="javascript:;">Forgot your password?</a>
                                            <a href="<?php echo $base_url;?>home/vendors_login"><button type='button' class="vendor_login ">Vendor Login</button></a>
                                        </div>
                                  
                                </div>
                                </form>
                                <?php echo form_close(); ?>
                            </div>
                            <div class="tab-pane" id="Registration">
                                <form role="form" class="form-horizontal">
                                <div class="form-group">
                                    <label for="email" class="col-sm-2 control-label">
                                        Name</label>
                                    <div class="col-sm-10">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" placeholder="First Name" />
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" placeholder="Last Name" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email" class="col-sm-2 control-label">
                                        Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" id="email" placeholder="Email" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="mobile" class="col-sm-2 control-label">
                                        Mobile</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" id="mobile" placeholder="Mobile" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="password" class="col-sm-2 control-label">
                                        Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" id="password" placeholder="Password" />
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-sm-2">
                                        </div>
                                        <div class="col-sm-10">
                                            <button type="button" class="btn btn_signup btn-sm">
                                                Signup</button>
                                        </div>
                                    </div>
                                </div>
                                </form>
                            </div>
                            <br><br>
                        </div>
                        <div id="OR" class="hidden-xs">
                            <i class="flaticon-logistics3"></i></div>
                    </div>
                    <div class="col-md-4">
                        <div class="row text-center sign-with">
                            <img src="<?php echo $base_url; ?>/assets/front/images/Logo.svg">
                            <!-- <div class="col-md-12">
                                <h3>
                                    Sign in with</h3>
                            </div>
                            <div class="col-md-12">
                                <div class="btn-group btn-group-justified">
                                    <a href="#" class="btn btn-primary">Facebook</a> <a href="#" class="btn btn-danger">
                                        Google</a>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div><br><br>
            </div>
        </div>
    </div>
</div>

    <!-- footer area -->
    <footer class="footer-area section-padding">
        <div class="footer-top">
            <div class="content">
                <div class="row">
                    <div class="col-md-2 text-sm-left text-center">
                        <div class="footer-logo pb-2">
                            <a href=""><img src="<?php echo $base_url;?>assets/front/images/Logo-Vector.png" alt=""> </a>
                        </div>
                    </div>
                    <div class="col-md-10">
                        <div class="social-icon text-sm-right text-center pb-2">
                            <a href="#"><img src="<?php echo $base_url;?>assets/front/images/fb.png" alt="Facebook"></a>
                            <a href="#"><img src="<?php echo $base_url;?>assets/front/images/twitter.png" alt="Twitter"></a>
                            <a href="#"><img src="<?php echo $base_url;?>assets/front/images/instagram.png" alt="Instagram"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-mid">
            <div class="content">
                <div class="row">
                    <div class="col-lg-9 col-md-12">
                        <div class="footer-mid-left text-sm-left text-center">
                            <div class="footer-single-box">
                                <h6 class="text-uppercase">Lorem Ipsum</h6>
                                <a href="#">
                                    <p><i class="flaticon-logistics3"></i> consectetur</p>
                                </a>
                                <a href="#">
                                    <p><i class="flaticon-logistics3"></i> adipiscing elit</p>
                                </a>
                                <a href="#">
                                    <p><i class="flaticon-logistics3"></i> sed do eiusmod</p>
                                </a>
                                <a href="#">
                                    <p><i class="flaticon-logistics3"></i> tempor incididunt ut</p>
                                </a>
                                <a href="#">
                                    <p><i class="flaticon-logistics3"></i> labore et dolore</p>
                                </a>
                            </div>
                            <div class="footer-single-box">
                                <h6 class="text-uppercase">Lorem Ipsum</h6>
                                <a href="#">
                                    <p><i class="flaticon-logistics3"></i> consectetur</p>
                                </a>
                                <a href="#">
                                    <p><i class="flaticon-logistics3"></i> adipiscing elit</p>
                                </a>
                                <a href="#">
                                    <p><i class="flaticon-logistics3"></i> sed do eiusmod</p>
                                </a>
                                <a href="#">
                                    <p><i class="flaticon-logistics3"></i> tempor incididunt ut</p>
                                </a>
                                <a href="#">
                                    <p><i class="flaticon-logistics3"></i> labore et dolore</p>
                                </a>
                            </div>
                            <div class="footer-single-box">
                                <h6 class="text-uppercase">Lorem Ipsum</h6>
                                <a href="#">
                                    <p><i class="flaticon-logistics3"></i> consectetur</p>
                                </a>
                                <a href="#">
                                    <p><i class="flaticon-logistics3"></i> adipiscing elit</p>
                                </a>
                                <a href="#">
                                    <p><i class="flaticon-logistics3"></i> sed do eiusmod</p>
                                </a>
                                <a href="#">
                                    <p><i class="flaticon-logistics3"></i> tempor incididunt ut</p>
                                </a>
                                <a href="#">
                                    <p><i class="flaticon-logistics3"></i> labore et dolore</p>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-12">
                        <div class="footer-mid-right">
                            <h3 class="text-uppercase">STAY CONNECTED</h3>
                            <div class="footer-newsltr">
                                <form action="">
                                    <div class="ftr-email-form">
                                        <input type="email" name="ftr-email" placeholder="email">
                                        <button class="btn" type="button">sign up</button>
                                    </div>
                                </form>
                            </div>
                            <div class="phone-no"> <img src="<?php echo $base_url;?>assets/front/images/phone.png" alt="Phone">
                                <p>1 (000) 000-0000</p>
                            </div>
                            <div class="envelope"> <img src="<?php echo $base_url;?>assets/front/images/envelope.svg" style="    width: 30px;
    height: 20px;" alt="Envelope">
                                <p>support@loremipsum.com</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="content">
                <div class="row align-items-end">
                    <div class="col-xl-9 col-lg-9 col-md-7 col-sm-8">
                        <p class="copyright">© All right reserved. Template By <a href="http://stallioni.com">stallioni</a></p>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-5 col-sm-4">
                        <p class="ftr-btns"> <a href="#" class="btn">SIGN IN</a> <a href="#" class="btn">BOOK Movers</a> </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
<a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>
<!-- javascript
    ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->


   <!--Scripts-->
    <!-- modernizer js -->
    <script src="<?php echo $base_url;?>assets/front/js/vendor/modernizr-3.5.0.min.js"></script>
    <script type="text/javascript" src="<?php echo $base_url;?>assets/front/js/jquery-3.2.1.js"></script>
    <!-- bootstrap popper js -->
    <script src="<?php echo $base_url;?>assets/front/js/popper_1.12.3.js"></script>
    <!-- bootstrap 4.0.0 beta2 js -->
    <script src="<?php echo $base_url;?>assets/front/js/bootstrap.min.js"></script>
    <script type="text/javascript">
    </script>
    <!-- jquery ui js 1.12.1 js -->
    <script src="<?php echo $base_url;?>assets/front/js/jquery-ui.min.js"></script>
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script src="<?php echo $base_url;?>assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
    <script src="<?php echo $base_url;?>assets/global/plugins/jquery-validation/js/additional-methods.min.js" type="text/javascript"></script>

    <script>
        $(function () {
            // bedrooms slide range
            $("#berooms-range").slider({
                value: 3
                , min: 1
                , max: 10
                , slide: function (event, ui) {
                    var bedroom = $("#bed-no").val(ui.value);
                }
            });
            $("#bed-no").val($("#berooms-range").slider("value"));
            // bathromm slide range
            $("#bathrooms-range").slider({
                value: 1
                , min: 1
                , max: 10
                , slide: function (event, ui) {
                    $("#bath-no").val(ui.value);
                }
            });
            $("#bath-no").val($("#bathrooms-range").slider("value"));
        });
    </script>
    <!-- plugins js -->
    <script src="<?php echo $base_url;?>assets/front/js/plugins.js"></script>
    <script type="text/javascript" src="<?php echo $base_url;?>assets/front/js/lightcase.js"></script>
    <script type="text/javascript" src="<?php echo $base_url;?>assets/front/js/main.js"></script>
    <script type="text/javascript" src="<?php echo $base_url;?>assets/front/js/custom.js"></script>
</body>
</html>