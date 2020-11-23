<?php //session_start(); ?>
<?php require_once('inc/database.php') ?>
<?php require_once('sql/sql.php') ?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="bootstrap-4.5.3-dist/css/bootstrap.min.css">
</head>
<body>


<div class="container">

    <div class="row">


        <div class="col-md-4"></div>

        <div class="col-md-4 align-self-center">

            <br>
            <br>
            <br>
            <br>
            <br>
            <br>

            <form action="index.php" method="post">
                <h1 style="text-align: center">Login</h1>


                <?php

                if (isset($errors) && !empty($errors)){
                    echo ' <p class="alert alert-danger" role="alert"">Invalid Username OR Password</p>' ;

                }

                ?>

                <?php

                    if (isset($_GET['logout'])){
                        echo ' <p class="alert alert-success" role="alert"">You have Sucessfully Loge Out the System</p>' ;
                    }


                ?>


                <div class="form-group">
                    <label for="exampleInputEmail1">Username:</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email Address" name="email">

                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
                </div>


                <button type="submit" class="btn btn-primary" name="submit">Login</button>

            </form>



        </div>
        <div class="col-md-4"></div>


    </div>


</div>


</body>
<!--<script src="bootstrap-4.5.3-dist/js/bootstrap.min.js"></script>-->


</html>

<?php mysqli_close($connection); ?>
