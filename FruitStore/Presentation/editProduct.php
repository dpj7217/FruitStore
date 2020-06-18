<?php
require_once '../Business/classes/productBusiness.php';
require_once '../Presentation/header.php';
require_once 'protectPage.php';


$business = new productBusiness();
$productID = $_POST['productID'];

$result = $business->findByID($productID);


if ($result) {
    while($product = $result->fetch_array()) {
        ?>

<head>
	<title>FruitStore | Edit Product</title>
</head>
<body>
	<div class="container">
		<div class="row">
			<!-- Empty div to create spacing -->
			<div class="col-2"></div>
				<div class="my-4 col">
					<h2>Edit</h2> 
					<form action="/FruitStore/Business/editProductHandler.php" method="post">
						<input type=hidden id=productID name=productID value=<?php echo $productID?>>
						<input type=hidden id=imageFileLocation name=imageFileLocation value=<?php echo $product['imageFileLocation']?>>
						<div class=form-group>
							<label for="<?php echo $product['name']?>Img">Image for '<?php echo $product['name']?>'</label>
							<img name="<?php echo $product['name'] ?>Img" src="/FruitStore/presentation/images/<?php echo $product['imageFileLocation']?>.jpg" alt="<?php echo $product['name']?> image" class=img-fluid>
						</div>
						<hr/>
						<div class=form-group>
							<label for=name>Product Name</label>
							<input type=text class=form-control id=name name=name value="<?php echo $product['name']?>">
						</div>
						<div class=form-group>
							<label for=price>Price</label>
							<input type=text class=form-control id=price name=price value="<?php echo $product['price']?>">
						</div>
						<div class=form-group>
							<label for=description>Description</label>
							<textarea class=form-control id=description name=description rows=5><?php echo $product['description']?></textarea>
						</div>
						<div class=form-group>
							<label for=quantity>Quantity on hand</label>
							<input type=text class=form-control id=quantity name=quantity value="<?php echo $product['quantityOnHand']?>">
						</div>
						
						<button type=submit class="btn btn-primary">Submit Changes</button>
					</form>
				</div>
			<!-- Empty div to create spacing -->
			<div class="col-2"></div>
		</div>
	</div>

</body>
    
<?php 
    }
} else {
    $_SESSION['editFailure'] = "Could not find product with ID " . $productID . ". Please try again.";
    header("location: products.php");
}

include '_footer.php';
?>
