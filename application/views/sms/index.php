<?php $this->load->view('parts/header'); ?>
<?php $this->load->view('parts/navbar'); ?>
<?php $this->load->view('parts/sidebar'); ?>
<?php if($screen == 'sms') { ?>
    <?php $this->load->view('sms/sms_list'); ?>
<?php } elseif($screen == 'add_sms') { ?>
    <?php $this->load->view('calendar/add_sms'); ?>
<?php } ?>
<?php $this->load->view('parts/footer'); ?>
