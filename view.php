<?php

session_start();
$login = stripslashes($_GET["login"]);
$success = false; 

$users = fopen('/srv/uploads/users.txt', 'r');
$linenum = 1;
echo "<ul>\n";
while (!feof($users))
{
    if (trim(fgets($users))==$login)
    {
        $_SESSION["username"] = $login;
        $success = true;
        echo "Successful login!";
        header('Location: uploadform.html');
        $linenum++;
        break;
    }
}

fclose($users);

if($success == false){
    echo "Login failed!";
}

?>