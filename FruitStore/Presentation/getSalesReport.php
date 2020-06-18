<head>
	<title>FruitStore | Sales Report</title>
</head>
<?php
require_once 'header.php';
require_once '../Business/classes/orderBusiness.php';
require_once '../Business/classes/creditCardBusiness.php';
require_once '../Business/classes/userBusiness.php';
require_once '../Business/classes/productBusiness.php';

if (!isset($_SESSION['username']) || !$_SESSION['admin']) {
    $_SESSION['successMessage'] = "You dont have permission to access this page";
    header("location: loginRegister.php");
    die();
}

$business = new orderBusiness();
$creditCardBusiness = new creditCardBusiness();
$userBusiness = new userBusiness();
$productBusiness = new productBusiness();
$dateBegin = new dateTime($_GET['beginDate']);
$dateEnd = new dateTime($_GET['endDate']);

$dateBegin->setTime(24, 0);//00:00
$dateEnd->setTime(23, 59);//23:59

if ($dateBegin > $dateEnd) {
    $_SESSION['salesReportFailure'] = "Your begin date is after your end date. Please try again.";
    header("location: /FruitStore/presentation/userDetails.php");
    die();
}

$data = $business->getOrdersInside($dateBegin, $dateEnd, $_SESSION['username']);

if ($data->num_rows > 0) {
    include '_showSalesReport.php';
} else {
    $_SESSION['salesReportFailure'] = "No Orders found inside that date range.";
    header("location: /FruitStore/presentation/userDetails.php");
    die();
}

?>