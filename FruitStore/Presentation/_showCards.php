<?php

function getLastFour($creditCardNumber) {
    $numbers = explode('-', $creditCardNumber);
    return "XXXX-XXXX-XXXX-" . $numbers[3];
}

if (isset($_SESSION['creditFailure'])) {
    echo "<div class='bg-danger text-white'>
            <p>" . $_SESSION['creditFailure'] . "</p>
          </div>";
}
?>
<head>
	<title>FruitStore | My Cards</title>
</head>
<table class="my-4 table table-hover table-striped">
	<thead>
		<tr>
			<th>Name</th>
			<th>Card Number</th> <!-- first 12 are 'x'; last four are numbers -->
			<th>Expires</th><!-- combine '[expMonth]/[expYear]' -->
			<th style="text-align: center;"><small class=text-muted style="display: block;">This will change your primary card</small></th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		<?php while ($row = $data->fetch_assoc()) {?>
			<tr <?php if ($row['isPrimaryCard']) echo "style='border-style: solid; border-color: green;' class='text-success'"?>>
				<td><?php echo $row['firstname'] . " " . $row['middleInitial'] . " " . $row['lastname']?></td>
				<td><?php echo getLastFour($row['creditCardNumber'])?></td>
				<td><?php echo $row['expMonth'] . "/" . $row['expYear']?></td>
				<td class="d-flex align-items-center justify-content-center">
					<form action="/FruitStore/business/updatePrimaryCard.php" method=POST>
						<?php if ($_POST['fromFinalize']) {?>
							<input type=hidden name=fromFinalize value=true>
						<?php }?>
    					<input type=hidden value="<?php echo $row['userID']?>" name=userID>
    					<input type=hidden value="<?php echo $row['creditCardNumber']?>" name=creditCardNumber>
    					<button type=submit <?php if ($row['isPrimaryCard']) { echo "class='btn btn-success' disabled"; } else echo "class='btn btn-outline-primary'"?>>Use</button>
    				</form>
				</td>
				<td style="text-align: center;">
					<form action="/FruitStore/business/deleteCard.php" method=POST>
						<input type=hidden value="<?php echo $row['creditCardNumber']?>" name=creditCardNumber>
						<?php if ($row['isPrimaryCard']) {?>
						    <button type=submit class="btn btn-success" disabled>X</button>
						    <small class=text-muted style="display: block;">Cannot delete primary card</small>
						<?php } else {?>
							<button type=submit class="btn btn-outline-danger">X</button>
						<?php }?>
					</form>
				</td>
			</tr>
		<?php }?>
	</tbody>
</table>
<div class="my-3 d-flex justify-content-center">
	<a href="/FruitStore/presentation/addCreditCard.php" class="btn btn-success">Add New Card</a>
</div>
