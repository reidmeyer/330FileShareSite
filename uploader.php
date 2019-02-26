<?php

session_start();

// Get the filename and make sure it is valid

//sets max file size to 10 megs
ini_set('upload_max_filesize', '10M');
ini_set('post_max_size', '10M');
ini_set('max_input_time', 3000);
ini_set('max_execution_time', 3000);


$filename = basename($_FILES['uploadedfile']['name']);
if( !preg_match('/^[\w_\.\-]+$/', $filename) ){
    echo "Invalid filename";
    exit;
}

// Get the username and make sure it is valid
$username = $_SESSION['username'];
if( !preg_match('/^[\w_\-]+$/', $username) ){
    echo "Invalid username";
    exit;
}

$full_path = sprintf("/srv/uploads/%s/%s", $username, $filename);

if( move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $full_path) ){
    //chmod($full_path, 0777);
    chown ($full_path, apache);
    header("Location: upload_success.html");
    exit;
}else{
    header("Location: upload_failure.html");
    exit;
}

?>