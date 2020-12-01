


<?php
//getting the list of users

        $search ='';

if (isset($_GET['search'])){
    $search = mysqli_real_escape_string($connection,$_GET['search']);
    $query ="SELECT * FROM user WHERE (first_name LIKE '%{$search}%' OR last_name LIKE '%{$search}%' OR  email LIKE '%{$search}%')  AND is_deleted=0 ORDER BY id";
}else{
    $query ="SELECT * FROM user WHERE is_deleted = 0  ORDER BY  id";
}

$user_list ='';


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
