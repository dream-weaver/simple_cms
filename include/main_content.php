<div class="container content">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <?php
            include("dbconnection.php");

                // sql to select a record
            $sql = "SELECT * FROM posts";
            $result = $conn->query($sql);        
           while($row = $result->fetch_assoc()) {
              $post_id=$row["post_id"];
              $post_title=$row["post_title"];
              $post_date=$row["post_date"];
              $post_author=$row["post_author"];
              $post_image=$row["post_image"];
              $post_keywords=$row["post_keywords"];
              $post_content= $row["post_content"];
           ?>      

             <h3>
                <a href="pages.php?id= <?php echo $post_id; ?>">
                <?php echo $post_title; ?>
                </a>
             </h3> 
             <p>Published on: <b><?php echo $post_date;?></b></p>
             <p align="right">Posted by: <b> <?php echo $post_author;?></b></p>
             <p align="justify"><?php echo $post_content;?></p> 
             <p align="right"><a href="pages.php?id=<?php echo $post_id; ?>">Read More</a></p>   

            <?php } ?>
     
       
     
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