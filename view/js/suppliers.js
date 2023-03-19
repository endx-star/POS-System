/*=============================================
EDIT CUSTOMER
=============================================*/

$(".tables").on("click", "tbody .btnEditSupplier", function(){

	var idCustomer = $(this).attr("idCustomer");

	var datum = new FormData();
    datum.append("idCustomer", idCustomer);

    $.ajax({

      url:"ajax/suppliers.ajax.php",
      method: "POST",
      data: datum,
      cache: false,
      contentType: false,
      processData: false,
      dataType:"json",
      success:function(answer){
      
      	 $("#idCustomer").val(answer["id"]);
	       $("#editCustomer").val(answer["name"]);
	       $("#editIdDocument").val(answer["idDocument"]);
	       $("#editEmail").val(answer["email"]);
	       $("#editPhone").val(answer["phone"]);
	       $("#editAddress").val(answer["address"]);
         $("#editBirthdate").val(answer["birthdate"]);
	  }

  	})

})

/*=============================================
DELETE CUSTOMER
=============================================*/

$(".tables").on("click", "tbody .btnDeleteSupplier", function(){

	var idCustomer = $(this).attr("idCustomer");
	
	swal({
        title: '¿Are you sure you want to delete this Supplier?',
        text: "¡If you're not you can cancel the action!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'cancel',
        confirmButtonText: 'Yes, delete Supplier!'
      }).then(function(result){
        if (result.value) {
          
            window.location = "index.php?route=suppliers&idCustomer="+idCustomer;
        }

  })

})