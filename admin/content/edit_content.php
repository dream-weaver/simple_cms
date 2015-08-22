<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>EDIT POST</title>
    <!-- Bootstrap -->
    <link href="../../Bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Optional theme -->
    <link rel="stylesheet" href="../../Bootstrap/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="../../styles/style.css">
    <link rel="stylesheet" href="../../font-awesome/css/font-awesome.min.css">



    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  <style>
    .error{
      color:red;
    }
    .message>h3{
        color: green;
        font-size: 14px;
        font-weight: bold;
        font-style: italic;
      }
  </style>
  <?php
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";

  $error_title="";
  $error_author="";
  $error_keywords="";
  $error_content="";
  $error_occured="";
  $post_title="";
  $post_author="";
  $post_keywords="";
  $post_content="";
  $post_image="";

include("../include/connect.php");

  $id=$_GET['id'];
//$name=$_GET['name'];
// sql to select a record
$sql = "SELECT * FROM posts WHERE post_id=$id";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  // output data of each row
   while($row = $result->fetch_assoc()) {
      $post_title=$row["post_title"];
      $post_date=$row["post_date"];
      $post_author=$row["post_author"];
      $post_image=$row["post_image"];
      $post_keywords=$row["post_keywords"];
      $post_content=$row["post_content"];
    }
      
  } else {
      echo "0 results";
  }
$conn->close();


  if(isset($_POST['submit'])){
    if ($_POST['submit']=="Publish_Now"){
    //validate title field
    if(empty($_POST['title'])){
      $error_title="Error occured: Post Title is required";
      $error_occured="1";
    }
    //validate author field
    if(empty($_POST['author'])){
      $error_author="Error occured: Post Author is required";
      $error_occured="1";
    }
    //validate keywords field
    if(empty($_POST['keywords'])){
      $error_keywords="Error occured: Post Keywords is required";
      $error_occured="1";
    }
    //validate content field  
    if(empty($_POST['content'])){
      $error_content="Error occured: Post Content is required";
      $error_occured="1";
    }
    //assigning value to local/defined variable
    if(!empty($_POST['title'])){
      $post_title=$_POST['title'];
    }
    //assigning value to local/defined variable
    if(!empty($_POST['author'])){
      $post_author=$_POST['author'];
    }
    //assigning value to local/defined variable
    if(!empty($_POST['keywords'])){
      $post_keywords=$_POST['keywords'];
    }
    //assigning value to local/defined variable
    if(!empty($_POST['content'])){
      $post_content=$_POST['content'];
    }
    //assigning value to local/defined variable
    if(!empty($_POST['image'])){
      $post_image=$_FILES['image']['name'];
    }
    $post_date= date ('d-m-y');
    $image_tmp=$_FILES['image']['tmp_name'];
  }
}
  ?>
  <div class="container form">
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <h1>EDIT CONTENT</h1>

        <div class="alert <?php if(!empty($error_occured)){echo "alert-danger";} ?>" role="alert">
            <?php if(!empty($error_title)){?>
            <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
            <?php echo $error_title;?>
            <?php } ?>
            <?php if(!empty($error_author)){ ?>
            <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
            <?php echo $error_author; ?>
            <?php } ?>
            <?php if(!empty($error_keywords)){ ?>
            <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
            <?php echo $error_keywords; ?>
            <?php } ?>
            <?php if(!empty($error_content)){?>
            <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
            <?php echo $error_content;?>
            <?php } ?>         
          </div>
          <div class="message">
          <h3>
          <?php
            if (empty($error_occured)   &&  isset($_POST['submit'])){
              echo "Thank You. Your form has been submitted successfully!!";
            }
          ?>
          </h3>
          </div>

        <form action="edit_content.php?id=<?php echo $id;?>" method="post" enctype="multipart/form-data">
          <div class="form-group <?php if (!empty($error_title)){echo "has-error";}?>">
            <label for="exampleInputEmail1">Post Title:*</label><span class="error"><?php echo $error_title;  ?></span>
            <input class="form-control" type="text" value="<?php echo $post_title; ?>" name="title">
          </div>
          <div class="form-group <?php if (!empty($error_author)){echo "has-error";}?>">
            <label for="exampleInputEmail1">Post Author:*</label><span class="error"><?php echo $error_author;  ?></span>
            <input class="form-control" type="text" value="<?php echo $post_author; ?>" name="author">
          </div>
          <div class="form-group <?php if (!empty($error_keywords)){echo "has-error";}?>">
            <label for="exampleInputEmail1"> Post Keywords:*</label><span class="error"><?php echo $error_keywords;  ?></span>
            <input class="form-control" type="text" value="<?php echo $post_keywords; ?>" name="keywords">
          </div>
          <div class="form-group">
            <label for="exampleInputFile">Post Image:</label>
            <input type="file" name="image" value="upload" id="exampleInputFile">
            <p class="help-block"></p>
          </div>
          <div class="form-group <?php if (!empty($error_content)){echo "has-error";}?>">
            <label for="exampleInputEmail1"> Post Content:*</label><span class="error"><?php echo $error_content;  ?></span>
            <textarea class="form-control" rows="10" cols="40" name="content"><?php echo $post_content; ?></textarea>
          </div>
          <button type="submit" value="Publish_Now" name="submit" class="btn btn-danger">Update</button>  
        </form>
      </div>
    </div>
  </div>
 

  
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../../Bootstrap/js/bootstrap.min.js"></script>
    
    <script>
      $('#myCarousel').carousel({
        interval:4000
      });
    </script>
    <script>
    $(document).ready(function() {
  $('#hCarousel').carousel({
  interval: 10000
  })
    
    $('#hCarousel').on('slid.bs.carousel', function() {
      //alert("slid");
  });
    
    
});
    </script>

  </body>
</html>

<?php
  include("../include/connect.php");

  if (empty($error_occured)   &&  isset($_POST['submit'])){
      echo "Thank You. Your form has been submitted successfully!!";

  move_uploaded_file($image_tmp, "images/$post_image");
  // sql to update table
$sql = "UPDATE posts SET post_title='$post_title', post_date='$post_date', post_author='$post_author', post_image='$post_image', post_keywords='$post_keywords', post_content='$post_content' WHERE post_id='$id'";
echo $sql;
if ($conn->query($sql) === TRUE) {
    echo "Update Post Content successfully";
} else {
    echo "Error updating Post Content: " . $conn->error;
}

$conn->close();
}
?> 
<a href="list_content.php">Back to Admin List of Contents</a>






















    