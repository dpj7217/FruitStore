<?php
require_once 'header.php';
require_once '../Business/classes/creditCardBusiness.php';
require_once '../Business/classes/addressBusiness.php';
require_once '../Business/classes/userBusiness.php';

$creditCardBusiness = new creditCardBusiness();
$primaryCard = $creditCardBusiness->getPrimary($_SESSION['username']);
$card = $primaryCard->fetch_assoc();
$creditCardNumber = explode('-', $card['creditCardNumber']);

$addressBusiness = new addressBusiness();
$primaryAddress = $addressBusiness->getPrimary($_SESSION['username']);
$primaryAddress = $primaryAddress->fetch_assoc();
?>
<head>
	<title>FruitStore | Finalize Order</title>
</head>
<style>
    .ccnum {
        width: 105px;
        display: inline;
    }
    
</style>
<div class=container>
	<div class=row>
	
		<!-- credit card column -->
    	<div class="left col-5 m-5">
    		<h3>Is this the card you would like to use?</h3>
    		<div class=form-row>
				<div class="form-group col-md-5"> 
    				<label for="firstname">First Name</label>
    				<input class="form-control" type="text" id="firstname" name="firstname" value="<?php echo $card['firstname'] ?>" disabled/>    			
    			</div>
        		<div class="form-group col-md-2">
        			<label for="middleInitial">M.I.</label>
	    			<input class="form-control" type="text" id="middleInitial" name="middleInitial" value="<?php echo $card['middleInitial']?>" disabled/>
        		</div>	
        		<div class="form-group col-md-5">
        			<label for="lastName">Last Name</label>
	       			<input class="form-control" type="text" id="lastName" name="lastname" value="<?php echo $card['lastname'] ?>" disabled/>
        		</div>
				</div>
				<div class=form-row>
					<div class="form-group">
						<label for=creditCardNumber>Credit Card Number</label><br/>
						<input class="form-control ccnum" type=text maxlength=4 name=creditCardNumber1 value="<?php echo $creditCardNumber[0]?>" disabled>-
						<input class="form-control ccnum" type=text maxlength=4 name=creditCardNumber2 value="<?php echo $creditCardNumber[1]?>" disabled>-
						<input class="form-control ccnum" type=text maxlength=4 name=creditCardNumber3 value="<?php echo $creditCardNumber[2]?>" disabled>-
						<input class="form-control ccnum" type=text maxlength=4 name=creditCardNumber4 value="<?php echo $creditCardNumber[3]?>" disabled>
					</div>
				</div>
			<div class=form-row>
				<div class="form-group expDate col-md-2">
					<label for=month>Month</label>
					<input name=month class=form-control type=number min=1 max=12 value="<?php echo $card['expMonth']?>" disabled>
				</div>
				<div class="form-group expDate col-md-2">
					<label for=year>Year</label>
					<input name=year class=form-control type=number min=2020 max=2040 value="<?php echo $card['expYear']?>" disabled>
				</div>
				<!-- empty div to set spacing -->
				<div class=col-md-3></div>
				<div class="col-md-2 form-group">
					<label for=cvv>CVV</label>
					<input name=cvv class=form-control style="width: 180px;" type=text maxlength=3 value="<?php echo $card['cvv']?>" disabled>
				</div>
    		</div>
    		<div style="height: 80px"></div>
    		<div class="d-flex align-items-center justify-content-center form-row">
        		<form action="/FruitStore/presentation/cards.php" method=POST>
        			<input type=hidden name=fromFinalize value=true>
        			<input type=submit class="btn btn-success" value=Change>
        		</form>
    		</div>
        </div>
        
        <!-- Address section -->
        <div class="col-5 my-5">
        	<h3>Is this the address you would like to use?</h3>
        	<div class=form-row>
				<div class="form-group col">
					<label for=firstname>Firstname</label>
					<input type=text class=form-control value="<?php echo $primaryAddress['deliverToFirstname']?>" disabled>
				</div>
				<div class="form-group col">
					<label for=lastname>Lastname</label>
					<input type=text class=form-control value="<?php echo $primaryAddress['deliverToLastname']?>" disabled>
				</div>
			</div>
			<div class=form-group>
				<label for=street>Street Address</label>
				<input type=text class=form-control value="<?php echo $primaryAddress['street']?>" disabled>
			</div>
			<div class=form-row>
    			<div class="form-group col-6">
    				<label for=city>City</label>
    				<input type=text class=form-control value="<?php echo $primaryAddress['city']?>" disabled>
    			</div>
    			<div class="form-group col-6">
    				<label for=state>State</label>
    				<input type=text class=form-control value="<?php echo $primaryAddress['state']?>" disabled>
    			</div>
    			<div class="form-group col-6">
    				<label for=country>Country</label>
    				<input type=text class=form-control value="<?php echo $primaryAddress['country']?>" disabled>
    			</div>
    			<div class="form-group col-6">
    				<label for=zip>Zip Code</label>
    				<input type=text class=form-control value="<?php echo $primaryAddress['zip']?>" disabled>
    			</div>
			</div>
			<div class="d-flex align-items-center justify-content-center form-row">
        		<form action="/FruitStore/presentation/addresses.php" method=POST>
        			<input type=hidden name=fromFinalize value="true">
        			<input type=submit class="btn btn-success" value=Change>
        		</form>
    		</div>
        </div>
    </div>
    <div class="row d-flex justify-content-center">
    	<form action="/FruitStore/business/orderHandler.php" method="POST">
    		<input type=submit value=Order class="btn btn-primary">
    	</form>
    </div>
</div>
<?php include '_footer.php'?>


