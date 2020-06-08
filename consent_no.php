<?php
    $alloc_id = $_GET['allocation_id'];
    require('db_conn.php');
    $sql = "UPDATE editor_allocation SET consent = 'No' where allocation_id = ".$alloc_id.";";
    if($conn->query($sql))
    {
        echo '<script>alert("Okay. This manuscript will not be reviewed by you.")</script>'; 
        header('Location: reviewer_dashboard.php');
        // echo "<script type='text/javascript'>alert('Okay. This manuscript will not be reviewed by you.');
        //     window.location='reviewer_dashboard.php';
        // </script>";
    }
?>
