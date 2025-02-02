<?php
session_start() ;
require_once "./config.php" ;
if (!isset($_SESSION['email']) && $_SESSION['email'] != "subrota12@gmail.com") {
    header("location:../front-end/login_page.php") ;
}
if(isset($_REQUEST['user_id'])){
    $user_id = $_REQUEST['user_id'];
    $delete_user = "DELETE FROM users WHERE id='$user_id'";
    $query= mysqli_query($connection,$delete_user) ;
    if($query==true){
        $_SESSION['message'] = "User data deleted successfully !!" ;
        header("location:../front-end/show_users.php") ;
    }else{
        $_SESSION['message'] = "Failed to update user data !!" ;
        header("location:../front-end/show_users.php") ; 
    }
}
?>