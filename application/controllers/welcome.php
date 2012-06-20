<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Welcome extends MY_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('captcha_model');
	}

	public function index() {

		$segment_active = $this->uri->segment(2);
		if ($segment_active != NULL) {
			$data['menu'] = $this->uri->segment(2);
		} else {
			$data['menu'] = 'home';
		}

		
		$this->get_content_data($data['menu']);
		if ($data['menu'] == 'news') {
			$data['news'] = $this->content_model->get_content_cat('news');
		}

		$data['captcha'] = $this->captcha_model->initiate_captcha();
		$data['seo_links'] = $this->content_model->get_seo_links();



		$data['sidebar'] = "sidebox/side";
		$data['main_content'] = "global/" . $this->config_theme . "/content";
		$data['cats'] = $this->products_model->get_cats();
		$data['products'] = $this->products_model->get_all_products();
		$data['section2'] = 'global/links';
		if ($this->session->flashdata('message')) {
			$data['message'] = $this->session->flashdata('message');
		}


		$this->load->vars($data);
		$this->load->view('template/main');
	}

	function get_content_data($menu) {
		$data['content'] = $this->content_model->get_content($menu);
		$data['captcha'] = $this->captcha_model->initiate_captcha();
		foreach ($data['content'] as $row):

		$data['title'] = $row->title;
		$data['sidebox'] = $row->sidebox;
		$data['metatitle'] = $row->meta_title;
		$data['topsection'] = $row->topsection;
		$data['meta_keywords'] = $row->meta_desc;
		$data['meta_description'] = $row->meta_keywords;
		$data['slideshow_active'] = $row->slideshow;
		$data['mainsize'] = $row->mainsize;
		$data['rightsize'] = $row->rightsize;
		$data['slideshow'] = $row->slideshow;

		endforeach;
		$this->load->vars($data);
		return $data;
	}

	function test() {
		$data['main_content'] = 'slideshow/slideshow';
		$this->load->vars($data);
		$this->load->view('template/main');
	}

	function mailbox_form() {
		$this->load->helper(array('dompdf', 'file'));
		$data['main'] = "forms/mailbox_form";
		$this->load->vars($data);
		$stream = TRUE;
		$html = $this->load->view('template/pdf', $data, true);
		pdf_create($html, 'Mailbox Application Form', $stream);
		
	}
	function home() {

		$segment_active = $this->uri->segment(3);
		if ($segment_active != NULL) {
			$data['menu'] = $this->uri->segment(3);
		} else {
			$data['menu'] = $this->uri->segment(1);
		}

		
		$this->get_content_data($data['menu']);
		if ($data['menu'] == 'news') {
			$data['news'] = $this->content_model->get_content_cat('news');
		}


		$data['sidebar'] = "sidebox/side";
		$data['main_content'] = "global/" . $this->config_theme . "/content";
		//$data['cats'] = $this->products_model->get_cats();
		//$data['products'] = $this->products_model->get_all_products();
		$data['section2'] = 'global/links';
		$data['seo_links'] = $this->content_model->get_seo_links();
		if ($this->session->flashdata('message')) {
			$data['message'] = $this->session->flashdata('message');
		}

		 
		$this->load->vars($data);
		$this->load->view('template/main');
	}

	function map() {

		$data['menu'] = 'map';
		 
		$this->get_content_data($data['menu']);
		
		//get unit infor for map		
		$this->load->model('map_model');
		$data['units'] = $this->map_model->get_units();
		
		
		$data['sidebar'] = "sidebox/units";
		$data['main_content'] = "global/" . $this->config_theme . "/content";
		//$data['cats'] = $this->products_model->get_cats();
		//$data['products'] = $this->products_model->get_all_products();
		$data['section2'] = 'global/links';
		$data['seo_links'] = $this->content_model->get_seo_links();
		if ($this->session->flashdata('message')) {
			$data['message'] = $this->session->flashdata('message');
		}
		 

		$this->load->vars($data);
		$this->load->view('template/main');
	}
	
	function unitinfo($unitId) {
		$this->load->model('map_model');
		$data['unit'] = $this->map_model->get_unit($unitId);
		$this->load->vars($data);
		$this->load->view('template/seedbed/unitAjax');
		
	}

	function gallery($gallery) {
		$data['content'] = $this->content_model->get_gallery($gallery);
		$data['main_content'] = "global/gallery";
		$this->load->vars($data);
		$this->load->view('template/main');
	}

	function main() {
		$segment_active = $this->uri->segment(3);
		if ($segment_active != NULL) {
			$data['menu'] = $this->uri->segment(3);
		} else {
			$data['menu'] = 'home';
		}

		$this->get_content_data($data['menu']);
		$data['captcha'] = $this->captcha_model->initiate_captcha();


		$data['main_content'] = "global/" . $this->config_theme . "/content";
		$data['cats'] = $this->products_model->get_cats();
		$data['products'] = $this->products_model->get_all_products();
		$data['section2'] = 'global/links';
		if ($this->session->flashdata('message')) {
			$data['message'] = $this->session->flashdata('message');
		}


		$this->load->vars($data);
		$this->load->view('template/main');
	}

	function login() {
		if ($this->session->flashdata('message')) {
			$data['message'] = $this->session->flashdata('message');
		}
		$id = 'login';
		$data['content'] = $this->content_model->get_content($id);
		$data['main_content'] = "user/login_form";
		$data['title'] = "Login";

		$data['page'] = "login";
		$this->load->vars($data);
		$this->load->view('template/main');
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */