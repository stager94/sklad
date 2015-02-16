<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Products extends MY_Controller {

	public function index() {
		$this->data["products"] = Product::all();
		$this->data["all"] = true;
		$this->layout->view('products/index', $this->data);
	}

	public function by_category($slug) {
		$category = Category::find_by_slug($slug);
		$brands = Product::find('all', array("select" => "DISTINCT brand", "conditions" => "category_id = $category->id"));
		$brand = $this->input->get('by_brand');
		
		if ( $brand ) {
			$products = Product::all(array("category_id" => $category->id, "brand" => $brand ));
		} else {
			$products = $category->products;
		}

		$this->data["products"] = $products;
		$this->data["active_category"] = $category;
		$this->data["brands"] = $brands;
		$this->data["brand"] = $brand;

		$this->layout->view('products/index', $this->data);
	}

	public function search() {
		$q = $this->input->get("q");

		$products = Product::all( array("conditions" => "title LIKE '%$q%' OR barcode LIKE '$q%' ") );

		$this->data['query'] = $q;
		$this->data["products"] = $products;
		$this->layout->view('products/index', $this->data);	
	}

	public function create() {

		if ($this->input->post('product')) {
			$product = $this->create_product();
		} else {
			$product = new Product( array("category_id" => $this->input->get('category_id')) );
		}

		$this->data["product"] = $product;
		$this->layout->view('products/create', $this->data);
	}

	public function edit($id) {
		$product = Product::find($id);

		if ($this->input->post('product')) {
			$product->update_attributes( $this->input->post('product') );
			if ($product->is_valid()) {
				$this->session->set_flashdata('notice', "Товар успешно обновлен!");
				redirect($_SERVER['HTTP_REFERER']);
			}
		}

		$this->data["product"] = $product;
		$this->layout->view('products/edit', $this->data);	
	}

	public function delete($id) {
		$product = Product::find($id);
		$product->delete();
		
		$this->session->set_flashdata('notice', "Товар <b>$product->title ($product->barcode)</b> успешно удален!");
		redirect("/");
	}

// PRIVATE functions

	private function create_product() {
		$product = Product::create( $this->input->post('product') );

		if ($product->is_valid()) {
			$this->session->set_flashdata('notice', "Товар <b>$product->title</b> успешно добавлен!");
			redirect("products/new");
		}

		return $product;
	}
}