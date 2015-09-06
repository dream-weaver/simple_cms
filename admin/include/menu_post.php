<div class="container content">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <?php
            include("connect.php");
             if(isset($_GET['cat'])){
              cat_id=$_GET['cat'];
                // sql to select a record
            $sql = "SELECT * FROM posts WHERE cat_id='$cat_id'";
            $result = $conn->query($sql);        
           while($row = $result->fetch_assoc()) {
              $post_id=$row["post_id"];
              $post_title=$row["post_title"];
              $post_date=$row["post_date"];
              $post_author=$row["post_author"];
              $post_image=$row["post_image"];
              $post_keywords=$row["post_keywords"];
              $post_content= $row["post_content"];
            
            echo "
            <h3>$post_title</h3>
            <span><i>Posted by</i>  <strong>$post_author</strong> &nbsp;&nbsp;On <strong>$post_date</strong></span>
            <p>$post_content <a style='float:right;' href='details.php?post=$post_id'>Read More</a></p>
            ";
            }
          }
          ?>     
        <div class="navbar-text">
        <h6><small><strong>SHARE: &nbsp;</strong></small></h6>
        <a href="#"><i class="fa fa-facebook-square fa-2x"></i></a>
        <a href="#"><i class="fa fa-twitter fa-2x"></i></a>
        <a href="#"><i class="fa fa-google-plus fa-2x"></i></a>
        <a href="#"><i class="fa fa-linkedin-square fa-2x"></i></a>
        </div>
        </div>
      </div>
</div>