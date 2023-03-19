<?php
error_reporting(0);
require_once "../controllers/products.controller.php";
require_once "../models/products.model.php";

require_once "../controllers/categories.controller.php";
require_once "../models/categories.model.php";

class productsTable{


	public function showProductsTable(){

		$item = null;
		$value = null;
		$order = "id";

		$products = controllerProducts::ctrShowProducts($item, $value, $order);

		if(count($products) == 0){

			$jsonData = '{"data":[]}';

			echo $jsonData;

			return;
		}

		$jsonData = '{
			"data":[';

				for($i=0; $i < count($products); $i++){



					
					$image = "<img src='".$products[$i]["image"]."' width='40px'>";

			
					
					$item = "id";
				  	$value = $products[$i]["idCategory"];

				  	$categories = ControllerCategories::ctrShowCategories($item, $value);

	
				  	
				  	if($products[$i]["stock"] <= 10){

		  				$stock = "<button class='btn btn-danger'>".$products[$i]["stock"]."</button>";

		  			}else if($products[$i]["stock"] > 11 && $products[$i]["stock"] <= 15){

		  				$stock = "<button class='btn btn-warning'>".$products[$i]["stock"]."</button>";

		  			}else{

		  				$stock = "<button class='btn btn-success'>".$products[$i]["stock"]."</button>";

		  			}
	
					$today=date("m/d/y");
					$expire=$products[$i]["expiry"];
					$newdate=str_replace('-', '/', $expire);
					$today_time=strtotime($today);
					$exp_time=strtotime($newdate);
					//$var=date('Y-m-d H:i:s',strtotime($newdate);
				  	if($exp_time < $today_time){

		  				$expiry = "<button class='btn btn-danger'>".$products[$i]["expiry"]."</button>";


		  			}else if(($exp_time - $today_time)<=5184001){

		  				$expiry = "<button class='btn btn-warning'>".$products[$i]["expiry"]."</button>";

		  			}else{

		  				$expiry = "<button class='btn btn-success'>".$products[$i]["expiry"]."</button>";

		  			}

		  
		  			if (isset($_GET["hiddenProfile"]) && $_GET["hiddenProfile"] == "Special") {
		  				$buttons =  "<div class='btn-group'><button class='btn btn-warning btnEditProduct' idProduct='".$products[$i]["id"]."' data-toggle='modal' data-target='#modalEditProduct'><i class='fa fa-pencil'></i></button></div>";
		  			}
		  			else{
		  				$buttons =  "<div class='btn-group'><button class='btn btn-warning btnEditProduct' idProduct='".$products[$i]["id"]."' data-toggle='modal' data-target='#modalEditProduct'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnDeleteProduct' idProduct='".$products[$i]["id"]."' code='".$products[$i]["code"]."' image='".$products[$i]["image"]."'><i class='fa fa-times'></i></button></div>";
		  			}

					$jsonData .='[
						"'.($i+1).'",
							"'.$products[$i]["unit"].'",
						"'.$products[$i]["code"].'",
						"'.$products[$i]["description"].'",
						"'.$categories["Category"].'",
						"'.$stock.'",
						"$ '.$products[$i]["buyingPrice"].'",
						"$ '.$products[$i]["sellingPrice"].'",
						"'.$expiry.'",
						"'.$buttons.'"
					],';
				}

				$jsonData = substr($jsonData, 0, -1);
				$jsonData .= '] 

			}';

		echo $jsonData;
	}
}



$activateProducts = new productsTable();
$activateProducts -> showProductsTable();
