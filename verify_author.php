<!-- <script>
    function locationHashChanged() { 
  if (location.hash === '#cool-feature') { 
    console.log("You're visiting a cool feature!"); 
  } 
} 

window.onhashchange = locationHashChanged;
</script> -->

<?php
    session_start();

    $file = 'uploadManuscript/' . $_SESSION['current_journal'];

    $filename = 'example.pdf'; /* Note: Always use .pdf at the end. */
    
    header('Content-type: application/pdf');
    header('Content-Disposition: inline; filename="' . $filename . '"');
    header('Content-Transfer-Encoding: binary');
    header('Content-Length: ' . filesize($file));
    header('Accept-Ranges: bytes');
    
    @readfile($file);
    $result -> free_result();


    
?>