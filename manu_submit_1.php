<?php
session_start();
$current_author = $_SESSION['current_user_id'];

$connect = mysqli_connect("localhost", "root","","iete_journal");
    $journal_name = $_POST['name'];
    $category = $_POST['selectedCategory'];
    $co_author = $POST['inputAuthor'];
 $query = "INSERT INTO files_main(journal_name,category,co_author,author_id) VALUES ('{$journal_name}','{$category}','{$co_author}','{$current_author}')";
if(mysqli_query($connect, $query))
{
    $last = mysqli_insert_id($connect);
    setcookie("last_inserted_id", $last , 2147483647);

    $_SESSION['last_inserted_id'] = $last;
    echo 'Data Inserted for id = ' . $last;
}
else
{
 echo 'try again';
	
}

?>
