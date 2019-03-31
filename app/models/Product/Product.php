<?php

class Product{
	public $product_id;
	public $product_url;
	public $product_title;
	public $product_type;
	public $followable_id;
	public $account;

	public function __construct($id, $title, $type, $url){
		$this->product_id = $id;
		$this->product_type = $type;
		$this->product_url = $url;
		$this->product_title = $title;
	}
		public function setAccount($account){
		$this->account = $account;
	}

	public static function addProduct($followable_id, $product){
		
	}

	public static function getProducts($followable_id){
		$con = DB::getConnection();

		$dsn = 'SELECT pi.* FROM product_info pi, product_rels pr WHERE pr.followable_id = ? AND pr.product_id = pi.id ';

		$stmt = $con->prepare($dsn);

		$stmt->execute([$followable_id]);

		$products = array();
		
		while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
			$product = new Product($result['id'], $result['title'], $result['type'], $result['url']);
			array_push($products, $product);
		}

		return $products;
	}


}