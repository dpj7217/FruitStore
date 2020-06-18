<?php
require_once 'header.php';

if (!$_SESSION['admin']) {
    $_SESSION['successMessage'] = "You do not have the required permissions to access this page. Please Login as an admin to access this page";
    header("location: loginRegister.php");
    die();
}



?>
<head>
	<title>FruitStore | Add New Product</title>
</head>
<body>
	<div class="container">
		<div class=row>
	  		<!-- Empty div to set spacing -->
			<div class=col-2></div>
    		<div class=" my-4 col">
    			<?php 
				if (!empty($_SESSION['addProductError'])) {
				?>    
    				<div class="p-2 m-2 bg-danger text-white">
         				<p> <?php echo $_SESSION['addProductError'] ?> </p>
    	       		</div>
    			<?php 
				} else if (!empty($_SESSION['addProductSuccess'])) {
                ?>
	                <div class="p-2 m-2 bg-success text-white">
         				<p> <?php echo $_SESSION['addProductSuccess'] ?> </p>
    	       		</div>
                <?php 
				}
				
				unset($_SESSION['addProductSuccess']);
    			unset($_SESSION['addProductError']);
				?>
				
				<h2>Add Product</h2>
				<form action="/FruitStore/Business/addProductHandler.php" method=POST>
					<div class=form-group>
						<label for=name>Product Name</label>
						<input type=text class=form-control id=name name=name>
					</div>
					<div class=form-group>
						<label for=price>Price</label>
						<input type=text class=form-control id=price name=price>
					</div>
					<div class=form-group>
						<label for=description>Description</label>
						<textarea class=form-control id=description name=description rows=5></textarea>
					</div>
					<div class=form-group>
						<label for=quantity>Quantity on hand</label>
						<input type=text class=form-control id=quantity name=quantity ">
					</div>
					<div class=form-group>
						<label for=imageLocation>Image File Location</label>
						<input type=text class=form-control id=imageLocation name=imageLocation>
						<small class="form-text text-muted">Please include the image location as follows: "[fruit name]_image". Make sure the image is inlcuded in the presentation/images file system</small>
					</div>	
					<button type=submit class="btn btn-primary">Add Product</button>
				</form>
    		</div>
    		<div class=col-2></div>
    	</div>
    </div>
</body>
<script>
$(document).on('click', function() {
	$('.p-2').hide();
});
</script>

<?php include '_footer.php'?>