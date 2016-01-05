<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="./sweetalert-master/dist/sweetalert.css">
<script src="./sweetalert-master/dist/sweetalert.min.js"></script>   

<?php
 if (isset($_POST['btconsultora'])) {
    	?><script>
swal("Oops...", "login", "error");
alert("login");
	</script><?php 
}
else{
    if (isset($_POST['btconsultoranew'])) {
        	?><script>
swal("Oops...", "novo user", "error");
alert("novo user");
	</script><?php 
    }
    else {
        
?><script>
    alert("else");
	</script><?php 
    }
}



?>
