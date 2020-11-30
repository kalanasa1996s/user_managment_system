<?php session_start(); ?>
<?php require_once('../inc/database.php'); ?>
<?php require_once('../inc/functions.php') ?>
<?php //require_once ('../sql/submit.php') ?>
<?php //require_once ('../sql/user_list.php') ?>

<?php
//Checking session incloud page  if a user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: ../index.php');
}
?>


<?php

$errors = array();
$user_id ='';
$first_name='';
$last_name='';
$email='';
$password='';


if (isset($_GET['user_id'])){
    $user_id = mysqli_real_escape_string($connection,$_GET['user_id']);
    $query = "SELECT * FROM user WHERE id = {$user_id} LIMIT 1";
    $result_set = mysqli_query($connection,$query);

    if ($result_set){
        if (mysqli_num_rows($result_set)==1){
            // user found
            $result = mysqli_fetch_assoc($result_set);
            $first_name=$result['first_name'];
            $last_name=$result['last_name'];
            $email=$result['email'];
            $password=$result['password'];


        }else{
            //user not found
            header('Location: users.php?user_nof_found');
        }

        }else{
        //query unsucessfull
        header('Location: users.php?query_failed');
    }
}

if (isset($_POST['submit'])) {

    $user_id=$_POST['user_id'];
    $first_name=$_POST['first_name'];
    $last_name=$_POST['last_name'];
    $email=$_POST['email'];



    //        //Checking Required Fields
    $req_field = array('user_id','first_name', 'last_name', 'email');

    $errors = array_merge($errors,check_req_fields($req_field) );

//    foreach ($req_field as $field) {
//        if (empty (trim($_POST[$field]))) {
//            $errors[] = $field . '  is Required';
//        }
//    }

    // checking max length
    $max_len_field = array('first_name' => 50 , 'last_name' =>100, 'email' =>100);

    $errors = array_merge($errors,check_max_length($max_len_field) );
//        foreach ($max_len_field as  $field => $max_len) {
//            if (strlen(trim($_POST[$field])) > $max_len) {
//                $errors[] = $field . ' must be less than' . $max_len.'caracters';
//            }
//        }

    //checking email address
    if (!is_email($_POST['email'])){
        $errors [] = 'Email adddress is invalid';
    }
// checking if emali address already exists

    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $query = "SELECT * FROM user WHERE email = '{$email}' AND id != {$user_id} LIMIT 1";

    $result_set = mysqli_query($connection,$query);

    if ($result_set){
        if (mysqli_num_rows($result_set)==1){
            $errors[] ='Email Address already Exists ';

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

    if (empty($errors)){
        // No Errors Found... Adding new Record
        $first_name = mysqli_real_escape_string($connection, $_POST['first_name']);
        $last_name = mysqli_real_escape_string($connection, $_POST['last_name']);

        //email address is already sanitized



        $query = "UPDATE user SET first_name ='{$first_name}' , last_name='{$last_name}' , email='{$email}' WHERE id ={$user_id} LIMIT 1";
        $result_set = mysqli_query($connection,$query);

        if ($result_set){
            //query sucessful .... redirecting to users page
            header('Location: users.php?user_modified=true');


        }else{
            $errors[]='Added Failed Edit User';
        }
    }

}


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>View/Modify  User</title>
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
                <h3>View/Modify  User : </h3>
                <a class="btn btn-primary" href="users.php">Back to User List </a>
                <br>
                <br>

                <?php

                if (!empty($errors)) {
//                    echo '<div class = "errmsg">';
//                    echo '<b>There were error(s) on Your Form.</b>';
//                    echo '<br>';
//                    foreach ($errors as $error) {
//                        echo $error . '<br>';
//                    }
//                    echo '</div>';
//                    echo '<br>';
                    display_errors($errors);
                }


                ?>


                <form action="modify-user.php" method="post" class="userform">

                    <input type="text" name="user_id" value="<?php echo $user_id;?>">
                    <p>
                        <label for="">First name</label>
                        <input class="form-control" type="text" placeholder="First Name" name="first_name" <?php echo 'value =" ' . $first_name . '"'; ?>>
                    </p>

                    <p>
                        <label for="">Last name</label>
                        <input class="form-control" type="text" placeholder="Last Name" name="last_name" <?php echo 'value ="'. $last_name.'"'; ?>>
                    </p>

                    <p>
                        <label for="">Emali Address</label>
                        <input class="form-control" type="text" placeholder="Email" name="email" <?php echo 'value ="' . $email . '"';?>>
                    </p>

                    <p>
                        <label for=""> Password</label>
                        <input class="form-control" type="password" placeholder="*********" name="password" disabled>
                        <a href="change-password.php?user_id=<?php echo $user_id; ?>"> | Change Password |</a>
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
