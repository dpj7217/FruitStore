<?php 
    require_once 'header.php';
    require_once 'protectPage.php';
    require_once '../business/classes/addressBusiness.php';
    require_once '../Business/classes/creditCardBusiness.php';
?>
<head>
	<title>FruitStore | Account Details</title>
</head>
<style>
	input[type="date"]::-webkit-inner-spin-button,
	input[type="date"]::-webkit-outer-spin-button
	{
        width: 45px;
        line-height: 1.65;
        float: left;
        display: block;
        padding: 0;
        margin: 0;
        padding-left: 20px;
        border: 1px solid #eee;	
    }
    
    .box {
        border: 2px solid;
        border-radius: 3px;
        height: 500px;
        display: inline-block;
        margin: 5px;
        overflow-x: hidden;
        overflow-y: auto;
    }
    
    .box::-webkit-scrollbar {
        width: 10px;
        background-color: #F5F5F5;
    }
    
    .box::-webkit-scrollbar-thumb {
        width: 2px;
        background-color: #343a40;
        
    }
    
    .box::-webkit-scrollbar-track {
        -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
        background-color: #28a745;
    }
</style>
<div class=row>
	<div class=col-1></div>
	
	
	
	<div id=addressDiv class="col-5 box" >
		<h3 style="margin: 5px;">Addresses</h3>
		<?php
            
            $business = new addressBusiness();
            $data = $business->getAllAddresses($_SESSION['username']);
            
            if ($data->num_rows > 0) {
                include "_showAddresses.php";
            } else {
                echo "<div class=' hideable d-flex justify-content-center align-items-center'>
        		          <h3 class='bg-danger text-white rounded' style='text-align: center;'>No addresses found here. Please add one to proceed</h3>
                          <a href='/FruitStore/presentation/addAddress.php' class='btn btn-success'>Add Address</a>
        	          </div>";
            }
        ?>
		
	</div>



	<div id="cardDiv" class="col-5 box">
		<h3 style="margin: 5px;">Credit Cards</h3>
		<?php
            
            
            $business = new creditCardBusiness();
            $data = $business->getAllCards($_SESSION['username']);
            
            if ($data->num_rows > 0) {
                include '_showCards.php';
            } else {
                echo "<div class=' hideable d-flex justify-content-center align-items-center'>
        		          <h3 class='bg-danger text-white rounded' style='text-align: center;'>No cards found here. Please Add one to proceed</h3>
                          <a href='/FruitStore/presentation/addCreditCard.php' class='btn btn-success'>Add Credit Card</a>
        	          </div>";
                
            }
        ?>
		
	</div>
	<div class=col-1></div>
</div>
<div class=row>
	<div class=col-1></div>
	
	<div id="salesReportDiv" class="col-5 box">
		<h3 style="margin: 5px;">Get Sales Report</h3>
        
        <?php if (isset($_SESSION['salesReportFailure'])) {?>
        	<div class=" hideable d-flex justify-content-center align-items-center">
        		<h4 class="bg-danger text-white rounded" style="text-align: center;"><?php echo $_SESSION['salesReportFailure']?></h4>
        	</div>
        <?php unset($_SESSION['salesReportFailure']);} else if (isset($_SESSION['salesReportSuccess'])){ ?>
        	<div class="hideable d-flex justify-content-center align-items-center">
        		<h4 class="bg-success text-white rounded" style=" text-align: center;"><?php echo $_SESSION['salesReportSuccess']?></h4>
        	</div>
        <?php unset($_SESSION['salesReportSuccess']);}?>
        <div class="col" style="top: 25%;">
        	<form action="/FruitStore/presentation/getSalesReport.php" method="get">
        		<div class=form-group>
                    <label for=beginDate>Beginning Date</label>
                    <input class=form-control type="date" name=beginDate id=endDate>
                </div>
        		<div class=form-group>
        			<label for=endDate>End Date</label>
        			<input class=form-control type="date" name=endDate id=endDate>
        		</div>
        		<input type=submit value=Submit class="btn btn-success">
        	</form>
        </div>
		
		

	</div>
	<div class="col-5 box">
		<?php if (isset($_SESSION['failureMessage'])) {?>
        	<div class=" hideable d-flex justify-content-center align-items-center">
        		<h4 class="bg-danger text-white rounded" style="text-align: center;"><?php echo $_SESSION['failureMessage']?></h4>
        	</div>
        <?php unset($_SESSION['failureMessage']);} else if (isset($_SESSION['successMessage'])) {?>
	    	<div class=" hideable d-flex justify-content-center align-items-center">
    	 		<h4 class="bg-primary text-white rounded" style="text-align: center;"><?php echo $_SESSION['successMessage']?></h4>
        	</div>
        
        <?php unset($_SESSION['successMessage']);}?>
		<div style="text-align: center;" class="mx-5"> 
    		<h3 style="margin: 5px;">Current Orders</h3>
    		<form action="/FruitStore/Presentation/getAllOrders.php" method=POST>
        		<input type=hidden id=fromCurrentOrders name=fromCurrentOrders value="true">
        		<input style="width: 100%" type=submit class="btn btn-success" value="Go">
    		</form>
		</div>
		<div style="text-align: center;" class="mx-5">
			<h3 style="margin: 5px;">Request Return</h3>
			<form action="/FruitStore/presentation/requestReturn.php" method=POST>
				<input type=hidden id=fromRequestReturn name=fromRequestReturn value=true>
				<input style="width: 100%" type=submit value=Go class="btn btn-success">
			</form>
		</div>
	</div>
	<!-- EMPTY DIV TO SET SPACING -->
	<div class=col-1></div>
</div>

<script>
	$(document).on('click', function() {
		$('.hideable').hide();
	});
</script>
<?php include '_footer.php'?>