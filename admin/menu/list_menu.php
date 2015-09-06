<?php
  session_start();
  include ("../../include/functions.php");
  if(!is_user_authentic()){
    header( 'Location: login.php' );
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>List Table of Menus</title>
    <!-- Bootstrap -->
    <link href="../../Bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../font-awesome/css/font-awesome.min.css">
    <link href="../../styles/admin.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

  <?php include("../include/header.php");?>
  	<div class="container-fluid">
      <div class="row">
     	<?php include("../include/leftbar.php");?>
        <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
          <div class="content">
            <h3>Welcome to Admin Panel !</h3>
             <h4>List Table of Menu</h4>           
  <?php
include("../include/connect.php");
$sql = "SELECT * FROM `categories`";
$result = $conn->query($sql);
echo "<table border=\"1\">";
echo "<td>"."Menu title"."</td>"."<td>"."Action"."</td>";
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      echo "<tr>";
        echo "<td>". $row["cat_title"]."</td>"."<td>"."<a href='edit_menu.php?id=".$row['cat_id']."'>Edit</a>"."</td>"."<td>"."<a href='delete_menu.php?id=".$row['cat_id']."'>Delete</a>"."</td>"."<td>"."<a href='view_menu.php?id=".$row['cat_id']."'>View</a>"."</td>";
    }
      echo "</tr>";
} else {
    echo "0 results";
}
echo "</table>";
$conn->close();
?> 
<a href="insert_menu.php">Add New</a><br>
<a href="../logout.php">Log out</a>
          </div>
        </div>
      </div>
    </div>
  
  <?php include("../include/footer.php");?>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../Bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>
