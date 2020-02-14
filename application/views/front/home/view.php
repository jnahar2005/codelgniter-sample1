<div class="BannerRow">
    <div class="owl-carousel owl-theme" id="bannerslider">
        <div class="item">
            <div class="teamThum"><a href="#"><img src="<?php echo base_url();?>assets/images/Banner-1.jpg"/></a>
                <div class="BannerOverLayer">
                    <div class="container-fluid">
                        <div class="BannerText title2">
                            <h2 class="title">Our Service</h2>
                            <p></p>
                            <ul class="">

                            </ul>
                            <div class="readmore">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="item">
            <div class="teamThum"><a href="#"><img src="<?php echo base_url();?>assets/images/Banner-3.jpg" alt="Banner-3"/></a>
                <div class="BannerOverLayer">
                    <div class="container-fluid">
                        <div class="BannerText title2">
                            <h2 class="title">Our Goals</h2>
                                <p class=""></p>
                                <ul class=" ">

                                </ul>
                                <div class="readmore">
                                   <!--  <a class="js-scroll-trigger" href="#therapists">Read More</a> -->
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="item">
            <div class="teamThum"><a href="#"><img src="<?php echo base_url();?>assets/images/Banner-2.jpg" alt="Banner-2"/></a>
                <div class="BannerOverLayer">
                    <div class="container-fluid">
                        <div class="BannerText title2">
                            <h2 class="title">Why Us</h2>
                                <p></p>
                                <ul class=" ">

                                </ul>
                            <div class="readmore">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style type="text/css">
    .show{ display:none;}
    #load1{ display:none;}
</style>
<script type="text/javascript">
    $(function(){
        $(".show").slice(0,6).show(); 
        $("#load").click(function(e){ 
        e.preventDefault();
        $(".show:hidden").slice(0, 12).show(); 
        if($(".show:hidden").length == 0){ 
           $("#load").css('display','none'); 
           $("#load1").show(); 
        }
    });
    $("#load1").click(function(){
        $(".p").hide();
        $("#load1").css('display','none'); 
        $("#load").css('display','inline');            
    });
});
</script>