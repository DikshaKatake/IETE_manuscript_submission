<html>
    <head>
        <!-- <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

          < Custom styles for this template 
          <link href="css/scrolling-nav.css" rel="stylesheet">

          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
          <?php include("mdb_header.php"); 
            error_reporting(0);
          ?>
    </head>
<body class = "grey lighten-2">
  <?php include('navbar_header.php') ?>
<!-- <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="#page-top">IETE</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto" style="text-align:right !important; padding-left: 350px !important; padding-right: 0px !important; margin-right: 15px !important;">
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#about">About us</a>
          </li>
          <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#aim">Aim</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#scope">Scope</a>
          </li>
          <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#author_guide">Author's Guide</a>
            </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#format">Format</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#contact">Contact us</a>
          </li>
          <li>
            <a class="nav-link js-scroll-trigger" href="login.php">Publish journal</a>
          </li>
        </ul>
      </div>
    </div>
  </nav> -->
    
    
    
    <div class = "container" style = "margin-top: 90px; !important">
    <div class = "row">
    <div class = "col-sm-8">
    <h3> Manucript list</h3>
        <?php
        
            require('db_conn.php');
            
            $query1 = "SELECT * FROM files_main"; //You don't need a ; like you do in SQL
            // echo "<div class='table-responsive text-nowrap'>";
            echo "<table class='table table-hover table-bordered z-depth-1-half'>"; // start a table tag in the HTML
            ?>
            <thead class="aqua-gradient">
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Category</th>
              <th scope="col">Manuscript Name</th>
              <th scope="col">Status</th>
              <th scope="col">File</th>
            </tr>
          </thead>       
          
          <?php     
          $result1 = $conn->query($query1);

          if ($result1->num_rows > 0) {
            // output data of each row
            while($row1 = $result1->fetch_assoc()){   //Creates a loop to loop through results
            echo 
                "<tr class = 'rgba-white-strong' style='padding:30px;' !important>
                <td>" . $row1['ID'] . "</td>
                <td>" . $row1['category'] . "</td>
                <td>" . $row1['journal_name'] . "</td>
                <td>" . $row1['status'] . "</td>
                <td><a class='btn btn-sm blue' href=file_disp2.php?file_id=" . $row1['ID'] . "> VIEW ABSTRACT </a></td>
                </tr>";  
                
                //$row['index'] the index here is a field name
                
//                $i = $row['name'];
                
//                echo '<a href="' . $i . '"> VIEW </a>';
//            <a href = "file_disp2.php">View</a>    
                
            }
          }
        echo "</table>";
        // echo "</div>";
      ?>
      </div>
      <div class = "col-sm-4">
      <h3>Reviewer list
      <?php 

        $query2 = "SELECT * FROM reviewer"; //You don't need a ; like you do in SQL

            echo "<table class='table table-hover table-bordered z-depth-1-half' style = 'margin-top: 40px; !important' max-width: 400px; !important>"; // start a table tag in the HTML
            ?>
            <thead class="aqua-gradient">
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Reviewer Name</th>
              <th scope="col">Category</th>
            </tr>
          </thead>       
          
          <?php     
          $result2 = $conn->query($query2);

          if ($result2->num_rows > 0) {
            // output data of each row
            while($row2 = $result2->fetch_assoc()){   //Creates a loop to loop through results
            echo 
                "<tr class = 'rgba-white-strong'>
                <td>" . $row2['reviewer_id'] . "</td>
                <td>" . $row2['reviewer_name'] . "</td>
                <td>" . $row2['category'] . "</td>
                </tr>";  
                
                //$row['index'] the index here is a field name
                
//                $i = $row['name'];
                
//                echo '<a href="' . $i . '"> VIEW </a>';
//            <a href = "file_disp2.php">View</a>    
                
            }
          }
        echo "</table>";

          



        ?>
        </div>
        </div>
        </div>
        
    <div class = "container" style = "margin-top: 50px; !important">
      <form class = "aqua-gradient text-center border z-depth-1 p-10" style = "padding: 30px; !important" method="post" action="editor_allocate.php">
          <div class = "row">
            <div class = "col-sm-4">
              <h5><label for="exampleForm2">Reviewer ID</label></h5>
              <input type="text" id="exampleForm1" name = "reviewer_id1" class="form-control">
            </div>
            <div class = "col-sm-4">
              <h4> ----> </h4>
            </div>
            <div class = "col-sm-4">
              <h5><label for="exampleForm2">Journal ID</label></h5>
              <input type="text" id="exampleForm2" name = "journal_id1" class="form-control">
            </div>
          </div>
          <br>
          <div class = "row">
            <div class = "col-sm-4">
              <h5><label for="exampleForm2">Reviewer ID</label></h5>
              <input type="text" id="exampleForm1" name = "reviewer_id2" class="form-control">
            </div>
            <div class = "col-sm-4">
              <h4> ----> </h4>
            </div>
            <div class = "col-sm-4">
              <h5><label for="exampleForm2">Journal ID</label></h5>
              <input type="text" id="exampleForm2" name = "journal_id2" class="form-control">
            </div>
          </div>
          <br>
          <div class = "row">
            <div class = "col-sm-4">
              <h5><label for="exampleForm2">Reviewer ID</label></h5>
              <input type="text" id="exampleForm1" name = "reviewer_id3" class="form-control">
            </div>
            <div class = "col-sm-4">
              <h4> ----> </h4>
            </div>
            <div class = "col-sm-4">
              <h5><label for="exampleForm2">Journal ID</label></h5>
              <input type="text" id="exampleForm2" name = "journal_id3" class="form-control">
            </div>
          </div>
          <button class = "text-white btn rounded-pill blue darken-2 z-depth-2">Allocate</button>
        </form>
    </div>


    </div>
    
    
    
    
    <!-- <script src="vendor/jquery/jquery.min.js"></script>
          <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

         Plugin JavaScript 
          <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

          <Custom JavaScript for this theme
          <script src="js/scrolling-nav.js"></script> -->

          <?php include("mdb_footer.php"); ?>
    
  </body>
 </html> 