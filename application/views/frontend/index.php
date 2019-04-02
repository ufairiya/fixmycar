 <!--Banner Area-->
    <section class="banner bg banner-bg">
        <!--       Indicator-->
        <div class="indicator">
            <ul>
                <li class="slide-count"><span class="current">1 </span>/<span> 5</span></li>
                <li class="active"></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
            </ul>
        </div>
        <div class="slider-area">
            <div class="slider-area-inner myslide">
                <div class="content">
                    <div class="row justify-content-center">
                        <div class="col-lg-10  text-center">
                            <div class="single-slider slider-1">
                                <p class="slider-title">Get a Free <span class="text-uppercase slider-span">INSTANT</span> quote from the premier cleaning company.</p>
                                <p class="sub-title">Simply select the number of bedrooms/bathrooms in your home.</p>
                                <div class="slider-range">
                                    <div class="bedrooms">
                                        <p>
                                            <label for="bed-no">Bedrooms:</label>
                                            <input type="text" id="bed-no"> </p>
                                        <div id="berooms-range"> </div>
                                    </div>
                                    <div class="bathrooms">
                                        <p>
                                            <label for="bath-no">Bathrooms:</label>
                                            <input type="text" id="bath-no"> </p>
                                        <div id="bathrooms-range"></div>
                                    </div>
                                </div>
                                <div class="continue-btn text-center text-capitalize">
                                    <input class="btn-mb" id="step-1" type="submit" value="continue" name="continue"> </div>
                            </div>
                            <div class="single-slider slider-2" style="display: none;">
                                <p class="slider-title">How often would you like us to come?</p>
                                <form action="" class="choice-form form-inline justify-content-center px-3">
                                    <button data-schedule="1" type="button" class="btn mr-2 mb-3">
                                        <input type="radio" name="schedule">Just one time</button>
                                    <button data-schedule="2" type="button" class="btn mr-2 mb-3">
                                        <input type="radio" name="schedule">Weekly
                                        <br><span>save 15%</span></button>
                                    <button data-schedule="3" type="button" class="btn mr-2 mb-3">
                                        <input type="radio" name="schedule">Bi-weekly
                                        <br><span>save 10%</span></button>
                                    <button data-schedule="4" type="button" class="btn mb-3">
                                        <input type="radio" name="schedule">Monthly
                                        <br><span>save 5%</span></button>
                                </form>
                                <div class="continue-btn text-center text-capitalize">
                                    <input class="btn-mb" type="submit" value="continue" name="continue" id="step-2"> </div>
                            </div>
                            <div class="single-slider slider-3" style="display: none;">
                                <p class="slider-title"><span class="slider-span">Calculating</span> quote...</p>
                                <div class="calculating"> <img src="<?php echo $base_url;?>assets/front/images/cleaning.png" alt="Calculating"> </div>
                            </div>
                            <div class="single-slider slider-4" style="display: none;">
                                <p class="slider-title"><span class="slider-span">Get ready to view your quote!</span></p>
                                <div class="form-title">
                                    <p>What’s your <b>first</b> and <b>last</b> name?</p>
                                </div>
                                <form action="" class="quote-form form-inline justify-content-center px-3">
                                    <input class="form-control mr-md-3 mr-sm-0 mb-3" type="text" name="fname" id="fname" placeholder="first name">
                                    <input class="form-control mr-md-3 mr-sm-0 mb-3" type="text" name="lname" id="lname" placeholder="last name">
                                    <input class="form-control mb-3" type="submit" id="step-4" value="Continue"> </form>
                                <div class="quote-img"> <img src="<?php echo $base_url;?>assets/front/images/quotewhite.png" alt="Quote"> </div>
                            </div>
                            <div class="single-slider slider-5" style="display: none;">
                                <p class="slider-title"><span class="slider-span">Get ready to view your quote!</span></p>
                                <div class="form-title">
                                    <p>What’s your <b>phone number?</b></p>
                                </div>
                                <form action="" class="quote-form form-inline justify-content-center px-3">
                                    <input class="form-control mr-md-3 mr-sm-0 mb-3" type="text" name="phone" id="phone" placeholder="(       )">
                                    <input class="form-control step-5 mb-3" type="submit" id="quote" value="Get Quotes!"> </form>
                                <div class="quote-img"> <img src="<?php echo $base_url;?>assets/front/images/quote.png" alt="Quote"> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--   How it works-->
    <section class="how-it-works section-padding">
        <div class="how-it-works-inner content">
            <div class="section-title text-center">
                <h2>
                   HOW IT WORKS
               </h2> </div>
            <div class="section-content row text-center">
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                    <div class="content-inner"> <img src="<?php echo $base_url;?>assets/front/images/how-1-image.png" alt="Workflow">
                        <div class="workflow-box">
                            <div class="workflow-box-inner"> <img src="<?php echo $base_url;?>assets/front/images/How-1-icon.svg" alt="work-icon">
                                <h3>BOOK ONLINE</h3>
                                <h5>Select the date and time you’d like your professional to show up.</h5> </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                    <div class="content-inner"> <img src="<?php echo $base_url;?>assets/front/images/how-12image.png" alt="Workflow">
                        <div class="workflow-box">
                            <div class="workflow-box-inner"> <img src="<?php echo $base_url;?>assets/front/images/How-2-icon.svg" alt="work-icon">
                                <h3>CLEAN</h3>
                                <h5>A certified cleaner comes over and
cleans your place.</h5> </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                    <div class="content-inner"> <img src="<?php echo $base_url;?>assets/front/images/how-3-image.png" alt="Workflow">
                        <div class="workflow-box">
                            <div class="workflow-box-inner"> <img src="<?php echo $base_url;?>assets/front/images/How-3-icon.svg" alt="work-icon">
                                <h3>RELAX</h3>
                                <h5>Sit back and relax. Enjoy your sparkling home!</h5> </div>
                        </div>
                    </div>
                </div> <a href="#" class="bttn">Book Now</a> </div>
        </div>
    </section>
    <!--Video Area-->
    <div class="video-section section-padding bg video-bg text-center">
        <h2>“The quality of their work speaks volumes of them”</h2>
        <a href="https://www.youtube.com/embed/ZZPoSXKZvaE" data-rel="lightcase"> <img src="<?php echo $base_url;?>assets/front/images/play-icon.svg" alt="Play-icon"></a>
        <p>LISA, .RECURRING CUSTOMER</p>
    </div>
    <!--   criteria Area-->
    <section class="criteria criteria-bg section-padding">
        <div class="content">
            <div class="section-title text-center">
                <h2>Finding trusted cleaners for you.</h2>
                <p>We know inviting someone into your home is a big deal. All Lorem Ipsum cleaners are carefully vetted by us so we choose the right person to care for your home.
                    <br>
                    <br>We guarantee your Lorem Ipsum cleaner will always be:</p>
            </div>
            <div class="section-content">
                <div class="criteria-box">
                    <div class="icon"> <img src="<?php echo $base_url;?>assets/front/images/how-1.svg" alt="Criteria"> </div>
                    <p>Experienced & professional</p>
                </div>
                <div class="criteria-box">
                    <div class="icon"> <img src="<?php echo $base_url;?>assets/front/images/how-2.svg" alt="Criteria"> </div>
                    <p>English speaking</p>
                </div>
                <div class="criteria-box">
                    <div class="icon"> <img src="<?php echo $base_url;?>assets/front/images/how-3.svg" alt="Criteria"> </div>
                    <p>Background & reference checked</p>
                </div>
                 <!-- <div class="criteria-box">
                    <div class="icon"> <img src="<?php //echo $base_url;?>assets/front/images/how-4.svg" alt="Criteria"> </div> 
                    <p>Interviewed in-person </p>
                </div>  -->
                <div class="criteria-box">
                    <div class="icon"> <img src="<?php echo $base_url;?>assets/front/images/how-5.svg" alt="Criteria"> </div>
                    <p>Highly rated by other Ipsum customers </p>
                </div>
            </div>
        </div>
    </section>
    <!--    Apps area-->
    <section class="apps section-padding">
        <div class="content"> <img src="<?php echo $base_url;?>assets/front/images/hone.png" alt="Phone">
            <div class="app-store">
                <h2>BOOK ON THE RUN

</h2>
                <p> We're mobile friendly. Book just as easily from your mobile phone or tablet as you can on your computer.</p>
                <a href=""><img src="<?php echo $base_url;?>assets/front/images/app_store.svg" alt=""></a>
            </div>
        </div>
    </section>
    <!--   Customer Area-->
    <section class="customer section-padding bg customer-bg">
        <div class="content">
            <div class="section-title">
                <h2>THE HIGHEST STANDARDS. THE HAPIEST CUSTOMERS</h2> </div>
            <div class="section-content">
                <div id="demo" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <!--
                    <ul class="carousel-indicators">
                        <li data-target="#demo" data-slide-to="0" class="active"></li>
                        <li data-target="#demo" data-slide-to="1"></li>
                        <li data-target="#demo" data-slide-to="2"></li>
                    </ul>
-->
                    <!-- The slideshow -->
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="item-inner text-center"> <img src="<?php echo $base_url;?>assets/front/images/quoat.png" alt="Quote">
                                <h4>[Your Company Name] cleaned my home today - they did a terrific job. They even moved the folding chairs beside the washer to be sure the laundry floor was cleaned - they really paid attention to detail. Thank you!</h4>
                                <p>MARK, NORTH LYNNWOOD</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="item-inner text-center"> <img src="<?php echo $base_url;?>assets/front/images/quoat.png" alt="Quote">
                                <h4>[Your Company Name] cleaned my home today - they did a terrific job. They even moved the folding chairs beside the washer to be sure the laundry floor was cleaned - they really paid attention to detail. Thank you!</h4>
                                <p>MARK, NORTH LYNNWOOD</p>
                            </div>
                        </div>
                    </div>
                    <!-- Left and right controls -->
                    <a class="carousel-control-prev" href="#demo" data-slide="prev"> <img src="<?php echo $base_url;?>assets/front/images/indicator-left.svg" alt="Indicator" class="indicator"> </a>
                    <a class="carousel-control-next" href="#demo" data-slide="next"><img src="<?php echo $base_url;?>assets/front/images/indicator-right.svg" alt="Indicator" class="indicator"></a>
                </div>
            </div>
        </div>
    </section>
    <!--    Trust Area-->
    <section class="trust section-padding bg trust-bg">
        <div class="section-title text-center">
            <h2>Your trust and security <br>
are our priority</h2> </div>
        <div class="content row text-center">
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                <div class="trusu-inner">
                    <div class="icon"> <img src="<?php echo $base_url;?>assets/front/images/trust1.svg" alt="Icon"> </div>
                    <h5>SAVES YOU TIME</h5>
                    <p>Lorem Ipsum helps you live smarter, giving you time to focus on what’s most important.</p>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                <div class="trusu-inner">
                    <div class="icon"> <img src="<?php echo $base_url;?>assets/front/images/trust2.svg" alt="Icon"> </div>
                    <h5>ONLY THE BEST QUALITY</h5>
                    <p>Our skilled professionals go above and beyond on every job. </p>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                <div class="trusu-inner">
                    <div class="icon"> <img src="<?php echo $base_url;?>assets/front/images/trust3.svg" alt="Icon"> </div>
                    <h5>SAFETY FIRST</h5>
                    <p>We rigorously vet all of our Cleaners, who undergo identity checks as well as in-person interviews.</p>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                <div class="trusu-inner">
                    <div class="icon"> <img src="<?php echo $base_url;?>assets/front/images/trust4.svg" alt="Icon"> </div>
                    <h5>EASY TO GET HELP</h5>
                    <p>Select your ZIP code, number of bedrooms and bathrooms, date and relax while we take care of your home.</p>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                <div class="trusu-inner">
                    <div class="icon"> <img src="<?php echo $base_url;?>assets/front/images/trust5.svg" alt="Icon"> </div>
                    <h5>CASH-FREE PAYMENT</h5>
                    <p>Pay securely online only when the cleaning is complete.</p>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                <div class="trusu-inner">
                    <div class="icon"> <img src="<?php echo $base_url;?>assets/front/images/trust6.svg" alt="Icon"> </div>
                    <h5>Seamless communication</h5>
                    <p>Online communication makes it easy for you to stay in touch with your Cleaners.</p>
                </div>
            </div>
        </div> <a href="" class="bttn">Book Now</a> </section>
    <!-- Newsletter area  -->
    <section class="newsletter section-padding">
        <div class="section-title text-center">
            <h2>YOU’RE A STEP AWAY FROM HAPPY HOME</h2> </div>
        <div class="subscription text-center">
            <form action="">
                <div class="email-field">
                    <input type="email" name="email" placeholder="Enter Your Email Address"> </div>
                <div class="submit-field">
                    <input type="submit" name="submit" value="Book a cleaning now"> </div>
            </form>
        </div>
    </section>
    <!--   Clients area-->
    <section class="clients" style="background: #F3F3F3; margin: 0 auto; text-align: center;"> <img src="<?php echo $base_url;?>assets/front/images/client.png" alt="Clients"> </section>