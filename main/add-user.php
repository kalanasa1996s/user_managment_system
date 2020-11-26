<?php session_start(); ?>
<?php require_once('../inc/database.php'); ?>
<?php require_once ('../inc/functions.php')?>
<?php //require_once ('../sql/user_list.php') ?>

<?php
//Checking session incloud page  if a user is logged in
if (!isset($_SESSION['user_id'])){
    header('Location: ../index.php');
}
?>


<?php

    $errors = array();

    if (isset($_POST['submit'])){

        $req_field = array('first_name','last_name','email','password');

        //        //Checking Required Fields
        foreach ($req_field as $field){
            if (empty (trim($_POST[$field]))){
                $errors[] = $field.'  is Required';
            }

        }

//        //Checking Required Fields me tika uda widiyata tani ekkin  penna puluwan
//        if (empty (trim($_POST['first_name']))){
//            $errors[] = 'First Name is Required';
//        }
//        if (empty (trim($_POST['last_name']))){
//            $errors[] = 'Last Name is Required';
//        }
//        if (empty (trim($_POST['email']))){
//            $errors[] = 'Email is Required';
//        }
//        if (empty (trim($_POST['password']))){
//            $errors[] = 'Password is Required';
//        }



    }



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

                <?php

                if (!empty($errors)){
                    echo '<div class = "errmsg">';
                    echo '<b>There were error(s) on Your Form.</b>';
                    echo '<br>';
                    foreach ($errors as $error){
                        echo $error . '<br>';
                    }
                    echo '</div>';
                    echo '<br>';
                }


                ?>


                <form action="add-user.php" method="post" class="userform">

                    <p>
                        <label for="">First name</label>
                        <input class="form-control" type="text" placeholder="First Name" name="first_name" >
                    </p>

                    <p>
                        <label for="">Last name</label>
                        <input class="form-control" type="text" placeholder="Last Name" name="last_name" >
                    </p>

                    <p>
                        <label for="">Emali Address</label>
                        <input class="form-control" type="email" placeholder="Email" name="email" >
                    </p>

                    <p>
                        <label for="">New Password</label>
                        <input class="form-control" type="password" placeholder="New Password" name="password" >
                    </p>

                    <p>
                        <label for=""></label>
                        <button type="submit" class="btn btn-success" name="submit">Save</button>
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
