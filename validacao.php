<meta charset="utf-8">

<?php
 if (isset($_POST['btconsultora'])) {
require_once('./login.html');
	?>	
	<script>
sweetAlert("Oops...", "Campo usuário precisa ter no minimo 5 caracteres", "error");

	</script><?php
}
else{
    if (isset($_POST['btconsultoranew'])) {
        	?><script>
swal("Oops...", "novo user", "error");
//alert("novo user");
	</script><?php 
    }
    else {
        
?><script>
    alert("else");
	</script><?php 
    }
}



?>
