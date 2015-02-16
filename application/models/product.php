<?php

class Product extends ActiveRecord\Model {

	static $validates_presence_of = array(
		array('title'), array('count'), array('price'), array('units'), array('barcode')
	);

	static $validates_numericality_of = array(
		array('price', "greater_than" => 0 ),
		array('count', "greater_than_or_equal_to" => 0, "only_integer" => true)
	);

	static $validates_uniqueness_of = array(
		array('barcode')
	);

	public function articul() {
		return sprintf("%07s", $this->id);
	}
}