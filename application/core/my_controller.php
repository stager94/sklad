<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class MY_Controller extends CI_Controller {
	public $layout = 'application';

	function __construct() {
		parent::__construct();

		$this->data = array();
		$this->data["notice"] = $this->session->flashdata('notice');
	}

}