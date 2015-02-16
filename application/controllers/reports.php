<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reports extends MY_Controller {
	public $layout = 'reports';

	public function residues() {
		$this->load->helper(array('dompdf', 'file'));

		$category_id = $this->input->get("by_category");
		$brand       = $this->input->get("brand");
		$category    = null;

		$conditions = "count > 0";

		if ( $category_id ) {
			$category = Category::find($category_id);
			$conditions .= " AND category_id = '$category_id'";
		}
		if ( $brand ) $conditions .= " AND brand = '$brand'";

		$this->data["products"] = Product::all( array("conditions" => $conditions) );
		$this->data["category"] = $category;
		$this->data["brand"]    = $brand;

		$html = $this->layout->view('reports/residues', $this->data, true);
		pdf_create($html, 'residues_report');
		
	}

}