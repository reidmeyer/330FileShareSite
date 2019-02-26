<?php
session_start();

$username = $_SESSION['username'];
if( !preg_match('/^[\w_\-]+$/', $username) ){
    echo "Invalid username";
    exit;
}

$deletefile = stripslashes($_GET["filetodelete"]);

$full_path = sprintf("/srv/uploads/%s/%s", $username, $deletefile);

if(unlink($full_path))
    echo "file successfully deleted";
else
    echo "error";

?>