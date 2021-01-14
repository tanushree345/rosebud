<html>
<head>
  <link rel="stylesheet" href="cart.css">
<style>
table, td, th
{
border: 1px solid black;
width: 33%;
text-align: center;
border-collapse:collapse;
background-color:white;
text-decoration-color:white;}
table { margin: auto; }
</style>
</head>
<body>

  <?php
$serverNAME = "localhost:3307";
$userNAME = "root";
$password = "";
$dbNAME = "rosebud";

$conn = mysqli_connect($serverNAME, $userNAME, $password, $dbNAME);
echo "Connected successfully<br>";
if ($conn->connect_error)
die("Connection failed: " . $conn->connect_error);
$result = mysqli_query($con,"SELECT * FROM cart");

echo "<table border='1'>
<tr>
<th>Image</th>
<th>Price</th>
<th>Quantity</th>
<th>id</th>

</tr>";

while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['Image'] . "</td>";
echo "<td>" . $row['Price'] . "</td>";
echo "<td>" . $row['Quantity'] . "</td>";
echo "<td>" . $row['id'] . "</td>";
echo "</tr>";
}
echo "</table>";

mysqli_close($con);
?>
</body>
</html>
