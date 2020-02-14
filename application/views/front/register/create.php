<?php $this->load->view('front/includes/breadcrumbs.php');  ?>
<!-- BreadCrumb End -->

<div class="container creat_profile footer-burger">
    <div class="pt_comn">
        <h2 class="mt-0 pt-0">
            <?php if(isset($page_title)&&$page_title!=''){echo $page_title;}else{echo '';} ?>
        </h2>

        <?php $attributes = array('id'=>'frm','method'=>'post','autocomplete'=>'off');
            echo form_open_multipart("", $attributes); ?>            
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="registrationForm formbox600">
                        <div class="form-group">
                            <label for="email">Email<span class="danger">*</span></label>
                            <input type="email" onkeyup="checkEmail(this.value);" name="username" id="" placeholder="Email" class="form-control email">
                            <span class="error" id="email_error"><?php echo form_error('username'); ?></span>
                        </div>                  
                        <div class="form-group">
                            <label for="password">Password<span class="danger">*</span></label>
                            <input data-toggle="tooltip" title="" type="password" name="new_password" id="new_password" placeholder="Password" class="form-control pwcheck required" value="<?php echo set_value('new_password'); ?>">
                        </div>
                        <div class="form-group">
                            <label  for="password">Confirm Password<span class="danger">*</span></label>
                            <input type="password" name="confirm_password" id="confirm_password" placeholder="Password" class="form-control required" value="<?php echo set_value('confirm_password'); ?>">
                            <span class="error"><?php echo form_error('confirm_password'); ?></span>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary" > 
                                Submit <i class="fa fa-arrow-right" aria-hidden="true"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        <?php echo form_close(); ?>
    </div>
</div>

<?php
//-- Google address and email check
    include_once(APPPATH . "views/front/register/address_and_email_script.php");
?> 
