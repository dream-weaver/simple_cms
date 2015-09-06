<?php
  session_start();
  include ("../../include/functions.php");
  if(!is_user_authentic()){
    header( 'Location: ../login.php' );
  }
?>
<!DOCTYPE html>
<html>
<head>
	<title>View Menu</title>
</head>
<body>
<h3>VIEW Menu</h3>
<?php
include("../include/connect.php");
$id=$_GET['id'];
//$name=$_GET['name'];
$sql = "SELECT * FROM categories WHERE cat_id=$id";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  // output data of each row
   while($row = $result->fetch_assoc()) {
      echo "Menu title: ".$cat_title=$row["cat_title"]."</br>";
    }
      
  } else {
      echo "0 results";
  }
$conn->close();
?><br>
<a href="list_menu.php">Return to List of Menus</a>
</body>
</html>