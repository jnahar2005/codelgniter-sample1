<div class="lol alert alert-success fixed_alert" style="display: none;">
  <div class="alert_success">
      <img src="<?php echo base_url();?>assets/images/success.png"/>
      <strong></strong><!-- {{ success}} -->
  </div>
</div>
<div class="fixed_alert alert alert-danger" style="display: none;">
  <div class="alert_danger">
    <img src="<?php echo base_url();?>assets/images/warning.png"/>
    <strong></strong>
  </div>
</div>

<?php if(isset($success_msg) && $success_msg!=''){?>
  <div class="lol alert alert-success fixed_alert ">
    <div class="alert_success">
      <img src="<?php echo base_url();?>assets/images/success.png" alt="success"/>
      <strong></strong><?php echo $success_msg;?>
    </div>
  </div>
<?php } if(isset($error_msg) && $error_msg!=''){?>
  <div class="fixed_alert alert alert-danger">
    <div class="alert_danger">
      <img src="<?php echo base_url();?>assets/images/warning.png" alt="warning"/>
      <strong></strong><?php echo $error_msg;?>
    </div>
  </div>
<?php } ?>
