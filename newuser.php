<?php

session_start();
$newuser = stripslashes($_GET["newuser"]);
$full_path = sprintf("/srv/uploads/%s", $newuser);

mkdir($full_path);
chmod($full_path, 0777);
$addusertofile = "\r\n" . $newuser;
//http://php.net/manual/en/function.file-put-contents.php
file_put_contents("/srv/uploads/users.txt", $addusertofile, FILE_APPEND);

echo "You have successfully created a new user for: " . $newuser . "\r\n";
echo "Press back on the browser, login, and enjoy";
?>