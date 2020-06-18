<?php
    require_once 'Presentation/header.php';
    require_once 'business/classes/productBusiness.php';
   
?>
<head>
	<title>FruitStore</title>
</head>
<body>
	<?php 
	
	//local variables
	$business = new productBusiness();
	$data = $business->findAll();
	$count = 0;
	$newRow = true;

	//parent div
    echo "<div class=my-4>";

    //session variables
    if (isset($_SESSION['cartSuccess'])) {
        echo "<div class='p-2 m-2 bg-success'>
                <p>" . $_SESSION['cartSuccess'] . "</p>
              </div>";
        
        unset($_SESSION['cartSuccess']);
        
    }
    
    
    if (!empty($_SESSION['cartFailure'])) {
        ?>
    		<div class="p-2 m-2 bg-danger text-white">
    			<p> <?php echo $_SESSION['cartFailure'] ?> </p>
       		</div>
    	<?php 
    	
    	unset($_SESSION['cartFailure']);
    }
				
   
    
    //loop through data
    while($row = $data->fetch_assoc()) {
        
        //Test to see if new row needs to be started
        if ($newRow) {
            echo "<div class='card-deck'>";
            $newRow = false;
        }
        
        
        //Echo product details
        echo "<div class='card text-center'>";
            echo "<img class='mx-auto' src='/FruitStore/presentation/images/" . $row['imageFileLocation'] . ".jpg' alt='". $row['name'] ." image' height='200' width='342'>";
            echo "<div class='card-body'>";
                echo "<h5 class='card-title'>" . $row['name'] . "</h5>";
                echo "<p class='card=text'>" . $row['description'] ."</p>";
                echo "<button type='button' class='modalButton btn btn-primary' data-toggle='modal' data-target='#detailsModal' 
                       data-id='" . $row['product_ID'] . "' 
                       data-img='/FruitStore/presentation/images/" . $row['imageFileLocation'] . ".jpg'
                       data-name='" . $row['name'] . "'
                       data-price='" . $row['price'] . "'
                       data-description='" . $row['description'] . "'
                       data-quantity='" . $row['quantityOnHand'] . "'>
                       Details
                       </button>";
            echo "</div>";
        echo "</div>";

    	
            	
    	$count++;
    	
    	//Test to see if row was created
    	if ($count == 3){
    	    echo "</div>";
    	    $newRow = true;
    	    $count = 0;
        }
	}
	echo "</div>";
	?>
</body>

<div class="modal fade" id="detailsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalTitle"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
    	<img id="productImg" height="240" width="400">
    	<div class="form-group">
    		<label for="productName">Name:</label>
    		<input type="text" class="form-control" id="productName" readonly>
    	</div>
    	<div class="form-group">
    		<label for="productDescription">Description:</label>
    		<textarea id="productDescription" class="form-control" rows="5" readonly></textarea>
    	</div>
    	<div class="form-group">
    		<label for="productPrice">Price:</label>
    		<input type="text" class="form-control" id="productPrice" readonly>
    	</div>
    	<div class="modal-footer">
    		<form action=/FruitStore/Business/addToCartHandler.php method=post>
    			<input type=hidden id=id name=id>
    			<input type=hidden id=price name=price>
    			<input type=hidden id=quantity name=quantityOnHand>
    			<button type="submit" class="btn btn-primary">Add To Cart</button>
			</form>
    		<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> <br/>
		</div>
      </div>
    </div>
  </div>
</div>
<script>
	$(document).on('click', '.modalButton', function() {
		var id = $(this).attr('data-id');
		var img = $(this).attr('data-img');
		var name = $(this).attr('data-name');
		var price = $(this).attr('data-price');
		var description = $(this).attr('data-description');
		var quantity = $(this).attr('data-quantity');

		$('.modal').find('#price').attr('value', price);
		$('.modal').find('#quantity').attr('value', quantity);
		$('.modal').find('#id').attr('value', id);
		$('.modal').find('#modalTitle').text(name);
		$('.modal').find('#productImg').attr("src", img);
		$('.modal').find('#productName').val(name);	
		$('.modal').find('#productDescription').val(description);
		$('.modal').find('#productPrice').val(price);	

	});

	$(document).on('click', function() {
		$('.p-2').hide();	
	});
</script>
<?php include 'presentation/_footer.php'?>









