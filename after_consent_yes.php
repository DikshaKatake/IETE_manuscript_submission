<html>
<head>
 <?php include('mdb_header.php'); ?>
</head>
<!-- <body class = "grey lighten-2"> -->
</body>
<?php
    $file_id = $_GET['file_id'];
    $allocation_id = $_GET['allocation_id'];
    require('db_conn.php');
    $sql = "SELECT * from files_main where ID = ".$file_id.";";
    $result = $conn->query($sql);
    if($result->num_rows > 0)
    {
        while($row = $result->fetch_assoc())
        {
            echo "<div class = 'container text-center'>";
            echo "<h2>" . $row['journal_name'] . "</h2>";
            echo "<br><a class = 'btn-lg aqua-gradient' target='_blank' href=file_disp2.php?file_id=" . $row['ID'] . "> VIEW journal </a>";
            include("question.php");
            echo "<a href=manuscript_evaluated.php?allocation_id=".$allocation_id." class='btn-lg aqua-gradient'>SUBMIT</a>";
            echo "</div>";
        }
    }
?>
    <?php include('mdb_footer.php'); ?>
</body>
</html>