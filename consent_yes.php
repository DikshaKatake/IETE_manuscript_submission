<?php
    require('db_conn.php');
    $allocation_id = $_GET['allocation_id'];
    // $file_name = $_REQUEST['name'];

    $sql = "UPDATE editor_allocation SET consent = 'Yes' WHERE allocation_id = " . $allocation_id . ";";
    if($conn->query($sql))
    {

        // $sql1 = "SELECT f.file_name , f.ID , e.journal_id, e.allocation_id 
                // FROM files_main as f, editor_allocation as e
                // WHERE f.ID = e.journal_id AND 
                // e.allocation_id = ".$allocation_id.";";
        $sql1 = "SELECT journal_id FROM editor_allocation WHERE allocation_id = " . $allocation_id . ";";
        if ($result = $conn -> query($sql1)) 
        {
            while ($row = $result -> fetch_row()) 
            {
                $file_id = $row[0];
                // echo $file_id;
                // header('Location: after_consent_yes.php?file_id='.$file_id);
                header('Location: reviewer_dashboard.php');
            }
        }
    }
?>