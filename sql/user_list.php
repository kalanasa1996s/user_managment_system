


<?php

$user_list ='';
//getting the list of users
$query ="SELECT * FROM user WHERE is_deleted = 0  ORDER BY  id";
$users = mysqli_query($connection,$query);

if ($users){
    while ($user = mysqli_fetch_assoc($users)){
        $user_list .= "<tr>";
        $user_list .= "<td>{$user['first_name']} </td>";
        $user_list .= "<td>{$user['last_name']} </td>";
        $user_list .= "<td>{$user['last_login']} </td>";
        $user_list .= "<td><a href=\"modify-user.php?user_id={$user['id']}\">Edit</a> </td>";
        $user_list .= "<td><a href=\"delete-user.php?user_id={$user['id']}\" onclick=\"return confirm('Are You Sure');\">Delete</a> </td>";
        $user_list .= "</tr>";
    }
}else{
    echo "Db Query Failed";
}

?>
