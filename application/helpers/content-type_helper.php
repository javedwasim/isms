<?php
function set_content_type($data) {
	$CI =& get_instance();
	return $CI->output
    ->set_content_type('application/json') //set Json header
    ->set_output(json_encode($data));
}