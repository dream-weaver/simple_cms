 <div class="container top-menu">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 main-menu">
          <nav class="navbar navbar-default-custom">
            <div class="container-fluid"style="padding-left: 0px; padding-right: 0px;">
              <!-- Brand and toggle get grouped for better mobile display -->
              <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
              </div>
              <!-- Collect the nav links, forms, and other content for toggling -->
              <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-nav-custom">


                  <?php
                    include("dbconnection.php");
                    $sql = "SELECT * FROM menu";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                      // output data of each row
                       while($row = $result->fetch_assoc()) {
                          $menu_id=$row["menu_id"];
                          $menu_name=$row["menu_name"];

                          echo "<li><a href='index.php?menu=$menu_id'>$menu_name</a></li>";
                        }
                          
                      } else {
                          echo "0 results";
                      }
                    $conn->close();
                  ?>          
                </ul>

              </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
          </nav>        
        </div><!--menu ends-->
      </div><!--row ends-->
    </div><!--top-menu ends-->