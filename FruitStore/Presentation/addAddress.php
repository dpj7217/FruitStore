<?php
require_once 'header.php';
require_once 'protectPage.php';

if (isset($_SESSION['addressSuccess'])) {
    echo "<div class='d-flex justify-content-center bg-success text-white'>
            <h3> " . $_SESSION['addressSuccess'] . "</h3>
          </div>";
    
    unset($_SESSION['addressSuccess']);
} else if (isset($_SESSION['addressFailure'])) {
    echo "<div class='d-flex justify-content-center bg-danger text-white'>
            <h3>" . $_SESSION['addressFailure'] ."</h3>
          </div>";
    
    unset($_SESSION['addressFailure']);
}
?>

<head>
	<title>FruitStore | Add Address</title>
</head>

<div class="container my-5">
	<!-- empty div to set spacing -->
	<div class=col-2></div>
	
	<div class=col>
		<h3>Add Address</h3>
		<form action=/FruitStore/business/addAddressHandler.php method=POST>
			<div class=form-row>
				<div class="form-group col">
					<label for=firstname>Firstname</label>
					<input type=text id=firstname name=firstname class=form-control>
				</div>
				<div class="form-group col">
					<label for=lastname>Lastname</label>
					<input type=text id=lastname name=lastname class=form-control>
				</div>
			</div>
			<div class=form-group>
				<label for=street>Street Address</label>
				<input type=text id=street name=street class=form-control>
			</div>
			<div class=form-row>
    			<div class="form-group col-6">
    				<label for=city>City</label>
    				<input type=text id=city name=city class=form-control>
    			</div>
    			<div class="form-group col-6">
    				<label for=state>State</label>
    				<select class=form-control name=state id=state>
                    	<option value="AL">Alabama</option>
                    	<option value="AK">Alaska</option>
                    	<option value="AZ">Arizona</option>
                    	<option value="AR">Arkansas</option>
                    	<option value="CA">California</option>
                    	<option value="CO">Colorado</option>
                    	<option value="CT">Connecticut</option>
                    	<option value="DE">Delaware</option>
                    	<option value="DC">District Of Columbia</option>
                    	<option value="FL">Florida</option>
                    	<option value="GA">Georgia</option>
                    	<option value="HI">Hawaii</option>
                    	<option value="ID">Idaho</option>
                    	<option value="IL">Illinois</option>
                    	<option value="IN">Indiana</option>
                    	<option value="IA">Iowa</option>
                    	<option value="KS">Kansas</option>
                    	<option value="KY">Kentucky</option>
                    	<option value="LA">Louisiana</option>
                    	<option value="ME">Maine</option>
                    	<option value="MD">Maryland</option>
                    	<option value="MA">Massachusetts</option>
                    	<option value="MI">Michigan</option>
                    	<option value="MN">Minnesota</option>
                    	<option value="MS">Mississippi</option>
                    	<option value="MO">Missouri</option>
                    	<option value="MT">Montana</option>
                    	<option value="NE">Nebraska</option>
                    	<option value="NV">Nevada</option>
                    	<option value="NH">New Hampshire</option>
                    	<option value="NJ">New Jersey</option>
                    	<option value="NM">New Mexico</option>
                    	<option value="NY">New York</option>
                    	<option value="NC">North Carolina</option>
                    	<option value="ND">North Dakota</option>
                    	<option value="OH">Ohio</option>
                    	<option value="OK">Oklahoma</option>
                    	<option value="OR">Oregon</option>
                    	<option value="PA">Pennsylvania</option>
                    	<option value="RI">Rhode Island</option>
                    	<option value="SC">South Carolina</option>
                    	<option value="SD">South Dakota</option>
                    	<option value="TN">Tennessee</option>
                    	<option value="TX">Texas</option>
                    	<option value="UT">Utah</option>
                    	<option value="VT">Vermont</option>
                    	<option value="VA">Virginia</option>
                    	<option value="WA">Washington</option>
                    	<option value="WV">West Virginia</option>
                    	<option value="WI">Wisconsin</option>
                    	<option value="WY">Wyoming</option>
                    </select>
    			</div>
    			<div class="form-group col-6">
    				<label for=country>Country</label>
    				<select class=form-control name=country id=country>
    					<option value=USA>United States of America</option>
    					<option value=GBA>Great Britain</option>
    					<option value=CDA>Canada</option>
    					<option value=MXC>Mexico</option>
    				</select>
    			</div>
    			<div class="form-group col-6">
    				<label for=zip>Zip Code</label>
    				<input type=text id=zip name=zip class=form-control>
    			</div>
			</div>
			<div class=form-row>
				<div class="form-check">
					<input class="form-check-input" type="checkbox" value="true" id="primaryCheck" name="primaryCheck"/>
					<label class="form-check-label" for="primaryCheck">Set As Primary Delivery Address</label>
				</div>
			</div>
			<input type=submit class="btn btn-primary my-3" value=Submit>
		</form>
	</div>
	
	<!-- empty div to set spacing -->
	<div class=col-2></div>
</div>
<script>
	$(document).on('click', function() {
		$('.d-flex').hide();
	});
</script>
<?php include '_footer.php'?>