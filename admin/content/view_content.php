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
	<title>View Content</title>
</head>
<body>
<h3>VIEW CONTENT</h3>
<?php
include("../include/connect.php");
$id=$_GET['id'];
//$name=$_GET['name'];
$sql = "SELECT * FROM posts WHERE post_id=$id";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  // output data of each row
   while($row = $result->fetch_assoc()) {
      echo "Post title: ".$post_title=$row["post_title"]."</br>";
      echo "Post date: ".$post_date=$row["post_date"]."</br>";
      echo "Post author: ".$post_author=$row["post_author"]."</br>";
      echo "Post image: ".$post_image=$row["post_image"]. "</br>";
      echo "Post keywords: ".$post_keywords=$row["post_keywords"]."</br>";
      echo "Post content: ".$post_content=$row["post_content"]."</br>";
    }
      
  } else {
      echo "0 results";
  }
$conn->close();
?><br>
<a href="list_content.php">Return to Admin List of Contents</a>
</body>
</html>