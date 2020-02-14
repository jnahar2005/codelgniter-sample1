<!-- BreadCrumb start -->
<?php $this->load->view('front/includes/breadcrumbs.php');  ?>
<!-- BreadCrumb End -->

<div class="container-fluid pt_comn footer-burger forgot_pass">
    <div>
        <h2>Forgot Password</h2>
        <div class="forgotRow">
            <p>Please enter your email address to search for your password.</p>

            <?php $attributes = array('id'=>'frm','class'=>"form-horizontal forgotFrm",'method'=>'post','autocomplete'=>'off');
                echo form_open_multipart("", $attributes); ?> 
                <div>
                    <input type="email" name="txtemail" id="txtemail" class="required"  placeholder="Email: (E.g. me@example.com)" value="<?php echo set_value('txtemail'); ?>">
                    <span class="error" id="email_error"><?php echo form_error('txtemail'); ?></span>
                </div>
                <div id="forgotLoader" class="loader" style="display: none;" ></div>
                <div>
                    <button type="submit" class="btn btn-primary mt-3">Request Password</button>
                </div>
                <!-- <div class="examplenote">E.g. me@example.com</div> -->
            <?php echo form_close(); ?>

        </div>
    </div>
</div> 

