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

    $error = array();

if (isset($_GET['user_id'])){
    $user_id = mysqli_real_escape_string($connection,$_GET['user_id']);

    if ($user_id== $_SESSION['user_id']){
        //sHOULD NOT DELETE CURRENT user
//        $error[]='Cannot Delete current user';
        header('Location:users.php?err=cannot_delete_current_user' );


    }else{

        //DELETING THE USER

        $query = "UPDATE user SET is_deleted = 1 WHERE id ={$user_id} LIMIT 1";

        $result_set = mysqli_query($connection,$query);

        if ($result_set){
            //User deleted
            header('Location: users.php?msg=user_deleted');
        }else{
            header('Location: users.php?err=delete_failed');
        }

    }

}else{
    header('Location:users.php');
}



?>

<?php mysqli_close($connection) ?>


