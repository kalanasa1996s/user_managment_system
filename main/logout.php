<?php


//start session
        session_start();

//session eke tiyena array eka empty kraganna ona
       $_SESSION = array();

//session ekata adala cookie eka brower ekn ain kragna ona
       if (isset($_COOKIE[session_name()])){
           setcookie(session_name(),'',time()-86400,'../');
       }
//session eka ain krnn ona
       session_destroy();

       header('Location:../index.php?logout=yes');


?>
