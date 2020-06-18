<?php
include '_productModal.php';

if (isset($_SESSION['deleteSuccess'])) {
    echo "<div id=deleteSuccess class='p-2 m-2 bg-success text-white'>";
    echo "<p>" . $_SESSION['deleteSuccess'] . "</p>";
    echo "</div>";
} else if (isset($_SESSION['deleteFailure'])) {
    echo "<div id=deleteFailed class='p-2 m-2 bg-danger text-white'>";
    echo "<p>" . $_SESSION['deleteFailure'] . "</p>";
    echo "</div>";
} else if (isset($_SESSION['editSuccess'])) {
    echo "<div id=editSuccess class='p-2 m-2 bg-success text-white'>";
    echo "<p>" . $_SESSION['editSuccess'] . "</p>";
    echo "</div>";
} else if (isset($_SESSION['editFailure'])) {
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
			<th>Name</th>
			<th>Price</th>
			<th>Description</th>
			<th>Quantity On Hand</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
    <?php
    while ($row = $data->fetch_assoc()) {
    ?>
		<tr id="<?php echo $row['product_ID']?>">
			<td class="name"><?php echo $row['name']?></td>
			<td class="price"><?php echo $row['price']?></td>
			<td class="description"><?php echo $row['description']?></td>
			<td class="quantity"><?php echo $row['quantityOnHand']?>
			<td>
				<form style="display: inline;" method="POST" action="editProduct.php">
					<input type="hidden" name="productID" value="<?php echo $row['product_ID']?>">
					<button type="submit" class="btn btn-outline-primary" id="editBtn">Edit</button>
				</form>
				<button class="btn btn-outline-danger deleteBtn" data-toggle="modal" data-target="#productModal">Delete</button>
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
		var name = td.children('.name').text();
		var price = td.children('.price').text();
		var description = td.children('.description').text();
		var quantity = td.children('.quantity').text();
		var id = td.attr('id');
		
		$('#productModal').find('#name').attr('value', name);
		$('#productModal').find('#price').attr('value', price);
		$('#productModal').find('#description').text(description);
		$('#productModal').find('#quantity').attr('value', quantity);
		$('#productModal').find('#productID').attr('value', id);
	});


});
</script>












