<?php
require_once 'header.php';

if (!$_SESSION['admin']) {
    $_SESSION['successMessage'] = "You do not have the required permissions to access this page. Please Login as an admin to access this page";
    header("location: loginRegister.php");
    die();
}



?>
<head>
	<title>FruitStore | Add New User</title>
</head>
<body>
	<div class="container">
		<div class=row>
	  		<!-- Empty div to set spacing -->
			<div class=col-2></div>
    		<div class=" my-4 col">
    			<?php 
				if (!empty($_SESSION['addUserError'])) {
				?>    
    				<div class="p-2 m-2 bg-danger text-white">
         				<p> <?php echo $_SESSION['addUserError'] ?> </p>
    	       		</div>
    			<?php 
				} else if (!empty($_SESSION['addUserSuccess'])) {
                ?>
	                <div class="p-2 m-2 bg-success text-white">
         				<p> <?php echo $_SESSION['addUserSuccess'] ?> </p>
    	       		</div>
                <?php 
				}
				
				unset($_SESSION['addUserSuccess']);
    			unset($_SESSION['addUserError']);
				?>
				
			
    			<h2>Add User</h2>
        		<form method="post" action="/FruitStore/business/addUserHandler.php">
        			<div class="form-row">
            			<div class="form-group col-md-5">
            				<label for="firstname">First Name</label>
            				<input class="form-control" type="text" id="firstname" name="firstname" placeholder="First Name" />    			
            			</div>
                		<div class="form-group col-md-2">
                			<label for="middleInitial">M.I.</label>
        	    			<input class="form-control" type="text" id="middleInitial" name="middleInitial" placeholder="M.I."/>
                		</div>	
                		<div class="form-group col-md-5">
                			<label for="lastName">Last Name</label>
        	       			<input class="form-control" type="text" id="lastname" name="lastname" placeholder="Last Name"/>
                		</div>
        			</div>
        			<div class="form-group">
        					<label for="username">Username</label>
        					<input class="form-control" type="text" id="username" name="username" placeholder="Username"/>
        				</div>
        			<div class="form-row">
        				<div class="form-group col-md-6">
        					<label for="password">Password</label>
        					<input class="form-control" type="password" id="password" name="password" placeholder="Password" />
        				</div>
        				<div class="form-group col-md-6">
        					<label for="passwordconf">Confirm Password</label>
        					<input class="form-control" type="password" id="passwordconf" name="passwordconf" placeholder="Password Confirmation" />
        				</div>
        			</div>
        			<div class="form-group">
        				<label for="email">Email</label>
        				<input class="form-control" type="email" id="email" name="email" placeholder="Email@MyEmailAddress.com"/>
        			</div>
        			<div class="form-group my-3">
						<div class="form-check">
							<input type="checkbox" id="isAdmin" name="isAdmin" class="form-check-input" value="1" />
							<label for="isAdmin" class="form-check-label">Admin</label>
						</div>
						<small class="form-text text-muted">Only give Admin status to trustworthy people</small> 
					</div>
        			<button type="submit" class="btn btn-primary">Register</button>
        		</form>
    		</div>
    		<!-- Empty div to set spacing -->
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



