<?php session_start(); ?>
<?php require_once ('../inc/database.php'); ?>
<?php
    //Checking session incloud page  if a user is logged in
    if (!isset($_SESSION['user_id'])){
        header('Location: ../index.php');
    }

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Users</title>
    <link rel="stylesheet" href="../bootstrap-4.5.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/main.css">
</head>
<body>

<header>
    <div class="appname">User Managment System </div>
    <div class="loggedin">Welcome <?php echo $_SESSION['first_name'];?> ! <a href="logout.php">Logout</a> </div>

</header>

</body>
</html>
<?php mysqli_close($connection) ?>
