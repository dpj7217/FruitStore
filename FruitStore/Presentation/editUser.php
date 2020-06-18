<?php
require_once '../Business/classes/userBusiness.php';
require_once '../Presentation/header.php';
require_once 'protectPage.php';

$business = new userBusiness();
$userID = $_POST['userID'];

$result = $business->findByID($userID);


if ($result) {
    while($user = $result->fetch_array()) {
?>

<head>
	<title>FruitStore | Edit User</title>
	<script>
		$(document).ready(function() {
			if (<?php echo $user['isAdmin']?>) {
				$('#isAdmin').attr('checked', true);
			}	
		});	
	</script>
</head>
<body>
	<div class="container">
		<div class="row">
			<!-- Empty div to create spacing -->
			<div class="col-2"></div>
				<div class="my-4 col">
					<h3>Edit</h3> 
					<form action="/FruitStore/Business/editHandler.php" method="post">
						<input type=hidden name=userID id=userID value="<?php echo $userID?>">
						<input type=hidden name=password id=password value="<?php echo $user['password']?>"/>
						<div class="form-group">
							<label for="firstname">First Name</label>
							<input type="text" id="firstname" name="firstname" class="form-control" value="<?php echo $user['firstname']?>"/>
						</div>
						<div class="form-group">
							<label for="middleInitial">Middle Initial</label>
							<input type="text" id="middleInitial" name="middleInitial" class="form-control" value="<?php echo $user['middleInitial']?>"/>
							<small class="form-text text-muted">Limit of three characters</small>
						</div>
						<div class="form-group">
							<label for="lastname">Last Name</label>
							<input type="text" id="lastname" name="lastname" class="form-control" value="<?php echo $user['lastname']?>"/>
						</div>
						<div class="form-group">
							<label for="username">Username</label>
							<input type="text" id="username" name="username" class="form-control" value="<?php echo $user['username']?>"/>
						</div>
						<div class="form-group">
							<label for="email">Email</label>
							<input type="text" id="email" name="email" class="form-control" value="<?php echo $user['email']?>"/>
						</div>
						<div class="form-group my-3">
    						<div class="form-check">
    							<input type="checkbox" id="isAdmin" name="isAdmin" class="form-check-input" value="1" />
    							<label for="isAdmin" class="form-check-label">Admin</label>
    						</div>
    						<small class="form-text text-muted">Only give Admin status to trustworthy people</small> 
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
    $_SESSION['editFailure'] = "Could not find user with ID " . $userID . ". Please try again.";
    header("location: users.blade.php");
}

include '_footer.php';
?>
