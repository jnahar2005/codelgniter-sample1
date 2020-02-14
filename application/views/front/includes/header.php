<html lang="en">
    <head>
        <title><?php echo isset($meta_title)?$meta_title:'abc Title' ?></title>
        <meta name="description" content="<?php echo isset($meta_description)?$meta_description:'Description is an online healthcare platform that provide Physical Therapy services'?>" />
        <meta name="keywords" content="<?php echo isset($meta_keywords)?$meta_keywords:'keywords'?>" />
        <meta name="google-site-verification" content="Wny59tI82EWyG60NGOb0pDoN42T0QY_8PB2jKZAdNls" />
        <meta charset="windows-1252">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1,user-scalable=0"/>
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/owl.carousel.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery.mCustomScrollbar.css" />
    
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/CustomStyle.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/custom.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/Responsive.css">  
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery-ui.min.css">
        <script src="<?php echo base_url(); ?>assets/js/jquery-3.3.1.min.js"></script>
        <!-- <script src="https://use.fontawesome.com/6c84d5248d.js"></script> -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/font-awesome/css/font-awesome.min.css">
        <!-- <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.2.22/angular.min.js"></script> -->
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/controll/common_header.js"></script>
        <script type="text/javascript">
            var base_url = "<?php echo base_url(); ?>";
            var AWS_IMAGE_URL = "<?php echo AWS_IMAGE_URL; ?>";
        </script>

        <link rel="icon" href="<?=base_url()?>bridgefav.png" type="image/gif">
    </head>
    <body ng-app='App' class="<?php if(isset($_SESSION['logged_in'])&& $_SESSION['logged_in']=='1'){echo "app_login"; }; ?>">
        <header class="header" id="myHeader">
            <div class="container-fluid">
                <div class="headerRow">
                    <div class="header-L">
                        <a href="<?php echo base_url();?>">
                            <div class="logo">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/08/No_Logo_logo.svg/1200px-No_Logo_logo.svg.png" style="width: 145px;" alt="Logo-WT"/>
                            </div>
                        </a>
                    </div>
                    
                      <div class="header-M">
                        <div class="togglebar" id="js-navbar-toggle"><i class="fa fa-bars" aria-hidden="true"></i></div>

                          <nav class="headermenu fill">
                             <ul id="js-menu" class="main-nav">
                                <li><a href="<?php echo base_url(); ?>">Home</a></li>

                                <li><a href="<?php echo base_url(); ?>#aboutus" class="js-scroll-trigger">About Us</a></li>
                                
                                <li><a href="<?php echo base_url(); ?>#aboutus" class="js-scroll-trigger">Contact Us</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="header-R">
                        <div class="headerSocialIcon">
                            <ul>
                                <li><a href="#" target='_blank'><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
                                <li><a href="#" target='_blank'><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="#" target='_blank'><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                <li><a href="#" target='_blank'><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                        <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == '1') { ?>
                            <div class="logoutbox">
                                <a href="<?php echo base_url(); ?>home/logout" class="btn btn-primary">Log Out</a>
                            </div>
                        <?php } else { ?>
                            <div class="loginRow">
                                <?php $attributes = array('id'=>'frm1','name'=>"loginForm",'method'=>'post','class'=>"form-horizontal clearfix",'autocomplete'=>'off');
                                    echo form_open_multipart("register/pt", $attributes); ?>
                                    <span class="loginform_error" ></span>
                                    <div class="loginRowCol">
                                        <input type="hidden" id="hidden_path_info" name="hidden_path_info" value="<?php if(isset($_SERVER['PATH_INFO'])&& $_SERVER['PATH_INFO']!=''){echo $_SERVER['PATH_INFO'];}else{echo '';}?>">
                                        <input type="email" id="username" name="username" placeholder="Email">
                                        <a href="<?php echo base_url(); ?>Register/create" class="center" >Create Profile</a><br>
                                    </div>
                                    <div class="loginRowCol">
                                        <input type="password" id="password" name="password" placeholder="Password">
                                        <a href="<?php echo base_url(); ?>forgot_password">Forgot Password</a>
                                        <br> 
                                    </div>
                                    <div class="loginRowCol">
                                        <input type="button" name="loginBtn" value="Login"/>
                                    </div>                   
                                <?php echo form_close(); ?>
                            </div>
                        <?php } ?> 
                    </div>
                </div>
            </div>
        </header>
        <main id="main_hero-sec"> <!-- main hero start -->
            
        <div class="mainarea">
            <?php
                //-- Success Error message
                include_once(APPPATH . "views/front/includes/success_msg.php");
            ?>

        <div class="modal fade comman__modal stay_login_modal" id="sessionModal" role="dialog">
            <div class="modal-dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                         <i class="fa fa-clock-o sessiontime"  aria-hidden="true"><span id="time"> 05:00</span> minutes!</i> 
                        <div class="modal-header">
                            <h5 class="modal-title">Due to inactivity, your session will be timed out. Please click below to stay logged in. </h5>
                        </div>
                        <div class="modal-body  p-4 text-center">
                            <a onclick="resetSession();" href="javascript:void(0)" class="btn btn-primary">Stay Logged In</a>
                            <a href="<?php echo base_url(); ?>home/logout" class="btn btn-primary">Log Off</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<!--header-script Menu-->
<script type="text/javascript">
let mainNav = document.getElementById("js-menu");
let navBarToggle = document.getElementById("js-navbar-toggle");

navBarToggle.addEventListener("click", function() {
  mainNav.classList.toggle("active-menu");
});
</script>