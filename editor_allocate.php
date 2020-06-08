<?php
    session_start();
    $editor_id = $_SESSION['current_user_id'];
    $reviewer_id1 = $_POST['reviewer_id1'];
    $journal_id1 = $_POST['journal_id1'];
    $reviewer_id2 = $_POST['reviewer_id2'];
    $journal_id2 = $_POST['journal_id2'];
    $reviewer_id3 = $_POST['reviewer_id3'];
    $journal_id3 = $_POST['journal_id3'];

    require('db_conn.php');
    $sql = "INSERT INTO editor_allocation(editor_id, reviewer_id, journal_id) VALUES 
            (".$editor_id.", ".$reviewer_id1." , ".$journal_id1."),
            (".$editor_id.", ".$reviewer_id2." , ".$journal_id2."),
            (".$editor_id.", ".$reviewer_id3." , ".$journal_id3.");";
    if($conn->query($sql))
    {
        $sql1 = "UPDATE files_main SET status = 'Under review' WHERE ID = '$journal_id1'";
        if($conn->query($sql1))
            echo "successfully inserted";
            header('Location: editor_allocation.php');
    }
    else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
      
      $conn->close();
?>