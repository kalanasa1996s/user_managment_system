<?php session_start(); ?>
<?php require_once ('../inc/database.php'); ?>
<?php require_once ('../sql/user_list.php') ?>

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

<main>
    <br>
    <br>
    <br>
    <br>

    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>

            <div class="col-md-8">
<!--                <button type="button" class="btn btn-primary">Add New + </button>-->

                <a class="btn btn-primary" href="add-user.php">Add New + </a>
                <br>
                <br>
                <div>
                    <form action="users.php" method="get" >
                        <input type="text" name="search" required id="" placeholder="Type First Name | Last Name Or Email" autofocus class="form-control" value="<?php echo $search ?>">
                    </form>
                </div>

                <br>
                <br>
                <table class="table">
                    <thead class="thead-light">
                    <tr>

                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Last Login</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php echo $user_list; ?>

                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>

                    </tbody>
                </table>


            </div>
            <div class="col-md-2"></div>
        </div>
    </div>

</main>

</body>
<script src="../js/jquery-3.5.1.min.js"></script>
</html>
<?php mysqli_close($connection) ?>
