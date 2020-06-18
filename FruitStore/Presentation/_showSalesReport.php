<?php

function getLastFour($creditCardNumber) {
    $numbers = explode('-', $creditCardNumber);
    return "XXXX-XXXX-XXXX-" . $numbers[3];
}

?>
<style>
    div::-webkit-scrollbar {
        width: 6px;
        background-color: #F5F5F5;
    }
    
    .meter { 
    	height: 40px;  /* Can be anything */
    	display: block;
    	background: #555;
    	-moz-border-radius: 25px;
    	-webkit-border-radius: 25px;
    	border-radius: 25px;
    	padding: 10px;
    	box-shadow: inset 0 -1px 1px rgba(255,255,255,0.3);
    }
    
    #fillable {
        display: block;
        height: 100%;
        border-top-right-radius: 8px;
        border-bottom-right-radius: 8px;
        border-top-left-radius: 20px;
        border-bottom-left-radius: 20px;
        background-color: rgb(43,194,83);
        box-shadow: 
          inset 0 2px 9px  rgba(255,255,255,0.3),
          inset 0 -2px 6px rgba(0,0,0,0.4);
        position: relative;
        overflow: hidden;
    }
    
    .progress-label {
        border-radius: 10px; 
        width: 7%; 
        overflow: wrap;
        margin: auto;
        text-align: center;
    }
    
    #return-fillable {
        display: block;
        height: 100%;
        border-top-right-radius: 8px;
        border-bottom-right-radius: 8px;
        border-top-left-radius: 20px;
        border-bottom-left-radius: 20px;
        background-color: #dc3545;
        box-shadow: 
          inset 0 2px 9px  rgba(255,255,255,0.3),
          inset 0 -2px 6px rgba(0,0,0,0.4);
        position: relative;
        overflow: hidden;
    }
    
</style>
<script>
	$(document).on('click', function() {
		('.message').hide();
	});
</script>


<!-- Empty div to set spacing -->
<div class=col-2></div>

<div class=col>
<?php
//while loop for orders table query
while ($row = $data->fetch_assoc()) {
    $total = 0;
?>

<div style="border: 4px solid; border-radius: 10px; margin: 5px;">
	<h3 style="display: inline">Order ID: <?php echo $row['orderID']?></h3>
	
	
	
	<!-- PRODUCT INFORMATION SECTION -->
	<div style="margin: 5px;">
		<?php 
		  //orderdetails loop
		    $orderDetails = $business->getOrderByID($row['orderID']);
		    
		    if ($orderDetails->num_rows == 0) {
		          echo "<h4 class='bg-danger text-white rounded'>Problems, no order details found for this order</h4>";
		    }
		    
		    while ($order = $orderDetails->fetch_assoc()) {
		        
		        $product = $productBusiness->findByID($order['productID']);
		        $product = $product->fetch_assoc();
		?>
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
                          </div>
                        </div>
                        <div class="col-md-1 d-flex align-items-center justify-content-center">
                        	<div class=form-group>
                        		<label for=quantity>Quantity</label>
            					<input name=quantity type=text class=form-control style="text-align: center;" value="<?php echo $order['productQty']?>" disabled>
            				</div>
            			</div>
                      </div> 
                    </div>
                </div>
                
		<?php
                $total += ($product['price'] * $order['productQty']);
		    }
        ?>
        <div>
        	<h4><?php echo "$" . sprintf('%01.2f', $total)?></h4>
        </div> 
	</div>
	
	<!-- DETAILS SECTION -->
	<div class=row>
    	<div class=col>
        	<!-- CREDIT CARD INFORMATION SECTION -->
        	<div style="margin: 5px;">
        		<?php 
        		  $creditCard = $creditCardBusiness->findByID($row['creditCardID']);
        		  
        		  $creditCard = $creditCard->fetch_assoc();
        		?>
        		<h5>Credit card used:</h5>
        		<div class=form-row >
        			<div class="form-group mx-5">
            			<label for=firstname>Firstname</label>
            			<input type=text class=" form-control" value="<?php echo $creditCard['firstname']?>"  disabled>
        			</div>
        			<div class="form-group mx-5">
        				<label for=lastname>Lastname</label>
        				<input type=text class=" form-control" value="<?php echo $creditCard['lastname']?>" disabled>
        			</div>
        			<div class="form-group mx-5">
        				<label for="creditCardNumber">Credit Card Number</label>
        				<input type=text class=" form-control" value="<?php echo getLastFour($creditCard['creditCardNumber'])?>" disabled>
        			</div>
        		</div>
        	</div>
        	
        	
        	<!-- USER INFORMATION SECTION -->
        	<div style="margin: 5px;">
        		<?php 
          		  $user = $userBusiness->findByID($row['userID']);
        		  
        		  $user = $user->fetch_assoc();
        		?>
        		<h5>User:</h5>
        		<div class=form-row>
        			<div class="form-group mx-5">
        				<label for=username>Username</label>
        				<input type=text name=username class="form-control" value="<?php echo $user['username']?>" disabled>
        			</div>
            		<div class="form-group mx-5">
            			<label for=name>Name</label>
            			<input type=text name=name class="form-control" value="<?php echo $user['firstname'] . " " . $user['lastname']?>" disabled>
            		</div>
        		</div>
        	</div>
        	
    	</div>
    	<!-- ACTION SECTION -->
    	<?php if ($_SESSION['admin'] && !$_POST['fromCurrentOrders'] && $row['delivered'] != 4) {?>
    	<div class="col d-flex justify-content-center" style="margin: auto;">
    			<?php if (isset($_SESSION['deliverFailure'])) {?>
    				<div class=message style="display: block">
            			<h4 class="bg-danger rounded text-white"><?php echo $_SESSION['deliverFailure']?></h4>
           			</div>
            	<?php } unset ($_SESSION['deliverFailure']);?>
    	
			<form action="/FruitStore/business/updateDeliveryStatusHandler.php" method=POST>
    			<h5>Update Delivery Status</h5>
    			<input type=hidden id=orderID name=orderID value=<?php echo $row['orderID']?>>
    			<input type=hidden id=from name=from value="/FruitStore/presentation/getSalesReport.php?beginDate=<?php echo $_GET['beginDate']?>&endDate=<?php echo $_GET['endDate']?>">
    			<input type=submit value="Go" class="btn btn-secondary">
    		</form>
    	</div>
    	<?php } else if (isset($_POST['fromRequestReturn']) && $_POST['fromRequestReturn']) {?>
    	<div class="col d-flex justify-content-center" style="margin: auto;">
    		<form action="/FruitStore/Business/requestReturnHandler.php" method=POST>
    			<h5>Request Return</h5>
    			<input type=hidden name=orderID id=orderID value=<?php echo $row['orderID']?>>
    			<input type=submit value=Go class="btn btn-danger">
    		</form>
    	</div>
    	<?php }?>
   	</div>
	<!-- TRACKING SECTION -->
	<?php if ($row['delivered'] > 4) {?>
		<div class="d-flex justify-content-between" style="margin: 5px;">
    		<p class='bg-danger text-white progress-label'>Requested</p>
    		<p class='bg-danger text-white progress-label'>Recieved</p>
    		<p class='bg-danger text-white progress-label'>Refunded</p>
    	</div>
    	<div class="meter">
    		<span id="return-fillable" style="width: <?php 
    		    if ($row['delivered'] == 5)
    		        echo "16.5%";
    		    else if ($row['delivered'] == 6)
    		        echo "50%";
    		    else if ($row['delivered'] == 7)
    		        echo "84%";
    		    else 
    		        echo "100%";
    		?>"></span>
    	</div>
    	
	<?php } else {?>
    	<div class="d-flex justify-content-between" style="margin: 5px;">
    		<p class='bg-success text-white progress-label' >Ordered</p>
    		<p class='bg-success text-white progress-label' >Packing</p>
    		<p class='bg-success text-white progress-label' >Out for Delivery</p>
    	</div>
    	<div class="meter">
      		<span id=fillable style="width: <?php 
      		    if ($row['delivered'] == 0)
      		        echo "16.5%";
      		    else if ($row['delivered'] == 1)
      		        echo "16.5%";
      		    else if ($row['delivered'] == 2) 
      		        echo "50%";
      		    else if ($row['delivered'] == 3)
          		    echo "84%";
       		    else if ($row['delivered'] == 4)
       		        echo "100%";
      		?>;"></span>
    	</div>
	<?php }?>
</div>

<?php 
}
?>
</div>

<!-- Empty div to set spacing -->
<div class=col-2></div>

