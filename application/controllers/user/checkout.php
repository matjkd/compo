
<?php

class Checkout extends MY_Controller {

	function Checkout() {
		parent::__Construct();
		$id = 'login';
		$this->load->library(array('encrypt', 'form_validation'));
		$this->load->model('content_model');
		$this->load->model('membership_model');
	}

	function index() {
		$this->is_logged_in();



		redirect('welcome');
	}
	function callback() {
		 
		echo "callback";
		 
	}
}