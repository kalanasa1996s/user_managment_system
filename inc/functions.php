<?php

    function verify_query($result_set){

        global $connection;

        if (!$result_set){

            die("db query error : " . mysqli_error());

        }

    }


?>
