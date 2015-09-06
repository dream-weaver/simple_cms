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
	<title>Delete Contents</title>
</head>
<body>
<?php
include("../include/connect.php");

$id=$_GET['id'];
//$name=$_GET['name'];
// sql to delete a record
$sql = "DELETE FROM posts WHERE post_id=$id";

if ($conn->query($sql) === TRUE) {
    echo "Post has been deleted successfully!!";
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?><br>
<a href="list_content.php">Return to Admin List</a>
</body>
</html>