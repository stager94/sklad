<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Categories extends MY_Controller {

	public function delete($id) {
		$category = Category::find($id);

		Product::delete_all(array("conditions" => "category_id = $id"));
		$category->delete();
		
		$this->session->set_flashdata('notice', "Категория <b>$category->name</b> успешно удалена!");
		redirect("/");
	}

	public function create() {

		if ($this->input->post('category')) {
			$category = $this->create_category();
		} else {
			$category = new Category();
		}

		$this->data["category"] = $category;
		$this->layout->view('categories/create', $this->data);
	}

	public function edit($id) {
		$category = Category::find($id);

		if ( $this->input->post('category') ) {
			$category->update_attributes( $this->input->post('category') );
			if ($category->is_valid()) {
				$this->session->set_flashdata('notice', "Категория успешно обновлена!");
				redirect($_SERVER['HTTP_REFERER']);
			}
		}

		$this->data["category"] = $category;
		$this->layout->view('categories/edit', $this->data);
	}

// PRIVATE functions

	private function create_category() {
		$category = Category::create( $this->input->post('category') );

		if ($category->is_valid()) {
			$this->session->set_flashdata('notice', "Категория <b>$category->name</b> успешно создана!");
			redirect("categories/new");
		}

		return $category;
	}

}