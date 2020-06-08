<html>
    <head>
        <?php include('mdb_header.php'); ?>
        <style>
            .hello{
                margin: 10px, 40px; !important
            }

            .my_gradient{
                background-image: linear-gradient(to right, #3aa5f7, #00b8f6, #00c8ec, #18d5dd, #63e0cc);
            }
        </style>
    </head>
    <body class = "grey lighten-2">

    <nav style="margin-bottom:100px; !important" class="navbar navbar-expand-lg navbar-dark blue-grey darken-3 z-depth-1-half fixed-top" id="mainNav" style="height:65px; !important margin-top:20px; !important">
    <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">IETE</a>
        <div>
          <a class="btn btn-md my_gradient rounded-pill" href="manuscript_submission.php">Publish manuscript</a>
          <a style="margin-left:20px; !important" class="navbar-brand js-scroll-trigger" href="logout.php">Logout</a>
        </div>
    </div>
    </nav>
        <div class = "container" style="margin-top:90px; !important">
    <br>
      <h2><b>Submitted Successfully</b></h2>

      <?php
            // header("Refresh: 60");
            session_start();
            $author_id = $_SESSION['current_user_id'];
            require('db_conn.php');
            
            $query1 = "SELECT * FROM files_main where author_id = ".$author_id." AND status = 'Not reviewed';"; //You don't need a ; like you do in SQL
            echo "<div class='table-responsive text-nowrap'>";
            echo "<table class='table table-bordered z-depth-1-half'>"; // start a table tag in the HTML
            ?>       
          
          <?php     
          $result1 = $conn->query($query1);

          if ($result1->num_rows > 0) {
              ?>
            <thead class="my_gradient">
            <tr style="padding:20px; !important">
              <th scope="col">ID</th>
              <th scope="col">Manuscript Name</th>
              <!-- <th scope="col">Size</th> -->
              <th scope="col">#</th>
              <!-- <th colspan = "2" scope="col">Evaluate the journal or not ?</th>  -->
            </tr>
          </thead>
          <?php
            // output data of each row
            while($row1 = $result1->fetch_assoc()){   //Creates a loop to loop through results
              echo 
                "<tr class = 'rgba-white-strong'>
                <td style='padding:20px; !important'>" . $row1['ID'] . "</td>
                <td style='padding:20px; !important'>" . $row1['journal_name'] . "</td>
                <td style='padding:20px; !important'><a class = 'btn btn-md btn-primary' href=file_disp2.php?file_id=" . $row1['ID'] . "> VIEW ABSTRACT </a></td>
                </tr>";  
                
                //$row['index'] the index here is a field name
                
//                $i = $row['name'];
                
//                echo '<a href="' . $i . '"> VIEW </a>';
//            <a href = "file_disp2.php">View</a>    
            
            }
            echo "</table>";
          }
          else{
            echo "</table>";
            echo "<h5>No items found here";
          }
        
        echo "</div>";

        echo "<br><br><hr><br>";
          echo "<h2><b>Under Review</b></h2>";

          $query1 = "SELECT * FROM files_main where author_id = ".$author_id." AND status = 'Under review';"; //You don't need a ; like you do in SQL
          //You don't need a ; like you do in SQL
        echo "<div class='table-responsive text-nowrap'>";
        echo "<table class='table table-bordered z-depth-1-half'>"; // start a table tag in the HTML
        ?>      
      
      <?php     
      $result1 = $conn->query($query1);

      if ($result1->num_rows > 0) {
        ?>
            <thead class="my_gradient">
            <tr style="padding:20px; !important">
              <th scope="col">ID</th>
              <th scope="col">Manuscript Name</th>
              <!-- <th scope="col">Size</th> -->
              <th scope="col">#</th>
              <!-- <th colspan = "2" scope="col">Evaluate the journal or not ?</th>  -->
            </tr>
          </thead>
          <?php
        // output data of each row
        while($row1 = $result1->fetch_assoc()){   //Creates a loop to loop through results
          echo 
            "<tr class = 'rgba-white-strong'>
            <td style='padding:20px; !important'>" . $row1['ID'] . "</td>
            <td style='padding:20px; !important'>" . $row1['journal_name'] . "</td>
            <td style='padding:20px; !important'><a class = 'btn btn-md btn-primary' href=file_disp2.php?file_id=" . $row1['ID'] . "> VIEW ABSTRACT </a></td>
            </tr>";  
            
            //$row['index'] the index here is a field name
            
//                $i = $row['name'];
            
//                echo '<a href="' . $i . '"> VIEW </a>';
//            <a href = "file_disp2.php">View</a>    
            

}
echo "</table>";
}
else{
echo "</table>";
echo "<h5>No items found here";
}
    echo "</div>";




// part 3
    echo "<br><br><hr><br>";
          echo "<h2><b>Successfully reviewed</b></h2>";

          $query1 = "SELECT * FROM files_main where author_id = ".$author_id." AND status = 'Reviewed';"; //You don't need a ; like you do in SQL
          //You don't need a ; like you do in SQL
        echo "<div class='table-responsive text-nowrap'>";
        echo "<table class='table table-bordered z-depth-1-half'>"; // start a table tag in the HTML
        ?>      
      
      <?php     
      $result1 = $conn->query($query1);

      if ($result1->num_rows > 0) {
        // output data of each row
        ?>
            <thead class="my_gradient">
            <tr style="padding:20px; !important">
              <th scope="col">ID</th>
              <th scope="col">Manuscript Name</th>
              <!-- <th scope="col">Size</th> -->
              <th scope="col">#</th>
              <!-- <th colspan = "2" scope="col">Evaluate the journal or not ?</th>  -->
            </tr>
          </thead>
          <?php
        while($row1 = $result1->fetch_assoc()){   //Creates a loop to loop through results
          echo 
            "<tr class = 'rgba-white-strong'>
            <td style='padding:20px; !important'>" . $row1['ID'] . "</td>
            <td style='padding:20px; !important'>" . $row1['journal_name'] . "</td>
            <td style='padding:20px; !important'><a class = 'btn btn-md btn-primary' href=file_disp2.php?file_id=" . $row1['ID'] . "> VIEW ABSTRACT </a></td>
            </tr>";  
            
            //$row['index'] the index here is a field name
            
//                $i = $row['name'];
            
//                echo '<a href="' . $i . '"> VIEW </a>';
//            <a href = "file_disp2.php">View</a>    
            
          
          }
          echo "</table>";
        }
        
        else{
        echo "</table>";
        echo "<h5>No items found here";
        }
    echo "</div>";

        include('mdb_footer.php'); ?>
    </body>

</html>