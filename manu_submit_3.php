<?php
    session_start();
    $last_inserted_id = $_SESSION['last_inserted_id'];

    // if ( 0 < $_FILES['file']['error'] ) {
    //     echo 'Error: ' . $_FILES['file']['error'] . '<br>';
    // }
    // else {
    //     move_uploaded_file($_FILES['file']['tmp_name'], 'upload/' . $_FILES['file']['name']);
    // }


    $conn = mysqli_connect('localhost', 'root', '', 'iete_journal');

    // $sql1 = "select last_insert_id();";
    // $result = mysqli_query($conn, $sql1);

    // if (mysqli_num_rows($result) > 0) {
    // // output data of each row
    //     while($row = mysqli_fetch_assoc($result)) {
    //         $last_inserted_id = $row['ID'];
    //     }
    // }

        
 

    $file   = $_FILES['file'];
        // print_r($file);  just checking File properties

        // File Properties
        $file_name  = $file['name'];
        $file_tmp   = $file['tmp_name'];
        $file_size  = $file['size'];
        $file_error = $file['error'];

        // Working With File Extension
        $file_ext   = explode('.', $file_name);
        $file_fname = explode('.', $file_name);

        $file_fname = strtolower(current($file_fname));
        $file_ext   = strtolower(end($file_ext));
        $allowed    = array('txt','pdf','doc','ods');


        if (in_array($file_ext,$allowed)) {
            //print_r($_FILES);


            if ($file_error === 0) {
                if ($file_size <= 5000000) {
                        $file_name_new     =  $file_fname . uniqid('',true) . '.' . $file_ext;
                        $file_name_new    =  uniqid('',true) . '.' . $file_ext;
                        $file_destination =  'uploadManuscript/' . $file_name_new;
                        // echo $file_destination;

                        $root = getcwd();
                        if (move_uploaded_file($file_tmp, $file_destination)) {
                            $sql = "UPDATE files_main SET file_name = '" . $file_name_new . "' , size = " . $file_size . " WHERE ID = " . $last_inserted_id; 
                            // $result = mysqli_query($conn, $sql);
                            // $sql = "INSERT OR UPDATE INTO files_main (file_name,size) VALUES ('$file_name_new','$file_size') WHERE ID = " . $last_inserted_id;
                                if (mysqli_query($conn, $sql)) {
                                    echo "Journal Uploaded " . $file_name_new;
                                    $_SESSION['current_journal'] = $file_name_new;
                        }
                        else
                            echo "Journal not Uploaded ";

                    }
                        else
                        {
                            echo "some error in uploading file".mysql_error();
                        }
//                        
                }
                else
                {
                    echo "size must bne less then 5MB";
                }
            }

        }
        else
        {
            echo "invalid file";
        }

?>