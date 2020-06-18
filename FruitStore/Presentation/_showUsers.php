<?php 
include '_userModal.php';

if (isset($_SESSION['deleteSuccess'])) {
    echo "<div id=deleteSuccess class='p-2 m-2 bg-success text-white'>";
        echo "<p>" . $_SESSION['deleteSuccess'] . "</p>";
    echo "</div>";
} else if (isset($_SESSION['deleteFailed'])) {
    echo "<div id=deleteFailed class='p-2 m-2 bg-danger text-white'>";
        echo "<p>" . $_SESSION['deleteFailure'] . "</p>";
    echo "</div>";
} else if (isset($_SESSION['editSuccess'])) {
    echo "<div id=editSuccess class='p-2 m-2 bg-success text-white'>";
        echo "<p>" . $_SESSION['editSuccess'] . "</p>";
    echo "</div>";
} else if (isset($_SESSION['editFailed'])) {
    echo "<div id=editFailed class='p-2 m-2 bg-danger text-white'>";
        echo "<p>" . $_SESSION['editFailure'] . "</p>";
    echo "</div>";
} 


unset($_SESSION['editSuccess']);
unset($_SESSION['editFailure']);
unset($_SESSION['deleteSuccess']);
unset($_SESSION['deleteFailure']);

?>


<table class="table table-hover table-striped">
	<thead>
		<tr>
			<th>First Name</th>
			<th style="text-align: center;">Middle Initial</th>
			<th>Last Name</th>
			<th>Username</th>
			<th>Email</th>
			<th style="text-align: center;">Admin</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
    <?php
    while ($row = $data->fetch_assoc()) {
    ?>
		<tr id="<?php echo $row['userID']?>">
			<td class="firstname"><?php echo $row['firstname']?></td>
			<td class="middleInitial" style="text-align: center;"><?php echo $row['middleInitial']?></td>
			<td class="lastname"><?php echo $row['lastname']?></td>
			<td class="username"><?php echo $row['username']?></td> 
			<td class="email"><?php echo $row['email']?></td>
			<td class="isAdmin" style="text-align: center;"><?php if ($row['isAdmin']) echo "X"; ?>
			<td>
				<form style="display: inline;" method="POST" action="editUser.php">
					<input type="hidden" name="userID" value="<?php echo $row['userID']?>">
					<button type="submit" class="btn btn-outline-primary" id="editBtn">Edit</button>
				</form>
				<button class="btn btn-outline-danger deleteBtn" data-toggle="modal" data-target="#userModal">Delete</button>
			</td>
		</tr>	
    <?php 
    }
    ?>
    </tbody>
</table>



<script>
$(document).ready(function() {
	$(document).on('click', function() {
		$('.p-2').hide();
	});
	
	$('.deleteBtn').on('click', function() {
		var td = $(this).parent().parent();
		var firstname = td.children('.firstname').text();
		var lastname = td.children('.lastname').text();
		var middleInitial = td.children('.middleInitial').text();
		var username = td.children('.username').text();
		var email = td.children('.email').text();
		var id = td.attr('id');

		$('#userModal').find('#firstname').attr('value', firstname);
		$('#userModal').find('#middleInitial').attr('value', middleInitial);
		$('#userModal').find('#lastname').attr('value', lastname);
		$('#userModal').find('#username').attr('value', username);
		$('#userModal').find('#email').val(email);
		$('#userModal').find('#userID').attr('value', id);
		$('#userModal').find('#hiddenFirstname').attr('value', firstname); 
				
	});


});
</script>












