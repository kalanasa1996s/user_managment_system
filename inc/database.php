<?php

$dbhost ='localhost';
$dbuser ='root';
$dbpass ='';
$dbname='userdb';


$connection = mysqli_connect('localhost', 'root', '', 'userdb', 3306);

if (mysqli_connect_errno()) {
    die('Db Connwction Failed ❤ ' . mysqli_connect_error());
} else {
    echo "💚";
}

?>
