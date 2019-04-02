(function ($) {
    "use strict";
    jQuery(document).ready(function ($) {
        
        //        script for banner steps
        
        
        $('#step-1').click(function () {
            //		var email = $('#email').val();
            //			$('#email2').val($('#email').val());
            window.bedroom = $('#berooms-range').slider("option", "value");
            window.bathroom = $('#bathrooms-range').slider("option", "value");
            $('.slider-1').hide();
            $('.slider-2').fadeIn();
            $(".current").text("2 ");
            $('.banner .indicator ul LI:nth-child(2)').removeClass("active");
            $('.banner .indicator ul LI:nth-child(3)').addClass("active");
        });
        
        $('input[name="schedule"]').change(function (e) { // Select the radio input group
            $('.btn').removeClass("active");
            $(this).parent().addClass("active");
            window.schedule = $(this).parent().data('schedule');
            //                console.log($(this).val());
        });
        
        $('#step-2').click(function () {
            if (!$("input:radio[name='schedule']").is(":checked")) {
                alert("Please select a schedule");
            }
            else {
                $('.banner .indicator ul LI:nth-child(3)').removeClass("active");
                $('.banner .indicator ul LI:nth-child(4)').addClass("active");
                //			$('#email2').val($('#email').val());
                $('.slider-2').hide();
                $('.slider-3').fadeIn();
                $(".current").text("3 ");
                setTimeout(function () {
                    $('.slider-3').hide();
                    $('.slider-4').fadeIn();
                    $(".current").text("4 ");
                    $('.banner .indicator ul LI:nth-child(4)').removeClass("active");
                    $('.banner .indicator ul LI:nth-child(5)').addClass("active");
                }, 3000);
            }
        });
        
        $('#step-4').click(function () {
            //		var email = $('#email').val();
            $(".quote-form").submit(function (e) {
                return false;
            });
            window.fname = $('#fname').val();
            window.lname = $('#lname').val();
            $('.slider-4').hide();
            $('.slider-5').fadeIn();
            $(".current").text("5 ");
            $('.banner .indicator ul LI:nth-child(5)').removeClass("active");
            $('.banner .indicator ul LI:nth-child(6)').addClass("active");
        });
        
        $('.step-5').click(function () {
            window.phone = $('#phone').val();
            var data = [bedroom, bathroom, schedule, fname, lname, phone];
            console.log(data);
        });
        
        
        //        For lightcase
        
        
        $('a[data-rel^=lightcase]').lightcase();
        $("input[type=checkbox]").on("click", function () {
            $("input[type=checkbox]:checked+label").addClass("checked");
            $("input[type=checkbox]:checked+label .active-img").show();
            $("input[type=checkbox]:checked+label .hover-img").hide();
        });
        
        
        //        For booking page selection
        
        
        $('input[name="schedule2"]').change(function (e) { // Select the radio input group
            $('.booking-step-sc .btn').removeClass("active");
            $(this).parent().addClass("active");
        });
        $('input[name="payment"]').change(function (e) { // Select the radio input group
            $('.booking-step-5 .btn').removeClass("active");
            $(this).parent().addClass("active");
        });
    });
    jQuery(window).on('load', function () {});
}(jQuery));