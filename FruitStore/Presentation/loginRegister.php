<?php


    require_once 'header.php';
    
?>

<html>
	<head>
		<title>Fruit Store | Login or Register</title>
		<script>
			$(document).on('click', '.form-control', function() {
				$('.p-2').hide();
			})
		</script>
	</head>
	<body>
		<div class="container">
			<?php 
			if (isset($_SESSION['successMessage'])) {
                echo "<div class='p-2 m-2 bg-success'>
                        <p>" . $_SESSION['successMessage'] . "</p>
                      </div>";
               
			}
			
			unset($_SESSION['successMessage']);
			?>
    		<div class="row">
    			<div class="col-5">
    			
    				<h2>Register</h2>
    				<?php 
    				if (!empty($_SESSION['registerErrorMessage'])) {
    				?>    
        				<div class="p-2 m-2 bg-danger text-white">
             				<p> <?php echo $_SESSION['registerErrorMessage'] ?> </p>
        	       		</div>
        			<?php 
        			}
    				
        			unset($_SESSION['registerErrorMesssage']);
    				?>
    				
    				
            		<form method="post" action="/FruitStore/business/registerHandler.php">
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
            	       			<input class="form-control" type="text" id="lastName" name="lastname" placeholder="Last Name"/>
                    		</div>
            			</div>
            			<div class="form-group">
            					<label for="username">Username</label>
            					<input class="form-control" type="text" id="regUsername" name="regUsername" placeholder="Username"/>
            				</div>
            			<div class="form-row">
            				<div class="form-group col-md-6">
            					<label for="password">Password</label>
            					<input class="form-control" type="password" id="regPassword" name="regPassword" placeholder="Password" />
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
            			<button type="submit" class="btn btn-primary">Register</button>
            		</form>
        		</div>
        		
        		<!-- empty div to set spacing -->
        		<div class="col-2"></div>
        		
        		<div class="col-5">
        			<h2>Login</h2>
        		
        			<?php 
    				if (isset($_SESSION['loginErrorMessage'])) {
    				    
    				echo "
        				<div class='p-2 mb-2 bg-danger text-white'>
         					<p>" . $_SESSION['loginErrorMessage'] . "</p>
    	       			</div>";
    				}
    				
    				unset($_SESSION['loginErrorMessage']);
    				
    				?>
        			<form action="/FruitStore/business/loginHandler.php" method="post">
        				<div class="form-group">
        					<label for="username">Username</label>
        					<input class="form-control" type="text" id="loginUsername" name="loginUsername" placeholder="Username"/>
        				</div>
        				<div class="form-group">
        					<label for="password">Password</label>
        					<input class="form-control" type="password" id="loginPassword" name="loginPassword" placeholder="Password"/>
        				</div>
        				<div class="form-group">
        					<div class="form-check">
        						<input class="form-check-input" type="checkbox" value="true" id="rememberMeCheck" disabled/>
        						<label class="form-check-label" for="rememberMeCheck">Remember Me</label>
        						<small class="form-text text-muted">Remember me support under construction</small>
        					</div>
        				</div>
        				<button type="submit" class="btn btn-primary">Login</button>
        			</form>
        		</div>
    		</div>
		</div>		
	<?php include '_footer.php'?>
</html>
