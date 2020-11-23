<?php

//check for from submission

if (isset($_POST['submit'])){

    //store the errors
    $errors = array();

    //check username and pw has been entered
    if (! isset($_POST['email']) || strlen(trim($_POST['email'])) <1){

        $errors[]='Username is Missing or Invalid';
    }

    if (! isset($_POST['password']) || strlen(trim($_POST['password'])) <1){

        $errors[]='Password is Missing or Invalid';
    }

    //check any erros in the form

    if (empty($errors)){

        //save  username and password into variable

        $email = mysqli_real_escape_string($connection,$_POST['email']);
        $password = mysqli_real_escape_string($connection,$_POST['password']);
        $hashed_password = sha1($password);

        //create db query in enter pw chek db

        $query ="SELECT * FROM user  WHERE email ='{$email}' AND password = '{$hashed_password}' LIMIT 1";

        $result_set = mysqli_query($connection,$query);
        if ($result_set){
            //Query sucessfull
            if (mysqli_num_rows($result_set)==1){
                // Valid User Found
                // redirect to users.php
                header('Location:main/users.php');

            }else{
                //username and password invalid
                $errors[]='Invalid Username or Password';

            }
        }else{
            $errors[]='Databse query failed';
        }





        //if not display the error

    }


}












?>
