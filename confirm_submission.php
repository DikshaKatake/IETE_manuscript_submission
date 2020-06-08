<?php
    session_start();
    $last_inserted_id = $_SESSION['last_inserted_id'];
    // $last_id = $_COOKIE['last_inserted_id'];
    require('db_conn.php');
    // $sql = "UPDATE files_main SET status = 'Completed' WHERE ID = " . $last_inserted_id;
    $sql = "UPDATE files_main SET status = 'Not reviewed' WHERE ID = " . $last_inserted_id;
    if(mysqli_query($conn,$sql))
    {
        ?>
        <script>
            alert("Manuscript Submitted sucessfully");
        </script>
        <?php
        header('Location: author_dashboard.php');
        exit();
    }
    else{
        ?>
        <script>
            alert("ERROR");
        </script>
        <?php
    }

?>