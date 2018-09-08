<?php $this->load->view('parts/header'); ?>
<?php $this->load->view('parts/navbar'); ?>
<?php $this->load->view('parts/sidebar'); ?>
<?php if($screen == 'batch_students'): ?>
    <?php $this->load->view('batches/batch_students'); ?>
<?php endif; ?>
<?php $this->load->view('parts/footer'); ?>