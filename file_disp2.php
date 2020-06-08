<?php
$mysqli = new mysqli('localhost', 'root', '', 'iete_journal');

$file_id = $_GET['file_id'];

echo "<script>alert('$file_id')</script>";
// $sql = "SELECT name FROM files where ID = 15";
$sql = "SELECT abstract_name FROM files_main where ID = " . $file_id;
// $sql = "SELECT ".$file_name." FROM files;";

if ($result = $mysqli -> query($sql)) {
    while ($row = $result -> fetch_row()) {
      // echo "hellllloo";
      echo $row[0];
      printf ("%s \n", $row[0]);
      $file = 'uploadAbstract/' . $row[0];

      $filename = 'diksha1.pdf'; /* Note: Always use .pdf at the end. */
      
      header('Content-type: application/pdf');
      header('Content-Disposition: inline; filename="' . $filename . '"');
      header('Content-Transfer-Encoding: binary');
      header('Content-Length: ' . filesize($file));
      header('Accept-Ranges: bytes');
      
      @readfile($file);
    }
    $result -> free_result();
  }

// echo "<script>alert($varr)</script>";

 
?>