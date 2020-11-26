<?php session_start(); ?>
<?php require_once('../inc/database.php'); ?>
<?php //require_once ('../sql/user_list.php') ?>

<?php
////Checking session incloud page  if a user is logged in
//if (!isset($_SESSION['user_id'])){
//    header('Location: ../index.php');
//}


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add New User</title>
    <link rel="stylesheet" href="../bootstrap-4.5.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/main.css">
</head>
<body>

<header>
    <div class="appname">User Managment System</div>
    <div class="loggedin">Welcome <?php echo $_SESSION['first_name']; ?> ! <a href="logout.php">Logout</a></div>

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
                <h3>Add New User : </h3>
                <a class="btn btn-primary" href="users.php">Back to User List </a>
                <br>
                <br>

                <form action="add-user.php" class="userform">

                    <p>
                        <label for="">First name</label>
                        <input class="form-control" type="text" placeholder="First Name" name="first_name" required>
                    </p>

                    <p>
                        <label for="">Last name</label>
                        <input class="form-control" type="text" placeholder="Last Name" name="last_name" required>
                    </p>

                    <p>
                        <label for="">Emali Address</label>
                        <input class="form-control" type="email" placeholder="Email" name="email" required>
                    </p>

                    <p>
                        <label for="">New Password</label>
                        <input class="form-control" type="password" placeholder="New Password" name="password" required>
                    </p>

                    <p>
                        <label for=""></label>
                        <button type="submit" class="btn btn-success" name="submit">Success</button>
                    </p>

                </form>


            </div>
            <div class="col-md-2"></div>
        </div>
    </div>

</main>

</body>
</html>
<?php mysqli_close($connection) ?>
