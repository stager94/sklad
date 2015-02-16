<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Layout {
	var $obj;
	var $layout = 'application';

	function __construct() {
		$this->obj = & get_instance();
		if ($this->obj->layout) $this->layout = $this->obj->layout;
		$this->layout = 'layouts/' . $this->layout;
	}

	function setLayout($layout) {
	  $this->layout = $layout;
	}

	function view($view, $data=null, $return=false) {
		$loadedData = array();
		$loadedData['content_for_layout'] = $this->obj->load->view($view,$data,true);

		if($return) {
			$output = $this->obj->load->view($this->layout, $loadedData, true);
			return $output;
		} else {
			$this->obj->load->view($this->layout, $loadedData, false);
		}
	}
}
?>