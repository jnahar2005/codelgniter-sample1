</div>
</main> <!-- main hero END -->
<footer>   
    <div class="footerTop">
        <div class="container-fluid">
            <div class="footerTopRow">
                <div class="footerTop-Col">
                    <a href="<?php echo base_url();?>home/faq">Home</a>
                </div>
                <div class="footerTop-Col">
                    <a href="<?php echo base_url();?>testimonial">About Us</a>
                </div>
                <div class="footerTop-Col">
                    <a href="<?php echo base_url(); ?>contact">CONTACT US</a>
                </div>
                <div class="footerTop-Col">
                    <a href="<?php echo base_url();?>testimonial">FAQs</a>
                </div>
            </div>
        </div>
    </div>
    <div class="footerBottom">
        <div class="container-fluid">
            <div class="footerBottomRow">
                <div class="footerBottom-L">
                    <div class="footerLogo">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/08/No_Logo_logo.svg/1200px-No_Logo_logo.svg.png" alt="logo-WT" />
                    </div>
                </div>
                <div class="footerBottom-R">
                    <div class="footerAddress">
                        <p> Atlanta Avenue Beach Us
                            <a href="tel:1-999-888-7777">Phone: (999)-888-7777</a> 
                            <a href="mailto:<?php echo SITE_EMAIL; ?>"><?php echo SITE_EMAIL; ?></a>
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="footerCopyright">
        <div class="container-fluid">
            <p>&copy; Copyright @2019 All Rights Reserved.</p>
        </div>
    </div>
    <a href="javascript void(0);" id="go_top" class="js-scroll-trigger fa fa-angle-up"></a>
</footer>

<!-- Angullar Script -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/controll/login.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/controll/search.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/controll/dashboard.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/controll/appointment.js"></script>

<!-- Scrollbar schedule -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
<script>
(function ($) {
    $(window).load(function () {
        $(".content1").mCustomScrollbar({
            autoHideScrollbar: true,
            theme: "dark"
        });       
    });
})(jQuery);

$('#go_top').click(function(){ 
    $('html,body').animate({ scrollTop: 0 }, 'slow');
    return false; 
});
</script>

<script src="<?php echo base_url(); ?>assets/js/jquery-ui.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/controll/common_footer.js"></script>

<script src="<?php echo base_url(); ?>assets/js/popper.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/owl.carousel.js"></script>

<script>
    /*----------=====
        Print Function 
    =====----------*/
    function printDivSection(setion_id) {
        if (document.readyState === "complete") {
            var Contents_Section = document.getElementById(setion_id).innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = Contents_Section;
            window.print();
            document.body.innerHTML = originalContents;
        }
    }

    /*----------=====
        Success/Error Msg hide function
    =====----------*/    
    setInterval(function(){
        $('.fixed_alert').fadeOut();
    }, 6000);

    /*----------=====
        Home Screen Dynamic scroll
    =====----------*/   
    $("a.js-scroll-trigger").on('click', function(event){
        var headerHeight = $('header').height();
        var target= $(this.hash+"-sec");
        $('body,html').animate({
            'scrollTop': target.offset().top - headerHeight
        }, 450);
        setTimeout(function(){
            var headerHeight2 = $('header').height();
            if(headerHeight != headerHeight2){
                $('body,html').animate({
                    'scrollTop': target.offset().top - headerHeight2
                }, 450);  
            }
        },100);
    });

    var clicked=window.location.hash.substr(1);
    var headerHeight = $('header').height();
    if (window.location.href.indexOf('#'+clicked) > -1) {
       setTimeout(function(){
         if($(window).width() < 1366){
            $('body').animate({
                scrollTop: $('#'+clicked+"-sec").offset().top-headerHeight+30
            }, 1000);   
        }
        else{
            $('body').animate({
                scrollTop: $('#'+clicked+"-sec").offset().top-headerHeight+12
            }, 1000);   
        }
         
       },300);
    }


    /*----------=====
        phoneMask Phone & Extention validationa and limit function
    =====----------*/   
    $(document).ready(function () {
        $('.phoneMask').on('keydown', function(e){
            if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                return false;
            }
            /*var curchr = this.value.length; //229key
            var curval = $(this).val();
            if (curchr == 3 && e.which != 8 && e.which != 0) {
                $(this).val(curval + "-");
            } else if (curchr == 7 && e.which != 8 && e.which != 0) {
                $(this).val(curval + "-");
            }*/
            $(this).attr('maxlength', '10');
            $(this).attr('minlength', '10');
        });        

        $(".phnExt").keypress(function (e) {
            if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                return false;
            }
            $(this).attr('maxlength', '7');
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function () {
        $('#teamslider').owlCarousel({
            loop: true,
            margin: 10,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 1,
                    nav: true
                },
                576: {
                    items: 2,
                    nav: true
                },
                992: {
                    items: 4,
                    nav: true,
                    margin: 20
                }
            }
        });
        $("#bannerslider").owlCarousel({
            navigation: true, // Show next and prev buttons
            loop: true,
             autoplay:true,
            slideSpeed: 300,
            paginationSpeed: 400,
            items: 1,
            itemsDesktop: false,
            autoplayTimeout:10000,
            itemsDesktopSmall: false,
            itemsTablet: false,
            itemsMobile: false

        });
    })
</script>

<script type="text/javascript">
    $(window).scroll(function () {
        if ($(window).scrollTop() >= 10) {
            $('header').addClass('sticky');
        } else {
            $('header').removeClass('sticky');
        }
    });
</script>

<script>
    $('.clickpara').click(function() {
        $(".clickhid").toggleClass('active');
    });
    $("body").on("click",".collapsed1",function(){
        var not = $(this).parents(".panel-default").find(".collapse");
        $(".collapse").not(not).removeClass('show');
    });
</script>
</body>
</html>

