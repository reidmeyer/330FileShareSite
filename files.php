<?php

session_start();

$username = $_SESSION['username'];
if( !preg_match('/^[\w_\-]+$/', $username) ){
    echo "Invalid username";
    exit;
}


$path = sprintf("/srv/uploads/%s", $username);
$files = scandir($path);
//http://thisinterestsme.com/php-how-to-print-out-an-array/
echo "These are your files";
echo '<pre>';
//https://stackoverflow.com/questions/15774669/list-all-files-in-one-directory-php
$files = array_diff(scandir($path), array('.', '..'));
print_r($files);
echo '</pre>';
?>



<html lang="en">
    <body>
        <form action="filetobrowser.php">
            <p>Please type in the name of the file to view</p>
            <input type="text" name="filetoread">
            <input type="submit" value="View File">
        </form>
    </body>
</html>
<html lang="en">
    <body>
        <form action="change.php">
            <br><br>
            <p>Enter the file name you want changed: </p>
            <input type="text" name="curfile">
            <p>Enter what you want it changed to:</p>
            <input type="text" name="newfile">
            <input type="submit" value="Rename">

        </form>
    </body>
</html>

<html lang="en">
    <body>
        <form action="details.php">
            <br><br>
            <p>View the details of files such as size, date and time! </p>
            <input type="submit" value="View Details">

        </form>
    </body>
</html>

<html lang="en">
    <body>
        <form action="delete.php">
            <br><br>
            <p>Please type in the name of the file to delete</p>
            <input type="text" name="filetodelete">
            <input type="submit" value="Delete File">
        </form>


        <form action="logout.php">
            <input type="submit" value="Log out">
        </form>
    </body>

</html>



<?



?>