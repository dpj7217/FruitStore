<?php
/*
 * CHANGE TO addCreditCard.php
 * 
 */

require_once 'header.php';
require_once 'protectPage.php';
?>


<head>
	<title>Fruitstore | Add Credit Card</title>
	<style>
        .ccnum {
            display: inline;
            width: 175px;
        }
        
        .expDate {
            width: 100px;
            display: inline;
        }
        
        .cvv {
            width: 175px;
        }
        
        input[type="number"]::-webkit-inner-spin-button,
    	input[type="number"]::-webkit-outer-spin-button
    	{
    	   height: 30px;
           line-height: 1.65;
           display: block;
           padding: 0;
           margin: 0;
           padding-left: 20px;
           border: 1px solid #eee;	
        }
        
        
    </style>
</head>
<div class="container my-5">

	<?php if (isset($_SESSION['creditSuccess'])) {?>
		<div class="bg-success text-white">
			<p><?php echo $_SESSION['creditSuccess']?></p>
		</div>
	<?php unset($_SESSION['creditSuccess']); } else if (isset($_SESSION['creditFailure'])) {?>
		<div class="bg-danger text-white">
			<p><?php echo $_SESSION['creditFailure']?></p>
		</div>
	<?php unset($_SESSION['creditFailure']);}?>
	<div class="row">
		<!-- empty div to set spacing -->
		<div class=col-2></div>
		<div class=col>
			<form action="/FruitStore/business/addCreditCardHandler.php" method=POST>
				<div class=form-row>
					<div class="form-group col-md-5">
        				<label for="firstname">First Name</label>
        				<input class="form-control" type="text" id="firstname" name="firstname"/>    			
        			</div>
            		<div class="form-group col-md-2">
            			<label for="middleInitial">M.I.</label>
    	    			<input class="form-control" type="text" id="middleInitial" name="middleInitial"/>
            		</div>	
            		<div class="form-group col-md-5">
            			<label for="lastName">Last Name</label>
    	       			<input class="form-control" type="text" id="lastName" name="lastname"/>
            		</div>
				</div>
				<div class=form-row>
					<div class="form-group">
						<label for=creditCardNumber>Credit Card Number</label><br/>
						<input class="form-control ccnum" type=text maxlength=4 name=creditCardNumber1>-
						<input class="form-control ccnum" type=text maxlength=4 name=creditCardNumber2>-
						<input class="form-control ccnum" type=text maxlength=4 name=creditCardNumber3>-
						<input class="form-control ccnum" type=text maxlength=4 name=creditCardNumber4>
					</div>
				</div>
				<div class=form-row>
					<div class="form-group expDate col-md-2">
						<label for=month>Month</label>
						<input name=month class=form-control type=number min=1 max=12 >
					</div>
					<div class="form-group expDate col-md-2">
						<label for=year>Year</label>
						<input name=year class=form-control type=number min=2020 max=2040>
					</div>
					<!-- empty div to set spacing -->
					<div class=col-md-5></div>
					<div class="col-md-2 form-group">
						<label for=cvv>CVV</label>
						<input name=cvv class=form-control style="width: 175;" type=text maxlength=3 >
					</div>
				</div>
				<div class="form-group">
    					<div class="form-check">
    						<input class="form-check-input" type="checkbox" value="true" id="primaryCheck" name="primaryCheck"/>
    						<label class="form-check-label" for="primaryCheck">Set As Primary Payment Method</label>
    					</div>
    			</div>
				<input type=submit value="Add" class="btn btn-primary">
			</form>
		</div>
		<!-- empty div to set spacing -->
		<div class=col-2></div>
	</div>
</div>
<script>
	$(document).on('click', function() {
		$('.text-white').hide();
	});
</script>
<?php include '_footer.php'?>
