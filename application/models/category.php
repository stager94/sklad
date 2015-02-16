<?php
setlocale(LC_ALL, 'en_US.UTF8');
class Category extends ActiveRecord\Model {
	
	static $has_many = array(array('products'));

	static $validates_presence_of = array(
		array('name')
	);
	static $validates_uniqueness_of = array(
		array('slug'), array('name')
	);

	static $before_save = array("check_slug");

	public function check_slug() {
		if ($this->slug == "") {
			$this->slug = transliterate($this->name);
		}
	}

}