<?php
error_reporting(0);
require_once "../controllers/products.controller.php";
require_once "../models/products.model.php";

require_once "../controllers/categories.controller.php";
require_once "../models/categories.model.php";

class AjaxProducts{



	public $idCategory;

	public function ajaxCreateProductCode(){

		$item = "idCategory";
		$value = $this->idCategory;
		$order = "id";

		$answer = controllerProducts::ctrShowProducts($item, $value, $order);

		echo json_encode($answer);

	}



  	public $idProduct;
	public $getProducts;
	public $productName;

  	public function ajaxEditProduct(){

	    if($this->getProducts == "ok"){

	      $item = null;
	      $value = null;
	      $order = "id";

		  $answer = controllerProducts::ctrShowProducts($item, $value, $order);

		  echo json_encode($answer);


	    }else if($this->productName != ""){

	      $item = "description";
	      $value = $this->productName;
	      $order = "id";

		  $answer = controllerProducts::ctrShowProducts($item, $value, $order);
	      
		  echo json_encode($answer);

	    }else{

	      $item = "id";
	      $value = $this->idProduct;
		  $order = "id";

		$answer = controllerProducts::ctrShowProducts($item, $value, $order);
	      
		  echo json_encode($answer);

	    }

  	}

}



if(isset($_POST["idCategory"])){

	$productCode = new AjaxProducts();
	$productCode -> idCategory = $_POST["idCategory"];
	$productCode -> ajaxCreateProductCode();

}



if(isset($_POST["idProduct"])){

  $editProduct = new AjaxProducts();
  $editProduct -> idProduct = $_POST["idProduct"];
  $editProduct -> ajaxEditProduct();

}



if(isset($_POST["getProducts"])){

  $getProducts = new AjaxProducts();
  $getProducts -> getProducts = $_POST["getProducts"];
  $getProducts -> ajaxEditProduct();

}



if(isset($_POST["productName"])){

  $getProducts = new AjaxProducts();
  $getProducts -> productName = $_POST["productName"];
  $getProducts -> ajaxEditProduct();

}