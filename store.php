<?php 
require('mysqli_connect.php');
$Query = $dbc->query("SELECT * FROM books");
session_start();
// $result = $conn->query($sql);
if(isset($_GET['book']))
{
   echo $id = $_GET['book'];
    
    $Query1 = $dbc->query("SELECT * FROM books WHERE BookID = '$id' ");
    if($Query1->num_rows > 0)
    {
      $row1 = $Query1->fetch_assoc();
      $_SESSION["id"] = $row1['BookId'];
      $_SESSION["name"] = $row1['BookName'];
      $_SESSION["price"] = $row1['BookCost'];
      $_SESSION["image"] = $row1['BookImage'];

     header("Location: checkout.php");
    }
    else
    {
      echo "Wrong Selection";
    }

}
       
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Products</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
   a {
    color: #000;
    text-decoration: none;
    font-size: medium;
}
a:hover {
    color: #4CAF50;
    text-decoration: none;
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
      <li><a href="index.php">Home</a></li>
      <li class="active"><a href="store.php">Books</a></li>
    </ul>
  </div>
</nav>
  
<div class="container">
  
  <div>
  <table class="table table-hover">
    <thead>
      <tr>
      	<th>Image</th>
        <th>Name</th>
        <th>Cost</th>
        <th>Description</th>
      </tr>
    </thead>
    <tbody>
    <?php 
    if($Query->num_rows > 0)
    {
        while($row = $Query->fetch_assoc()) {
    ?>
    
      <tr>
      	<td><a href="?book=<?php echo $row['BookId']; ?>"><img src="images/<?php echo $row['BookImage']; ?>" class='Img' style='height:80%; width:50%'></a></td>
        <td><a href="?book=<?php echo $row['BookId']; ?>"><?php echo $row['BookName']; ?></a></td>
        <td><a href="?book=<?php echo $row['BookId']; ?>">$<?php echo $row['BookCost']; ?></a></td>
        <td><a href="?book=<?php echo $row['BookId']; ?>"><?php echo $row['BookDescription']; ?></a></td>
      </tr>
    
      <?php 
       }
    }
      ?>
    </tbody>
  </table>
  </div>

</div>
<footer style="background-color: #222222">
  <p style="text-align: center; color: white;">DivyaGupta</p>
  <p style="text-align: center; color: white;">Project 1</p>
</footer>
</body>
</html>
