<?php $this->load->view('parts/header'); ?>
<?php $this->load->view('parts/navbar'); ?>
<?php $this->load->view('parts/sidebar'); ?>
<?php if(isset($screen) && ($screen=='calendar')){ ?>
    <?php $this->load->view('calendar/Calendar'); ?>
<?php } elseif($screen == 'events') { ?>
    <?php $this->load->view('calendar/events_list'); ?>
<?php } elseif($screen == 'create_event') { ?>
    <?php $this->load->view('calendar/add_event'); ?>
<?php } ?>
<?php $this->load->view('parts/footer'); ?>
