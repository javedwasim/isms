<?php $this->load->view('parts/header'); ?>
<?php $this->load->view('parts/navbar'); ?>
<?php $this->load->view('parts/sidebar'); ?>
<?php if (isset($screen) && ($screen == 'profile')) { ?>
    <?php $this->load->view('employee/employee_profile'); ?>
<?php } elseif ($screen == 'events') { ?>
    <?php $this->load->view('employee/events_list'); ?>
<?php } ?>
<?php $this->load->view('parts/footer'); ?>