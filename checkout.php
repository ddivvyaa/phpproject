<?php 
require('mysqli_connect.php');
$Query = $dbc->query("SELECT * FROM books ");
session_start();
//echo $id = $_SESSION['id'];
if(isset($_SESSION['id']) && isset($_SESSION['name']))
{
	 $id = $_SESSION['id'];
	 $bname = $_SESSION['name'];
	 $price = $_SESSION['price'];
	$error = array();
	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		$firstname = filter_var($_POST['firstname'], FILTER_SANITIZE_STRING);
		$lastname = filter_var($_POST['lastname'], FILTER_SANITIZE_STRING);
		$paymentmode = filter_var($_POST['paymentmode'], FILTER_SANITIZE_STRING);

		if(empty($firstname) || strlen($firstname) < 1)
		{
			array_push($error,"Kindly enter your First Name");
		}
		if(empty($lastname) || strlen($lastname) < 1)
		{
			array_push($error,"Kindly enter your Last Name");
		}
		if(empty($paymentmode) || strlen($paymentmode) < 1)
		{
			array_push($error,"Kindly choose a payment method");
		}

		if(empty($error))
		{
			$cinfo = "INSERT INTO buyers SET FirstName='$firstname',LastName='$lastname',PaymentOptions='$paymentmode',BookId='$id' ";
			echo $order = mysqli_query($dbc,$cinfo);

			$query1 = mysqli_query($dbc, "SELECT * FROM bookinventory WHERE BookId = '$id' ");
	 		$details = mysqli_fetch_array($query1);
	 		$qnty = $details['NumberOfCopies'];

	 		$nQty = $qnty -1;
	 		echo $QuantityUp = mysqli_query($dbc, "UPDATE bookinventory SET NumberOfCopies='$nQty' WHERE BookId = '$id' ");

	 		if($order && $QuantityUp)
	 		{
	 			$_SESSION['cname'] = $firstname;
	 			header("Location: thankyou.php");
	 		}
	 		else
	 		{
	 			echo "error";
	 		}

		}
		else
		{
			foreach ($error as $error) {
				echo "<b>".$error."</b><br>";
			}
			//print_r($error);
		}
	}

}
else
{
	echo "hd";
	// header("Location: index.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Checkout Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<style type="text/css">
	div#bookInfo {
    width: 80%;
    margin: auto;
    box-shadow: 2px 2px 7px;
    padding: 10px;
    margin-bottom: 16px;
    font-size: 14px;
    font-weight: bold;
}
.container
{
	height: 500px;
}
</style>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">BookStore</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="index.php">Home</a></li>
      <li><a href="store.php">Shop</a></li>
    </ul>
  </div>
</nav>
  
<div class="container">
  <div id="bookInfo">
  	<span>Book Name- </span> <?php echo $_SESSION['name']; ?><br>
  	<span>Book Cost- $</span><?php echo $_SESSION['price']; ?><br>
  </div>
  
<div class="col-md-8 col-md-offset-2">
	<form action="" method="POST">
    <div class="form-group">
      <label for="First Name">First Name:</label>
      <input type="text" class="form-control" id="FirstName" placeholder="First Name" name="firstname">
    </div>
    <div class="form-group">
      <label for="lastname">Last Name:</label>
      <input type="text" class="form-control" id="lastname" placeholder="Last Name" name="lastname">
    </div>
    <div class="form-group">
	  <label for="paymentmode">Payment Mode:</label>
	  <select class="form-control" id="paymentmode" name="paymentmode">
	    <option value="credit">Credit</option>
	    <option value="debit">Debit</option>
	    <option value="cod">Cash On Devlivery</option>
	  </select>
	</div>
    
    <button type="submit" class="btn btn-default btn-block btn-success">Order Now</button>
  </form>
</div>

</div>
<footer style="background-color: #222222">
  <p style="text-align: center; color: white;">DivyaGupta</p>
  <p style="text-align: center; color: white;">Project 1</p>
</footer>
</body>
</html>
