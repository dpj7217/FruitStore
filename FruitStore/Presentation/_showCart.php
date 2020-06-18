<?php
setlocale(LC_MONETARY, "en_US.UTF-8");
require_once '../business/classes/productBusiness.php';

$business = new productBusiness(); 

if (!empty($_SESSION['orderFailed'])) {
    ?>
	<div class="p-2 m-2 bg-danger text-white">
		<p> <?php echo $_SESSION['orderFailed'] ?> </p>
	</div>
	<?php 
}

unset($_SESSION['orderFailed']);
    				

$total = 0;

while($row = $data->fetch_assoc()) {
    $foundByID = $business->findByID($row['productID']);
    $product = $foundByID->fetch_assoc();

    $date = new DateTime($row['dateAdded']);
?>
    <style>
    	input[type="number"]{
    		height: 100px;
    		text-align: center;
    		width: 100px;
    	}
    	
    	input[type="number"]::-webkit-inner-spin-button,
    	input[type="number"]::-webkit-outer-spin-button
    	{
          width: 45px;
          height: 100px;
          line-height: 1.65;
          float: left;
          display: block;
          padding: 0;
          margin: 0;
          padding-left: 20px;
          border: 1px solid #eee;	
        }
    </style>
    <div class='m-3 p-3'>
        <div class="card mb-3" >
          <div class="row no-gutters">
            <div class="col-md-4">
              <img src="images/<?php echo $product['imageFileLocation']?>.jpg" class="card-img" height='342' width='200'>
            </div>
            <div class="col-md-4">
              <div class="card-body">
                <h5 class="m-5 card-title"><?php echo $product['name']?></h5>
                <p class="m-5 card-text"><?php echo $product['description']?></p>
                <p class="m-5 card-text"><small class="text-muted">Added <?php echo $date->format('d-m-Y H:i:s')?></small></p>
              </div>
            </div>
            <div class="col-md-2 d-flex align-items-center justify-content-center">
            	<form id=updateForm action="/FruitStore/business/updateQtyHandler.php" method="POST">
            		<input type="hidden" name=userID id=userID value=<?php echo $row['userID']?>>
            		<input type="hidden" name=productID id=productID value=<?php echo $row['productID']?>>
            		<input id=newQty name=newQty class=from-control type=number min=1 max="<?php echo $product['quantityOnHand']?>" value=<?php echo $row['productQty']?>>
	            	<input id=updateBtn class="my-2 btn btn-outline-primary" type=submit value="Update" style=" width: 100px; display: block;">
            	</form>
            </div>
            <div class="col-md-1 d-flex align-items-center justify-content-center">
            	<h5 id=subtotal>Subtotal: <strong><?php echo "$" . sprintf('%01.2f', ($product['price'] * $row['productQty']))?></strong></h5>
            </div>
            <div class="col-md-1 d-flex align-items-center justify-content-center">
            	<form action="/FruitStore/Business/deleteCartItemHandler.php" method="POST"> 
            		<input type="hidden" name="userID" id=userID value=<?php echo $row['userID']?>>
            		<input type="hidden" name="productID" id=productID value=<?php echo $row['productID']?>>
                	<input type=submit class="btn btn-outline-danger" value="X">
            	</form>
            </div>
          </div> 
        </div>
    </div>
    


<?php 

$total += ($product['price'] * $row['productQty']);
}
?>

<div class="d-flex mx-5 justify-content-end">
	<h3 class="mx-4">Total: <strong><?php echo "$" . sprintf('%01.2f', $total)?></strong></h3>
	<a class="btn btn-primary" href="/FruitStore/presentation/finalizeOrder.php">Order</a>
</div>

<script>
    $(document).on('click', function() {
    	$('.p-2').hide();
    })
</script>





