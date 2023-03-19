<?php

class ControllerSuppliers{



	static public function ctrCreateCustomer(){

		if(isset($_POST["newCustomer"])){

		if(isset($_POST["newCustomer"])){
			   	$table = "suppliers";

			   	$data = array("name"=>$_POST["newCustomer"],
					           "idDocument"=>$_POST["newIdDocument"],
					           "email"=>$_POST["newEmail"],
					           "phone"=>$_POST["newPhone"],
					           "address"=>$_POST["newAddress"],
					           "birthdate"=>$_POST["newBirthdate"]);

			   	$answer = ModelSuppliers::mdlAddCustomer($table, $data);

			   	if($answer == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "The supplier has been saved",
						  showConfirmButton: true,
						  confirmButtonText: "ok"
						  }).then(function(result){
									if (result.value) {

									window.location = "suppliers";

									}
								})

					</script>';

				

			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡Supplier cannot be blank or especial characters!",
						  showConfirmButton: true,
						  confirmButtonText: "Close"
						  }).then(function(result){
							if (result.value) {

							window.location = "suppliers";

							}
						})

			  	</script>';

			}
}
		}

	}



	static public function ctrShowCustomers($item, $value){

		$table = "suppliers";

		$answer = ModelSuppliers::mdlShowCustomers($table, $item, $value);

		return $answer;

	}


	static public function ctrEditCustomer(){

		if(isset($_POST["editCustomer"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editCustomer"]) &&
			   preg_match('/^[0-9]+$/', $_POST["editIdDocument"]) &&
			   preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["editEmail"]) && 
			   preg_match('/^[()\-0-9 ]+$/', $_POST["editPhone"]) && 
			   preg_match('/^[#\.\-a-zA-Z0-9 ]+$/', $_POST["editAddress"])){

			   	$table = "suppliers";

			   	$data = array("id"=>$_POST["idCustomer"],
			   				   "name"=>$_POST["editCustomer"],
					           "idDocument"=>$_POST["editIdDocument"],
					           "email"=>$_POST["editEmail"],
					           "phone"=>$_POST["editPhone"],
					           "address"=>$_POST["editAddress"],
					           "birthdate"=>$_POST["editBirthdate"]);

			   	$answer = ModelSuppliers::mdlEditCustomer($table, $data);

			   	if($answer == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "The Supplier has been edited",
						  showConfirmButton: true,
						  confirmButtonText: "Close"
						  }).then(function(result){
									if (result.value) {

									window.location = "suppliers";

									}
								})

					</script>';

				

			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡Supplier cannot be blank or especial characters!",
						  showConfirmButton: true,
						  confirmButtonText: "Close"
						  }).then(function(result){
							if (result.value) {

							window.location = "suppliers";

							}
						})

			  	</script>';



			}
}
		}

	}



	static public function ctrDeleteCustomer(){

		if(isset($_GET["idCustomer"])){

			$table ="suppliers";
			$data = $_GET["idCustomer"];

			$answer = ModelSuppliers::mdlDeleteCustomer($table, $data);

			if($answer == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "The Supplier has been deleted",
					  showConfirmButton: true,
					  confirmButtonText: "Close"
					  }).then(function(result){
								if (result.value) {

								window.location = "suppliers";

								}
							})

				</script>';

			}		

		}

	}

}

