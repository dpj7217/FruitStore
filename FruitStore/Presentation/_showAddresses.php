<?php 

if (isset($_SESSION['addressFailure'])) {
    echo "<div class='bg-danger text-white d-flex justify-content-center'>
            <h3>" . $_SESSION['addressFailure'] . "</h3
          </div>";
    unset($_SESSION['addressFailure']);
}

?>
<table class="table table-striped table-hover">
	<thead>
		<tr>
			<th>Recipient</th>
			<th>Street Address</th>
			<th>City</th>
			<th>State</th>
			<th>Zip</th>
			<th style="text-align: center;"><small class="form-text text-muted">This will update your primary address</small></th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		<?php while ($row = $data->fetch_assoc()) {?>
			<tr <?php if($row['isPrimaryAddress']) echo "style='border-style: solid; border-color: green' class=text-success"?>>
				<td><?php echo $row['deliverToFirstname'] . " " . $row['deliverToLastname']?></td>
				<td><?php echo $row['street']?></td>
				<td><?php echo $row['city']?></td>
				<td><?php echo $row['state']?></td>
				<td><?php echo $row['zip']?></td>
				<td class="d-flex justify-content-center"><!-- row for "use as primary" button -->
					<form action="/FruitStore/business/updatePrimaryAddressHandler.php" method=POST>
						<?php if($_POST['fromFinalize']) {?>
							<input type=hidden name=fromFinalize value=true>
						<?php }?>
						<input type=hidden name=addressID value="<?php echo $row['addressID']?>">
						<input type=submit value=Use <?php if ($row['isPrimaryAddress']) echo "class='btn btn-success' disabled"; else echo "class='btn btn-outline-primary'" ?>>
					</form>
				</td>
				<td style="text-align: center;">
					<form action="/FruitStore/business/deleteAddressHandler.php" method=POST>
						<input type=hidden name=addressID value="<?php echo $row['addressID']?>">
						<?php if($row['isPrimaryAddress']) {?>
							<input type=submit value="X" class="btn btn-success" disabled>
							<small style="display:block;" class=text-muted>Cannot delete primary address</small>
						<?php } else {?>
							<input type=submit value="X" class="btn btn-outline-danger">
						<?php }?>
					</form>
				</td>
			</tr>
		<?php }?>
	</tbody>
</table> 

<script>
	$(document).on('click', function() {
		$('.d-flex').hide();
	});
		
</script>
<div class="my-3 d-flex justify-content-center">
	<a href="/FruitStore/presentation/addAddress.php" class="btn btn-success">Add New Address</a>
</div>