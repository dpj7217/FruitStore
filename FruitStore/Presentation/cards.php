<?php
require_once 'header.php';
require_once 'protectPage.php';
require_once '../Business/classes/creditCardBusiness.php';


$business = new creditCardBusiness();
$data = $business->getAllCards($_SESSION['username']);

if ($data->num_rows > 0) {
    include '_showCards.php';
} else {
    echo "<div class=' hideable d-flex justify-content-center align-items-center'>
	          <h3 class='bg-danger text-white rounded' style='text-align: center;'>No cards found here. Please Add one to proceed</h3>
          </div>";
    echo "<div class='d-flex justify-content-center'>
            <a href='/FruitStore/presentation/addCreditCard.php' class='btn btn-success' style='display: block;'>Add card</a>
          </div>";
    
}
?>