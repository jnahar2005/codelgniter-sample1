<style>
    @media(max-width:767px){
        .settingBox .fas td:nth-of-type(1):before {
            content: "Date";
        }
        .settingBox .fas td:nth-of-type(2):before {
            content: "Time Slot";
        }
        .settingBox .fas td:nth-of-type(3):before {
            content: "Pt Name";
        }
        .settingBox .fas td:nth-of-type(4):before {
            content: "Appointment Status";
        }
    }
</style>
<section class="pt_comn footer-burger">   
    <div class="container-fluid ">
        <div class="row header_btm_sec">
            <div class="col-lg-6 col-md-6 col-sm-6">

            <!-- BreadCrumb start -->
            <?php $this->load->view('front/includes/breadcrumbs.php');  ?>
            <!-- BreadCrumb End -->

            </div>
        </div> 
        <div class="settingBox  ">

                <h4>Login successfully..! </h4>

        </div>
    </div>
</section>

