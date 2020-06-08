<?php
$page = $_SERVER['PHP_SELF'];
$sec = "1";
?>
<html>
  <head>
    <style>
      .my_gradient{
          background-image: linear-gradient(to right, #3aa5f7, #00b8f6, #00c8ec, #18d5dd, #63e0cc);
        }
    </style>
    <!-- <meta http-equiv="refresh" content="<?php echo $sec?>;URL='<?php echo $page?>'"> -->
    <?php include('mdb_header.php');  ?>
  </head>
  <body class = "grey lighten-2">
  <? include('navbar_header.php') ?>
    <div class = "container" style="margin-top:90px; !important">
    <br>
      <h2><b>Give your consent.</b></h2>

      <?php
            // header("Refresh: 60");
            session_start();
            $reviewer_id = $_SESSION['current_user_id'];
            require('db_conn.php');
            
            $query1 = "SELECT e.allocation_id, e.journal_id , e.reviewer_id , e.consent , f.ID , f.journal_name , f.abstract_name
            FROM editor_allocation as e, files_main as f where e.journal_id = f.ID AND e.reviewer_id = ".$reviewer_id." AND consent = 'NA';"; //You don't need a ; like you do in SQL
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
              <th colspan = "2" scope="col">Evaluate the journal or not ?</th> 
            </tr>
          </thead>
          <?php
            // output data of each row
            while($row1 = $result1->fetch_assoc()){   //Creates a loop to loop through results
              echo 
                "<tr class = 'rgba-white-strong'>
                <td style='padding:20px; !important'>" . $row1['ID'] . "</td>
                <td style='padding:20px; !important'>" . $row1['journal_name'] . "</td>
                <td style='padding:20px; !important'><a class = 'btn btn-md btn-primary' href=file_disp2.php?file_id=" . $row1['ID'] . "> VIEW ABSTRACT</a></td>
                <td style='padding:20px; !important'><a class = 'btn warning-color' href=consent_no.php?allocation_id=" . $row1['allocation_id'] . "> NO </a></td>
                <td style='padding:20px; !important'><a class = 'btn success-color text-white' href=consent_yes.php?allocation_id=" . $row1['allocation_id'] . "> YES </a></td>
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



        // part 2
          echo "<br><br><hr><br>";
          echo "<h2><b>Under Review</b></h2>";

        $query1 = "SELECT e.allocation_id, e.journal_id , e.reviewer_id , e.consent , f.ID , f.journal_name , f.abstract_name
        FROM editor_allocation as e, files_main as f where e.journal_id = f.ID AND e.reviewer_id = ".$reviewer_id." AND consent = 'Yes';"; //You don't need a ; like you do in SQL
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
            <td style='padding:20px; !important'><a class = 'btn btn-success' href=after_consent_yes.php?file_id=" . $row1['ID'] . "&allocation_id=" . $row1['allocation_id'] . "> Evaluate </a></td>
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

        $query1 = "SELECT e.allocation_id, e.journal_id , e.reviewer_id , e.consent , f.ID , f.journal_name , f.abstract_name
        FROM editor_allocation as e, files_main as f where e.journal_id = f.ID AND e.reviewer_id = ".$reviewer_id." AND consent = 'Reviewed';"; //You don't need a ; like you do in SQL
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
            <td style='padding:20px; !important'><a class = 'btn btn-md btn-primary' href=file_disp2.php?file_id=" . $row1['ID'] . "> VIEW MANUSCRIPT</a></td>
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


      ?>


      <?php include('mdb_footer.php');  ?>
      <!-- <script>
        window.onload = function() {
            if(!window.location.hash) {
                window.location = window.location + '#loaded';
                window.location.reload();
            }
        }
      </script> -->

      </div>
    </body>
  </html>