<!-- BreadCrumb start -->
    <?php $this->load->view('front/includes/breadcrumbs.php');  ?>
<!-- BreadCrumb End -->

<div class="loginRow container-fluid burger">
    <?php $attributes = array('id'=>'frm','name'=>"forgot",'class'=>"form-horizontal cngPassword_Frm",'method'=>'post','autocomplete'=>'off');
        echo form_open_multipart("", $attributes); ?>

        <div class="col-md-12 col-sm-12 form-group">
            <label  for="password">New Password<span class="danger">*</span></label>
            <span class="pas_valid"></span>
            <input type="password" name="new_password" id="new_password" placeholder="New password" class="form-control required" value="<?php echo set_value('new_password'); ?>">
        </div>
        <div class="col-md-12 col-sm-12 form-group">
            <label  for="password">Re-enter New Password<span class="danger">*</span></label>
            <input type="password" name="confirm_password" id="confirm_password" placeholder="Re-enter new password" class="form-control required" value="<?php echo set_value('confirm_password'); ?>">
            <span class="error"><?php echo form_error('new_password'); ?>
        </div>
        <button type="submit" class="btn btn-primary">Change password</button>
        
    <?php echo form_close(); ?>
</div>
